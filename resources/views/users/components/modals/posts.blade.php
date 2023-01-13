{{-- Create Post Modal --}}
<div wire:ignore.self class="modal fade"id="createPostModal" aria-hidden="true" aria-labelledby="createPostModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createPostModalLabel">Create Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storePost" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group my-2">
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Title"
                        wire:model.lazy="title"/>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="m-2 p-2">
                        @if ($image)
                            Photo Preview : <img class="img-fluid" src="{{$image->temporaryUrl() ?? '#'}}"/>
                        @endif
                    </div>
                    <label class="custom-file">
                      <input
                        type="file"
                        name="image"
                        placeholder="Upload"
                        class="form-control custom-file-input @error('image') is-invalid @enderror"
                        aria-describedby="fileHelpId"
                        wire:model="image">
                    @error('image')
                        <span class="custom-file-control invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        <span class="custom-file-control"></span>
                    @enderror
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">Upload Image</small>
                </div>

                <div class="form-group my-2">
                    <textarea class="form-control" placeholder="Enter Content" name="body" rows="3" wire:model.lazy="body"></textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <select class="form-control custom-select @error('category_id') is-invalid @enderror" name="category_id" wire:model="category_id">
                        <option selected>Select Category</option>
                        @foreach ($categories as $cat)
                            <option value={{$cat->id}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                  <select multiple class="form-control custom-select" name="tag_ids[]" wire:model="tag_ids">
                        <option selected>Select Tags</option>
                        @foreach ($tags as $tag)
                            <option value={{ $tag->id }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Create Post</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Update Post Modal --}}
<div wire:ignore.self class="modal fade" id="updatePostModal" aria-hidden="true" aria-labelledby="updatePostModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updatePostModalLabel">Update Post</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="updatePost" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group my-2">
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Title"
                        wire:model.lazy="title"/>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <div class="m-2 p-2">
                        @if ($newImage)
                            Post Photo : <img class="img-fluid" src="{{ $newImage }}"/>
                        @endif
                        @if ($image)
                            Photo Preview : <img class="img-fluid" src="{{$image->temporaryUrl() ?? '#'}}"/>
                        @endif
                    </div>
                    <label class="custom-file">
                      <input
                        type="file"
                        name="newImage"
                        placeholder="Upload"
                        class="form-control custom-file-input @error('image') is-invalid @enderror"
                        aria-describedby="fileHelpId"
                        wire:model="image">
                    @error('image')
                        <span class="custom-file-control invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        <span class="custom-file-control"></span>
                    @enderror
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">Upload Image</small>
                </div>

                <div class="form-group my-2">
                    <textarea class="form-control" placeholder="Enter Content" name="body" rows="3" wire:model.lazy="body"></textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <select class="form-control custom-select @error('category_id') is-invalid @enderror" name="category_id" wire:model="category_id">
                        @foreach ($categories as $cat)
                            @if ($cat->id == $category_id)
                                <option value={{$cat->id}} selected>{{$cat->name}}</option>
                            @else
                                <option value={{$cat->id}}>{{$cat->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group my-2">
                  <select multiple class="form-control custom-select" name="new_tag_ids[]" wire:model="new_tag_ids">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                    @if (in_array($tag->id, $tag_ids))
                                        selected
                                    @endif
                                >
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('new_tag_ids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark"  wire:loading.attr="disabled">Update Post</button>
            </div>
        </form>
      </div>
    </div>
</div>

{{-- Delete Post Modal --}}
<div wire:ignore.self class="modal fade" id="deletePostModal" aria-hidden="true" aria-labelledby="deletePostModalLabel" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletePostModalLabel">Delete Post</h5>
          <button type="button" wire:click="cancel" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="deletePost">
            <div class="modal-body text-center">
                @csrf
                <h4>Are you sure you want to delete this post ? </h4>
                <p>{{$title}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click="cancel">Close</button>
                <button type="submit" class="btn btn-dark">Yes Delete Post !</button>
            </div>
        </form>
      </div>
    </div>
</div>
