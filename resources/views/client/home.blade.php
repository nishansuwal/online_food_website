@extends('client.layout.main')
@section('mains')
    <div class="container feature">
        <h1 class="text-center">FOOD</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @if (count($foods) == 0)
                <h3 class="text-center">There are no food available yet.</h3>
            @else
                @foreach ($foods as $food)
                    <div class="col">
                        <div class="gallerys">
                            <td>
                                <img src="{{ asset('/storage/' . $food->image) }}" alt="Post Image"
                                    class="img-fluid post-image" width='200' height='200'>
                            </td>
                            <div class="price">{{ $food->title }}</div>



                            <td>
                               <form action="{{ route('food.addToCart', ['id' => $food->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-action">Add To Cart</button>
                                </form>
                            </td>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
