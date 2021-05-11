<ul id="dropdown1" class="dropdown-content">
  <li><a href="{{ route('posts.index') }}">Posts</a></li>
  <li class="divider"></li>
  <li><a href="{{ route('logout') }}">Logout</a></li>
</ul>

<nav class="grey darken-3">
  <div class="nav-wraper container">
    <a href="{{ URL::to('trocksystem') }}" class="brand-logo">ZOMBIE</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      @if (Auth::check())

        <li><a href="{{ route('tags.index') }}">Tags</a></li>
        <li><a href="{{ route('categories.index') }}">Noe-Zone</a></li>
        <li><a href="" class="dropdown-trigger" data-target="dropdown1"><i class="material-icons">face</i>
             </a></li>
    </ul>
    @else
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="/auth/register">Register</a></li>
    @endif
  </div>

</nav>

