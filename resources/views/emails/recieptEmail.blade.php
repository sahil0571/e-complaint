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
        <a class="brand-logo" href="{{ env('APP_URL') }}">
            <img alt='logo' height='189' src="https://i.postimg.cc/L5L1yqrk/mayank222qwewq.png" style='border:none;display:block;font-size:13px;height:189px;outline:none;text-decoration:none;width:100%;filter: drop-shadow(2px 1px 5px #0016d259) drop-shadow(-1px -1px 5px #0016d259);' width='216' />
            <h3 class="brand-text text-primary ms-1">
                E-Complaint System
            </h3>
        </a>
        <h1>Complaint Generated.</h1>
        <p>Please click this link to confirm complaint and print reciept. </p>
        <a href="{{ env('APP_URL') . '/recipt/complaint/' . $data['complaint']->invoice_number}}">Verify Complaint.</a>
    </div>
</body>
</html>