<div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @include('livewire.components.admin.modals.posts')
        @if (Session::has('success'))
            <p class="alert alert-success my-2">
                <strong>{{ Session::get('success') }}</strong>
            </p>
        @endif
        @if ($error)
            <p class="alert alert-danger my-2">
                <strong>{{ $error }}</strong>
            </p>
        @endif
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <input
                        type="text"
                        class="form-control float-end mx-2"
                        value="{{ old('search') }}"
                        placeholder="Search"
                        wire:model="search"/>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success" data-bs-target="#createPostModal" data-bs-toggle="modal">
                    Create Post
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Comments Count</th>
                        <th scope="col">Author</th>
                        <th scope="col">Deleted</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id}}</td>
                            <td>
                                <img src="{{ $post->media->url ?? "#" }}" class="rounded-circle shadow-4" style="width: 50px;height: 50px" alt="{{$post->title}}">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->tags->count() }}</td>
                            <td>{{ $post->comments->count() }}</td>
                            <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                            <td>
                                @if ($post->deleted_at)
                                    {{ $post->deleted_at->diffForHumans() }}
                                @else
                                    <small> No</small>
                                @endif
                            </td>
                            <td>{{ $post->active == 1 ? 'Active': 'Inactive' }}</td>
                            <td>
                                <div class="btn-group me-2">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updatePostModal" class="btn btn-sm btn-outline-info" wire:click="edit({{ $post->id }})">Edit</button>
                                    @if ($post->deleted_at)
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#restorePostModal" class="btn btn-sm btn-outline-primary" wire:click="edit({{ $post->id }})">Restore</button>
                                    @else
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#deletePostModal" class="btn btn-sm btn-outline-danger" wire:click="edit({{ $post->id }})">Delete</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <p class="text-center">
                                    No Records Found
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </main>
</div>
