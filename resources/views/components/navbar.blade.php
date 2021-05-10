<nav class="navbar navbar-expand-sm bg-dark navbar-dark d-flex justify-content-between">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/post">Posts</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link">{{auth()->user()->username}}</a>
      </li>
    </ul>
    <form method="POST" action="/logout">
        @csrf
        <input type="submit" value="Logout" class="btn btn-danger"/>
    </form>
  </nav>