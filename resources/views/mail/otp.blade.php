<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        .otp {
            font-size: 24px;
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your OTP</h1>
        <p>Please use the following One-Time code to complete your registration:</p>
        <div class="otp">{{$otp}}</div>
        <p>This OTP is valid for 30 minutes.</p>
        <p>The OTP is use for verifying your email address.</p>
    </div>
</body>
</html>
