<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Order</title>
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
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
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
        <h2>Create New Order</h2>

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

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div>
                <label for="uid">User</label>
                <select name="uid" id="uid" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="pid">Product</label>
                <select name="pid" id="pid" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>

            <div>
                <label for="city">City</label>
                <input type="text" name="city" id="city" required>
            </div>

            <div>
                <label for="pincode">Pincode</label>
                <input type="text" name="pincode" id="pincode" required>
            </div>

            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>

            <div>
                <label for="category">Category</label>
                <input type="text" name="category" id="category" required>
            </div>

            <div>
                <label for="sub_category">Sub Category</label>
                <input type="text" name="sub_category" id="sub_category" required>
            </div>

            <div>
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="1" required>
            </div>

            <div>
                <label for="total_price">Total Price</label>
                <input type="text" name="total_price" id="total_price" required>
            </div>

            <div>
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" id="payment_type" required>
                    <option value="">Select Payment Type</option>
                    <option value="COD">COD</option>
                    <option value="Online">Online</option>
                </select>
            </div>

            <button type="submit" class="btn">Place Order</button>
        </form>
    </div>
</body>
</html>
