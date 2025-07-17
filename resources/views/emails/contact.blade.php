<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RPS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }
            .footer {
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #151515; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; background-color: #EEEEEE; margin: 0; padding: 0; width: 100%;">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="header" style="padding: 25px 0; text-align: center;">
                            <a href="http://rps_web_app.test" style="color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                                <img src="{{ Vite::asset('resources/images/logo_black.png') }}" class="logo" alt="RPS Logo" width="100">
                            </a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="background-color: #EEEEEE; border-bottom: 1px solid #EEEEEE; border-top: 1px solid #EEEEEE; margin: 0; padding: 0; width: 100%; border: hidden !important;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #ffffff; border-color: #fff; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="max-width: 100vw; padding: 32px;">
                                        <h1 style="color: #151515; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">¡Hola!</h1>
                                        <p style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Hay un nuevo mensaje</p>
                                        <p style="font-size: 14px; font-weight:700; line-height: 1.5em; margin-top: 0; margin-bottom: 0; text-align: left;">
                                          Nombre: 
                                          <span style="font-weight: 400;">{{ $contact->name }}</span>
                                        </p>
                                        <p style="font-size: 14px; font-weight:700; line-height: 1.5em; margin-top: 0; margin-bottom: 0; text-align: left;">
                                          Email: 
                                          <span style="font-weight: 400;">{{ $contact->email }}</span>
                                        </p>
                                        <p style="font-size: 14px; font-weight:700; line-height: 1.5em; margin-top: 0; margin-bottom: 0; text-align: left;">
                                          Teléfono: 
                                          <span style="font-weight: 400;">{{ $contact->phone }}</span>
                                        </p>
                                        <p style="font-size: 14px; font-weight:700; line-height: 1.5em; margin-top: 0; margin-bottom: 0; text-align: left;">
                                          Asunto: 
                                          <span style="font-weight: 400;">{{ $contact->issue }}</span>
                                        </p>
                                        <p style="font-size: 14px; font-weight:700; line-height: 1.5em; margin-top: 0; margin-bottom: 0; text-align: left;">
                                          Mensaje: 
                                          <span style="font-weight: 400;">{{ $contact->message }}</span>
                                        </p>
                                        <p style="font-size: 16px; line-height: 1.5em; margin-top: 20px; text-align: left;">En caso de atender al contacto, eliminar en el administrador.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center" style="max-width: 100vw; padding: 32px;">
                                        <p style="line-height: 1.5em; margin-top: 0; color: #151515; font-size: 12px; text-align: center;">© 2025 RPS. Derechos reservados.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>