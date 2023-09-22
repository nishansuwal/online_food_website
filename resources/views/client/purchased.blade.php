@extends('client.layout.main')
@section('mains')
    <div class="container mt-5">
        <h1 class="display-4 mb-4">Purchase Form</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('purchasedStore') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                name="name" value="">
                            <span class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email" value="">
                            <span class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone"
                                name="phone" value="">
                            <span class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter address"
                                name="address" value="">
                            <span class="text-danger"></span>
                        </div>


                        <div class="mb-3">
                            <label for="message" class="form-label">message</label>
                            <input type="text" class="form-control" id="message" placeholder="Enter message"
                                name="message" value="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Purchase</button>
                </form>
            </div>

            <div class="col-md-6">
                <h2>Food Details</h2>
                <div class="container mt-5">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
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
                                            <h1 class="mx-3">{{ $cart->quantity }}</h1>
                                        </td>

                                        <td>${{ number_format($cart->quantity * $cart->food->price, 2) }}</td>

                                    </tr>
                                    @php
                                        $totals += $cart->quantity * $cart->food->price;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="total-amount">Total Amount: ${{ number_format($totals, 2) }}</div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
