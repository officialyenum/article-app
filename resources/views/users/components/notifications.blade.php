<div>
    @forelse ($notifications as $notification)
        @if ($notification->type === 'App\Notifications\NewCommentAdded')
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom bg-dark text-white">
                <div class="btn-toolbar mb-2 mb-md-0">
                    <p class="p">A new Comment was added to your post</p>
                </div>
                <button type="button" class="btn btn-sm btn-outline-light text-grey">
                    {{ $notification->data['post']['title']}}
                </button>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="{{route('posts.show',$notification->data['post']['slug'])}}" class="btn btn-sm btn-outline-info">View Post</a>
                        <button type="button" class="btn btn-sm btn-outline-primary" wire:click="markNotificationAsRead('{{$notification->id}}')">Mark As Read</button>
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div class="card text-center bg-dark">
            <p class="my-2 py-2 text-white">You have no unread notifications</p>
        </div>
    @endforelse
    {{ $notifications->links() }}
</div>

