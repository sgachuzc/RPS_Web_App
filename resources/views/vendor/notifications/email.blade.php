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
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; background-color: #efefef; margin: 0; padding: 0; width: 100%;">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="header" style="padding: 25px 0; text-align: center;">
                            <a href="http://rps_web_app.test" style="color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                                <img src="{{ Vite::asset('resources/images/rps.png') }}" class="logo" alt="RPS Logo" style="max-width: 100%; border: none; height: 75px; max-height: 75px; width: 75px;">
                            </a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="background-color: #efefef; border-bottom: 1px solid #efefef; border-top: 1px solid #efefef; margin: 0; padding: 0; width: 100%; border: hidden !important;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="max-width: 100vw; padding: 32px;">
                                        <h1 style="color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">¡Hola!</h1>
                                        <p style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Recibió este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta.</p>
                                        <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin: 30px auto; padding: 0; text-align: center; width: 100%; float: unset;">
                                            <tr>
                                                <td align="center">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                        <tr>
                                                            <td align="center">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                                                                    <tr>
                                                                        <td>
                                                                            <a href="{{ $actionUrl }}" class="button button-primary" target="_blank" rel="noopener" style="border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #0d6efd; border-bottom: 8px solid #0d6efd; border-left: 18px solid #0d6efd; border-right: 18px solid #0d6efd; border-top: 8px solid #0d6efd; word-break: break-all;">Restablecer contraseña</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Este enlace de restablecimiento de contraseña expirará en 60 minutos.</p>
                                        <p style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Si no solicitó un restablecimiento de contraseña, no se requiere ninguna otra acción.</p>
                                        <p style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Gracias,<br>RPS</p>
                                        <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-top: 1px solid #e8e5ef; margin-top: 25px; padding-top: 25px;">
                                            <tr>
                                                <td>
                                                    <p style="line-height: 1.5em; margin-top: 0; text-align: left; font-size: 14px;">Si tiene problemas para hacer clic en el botón "Restablecer contraseña", copie y pegue la siguiente URL en su navegador web: <span class="break-all"><a href="http://rps_web_app.test/password/reset/3e48a7de037ef12efa81d9684644b428111b40dfb8487202cbc1a648966a8f1a?email=sergioegch%40hotmail.com" style="color: #3869d4; word-break: break-all;">{{ $actionUrl }}</a></span></p>
                                                </td>
                                            </tr>
                                        </table>
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
                                        <p style="line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">© 2025 RPS. Derechos reservados.</p>
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