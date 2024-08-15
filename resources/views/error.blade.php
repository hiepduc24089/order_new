<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/TT_247.png">
    <title>Error</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .centered-content {
            width: 100%; /* Adjust based on your content's requirements */
            margin-bottom: 40px;
        }
        .centered-content h1{
            font-size: 72px;
            font-weight: 100;
            color: #B0BEC5;
            margin-bottom: 0;
        }
        .centered-content a{
            font-size: 32px;
            font-weight: 100;
        }
    </style>
</head>
<body class="login-img">
<div class="centered-content">
    <h1>{{$errors['code'] . " " . $errors['name']}}</h1>
    <a href="javascript:history.back();">Click to back</a>
</div>
</body>
</html>
