<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
</head>
<body>
    <p>Dear {!! $messageContent['userName'] !!}, </p>
    <p>Please be present tomorrow in {!! $messageContent['vaccineCenterName'] !!} at 10 AM.</p>
    <p>Address: {!! $messageContent['vaccineCenterAddress'] !!}</p>

    <p>
        Regards, <br>
        COVID Vaccine System
    </p>
</body>
</html>
