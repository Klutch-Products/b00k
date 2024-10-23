<!DOCTYPE html>
<html>
<head>
    <title>Subscription Confirmation</title>
</head>
<body>
<h1>Thank you for subscribing!</h1>
<p>Dear {{ $user->name }},</p>
<p>You have successfully subscribed to {{ $publisher->name }}.</p>
<p>Your unique subscription code is: <strong>{{ $subscriptionCode }}</strong></p>
<p>You can use this code to download free PDF copies of books from this publisher.</p>
</body>
</html>
