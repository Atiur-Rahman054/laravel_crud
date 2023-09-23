@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All Post
                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($all_posts as $post)
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
                                <td>
                                    {{-- {{ $post->status == 1 ? 'active' : 'deactive' }} --}}
                                    @if ($post->status == 1) 
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-warning">Deactive<span>
                                    @endif
                                </td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ Route('post.show', $post->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ Route('post.edit', $post->id) }}" class="btn btn-info">Edit</a>
                                    <form action="{{ Route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ Route('post.status.update', $post->id) }}" class="btn btn-@if($post->status == 1)warning @else()success @endif">
                                        @if ($post->status == 1)
                                            <span class="bg-warning">deactive</span>
                                        @else
                                        <span class="bg-success">active</span>
                                        @endif
                                    </a>
                                </td>
                            </tr>                            
                        @empty
                        <tr>
                           <td class="text-danger text-center" colspan="8">No Post found</td>
                        </tr>
                            
                        @endforelse
                    </table>
                </div>
                <div class="card-footer">
                    {{ $all_posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
