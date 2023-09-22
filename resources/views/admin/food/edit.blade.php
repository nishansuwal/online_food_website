@extends('admin.layout')
@section('main')
    <div class="container mt-5">
        <h3>Edit food Details</h3>
        <form method="post" action="{{ route('admin.food.update', ['id' => $food->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $food->name }}">
                        <span class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $food->description }}">
                        <span class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $food->price }}">
                        <span class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ $food->category }}">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="imageInput">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images" type="file" class="custom-file-input" id="imageInput">
                                <label class="custom-file-label" for="imageInput">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="margin: 1rem;" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
