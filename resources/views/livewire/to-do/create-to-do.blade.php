<div>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible show" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <form wire:submit.prevent="create">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" wire:model="title">
            </div>
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" wire:model="photo">
            </div>
            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if($photo)
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Image Preview</label>
            <div class="col-sm-10">
                <img src="{{$photo->temporaryUrl()}}" class="todo-list-image">
            </div>
        </div>
        @endif
        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </form>
</div>
