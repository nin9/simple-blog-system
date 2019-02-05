<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('PostIndex') }}">Blogs</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('PostIndex') }}"><i class="fa fa-home fa-xs"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-tags fa-xs"></i> Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if(count($categories)> 0)
                            @foreach($categories as $cat)
                            <a class="dropdown-item" href="{{ route('CategoryPostIndex', $cat->id) }}">{{$cat->name}}</a>
                            @endforeach
                      @endif
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @if(Auth::user())
                        <a class="dropdown-item" href="{{route('Admin.Dashboard')}}"><i class="fa fa-tachometer-alt fa-xs"></i> Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt fa-xs"></i> Logout</a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a class="dropdown-item" href="{{route('login')}}"><i class="fas fa-sign-in-alt fa-xs"></i> Login</a>
                    @endif
                </div>
            </li>
        <ul>
    </div>
  </nav>