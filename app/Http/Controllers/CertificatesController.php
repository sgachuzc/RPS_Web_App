<?php

namespace App\Http\Controllers;

use App\Helpers\CertificateHelper;
use App\Mail\CertificateMail;
use App\Models\Certificate;
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
        $service = Service::findOrFail($serviceId);

        $certificate = Certificate::create([
            'participant_id' => $participant->id,
            'service_id' => $service->id,
            'code' => $this->certificateHelper->generateCode(1),
            'issue_date' => now(),
            'expiry_date' => $this->certificateHelper->generateExpirationDate(),
        ]);

        Mail::to($participant->email)->queue(new CertificateMail(
            $certificate,
            $participant,
            $service
        ));

        return back()->with('success', 'Certificado generado, se entregará por correo en unos momentos.');
    }

    public function validate(Request $request){
        $param = $request->validate([
            'code' => ['required', 'exists:certificates,code']
        ]);

        $code = $param['code'];

        $isOnTime = $this->certificateHelper->validateCertificate($code);

        if ($isOnTime) {
            return redirect()->back()->with('success', 'Tu certificado aún tiene validez');
        } else {
            return redirect()->back()->with('success', 'Tu certificado ha vencido');
        }
    }
}
