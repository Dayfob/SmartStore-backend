<!DOCTYPE html>
<html>
<head>
    <title> {{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <h1>Thanks for purchase!</h1>
    <p>Your order #{{ $order->id }} is getting ready!</p>
    <h3>You ordered:</h3>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Amount</th>
            <th>Product Total Price</th>
        </tr>
    @foreach ($orderProducts as $orderProduct)
        <tr>
            <th>{{ $orderProduct->products->name }}</th>
            <th>{{ $orderProduct->item_amount }}</th>
            <th>{{ intval($orderProduct->item_amount) * intval($orderProduct->products->price) }}</th>
        </tr>
    @endforeach
    </table>
    <h3>Total price is: {{ $order->total_price }}</h3>
</body>
</html>
