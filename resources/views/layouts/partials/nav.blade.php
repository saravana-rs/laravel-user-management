<nav>
  @auth
    Hello, {{ auth()->user()->user_name }} |
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
      @csrf
      <button type="submit">Logout</button>
    </form>
    @if(auth()->user()->role === 'admin')
      | <a href="{{ route('admin.index') }}">Admin Dashboard</a>
    @else
      | <a href="{{ route('dashboard') }}">Dashboard</a>
      | <a href="{{ route('profile.edit') }}">Edit Profile</a>
    @endif
  @else
    <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a>
  @endauth
</nav>
