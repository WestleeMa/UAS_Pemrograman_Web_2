<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="img/icon web.png" class="iconnav" />Toko Komputer
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-1">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="News.php">News</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="Hardware.php">Hardware</a>
            </li>
            <li>
              <a class="dropdown-item" href="software.php">Software</a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>

        <li class="nav-item">
          <a href="contact.php" class="nav-link">Contact Us</a>
        </li>

        <li class="nav-item">
          <a href="Gallery.php" class="nav-link">Gallery</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-1">
        <?php
        include 'backend/navbar_Auth.php'
          ?>
      </ul>
    </div>
  </div>
</nav>