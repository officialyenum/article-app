<div>
    @include('users.components.modals.posts')
    @foreach ($posts as $post)
        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $post->media->url }}" class="img-fluid rounded-start" alt="{{$post->image}}.">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-info">{{ $post->category->name }}</h5>
                        <p class="card-text">{!! Str::words($post->body, 10, ' ...') !!}</p>
                        <p class="card-text"><small class="text-muted">Last updated {{ $post->updated_at->diffForHumans()}}</small></p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span data-feather="message-circle" class="align-text-center text-primary text-lg"></span>
                                {{ $post->comments->count()}} Comment(s)
                            </small>
                        </p>
                    </div>
                </div>
                <div class="card-footer bg-dark">
                    <div class="btn-group me-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#updatePostModal" class="btn btn-sm btn-outline-info" wire:click="editPost({{ $post->id }})">Edit</button>
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#deletePostModal" class="btn btn-sm btn-outline-danger" wire:click="editPost({{ $post->id }})">Delete</button>
                    </div>
                </div>
                </div>
            </div>
            <br/>
        </article>
    @endforeach
    {{ $posts->links() }}
</div>

