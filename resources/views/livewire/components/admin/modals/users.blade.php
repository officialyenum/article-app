{{-- Create User Modal --}}
<div wire:ignore.self class="modal fade"id="createUserModal" aria-hidden="true" aria-labelledby="createUserModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createUserModalLabel">Create User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="store">
            <div class="modal-body">
                @csrf

                <div class="form-group my-2">
                    <div class="m-2 p-2">
                        @if ($avatar)
                            Photo Preview : <img class="img-fluid rounded-circle shadow-4" style="width: 100px;height: 100px" src="{{$avatar->temporaryUrl() ?? '#'}}"/>
                        @endif
                    </div>
                    <label class="custom-file">
                      <input
                        type="file"
                        name="image"
                        placeholder="Upload"
                        class="form-control custom-file-input @error('avatar') is-invalid @enderror"
                        aria-describedby="fileHelpId"
                        wire:model="avatar">
                    @error('avatar')
                        <span class="custom-file-control invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        <span class="custom-file-control"></span>
                    @enderror
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">Upload Avatar</small>
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

                <div class="form-group my-2">
                    <input
                        type="text"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        wire:model="email"/>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password"
                        wire:model="password"/>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Create User</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Update User Modal --}}
<div wire:ignore.self class="modal fade" id="updateUserModal" aria-hidden="true" aria-labelledby="updateUserModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="update">
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
                        class="form-control custom-file-input @error('avatar') is-invalid @enderror"
                        aria-describedby="fileHelpId"
                        wire:model="avatar">
                    @error('avatar')
                        <span class="custom-file-control invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        <span class="custom-file-control"></span>
                    @enderror
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">Upload Avatar</small>
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
      </div>
    </div>
</div>

{{-- Delete User Modal --}}
<div wire:ignore.self class="modal fade" id="deleteUserModal" aria-hidden="true" aria-labelledby="deleteUserModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="delete">
            <div class="modal-body text-center">
                <h4>Are you sure you want to delete this user ? </h4>
                <p>{{$first_name}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Yes Delete User !</button>
            </div>
        </form>
      </div>
    </div>
</div>
