{{-- Create Category Modal --}}
<div wire:ignore.self class="modal fade"id="createCategoryModal" aria-hidden="true" aria-labelledby="createCategoryModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
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
                <button type="submit" class="btn btn-dark">Create Category</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Update Category Modal --}}
<div wire:ignore.self class="modal fade" id="updateCategoryModal" aria-hidden="true" aria-labelledby="updateCategoryModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateCategoryModalLabel">Update Category</h5>
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
                <button type="submit" class="btn btn-dark">Update Category</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Delete Category Modal --}}
<div wire:ignore.self class="modal fade" id="deleteCategoryModal" aria-hidden="true" aria-labelledby="deleteCategoryModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="delete">
            <div class="modal-body text-center">
                @csrf
                <h4>Are you sure you want to delete this category ? </h4>
                <p>{{$name}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Yes Delete Category !</button>
            </div>
        </form>
      </div>
    </div>
</div>
