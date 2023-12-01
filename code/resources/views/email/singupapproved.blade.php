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
        <h1>Welcome to CabDriversDirect.com</h1>
        <p>Hello {{$name}},</p>
        <p>Your Driver Account Has Been Approved</p>
        <p>You can now <a href="https://cabdriversdirect.com/driver/">login</a> to your driver account and mark yourself on duty.</p>
        
        <p>Feel free to explore our platform and let us know if you have any questions or need assistance.</p>
   
        <p>Best regards,<br>CabDriversDirect.com</p>
    </div>
</body>
</html>