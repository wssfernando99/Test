<!-- Sidebar -->
<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <h4 class="text-center">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/dashboard') }}">
                <i class="bx bx-home"></i> dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/viewPosts') }}">
                <i class="bx bx-user"></i> view blogs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/createView') }}">
                <i class="bx bx-cog"></i> Create Post
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">
                <i class="bx bx-log-out"></i> Logout
            </a>
        </li>
    </ul>
</nav>