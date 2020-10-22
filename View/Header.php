<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>

</style>

<body>
  <!--header -->
  <div class="header mt-3">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom ml-auto">
      <a class="navbar-brand" href="MainPage.php" id="logo">
        <img src="images/LogoTDT/LogoTDT.png" width="30" height="30" alt="logo">
        <span>TDT Classroom</span>
      </a>
      <div class="collapse navbar-collapse" id="navbar-list-6 col col-sm-3">
        <div class="navbar-nav ml-auto ">
          <div class="dropleft">
            <a class="nav-link dropdown-toggle waves-effect waves-light mr-3 mt-3 align-center" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-plus"></i>
              <svg focusable="false" width="24" height="24" viewBox="0 0 24 24">
                <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
              </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-center dropdown-info mr-3 mt-3" aria-labelledby="navbarDropdownMenuLink-4">
              <?php require '../Handle/AccountRole.php'; ?>
              <?php if ($AccountType == 0) { ?>
                <a class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#JoinClass">Join Class</a>
                <a class="dropdown-item waves-effect waves-light" data-target="#AddClass" data-toggle="modal">Add Class</a>
              <?php } else if ($AccountType == 1) { ?>
                <a class="dropdown-item waves-effect waves-light" data-target="#AddClass" data-toggle="modal">Add Class</a>
              <?php } else { ?>
                <a class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#JoinClass">Join Class</a>
              <?php } ?>
            </div>
          </div>
          <a href="#" class="mt-4">
            <span><?php echo $FullName ?></span>
          </a>
          <ul class="list-unstyled mt-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $AvatarSrc ?>" width="40" height="40" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="../Handle/LogoutProcess.php">Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</body>

</html>