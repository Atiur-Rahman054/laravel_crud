@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 m-auto">
            <div class="card">

                <div class="card-header d-flex">
                    <h2>Single Post</h2>
                    
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Create_at</th>
                            <th>Updated_at</th>
                        </tr>
                        
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    @if ($post->image)
                                    <img src="{{ asset('storage/'. $post->image) }}" width="60" alt="{{ $post->title }}"/>
                                    @else
                                        <p class="text-danger">{{ '--' }}</p>
                                    @endif
                                    
                                </td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                
                            </tr>                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
