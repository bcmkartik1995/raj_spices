<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #d9000f;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .body {
            padding: 20px;
            text-align: center;
        }
        .body p {
            font-size: 16px;
            margin: 10px 0;
        }
        .otp {
            display: inline-block;
            font-size: 24px;
            color: #333333;
            background-color: #f8f8f8;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        .footer {
            background-color: #eeeeee;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777777;
        }
        .footer a {
            color: #d9000f;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Password Reset Request</h1>
        </div>
        <div class="body">
            <p>Hi {{ $name }},</p>
            <p>You have requested to reset your password. Use the OTP below to proceed:</p>
            <p class="otp">{{ $otp }}</p>
            <p>This OTP is valid for the next 15 minutes.</p>
            <p>If you did not request this, please ignore this email or contact support.</p>
        </div>
        <div class="footer">
            <p>Thank you,<br>The Shree Spices Team</p>
            <p>
                {{-- <a href="{{ url('/') }}">Visit our website</a> |
                <a href="{{ url('/contact') }}">Contact Support</a> --}}
            </p>
        </div>
    </div>
</body>
</html>
