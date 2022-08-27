@extends('layouts.app')
@section('content')
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3"> Add</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td class="text-center">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection
