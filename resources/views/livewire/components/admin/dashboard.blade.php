<div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar" class="align-text-bottom"></span>
                    This week
                </button>
            </div>
        </div>

        <div class="d-flex flex-row flex-nowrap">
            <div class="card card-body bg-info m-2">
                <h5 class="card-title">{{$userCount}}</h5>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Users</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                    </div>
                </div>
                <a href="/admin/users" class="btn btn-outline-primary text-white">
                    More info
                </a>
            </div>
            <div class="card card-body bg-success m-2">
                <h5 class="card-title">{{$postCount}}</h5>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Posts</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                    </div>
                </div>
                <a href="/admin/posts" class="btn btn-outline-primary">
                    More info
                </a></div>
            <div class="card card-body bg-primary m-2">
                <h5 class="card-title">{{$commentCount}}</h5>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Comments</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                    </div>
                </div>
                <a href="/admin/comments" class="btn btn-outline-dark">
                    More info
                </a></div>
            <div class="card card-body bg-danger m-2">
                <h5 class="card-title">{{$roleCount}}</h5>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Roles</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                    </div>
                </div>
                <a href="/admin/roles" class="btn btn-outline-primary">
                    More info
                </a></div>
        </div>
    </main>


</div>
