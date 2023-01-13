<div>
    @include('users.components.modals.comments')
    @foreach ($comments as $comment)
        <article class="blog-post">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title text-info">{{ $comment->post->title }}</h5>
                        <p class="card-text">{!! Str::words($comment->content, 10, ' ...') !!}</p>
                        <p class="card-text"><small class="text-muted">Last updated {{ $comment->updated_at->diffForHumans()}}</small></p>
                    </div>
                </div>
                <div class="card-footer bg-dark">
                    <div class="btn-group me-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateCommentModal" class="btn btn-sm btn-outline-info" wire:click="editComment({{ $comment->id }})">Edit</button>
                        <button type="button"  data-bs-toggle="modal" data-bs-target="#deleteCommentModal" class="btn btn-sm btn-outline-danger" wire:click="editComment({{ $comment->id }})">Delete</button>
                    </div>
                </div>
                </div>
            </div>
            <br/>
        </article>
    @endforeach
    {{ $comments->links() }}
</div>

