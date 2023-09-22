@extends('admin.layout')
@section('main')
    <div class="container mt-5">
        <h3>Add book details</h3>
        <form method="post" action="{{ route('admin.food.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                            value="">
                        <span class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea class="form-control" id="description" placeholder="Enter description name" name="description"></textarea>
                        <span class="text-danger"></span>
                    </div>


                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price"
                            value="">
                        <span class="text-danger"></span>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">category</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter category"
                            name="category" value="">
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images" type="file" id="imageInput" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" style="margin: 1rem;" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
