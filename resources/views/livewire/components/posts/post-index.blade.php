
<div class="container">
    @include('livewire.components.admin.modals.posts')
    <div class="row justify-content-center">
        <div class="col-md-{{$pad ?? '10'}}">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <main class="container">

                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <a href="{{route('posts.index')}}" class="btn btn-sm btn-outline-dark fst-italic bold">
                                Articles Home
                            </a>
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
                                    Create Article
                                </button>
                            </div>
                        </div>

                        <div class="row g-5">
                            <div class="col-md-8">

                              @foreach ($posts as $post)
                                  <article class="blog-post">
                                      <h2 class="blog-post-title mb-1">{{ $post->title }}</h2>
                                      <p class="blog-post-meta">Posted  s{{ $post->created_at->diffForHumans() }} by <a href="#">{{ $post->user->first_name }} {{ $post->user->last_name }}</a></p>

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
                                              <a href="{{route('posts.show',$post->slug)}}" class="stretched-link text-white">Continue reading</a>
                                          </div>
                                          </div>
                                      </div>
                                      <br/>
                                  </article>
                              @endforeach

                              {{ $posts->links() }}
                              {{-- <nav class="blog-pagination" aria-label="Pagination">
                                <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
                                <a class="btn btn-outline-secondary rounded-pill disabled">Newer</a>
                              </nav> --}}

                            </div>

                            <div class="col-md-4">
                              <div class="position-sticky" style="top: 2rem;">
                                <div class="p-4 mb-3 bg-light rounded">
                                  <h4 class="fst-italic">About</h4>
                                  <p class="mb-0">Project By Trust Edoyugbo.</p>
                                </div>

                                <div class="p-4">
                                  <h4 class="fst-italic">Socials</h4>
                                  <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Facebook</a></li>
                                  </ol>
                                </div>
                              </div>
                            </div>
                        </div>

                      </main>
                </div>
            </div>
        </div>
    </div>
</div>
