<!DOCTYPE html>
<html>
<head>
    <title>DIT.com</title>
</head>
<body>
    <!-- <h1>{{ $mailData['title'] }}</h1> -->
    <p>{{ $mailData['body'] }}</p>
    <p>Your application has been submitted.</p>
    <p>This is your secure password : {{ $mailData['password'] }}</p>
    <p>DO NOT FORGET TO CHANGE YOUR PASSWORD</p>
    <p>Thank you</p>
</body>
</html>