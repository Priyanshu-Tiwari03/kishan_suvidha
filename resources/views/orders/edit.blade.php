<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
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

        form div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border: 1px solid #007bff;
            outline: none;
        }

        .btn {
            display: block;
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Order</h2>

        <!-- Show validation errors -->
        @if ($errors->any())
            <div style="background: #ffe6e6; padding: 15px; margin-bottom: 20px; border: 1px solid red; border-radius: 5px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="uid">User</label>
                <select name="uid" id="uid" disabled>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $order->uid == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="pid">Product</label>
                <select name="pid" id="pid" disabled>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $order->pid == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address', $order->address) }}" required>
            </div>

            <div>
                <label for="city">City</label>
                <input type="text" name="city" id="city" value="{{ old('city', $order->city) }}" required>
            </div>

            <div>
                <label for="pincode">Pincode</label>
                <input type="text" name="pincode" id="pincode" value="{{ old('pincode', $order->pincode) }}" required>
            </div>

            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $order->phone) }}" required>
            </div>

            <div>
                <label for="category">Category</label>
                <input type="text" name="category" id="category" value="{{ old('category', $order->category) }}" required>
            </div>

            <div>
                <label for="sub_category">Sub Category</label>
                <input type="text" name="sub_category" id="sub_category" value="{{ old('sub_category', $order->sub_category) }}" required>
            </div>

            <div>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity', $order->quantity) }}" required>
            </div>

            <div>
                <label for="total_price">Total Price</label>
                <input type="text" name="total_price" id="total_price" value="{{ old('total_price', $order->total_price) }}" required>
            </div>

            <div>
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" id="payment_type" required>
                    <option value="">Select Payment Type</option>
                    <option value="COD" {{ $order->payment_type == 'COD' ? 'selected' : '' }}>COD</option>
                    <option value="Online" {{ $order->payment_type == 'Online' ? 'selected' : '' }}>Online</option>
                </select>
            </div>

            <div>
                <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status" required>
                    <option value="">Select Payment Status</option>
                    <option value="Pending" {{ $order->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $order->payment_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Failed" {{ $order->payment_status == 'Failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div>
                <label for="order_status">Order Status</label>
                <select name="order_status" id="order_status" required>
                    <option value="">Select Order Status</option>
                    <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Shipped" {{ $order->order_status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="Delivered" {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn">Update Order</button>
        </form>
    </div>
</body>
</html>
