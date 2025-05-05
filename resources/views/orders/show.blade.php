<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background: #fff;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .details {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .details li {
            padding: 12px 0;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
        }

        .details li:last-child {
            border-bottom: none;
        }

        strong {
            color: #555;
        }

        .back-btn {
            display: block;
            margin: 20px auto 0;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            max-width: 200px;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Order #{{ $order->id }} Details</h2>

        <ul class="details">
            <li><strong>User:</strong> {{ $order->user->name ?? 'N/A' }}</li>
            <li><strong>Product:</strong> {{ $order->product->name ?? 'N/A' }}</li>
            <li><strong>Address:</strong> {{ $order->address }}</li>
            <li><strong>City:</strong> {{ $order->city }}</li>
            <li><strong>Pincode:</strong> {{ $order->pincode }}</li>
            <li><strong>Phone:</strong> {{ $order->phone }}</li>
            <li><strong>Category:</strong> {{ $order->category }}</li>
            <li><strong>Sub Category:</strong> {{ $order->sub_category }}</li>
            <li><strong>Quantity:</strong> {{ $order->quantity }}</li>
            <li><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</li>
            <li><strong>Payment Type:</strong> {{ $order->payment_type }}</li>
            <li><strong>Payment Status:</strong> {{ $order->payment_status }}</li>
            <li><strong>Order Status:</strong> {{ $order->order_status }}</li>
            <li><strong>Order Date:</strong> {{ $order->order_date }}</li>
        </ul>

        <a href="{{ route('orders.index') }}" class="back-btn">Back to Orders</a>
    </div>

</body>
</html>
