<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado</title>
    <style>
        body { 
            font-family: sans-serif; 
            text-align: center;
            /* background-image: url('../../images/pdf_background.png'); */
            /* background-repeat: no-repeat;
            background-size: 1000px;
            background-position-x: 330px;
            background-position-y: -75px; */
        }
        .cert-title { font-size: 2em; margin-top: 30px; }
        .cert-body { margin-top: 30px; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="frame" style="width: 90%; margin: 10px auto; padding: 20px; border: 1px solid #A91D3A;">
        <div class="image_container" style="text-align: left;">
            <img src="{{ $logoPath }}" alt="RPS" style="width: 200px;">
        </div>
        <div class="cert-title">Certificate of Successful Completion</div>
        <div class="cert-body">
            <p style="font-size: 14px;">This is awarded to:</p>
            <p><strong>{{ $participant->name }}</strong></p>
            <p style="font-size: 14px;">In recognition of  completing the training</p>
            <p><strong>{{ $service->name }}</strong></p>
            <p style="font-size: 14px;">issued on: {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d/m/Y') }}</p>
        </div>
        <table style="width: 100%; margin-top: 100px;">
            <tbody>
                <tr>
                    <td style="text-align: left; padding-top: 135px;">
                        Código: {{ $certificate->code }}
                    </td>
                    <td style="text-align: right;">
                        <img src="file://{{ public_path('images/signature.png') }}" alt="Signature" style="width: 300px;">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>