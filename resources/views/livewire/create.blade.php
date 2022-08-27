<form>
    <div class="form-group">
        <label>Title:</label>
        <input type="text" class="form-control" placeholder="Enter Title"
            wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Content:</label>
        <textarea type="email" class="form-control" wire:model="content"
            placeholder="Enter Content"></textarea>
        @error('content') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
