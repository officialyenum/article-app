<div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @include('livewire.components.admin.modals.comments')
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
            <h1 class="h2">Comments</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <input
                        type="text"
                        class="form-control float-end mx-2"
                        value="{{ old('search') }}"
                        placeholder="Search"
                        wire:model="search"/>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">content</th>
                        <th scope="col">Post</th>
                        <th scope="col">Author</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id}}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ $comment->owner->first_name }}</td>
                            <td>
                                <div class="btn-group me-2">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateCommentModal" class="btn btn-sm btn-outline-info" wire:click="edit({{ $comment->id }})">Edit</button>
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#deleteCommentModal" class="btn btn-sm btn-outline-danger" wire:click="edit({{ $comment->id }})">Delete</button>
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
            {{ $comments->links() }}
        </div>
    </main>
</div>

