<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @include('livewire.components.admin.modals.tags')
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
            <h1 class="h2">Tags</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <input
                        type="text"
                        class="form-control float-end mx-2"
                        value="{{ old('search') }}"
                        placeholder="Search"
                        wire:model="search"/>
                </div>
                <button type="button" class="btn btn-sm btn-outline-success" data-bs-target="#createTagModal" data-bs-toggle="modal">
                    Create Tag
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Posts Count</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                        <td>{{ $tag->id}}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->posts->count() }}</td>
                        <td>
                            <div class="btn-group me-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateTagModal" class="btn btn-sm btn-outline-info" wire:click="edit({{ $tag->id }})">Edit</button>
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#deleteTagModal" class="btn btn-sm btn-outline-danger" wire:click="edit({{ $tag->id }})">Delete</button>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </main>
</div>


