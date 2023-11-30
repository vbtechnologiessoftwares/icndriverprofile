<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Cab Drivers Direct</title>
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
        <h1>Welcome Cab Drivers Direct !</h1>
        <p>Hello {{$name}},</p>
        <p>Your Driver Details has been rejected:</p>
        <ul>
            <li><strong>Name:</strong> {{$name}}</li>
            <li><strong>Email:</strong> {{$mailTo}}</li>
            <li><strong>Company URL:</strong> <a href="https://cabdriversdirect.com/driver/">CabDriversDirect.com</a></li>
        </ul>
        <p>Feel free to explore our platform and let us know if you have any questions or need assistance.</p>
        <p>Thank you for choosing Your Company!</p>
        <p>Best regards,<br>Your Company Team</p>
    </div>
</body>
</html>