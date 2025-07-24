<?php

namespace App\Http\Controllers;

use App\Helpers\CertificateHelper;
use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Models\Comment;
use App\Models\Inscription;
use App\Models\Participant;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CertificatesController extends Controller {

    protected CertificateHelper $certificateHelper;

    public function __construct(
        CertificateHelper $certificateHelper
    ){
        $this->certificateHelper = $certificateHelper;
    }
    
    public function deliver(Inscription $inscription, Participant $participant){
        $inscription->load('service');
        $service = $inscription->service;

        $expiry_date = null;
        if ($service->months_to_expire) {
            $monthsToExpire = (int) $service->months_to_expire;
            $expiry_date = now()->addMonths($monthsToExpire)->toDateString();
        }

        $nomenclature = ($service->nomenclature) ? $service->nomenclature : 'RPS';
        $code = $this->certificateHelper->generateCode($nomenclature, $participant->id);

        $certificate = Certificate::create([
            'participant_id' => $participant->id,
            'service_id' => $service->id,
            'code' => $code,
            'service_version' => $service->version,
            'issue_date' => now(),
            'expiry_date' => $expiry_date,
        ]);

        $comment = Comment::create([
            'inscription_id' => $inscription->id,
            'participant_id' => $participant->id,
            'token' => $certificate->code
        ]);

        Mail::to($participant->email)->queue(new CertificateMail(
            $certificate,
            $comment,
            $participant,
            $service,
            $inscription
        ));

        return redirect()->route('inscriptions.details', $inscription->id)->with('success', 'Certificado generado, se entregará por correo en unos momentos. Favor de actualizar para ver el cambio.');
    }

    public function show(){
        return view('certificates');
    }

    public function validate(Request $request){
        // Permitir obtener el código tanto de GET como de POST
        $code = $request->input('code');
        if (!$code) {
            return redirect()->back()->with('error', 'Debes ingresar el código del certificado.');
        }

        $certificate = Certificate::with(['participant', 'service'])->where('code', $code)->first();
        if (!$certificate) {
            return redirect()->back()->with('error', 'El código del certificado no es válido o no existe.');
        }

        $previousCertificates = Certificate::where('participant_id', $certificate->participant_id)
            ->where('service_id', $certificate->service_id)
            ->where('id', '!=', $certificate->id)
            ->orderBy('issue_date', 'desc')
            ->get();

        $status = $this->certificateHelper->validateCertificate($certificate->code);
        $message = '¡Certificado Válido!';
        $advertisment = '';
        if ($status === 'expired') {
            $message = 'Certificado Válido, pero ha expirado.';
            $advertisment = "Te sugerimos tomar nuevamente el curso.";
        } elseif ($status === 'obsoleted') {
            $message = 'Certificado válido, pero obsoleto';
            $advertisment = "Te sugerimos tomar nuevamente el curso.";
        }

        $data = [
            'certificate'           => $certificate,
            'previous_certificates' => $previousCertificates,
            'message'               => $message,
            'advertisment'          => $advertisment
        ];

        return redirect()->route('certificate')->with('success', $data);
    }
}
