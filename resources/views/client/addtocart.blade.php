<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="display-4 mb-4">Your Cart - {{ Auth::user()->name }}</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totals = 0;
                    @endphp
                    @foreach ($userCarts as $cart)
                        <tr>
                            <td>{{ $cart->food_id }}</td>
                            <td>
                                <img src="{{ asset('/storage/' . $cart->food->image) }}" alt="Post Image"
                                    class="img-fluid post-image" width='200' height='200'>
                            </td>
                            <td>{{ $cart->food->name }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-dark btn-action"
                                        href="{{ route('purchasedStoreInc', ['id' => $cart->id]) }}">+</a>
                                    <h1 class="mx-3">{{ $cart->quantity }}</h1>
                                    <a class="btn btn-dark btn-action"
                                        href="{{ route('purchasedStoreDec', ['id' => $cart->id]) }}">-</a>
                                </div>
                            </td>

                            <td>${{ number_format($cart->quantity * $cart->food->price, 2) }}</td>
                            <td>
                                <button class="btn btn-danger">Remove</button>
                            </td>

                        </tr>
                        @php
                            $totals += $cart->quantity * $cart->food->price;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="total-amount">Total Amount: ${{ number_format($totals, 2) }}</div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="btn btn-primary btn-action" href="/">Continue Shopping</a>
            <form action="/purchased" method="POST">
                @csrf
                <button class="btn btn-danger btn-action">Proceed to Purchase</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
