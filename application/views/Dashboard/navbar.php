<nav class="navbar navbar-expand-lg navbar-dark " id="navbaratas">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('index.php/Dashboard') ?>">Barcode GM</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('index.php/Dashboard') ?>">Home</a>
        </li>
        <div class="me-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="float:right">
                <?= $this -> session -> userdata('username');?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?= base_url('index.php/LoginDashboard/logout') ?>">Logout</a></li>
            </ul>
            </li>
        </div>
      </ul>
    </div>
  </div>
</nav>