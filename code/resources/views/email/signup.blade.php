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
        <p>Hello {{$name}},</p>
        <p>Congratulations on signing up as driver on our platform ! Here are your account details:</p>
        <ul>
            <li><strong>Password:</strong> {{$password}}</li>
            <li><strong>Email:</strong> {{$mailTo}}</li>
            
        </ul>

        <p> You can now login on driver portal <a href="https://cabdriversdirect.com/driver/login">here</a>

        <p><b> Please Note: Your account will be reviewed by our admin team before you can mark yourself on duty </b></p>
        <p>Feel free to explore our platform and let us know if you have any questions or need assistance.</p>
        <p>Thank you for choosing Your Company!</p>
        <p>Best regards,<br>Cab Drivers Direct</p>
        <small class="mr-25"> <a href="/"><img src="https://cabdriversdirect.com/images/logo.png"
            alt="Logo"></a></small>
    </div>
</body>
</html>