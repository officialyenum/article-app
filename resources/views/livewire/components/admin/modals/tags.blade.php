{{-- Create Tag Modal --}}
<div wire:ignore.self class="modal fade"id="createTagModal" aria-hidden="true" aria-labelledby="createTagModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createTagModalLabel">Create Tag</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="store">
            <div class="modal-body">
                @csrf

                <div class="form-group my-2">
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Name"
                        wire:model="name"/>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Create Tag</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Update Tag Modal --}}
<div wire:ignore.self class="modal fade" id="updateTagModal" aria-hidden="true" aria-labelledby="updateTagModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateTagModalLabel">Update Tag</h5>
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
                <div class="form-group my-2">
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Name"
                        wire:model="name"/>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Update Tag</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Delete Tag Modal --}}
<div wire:ignore.self class="modal fade" id="deleteTagModal" aria-hidden="true" aria-labelledby="deleteTagModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteTagModalLabel">Delete Tag</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="delete">
            <div class="modal-body text-center">
                @csrf
                <h4>Are you sure you want to delete this tag ? </h4>
                <p>{{$name}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Yes Delete Tag !</button>
            </div>
        </form>
      </div>
    </div>
</div>
