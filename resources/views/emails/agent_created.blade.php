<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Agent Account</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color:#333;">
    <h2>Agent Account Created</h2>
    <p>Hi {{ $agent->first_name }} {{ $agent->last_name }},</p>
    <p>Your agent account has been created. Below are your credentials (please change the password after first login):</p>
    <ul>
        <li><strong>Email:</strong> {{ $agent->email }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
    </ul>
    <p>Regards,<br/>Admin Team</p>
</body>
</html>
