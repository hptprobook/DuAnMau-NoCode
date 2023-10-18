<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cảm ơn khách hàng</title>
</head>

<body>

    <body>
        <h1>Cảm ơn Khách hàng <span style="color: red;">{{ $user->name }}</span> đã đặt hàng tại Nocode!</h1>
        <p>Tổng tiền đơn hàng: <b>{{ $orderDetail->total_amount }}</b></p>
        <p>Giao tới: <b>{{ $address->street }}</b></p>
        <p>Ngày giao hàng dự kiến: <b>{{ $orderDetail->created_at->addDays(3)->format('Y-m-d') }}</b></p>
    </body>
</body>

</html>
