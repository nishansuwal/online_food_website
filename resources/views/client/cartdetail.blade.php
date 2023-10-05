<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Table with Improved UI</title>
    <style>
        /* Custom CSS for improved UI */
        .table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Your Order Detail</h1>
        @foreach ($userCarts as $userCart)
        <h1>Your Order id is  {{ $userCart->id }}</h1>
         <table class="table table-striped">
            <tr>
                        <td>{{ $userCart->name }}</td>
                        <td>{{ $userCart->email }}</td>
                        <td>{{ $userCart->address }}</td>
                        <td>{{ $userCart->phone }}</td>
                    </tr>
         </table>
         
        
        @endforeach
        <table class="table">
        <thead>
            <tr>
                <th>Food ID</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foodDataArray as $foodItem)
            <tr>
                <td>{{ $foodItem['food_id'] }}</td>
                <td>{{ $foodItem['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
