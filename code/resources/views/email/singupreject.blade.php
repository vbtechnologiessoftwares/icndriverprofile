<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to CabDriversDirect.com</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, p {
            margin-bottom: 20px;
        }

        a {
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Hello {{$name}},</p>
        <p>Your Driver Account Requires Attention.</p>
        
        <p>Please login at <a href="https://cabdriversdirect.com/driver/">https://cabdriversdirect.com/driver/</a> to your account to see what needs attention.</p>

        <p>Best regards,<br>CabDriversDirect</p>
    </div>
</body>
</html>