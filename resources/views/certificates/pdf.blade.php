<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado</title>
    <style>
        body { font-family: sans-serif; text-align: center; }
        .cert-title { font-size: 2em; margin-top: 40px; }
        .cert-body { margin-top: 60px; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="cert-title">Certificado de Participación</div>
    <div class="cert-body">
        Se otorga a <strong>{{ $participant->name }}</strong><br>
        por su participación en el servicio<br>
        <strong>{{ $service->name }}</strong><br>
        emitido el {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d/m/Y') }}.
    </div>
    <div style="margin-top: 80px;">
        Código: {{ $certificate->code }}
    </div>
</body>
</html>