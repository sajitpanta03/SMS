<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <p>Your password is: <b>{{$mailData['password']}}</b></p>
     
    <p>Thank you</p>
</body>
</html>