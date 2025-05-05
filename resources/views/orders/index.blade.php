    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 12px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            margin: 0 2px;
            display: inline-block;
        }

        .btn-view {
            background-color: #17a2b8;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-delete {
            background-color: #dc3545;
        }

    </style>
</head>
<body>

    <h2>Orders List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (session('success'))
    <div style="
        background: #d4edda;
        color: #155724;
        padding: 15px;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
        margin-bottom: 20px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    ">
        {{ session('success') }}
    </div>
@endif

            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>{{ $order->product->name ?? 'N/A' }}</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-view">View</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
