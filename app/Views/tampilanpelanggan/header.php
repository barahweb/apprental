<header>
<?php $url = $_SERVER['REQUEST_URI']; ?>
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                <?= session()->get('nama') ?>
                <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
                <?php if (session()->get('log') == true) { ?>
                  <li><a href="/logoutcust">Logout</a></li>
                <?php } else { ?>
                  <li><a href="/logincust">Login</a></li>
                  <li><a href="/daftarcust">Daftar</a></li>
                <?php } ?>
              </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <!-- <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form> -->
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <?php if (session()->get('log') == true) { ?>
            <li><a href="/">Home</a> </li>
            <li><a href="/listmotor">List Motor</a>
            <li><a href="/pesanancust">Pesanan Saya</a></li>
          <?php } else { ?>
            <li><a href="/">Home</a> </li>
            <li><a href="/listmotor">List Motor</a>
            <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>