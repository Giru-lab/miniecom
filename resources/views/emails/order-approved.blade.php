<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Order Approved</title>

</head>

<body>

    <h1>Order Approved</h1>

    <p>Dear {{ $order->user->name }},</p>

    <p>We are happy to inform you that your order has been approved.</p>

    <p><strong>Order Details:</strong></p>

    <ul>

        <li><strong>Order ID:</strong> {{ $order->id }}</li>

        <li><strong>Quantity:</strong> {{ $order->quantity }}</li>

        <li><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</li>

        <p><strong>Order Details:</strong></p>

        <ul>
            @foreach ($order->product as $product)
                <h4><strong>Product Name</strong>: {{ $product->title }}</h4>
                <li><strong>Price</strong>: {{ $product->price }}</li>
                <li><strong>Quantity</strong>: {{ $product->pivot->quantity }}</li>
                <li><strong>Total</strong>: {{ $product->pivot->total_price }}</li>
            @endforeach
        </ul>
        

    </ul>

    <p>Thank you for choosing our service! Your order will be delivered within 7 days using Flash Express.</p>

</body>

</html>
