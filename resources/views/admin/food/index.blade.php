@extends('admin.layout')
@section('main')
    <div class="container mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <h1>View food</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>                        
                        <th>ID</th>
                        <th>Title</th>
                        <th>author</th>
                        <th>publisher</th>
                        <th>category</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td>{{ $food->id }}</td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->description }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->category }}</td>
                                <td>
                                    <img src="{{ asset('/storage/' . $food->image) }}" alt="Post Image"
                                        class="img-fluid post-image" width='200' height='200'>
                                </td>
                            <td>
                                <a class="btn btn-primary btn-action" href="{{ route('admin.food.edit', ['id' => $food->id]) }}">Edit</a>
                                <form action="{{ route('admin.food.delete', ['id' => $food->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-action">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-r-hO/bMWBp2iqokZzQJgPI6J7ApP5kAlFpQSO2wVXkI5hUTDQTrxBry8xqa+VwI3" crossorigin="anonymous"></script>
@endsection
