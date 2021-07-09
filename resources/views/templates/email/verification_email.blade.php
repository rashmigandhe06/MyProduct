<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>
<p>Please find the verification code here to activate your account: <b>{{$details['verification_code']}}</b></p>
<a href="http://127.0.0.1:8000/verify/user">click here</a>

<p>Thank you</p>
</body>
</html>
