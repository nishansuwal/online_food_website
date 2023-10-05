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
        <h1>Bootstrap Table with Improved UI</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Food</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $userCart)
                    <tr>
                        <th scope="row">{{ $userCart->id }}</th>
                        <td>{{ $userCart->name }}</td>
                        <td>{{ $userCart->email }}</td>
                        <td>{{ $userCart->address }}</td>
                        <td>{{ $userCart->phone }}</td>
                        <td>{{ $userCart->message }}</td>
                        <td>{{ $userCart->price }}</td>
                        <td>
                            <form action="{{ route('admin.moredetail', ['id' => $userCart->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-action">View More</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.moredetail', ['id' => $userCart->id]) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-action">View More</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
