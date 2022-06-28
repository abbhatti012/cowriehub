<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>COWRIEHUB LLC</title>
</head>
<style>
    @media only screen and (max-width: 600px) {
        .main {
            width: 320px !important;
        }
        .top-image {
            width: 100% !important;
        }
        .inside-footer {
            width: 320px !important;
        }
        table[class="contenttable"] {
            width: 320px !important;
            text-align: left !important;
        }
        td[class="force-col"] {
            display: block !important;
        }
        td[class="rm-col"] {
            display: none !important;
        }
        .mt {
            margin-top: 15px !important;
        }
        *[class].width300 {
            width: 255px !important;
        }
        *[class].block {
            display: block !important;
        }
        *[class].blockcol {
            display: none !important;
        }
        .emailButton {
            width: 100% !important;
        }
        .emailButton a {
            display: block !important;
            font-size: 18px !important;
        }
    }
</style>

<body>

    <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">
        <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
            <tr>
                <td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                    <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                        <tr>
                            <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #00a5b5">
                                <a href="https://tenable.com"><img class="top-image" src="{{ asset('logo.png') }}" style="line-height: 1;width: 210px;" alt="{{ asset('logo.png') }}"></a>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
                                <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                    <tr>
                                        <td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
                                            <div class="mktEditable" id="main_title">
                                                <h3<b>---- {{ $title }} ----</b></h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
                                    </tr>

                                    <tr>
                                        <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
                                            <hr size="1" color="#eeeff0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                                            <div class="mktEditable" id="main_text">
                                                Hi <b>{{ $username }} ,</b> <br><br>
                                                    {{ $body }} <br>
                                                    <b>
                                                        @if(!empty($link))
                                                            @if(isset($param) && !empty($param))
                                                                <a href="{{ route($link) }}?{{ $param }}">{{ $linkText }}</a>
                                                            @else
                                                                <a href="{{ route($link) }}">{{ $linkText }}</a>
                                                            @endif
                                                        @endif
                                                    </b>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
                                            &nbsp;<br>
                                        </td>
                                    </tr>
                                  
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top" align="center" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                                <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                    <tr>
                                        <td align="center" valign="middle" class="social" style="border-collapse: collapse;border: 0;margin: 0;padding: 10px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;text-align: center;">
                                            <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                                <tr>
                                                    <td style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                                                        <a href="www.facebook.com"><img src="https://info.tenable.com/rs/tenable/images/facebook-teal.png"></a>
                                                    </td>
                                                    <td style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                                                        <a href="www.youtube.com"><img src="https://info.tenable.com/rs/tenable/images/youtube-teal.png"></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr bgcolor="#fff" style="border-top: 4px solid #00a5b5;">
                            <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
                                <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                    <tr>
                                        <td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
                                            <div id="address" class="mktEditable">
                                                <b>Pistis House<br>
                                                <a style="color: #00a5b5;" href="https://wa.me/+233302727264/" target="_blank">Contact Us</a>
                                            </div>
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
</body>

</html>