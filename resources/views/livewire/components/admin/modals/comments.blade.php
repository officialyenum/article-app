{{-- Update Comment Modal --}}
<div wire:ignore.self class="modal fade" id="updateCommentModal" aria-hidden="true" aria-labelledby="updateCommentModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateCommentModalLabel">Update Comment</h5>
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
                        class="form-control @error('content') is-invalid @enderror"
                        value="{{ old('content') }}"
                        placeholder="Content"
                        wire:model="content"/>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Update Comment</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Delete Comment Modal --}}
<div wire:ignore.self class="modal fade" id="deleteCommentModal" aria-hidden="true" aria-labelledby="deleteCommentModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteCommentModalLabel">Delete Comment</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="delete">
            <div class="modal-body text-center">
                @csrf
                <h4>Are you sure you want to delete this Comment ? </h4>
                <p>{{$content}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Yes Delete Comment !</button>
            </div>
        </form>
      </div>
    </div>
</div>
