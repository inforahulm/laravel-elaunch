<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome  {{$user['name']}}</h2>
<br/>
Your registered email-id :- {{$user['email']}}
<br/>
<br/>
Your registered OTP :- <strong>{{$user['otp_code']}}</strong>
</body>

</html>