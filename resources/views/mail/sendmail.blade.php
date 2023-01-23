<!DOCTYPE html>
<html>
<head>
    <title>Send Mail using Queue</title>
</head>
<body>
    <p>Hi {{ @$details['username'] }}. </p>
    <p>Your Account has been updated</p>
    <p>Your email:{{ @$details['email'] }}.</p>
    @if(@$details['password'] == 'Previouse Password')
    {{-- <p>Your Account has been updated</p> --}}
    @else
    <p>Your password:{{ @$details['password'] }}.</p>
    @endif
    <strong>Thank you</strong>
</body>
</html>