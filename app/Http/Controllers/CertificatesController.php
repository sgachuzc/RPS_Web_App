<?php

namespace App\Http\Controllers;

use App\Helpers\CertificateHelper;
use App\Mail\CertificateMail;
use App\Models\Certificate;
use App\Models\Comment;
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
    
    public function deliver(int $participantId, int $serviceId){
        $participant = Participant::findOrFail($participantId);

        $inscription = $participant->inscriptions()
            ->with(['customer', 'service'])
            ->where('service_id', $serviceId)
            ->firstOrFail();
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

    public function validate(Request $request){
        $param = $request->validate([
            'code' => ['required', 'exists:certificates,code']
        ]);

        $code = $param['code'];

        $status = $this->certificateHelper->validateCertificate($code);

        return redirect()->back()->with('success', $status);
    }
}
