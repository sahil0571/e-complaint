<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Complaint Recipt</title>
</head>
<body>
    <div>
        <h1>Complaint Generated.</h1>
        <p>Please click this link to confirm complaint and print reciept. </p>
        <a href="{{ env('APP_URL') . '/recipt/complaint/' . $data['complaint']->invoice_number}}">Verify Complaint.</a>
    </div>
</body>
</html>