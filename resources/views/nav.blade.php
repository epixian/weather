<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="{{ asset('images/logo.png') }}" width="82" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      {{-- @auth --}}
        <router-link to="/" class="navbar-item">
          Customers
        </router-link>

        <router-link to="/locations" class="navbar-item">
          Locations
        </router-link>

        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            More
          </a>

          <div class="navbar-dropdown">
            <router-link to="/weatherlocations" class="navbar-item">
              Weather Locations
            </router-link>

            <a class="navbar-item">
              Jobs
            </a>
            <a class="navbar-item">
              Contact
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              Report an issue
            </a>
          </div>
        </div>
{{--       @endauth --}}
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        @guest
          <div class="buttons">
            <a href="/register" class="button is-primary">
              <strong>Sign up</strong>
            </a>
            <a href="/login" class="button is-light">
              Log in
            </a>
          </div>
        @endguest
      </div>
    </div>
  </div>
</nav>
