<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Demo Forum</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ url('/questions') }}">Ask</a></li>
        
      </ul>
        
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input id="searchBox" type="text" style="width: 300px;" class="form-control" placeholder="Search">
        </div>
      </form>
        
      <ul class="nav navbar-nav navbar-right">
          @if( !Auth::check() )
            <li>
              <a>Welcome Guest!</a>
            </li>
          @endif
        @if(Auth::check() )  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                @if( Auth::check() )
                    {{ Auth::user()->name }}
                @endif
                <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('profile')}}">Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout')}}">Logout</a></li>
          </ul>
        </li>
         @endif
         
        @if( !Auth::check() )
            <li><a href="{{ url('/login') }}">Login</a></li>
        @endif
        @if( Auth::check() )
            <li><a href="{{ url('/logout') }}">Logout</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>