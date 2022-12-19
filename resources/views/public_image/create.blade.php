@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <form action="{{ route('public.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group mt-3">
                        <label for="priority">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                            id="title" value="{{ old('title') }}" placeholder="Title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="category">Category</label>
                        <input class="form-control @error('category') is-invalid @enderror" type="text" name="category"
                            id="category" value="{{ old('category') }}" placeholder="Category">
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="2" placeholder="Description">{{ old('description') }}</textarea>

                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="image">Image</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                            id="image" placeholder="Image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary mt-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
