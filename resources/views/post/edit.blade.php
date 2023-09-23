@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Post
                </div>

                <div class="card-body">
                    
                    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        <div class="my-2">
                            @csrf
                            @method('PUT')
                            <lebel class="form-lebel" for="">Title</lebel>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" name="title" placeholder="Post title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <lebel class="form-lebel" for="">Description</lebel>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description" placeholder="Description">{{ old('description', $post->description) }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <lebel class="form-lebel" for="">Image</lebel>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image">
                            <img src="{{ asset('storage/'. $post->image) }}" width="60" alt="Null"/>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <button type="submit" class="btn btn-sm btn-primary" name="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
