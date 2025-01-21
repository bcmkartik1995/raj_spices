<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #d9534f;
            margin: 20px 0;
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $details['title'] }}</h1>
            <img src="https://shreespices.co.uk/logo.jpg" alt="Logo" style="max-width: 150px; border-radius: 8px;">
        </div>
        <p>Dear User,</p>
        <p>Thank you for reaching out. Your OTP for password reset is:</p>
        <div class="otp">{{ $details['otp'] }}</div>
        <p>Please use this code to reset your password. If you did not request this, please ignore this email.</p>
        <div class="footer">
            <p>&copy; 2025 Shree Spices. All rights reserved.</p>
        </div>
    </div>
</body>
</html>