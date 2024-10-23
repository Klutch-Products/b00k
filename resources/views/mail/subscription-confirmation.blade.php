<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta name="x-apple-disable-message-reformatting"/>
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {
            font-family: DM Sans, sans-serif;
        }
    </style>
</head>
<body style="margin: 0; padding: 0">
<table role="presentation"
       style="width: 100%; border-collapse: collapse; border: 0; border-spacing: 0; background: #ffffff;">
    <tr>
        <td align="center" style="padding: 0">
            <table role="presentation"
                   style="width: 602px; border-collapse: collapse; border: 1px solid #cccccc; border-spacing: 0; text-align: left;">
                <tr>
                    <td align="center" style="padding: 40px 0 30px 0; background: #065AA9">
                        <img src="{{ asset('images/logo.jpg') }}" alt="" width="300"
                             style="height: auto; display: block"/>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 36px 30px 42px 30px">
                        <table role="presentation"
                               style="width: 100%; border-collapse: collapse; border: 0; border-spacing: 0;">
                            <tr>
                                <td style="padding: 0 0 36px 0; color: #000000">
                                    <h1 style="font-size: 24px; margin: 0 0 20px 0; font-family: DM Sans, sans-serif;">
                                        Subscription Confirmation
                                    </h1>
                                    <p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; font-family: DM Sans, sans-serif;">
                                        Dear {{ $user->name }},
                                    </p>
                                    <p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; font-family: DM Sans, sans-serif;">
                                        Thank you for subscribing to {{ $publisher->name }}. Your subscription has been
                                        successfully processed.
                                    </p>
                                    <p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; font-family: DM Sans, sans-serif;">
                                        Your unique subscription code is: <strong>{{ $subscriptionCode }}</strong>
                                    </p>
                                    <p style="margin: 0; font-size: 16px; line-height: 24px; font-family: DM Sans, sans-serif;">
                                        You can use this code to download free PDF copies of books from this publisher.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 30px; background: #000000">
                        <table role="presentation"
                               style="width: 100%; border-collapse: collapse; border: 0; border-spacing: 0; font-size: 9px; font-family: DM Sans, sans-serif;">
                            <tr>
                                <td style="padding: 0; width: 50%" align="left">
                                    <p style="margin: 0; font-size: 14px; line-height: 16px; font-family: DM Sans, sans-serif; color: #ffffff;">
                                        &reg; {{ $publisher->name }} {{ date('Y') }}<br/>
                                        <a href="{{ route('unsubscribe', ['publisher' => $publisher->id, 'user' => $user->id]) }}"
                                           style="color: #ffffff; text-decoration: underline">Unsubscribe</a>
                                    </p>
                                </td>
                                <td style="padding: 0; width: 50%" align="right">
                                    <table role="presentation"
                                           style="border-collapse: collapse; border: 0; border-spacing: 0;">
                                        <tr>
                                            <td style="padding: 0 0 0 10px; width: 38px">
                                                <a href="http://www.twitter.com/" style="color: #ffffff"><img
                                                        src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter"
                                                        width="38" style="height: auto; display: block; border: 0"/></a>
                                            </td>
                                            <td style="padding: 0 0 0 10px; width: 38px">
                                                <a href="http://www.facebook.com/" style="color: #ffffff"><img
                                                        src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook"
                                                        width="38" style="height: auto; display: block; border: 0"/></a>
                                            </td>
                                        </tr>
                                    </table>
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
