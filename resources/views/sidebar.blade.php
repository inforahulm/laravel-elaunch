@auth
    <div class="sidebar">
        @if(in_array('users_access',getUserPermissions()))
        <a href="{{route('users.index')}}" class="btn btn-outline-warning">users</a>
        @endif
        <a href="{{route('employees.index')}}" class="btn btn-outline-warning">employees</a>
        <a href="{{route('posts.index')}}" class="btn btn-outline-warning">post</a>
        <a href="{{route('blogs.index')}}" class="btn btn-outline-warning">Blogs</a>
        <a href="{{route('books.index')}}" class="btn btn-outline-warning">Books</a>
        <a href="{{route('permissions.index')}}" class="btn btn-outline-warning">Permissions</a>
        <a href="{{route('roles.index')}}" class="btn btn-outline-warning">Roles</a>
    </div>
@endauth

