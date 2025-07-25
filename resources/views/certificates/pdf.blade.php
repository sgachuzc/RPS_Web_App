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
        }
        .frame{
            background-image: url("file://{{ public_path('images/fondo.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .cert-title { font-size: 2em; margin-top: 30px; }
        .cert-body { margin-top: 15px; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="frame" style="width: 90%; margin: 10px auto; padding: 20px; border: 2px solid #A91D3A;">
        <div class="image_container" style="text-align: left;">
            <img src="{{ $logoPath }}" alt="RPS" style="width: 100px;">
        </div>
        <div class="cert-title">CERTIFICADO DE PARTICIPACIÓN</div>
        <div class="cert-body">
            <p style="font-size: 14px;">Otorgado a:</p>
            <p><strong>{{ $participant->name }}</strong></p>
            <p style="font-size: 14px;">Este certificado acredita que el participante <br> ha completado satisfactoriamente el curso de:</p>
            <p><strong>{{ $service->name }}</strong></p>
        </div>
        <table style="width: 100%; margin-top: 100px;">
            <tbody>
                <tr>
                    <td style="text-align: left;">
                        <img src="data:image/png;base64,{{ $qr }}" alt="QR Code" />
                        <br>
                        <span>
                            Código: {{ $certificate->code }}
                        </span>
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