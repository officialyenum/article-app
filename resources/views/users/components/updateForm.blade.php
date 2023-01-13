<form wire:submit.prevent="updateUser">
    <div class="modal-body">
        @csrf

        @if ($error)
            <p class="alert alert-danger my-2">
                <strong>{{ $error }}</strong>
            </p>
        @endif
        <div class="form-group">
            <div class="m-2 p-2">
                @if ($newAvatar)
                    User Avatar : <img class="img-fluid rounded-circle shadow-4" style="width: 100px;height: 100px" src="{{ $newAvatar }}"/>
                @endif
                @if ($avatar)
                    Avatar Preview : <img class="img-fluid rounded-circle shadow-4" style="width: 100px;height: 100px" src="{{$avatar->temporaryUrl() ?? '#'}}"/>
                @endif
            </div>
            <label class="custom-file">
                <input
                type="file"
                name="newAvatar"
                placeholder="Upload"
                class="custom-file-input @error('avatar') is-invalid @enderror"
                aria-describedby="fileHelpId"
                wire:model="avatar">
                <span class="custom-file-control"></span>
            </label>
            <small id="fileHelpId" class="form-text text-muted">Upload Avatar</small>
            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group my-2">
            <input
                type="text"
                class="form-control @error('first_name') is-invalid @enderror"
                value="{{ old('first_name') }}"
                placeholder="First Name"
                wire:model="first_name"/>

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group my-2">
            <input
                type="text"
                class="form-control @error('last_name') is-invalid @enderror"
                value="{{ old('last_name') }}"
                placeholder="Last Name"
                wire:model="last_name"/>

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
        <button type="submit" class="btn btn-dark">Update User</button>
    </div>
</form>
