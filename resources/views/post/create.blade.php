@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create Post
                </div>

                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        <div class="my-2">
                            @csrf
                            <lebel class="form-lebel" for="">Title</lebel>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" placeholder="Post title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <lebel class="form-lebel" for="">Description</lebel>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description" placeholder="Description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <lebel class="form-lebel" for="">Image</lebel>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <button type="submit" class="btn btn-sm btn-primary" name="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
