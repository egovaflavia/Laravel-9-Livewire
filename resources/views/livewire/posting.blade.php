<div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @if ($updateMode)
    @include('livewire.update')
    @else
    @include('livewire.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" wire:click="edit({{ $post->id }})">Edit</button>
                    <button class="btn btn-danger btn-sm" wire:click="delete({{ $post->id }})">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
