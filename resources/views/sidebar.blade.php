@auth
    <div class="sidebar">
        @if(in_array('users_access',getUserPermissions()))
        <a href="{{route('users.index')}}" class="btn btn-outline-warning">users</a>
        @endif
        @if(in_array('employees_access',getUserPermissions()))
        <a href="{{route('employees.index')}}" class="btn btn-outline-warning">employees</a>
        @endif
        @if(in_array('posts_access',getUserPermissions()))
        <a href="{{route('posts.index')}}" class="btn btn-outline-warning">post</a>
        @endif
        @if(in_array('blogs_access',getUserPermissions()))
        <a href="{{route('blogs.index')}}" class="btn btn-outline-warning">Blogs</a>
        @endif
        @if(in_array('books_access',getUserPermissions()))
        <a href="{{route('books.index')}}" class="btn btn-outline-warning">Books</a>
        @endif
        @if(in_array('permissions_access',getUserPermissions()))
        <a href="{{route('permissions.index')}}" class="btn btn-outline-warning">Permissions</a>
        @endif
        @if(in_array('roles_access',getUserPermissions()))
        <a href="{{route('roles.index')}}" class="btn btn-outline-warning">Roles</a>
        @endif
    </div>
@endauth

