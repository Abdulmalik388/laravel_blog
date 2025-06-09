<div class="d-flex flex-column p-3 text-white bg-dark shadow"
    style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0;">
    <h4 class="mb-4">Admin Panel</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}"
                class="nav-link text-white {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.posts') }}"
                class="nav-link text-white {{ request()->is('admin/posts') ? 'active' : '' }}">
                All Posts
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/posts/create') }}"
                class="nav-link text-white {{ request()->is('admin/posts/create') ? 'active' : '' }}">
                Create Post
            </a>
        </li>
        <li>
            <a href="{{ route('admin.comments') }}" class="nav-link text-white">
                Manage Comments
            </a>

        </li>
        <li>
            <a href="{{ route('pages.welcome') }}" class="nav-link text-white">
                Logout
            </a>
        </li>
    </ul>
</div>