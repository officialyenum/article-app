<div>
    @if (Session::has('success'))
        <p class="alert alert-success my-2">
            <strong>{{ Session::get('success') }}</strong>
        </p>
    @endif
    {{-- Care about people's approval and you will be their prisoner. --}}
    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->

    <div class="section" id="section-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="bg-image text-center my-4 pb-4">
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                          <div class="d-flex justify-content-center align-items-center h-100">
                            <p class="text-white my-4">{{$post->title}}</p>
                          </div>
                        </div>
                        <img
                            src="{{ $post->media->url }}"
                            class="img-thumbnail my-2"
                            alt="{{ $post->media->title }}"
                            width="300"
                            height="500"
                        />
                    </div>
                    {{-- <h4>{{$post->title}}</h4> --}}
                    {!!$post->body!!}
                    <div class="addthis_inline_share_toolbox"></div>
                    <div class="gap-xy-2 mt-6">
                        @foreach ($post->tags as $tag)
                            <a class="badge badge-pill badge-secondary" href="#">{{$tag->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>



    <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">

                <div class="card my-4">
                    <div class="card-header">
                        Add a Comment
                    </div>
                    <div class="card-body">
                        @auth
                            <form wire:submit.prevent="storeComment" action="#">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" value="{{auth()->user()->first_name}}" readonly>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" value="{{auth()->user()->email}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="content" class="form-control" placeholder="Comment" rows="4" wire:model="content"></textarea>
                                </div>

                                <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                            </form>
                        @else
                            <a href="{{route('login')}}" class="btn btn-info text-white"> Sign in to Add a comment</a>
                        @endauth
                    </div>
                </div>

                <hr>

                @if ($comments->count() > 0)
                    @foreach ($comments as $comment)
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-start">
                                        <img
                                            src="https://res.cloudinary.com/dlfu3ltay/image/upload/v1673087568/post%20image/w0lg2wjzygjok6dyhoyh.png"
                                            class="rounded m-2"
                                            alt="avatar 1" style="width: 50px; height: 50px;">
                                        <div>
                                          <p class="p-2 me-3 mb-1 text-white rounded-3 bg-dark">{{ $comment->content}}</p>
                                          <p class="small me-3 mb-1 rounded-3 text-muted">{{ $comment->owner->first_name }} {{ $comment->owner->last_name }}</p>
                                          <p class="small me-3 mb-3 rounded-3 text-muted">{{ $comment->created_at->diffforhumans()}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center text-center">
                        No Comments for this post
                    </div>
                @endif
                {{ $comments->links()}}
            </div>
          </div>

        </div>
      </div>
</div>
