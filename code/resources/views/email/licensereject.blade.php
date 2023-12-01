<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update for Change Request</title>
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
        
        <p>This is to notify about the update request you submitted. Your request was reviewed by an admin.</p>

        <p>{{$message}}</p>


        <p>Thank you for choosing CabDriversDirect.com</p>
        <p>Best regards</p>
    </div>
</body>
</html>