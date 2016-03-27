<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bienvenido</title>
    <style type="text/css">

        /* Take care of image borders and formatting */

        img {
            max-width: 600px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a {
            border: 0;
            outline: none;
        }

        a img {
            border: none;
        }

        /* General styling */

        td, h1, h2, h3  {
            font-family: Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        td {
            font-size: 13px;
            line-height: 19px;
            text-align: left;
        }

        body {
            -webkit-font-smoothing:antialiased;
            -webkit-text-size-adjust:none;
            width: 100%;
            height: 100%;
            color: #37302d;
            background: #ffffff;
        }

        table {
            border-collapse: collapse !important;
        }


        h1, h2, h3, h4 {
            padding: 0;
            margin: 0;
            color: #444444;
            font-weight: 400;
            line-height: 110%;
        }

        h1 {
            font-size: 35px;
        }

        h2 {
            font-size: 30px;
        }

        h3 {
            font-size: 24px;
        }

        h4 {
            font-size: 18px;
            font-weight: normal;
        }

        .important-font {
            color: #21BEB4;
            font-weight: bold;
        }

        .hide {
            display: none !important;
        }

        .force-full-width {
            width: 100% !important;
        }

    </style>

    <style type="text/css" media="screen">
        @media screen {
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

            /* Thanks Outlook 2013! http://goo.gl/XLxpyl */
            td, h1, h2, h3 {
                font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
            }
        }
    </style>

    <style type="text/css" media="only screen and (max-width: 600px)">
        /* Mobile styles */
        @media only screen and (max-width: 600px) {

            table[class="w320"] {
                width: 320px !important;
            }

            table[class="w300"] {
                width: 300px !important;
            }

            table[class="w290"] {
                width: 290px !important;
            }

            td[class="w320"] {
                width: 320px !important;
            }

            td[class~="mobile-padding"] {
                padding-left: 14px !important;
                padding-right: 14px !important;
            }

            td[class*="mobile-padding-left"] {
                padding-left: 14px !important;
            }

            td[class*="mobile-padding-right"] {
                padding-right: 14px !important;
            }

            td[class*="mobile-padding-left-only"] {
                padding-left: 14px !important;
                padding-right: 0 !important;
            }

            td[class*="mobile-padding-right-only"] {
                padding-right: 14px !important;
                padding-left: 0 !important;
            }

            td[class*="mobile-block"] {
                display: block !important;
                width: 100% !important;
                text-align: left !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                padding-bottom: 15px !important;
            }

            td[class*="mobile-no-padding-bottom"] {
                padding-bottom: 0 !important;
            }

            td[class~="mobile-center"] {
                text-align: center !important;
            }

            table[class*="mobile-center-block"] {
                float: none !important;
                margin: 0 auto !important;
            }
            e
            *[class*="mobile-hide"] {
                display: none !important;
                width: 0 !important;
                height: 0 !important;
                line-height: 0 !important;
                font-size: 0 !important;
            }

            td[class*="mobile-border"] {
                border: 0 !important;
            }
        }
    </style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
        <td align="center" valign="top" bgcolor="#ffffff"  width="100%">

            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td style="background:#002B7A; border:2px solid #BB8800;" width="100%">
                        <center>
                            <table cellspacing="0" cellpadding="0" width="600" class="w320">
                                <tr>
                                    <td valign="top" class="mobile-block mobile-no-padding-bottom mobile-center" width="270" style="background:#002B7A; padding:10px 10px 10px 20px;">
                                        <a href="#" style="text-decoration:none;">
                                            <center><h1 style="color:#FFFFFF">Bienvenido</h1></center>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </center>

                    </td>
                </tr>
                <tr>
                    <td style="border-bottom:1px solid #e7e7e7;">

                        <center>
                            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                                <tr>
                                    <td align="left" class="mobile-padding" style="padding:20px 20px 0">

                                        <br class="mobile-hide" />
                                        <center><img src="{{ asset(env('LOGO_ENESAZULFULL')) }}"></center>
                                        <p>Has sido dado de alta en el sistema, para poder ingresar necesitar asignar una contraseña,</p>
                                        <p>para realizar este proceso da click en el siguiente boton.</p>
                                        <p><strong>Correo: </strong>{{ $user->email }}</p>
                                        <table cellpadding="0" cellspacing="0" width="100%" class="w320">
                                            <tr>
                                                <td>
                                                    <center>
                                                        <table cellspacing="0" cellpadding="0" width="50%" bgcolor="#ffffff">
                                                            <tr>
                                                                <td style="width:130px;background:#D84A38;">
                                                                    <div><!--[if mso]>
                                                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:33px;v-text-anchor:middle;width:130px;" arcsize="8%" stroke="f" fillcolor="#D84A38">
                                                                            <w:anchorlock/>
                                                                            <center style="color:#ffffff;font-family:sans-serif;font-size:13px;">Come back!</center>
                                                                        </v:roundrect>
                                                                        <![endif]-->
                                                                        <!--[if !mso]><!-- --><a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"><table cellspacing="0" cellpadding="0" width="100%"><tr><td style="background-color:#D84A38;border-radius:0px;color:#ffffff;display:inline-block;font-family:sans-serif;font-weight:bold;font-size:13px;line-height:33px;text-align:center;text-decoration:none;width:100%;-webkit-text-size-adjust:none;mso-hide:all;"><span style="color:#ffffff; text-align: center">
                                    Asignar contraseña</span></td></tr></table></a>
                                                                        <!--<![endif]-->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td style="background-color:#002B7A; border:2px solid #BB8800;">
                        <center>
                            <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;color:#ffffff" bgcolor="#002B7A" >
                                <tr>
                                    <td align="right" valign="middle" class="mobile-padding" style="font-size:12px;padding:20px; background-color:#002B7A; color:#ffffff; text-align:left; ">
                                        <center>
                                            <div style="font-size: 0.8em; padding-top: 5px">
                                                <strong>Escuela Nacional de Estudios Superiores Unidad León - UNAM</strong><br/>
                                                Blvd.UNAM 2011, Predio El Saucillo y El Potrero<br/>
                                                Comunidad de los Tepetates, León,Gto. C.P.37684<br/>
                                                Tel. 01 (477) 194 08 00<br/>
                                                enesleon@unam.mx<br/>
                                            </div>
                                            Copyright © 2016
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>