<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>نوتیفیکیشن وظیفه</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tahoma', 'Vazir', 'Arial', sans-serif;
            background: #f4f4f7;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
        }

        .email-header {
            background-color: #4e73df;
            color: #ffffff;
            padding: 24px 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 30px 24px;
            font-size: 16px;
        }

        .email-body h2 {
            color: #4e73df;
            margin: 0 0 20px 0;
            font-size: 22px;
        }

        .email-body p {
            margin-bottom: 20px;
        }

        .email-body a.button {
            display: inline-block;
            margin: 20px 0 10px;
            padding: 12px 28px;
            background-color: #4e73df;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
        }

        .email-footer {
            background-color: #f4f4f7;
            color: #6c757d;
            padding: 20px;
            font-size: 13px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 20px 16px;
            }
            .email-header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body style="direction: rtl; text-align: right;">
    <center> <!-- بعضی کلاینت‌ها اینو بهتر می‌فهمن -->
        <div class="email-container" style="direction: rtl; text-align: right; max-width: 600px; margin: 30px auto; background: #fff;">
            <div class="email-header" style="text-align: center;">
                <h1 style="margin: 0;">سیستم مدیریت وظایف KarBin</h1>
            </div>

            <div class="email-body" style="direction: rtl; text-align: right; padding: 30px 24px;">
                <h2 style="direction: rtl; text-align: right; color: #4e73df;">{{ $greeting }}</h2>
                <p style="direction: rtl; text-align: right;">{{ $body }}</p>

                @if(isset($url))
                    <!-- جدول برای وسط‌چین کردن دکمه - کارآمد در همه کلاینت‌ها -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 25px 0;">
                        <tr>
                            <td align="center">
                                <a href="{{ $url }}" 
                                class="button" 
                                style="direction: rtl; display: inline-block; padding: 12px 28px; background-color: #4e73df; color: #ffffff !important; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">
                                    مشاهده وظیفه
                                </a>
                            </td>
                        </tr>
                    </table>
                @endif
            </div>

            <div class="email-footer" style="text-align: center;">
                با تشکر از استفاده شما از سیستم KarBin
            </div>
        </div>
    </center>
</body>
</html>