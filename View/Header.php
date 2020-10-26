<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  div.search-Bar {
    margin-top: 20px;
    display: inline-block;
  }

  .nav-img {
    margin-top: -16px;
  }

  .dr-plus {
    margin-top: -6px;


  }

  .dr-bell {
    margin-top: 4px;
    margin-left: 12px;
  }

  .dropdown-menu-bell {
    position: absolute;
    top: 100%;
    right: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .25rem;
    width: 250px;
  }

  .list-notifications li {
    border: 1px solid;
    border-radius: .25rem;
    padding: 10px;
    margin-right: 20px;
  }

  .list-notifications li a {
    text-decoration: none;
  }
</style>

<body>

  <div class="container-fluid header mt-3 ">

    <div class="row mt-4 border-bottom">

      <div class="col-2 mt-2">
        <a class="navbar-brand" href="MainPage.php" id="logo">
          <img src="images/LogoTDT/LogoTDT.png" width="30" height="30" alt="logo">
          <span>TDT Classroom</span>
        </a>
      </div>

      <div class="col-6 justify-content-center mt-2"></div>
      <div class="col-4">
        <nav class=" navbar navbar-expand-lg">
          <div class="collapse navbar-collapse">

            <div class="navbar-nav ml-auto">

              <?php require '../Handle/AccountRole.php'; ?>
              <?php if (!isset($_GET["request"])) { ?>
                <div class="dr-plus dropdown mb-3">
                  <a class="nav-link dropdown-toggle waves-effect waves-light mr-1 align-center " id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg focusable="false" width="24" height="24" viewBox="0 0 24 24">
                      <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                      <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                    </svg>
                  </a>
                  <div class=" dropdown-menu dropdown-menu-right dropdown-info mr-3" aria-labelledby="navbarDropdownMenuLink-4">

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
                <!--Search -->
                <div class="search-Bar mt-0">
                  <form action="MainPage.php" method="GET">
                    <div class="input-group input-group-sm">
                      <!--input-->
                      <input class="form-control" type="text" name="key" placeholder="Search" aria-label="Search" value="<?php if (isset($_GET["key"])) echo $_GET["key"]; ?>">
                      <!--input-->
                      <!--img-->
                      <div class="input-group-prepend .bg-white">
                        <button class="btn-submit input-group-text .bg-white" id="inputGroup-sizing-sm" type="submit">
                          <span>
                            <svg width="20px" height="20px" viewBox="0 0 15 15" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                            </svg>
                          </span>
                        </button>
                      </div>
                      <!--img-->
                    </div>
                  </form>

                </div>
                <!--Search -->
                <!--Notification-->
                <div class="dr-bell dropdown  dropdown-menu-right mb-3 mr-3">
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-bell" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                      <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-bell dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
                    <ul class="list-notifications list-unstyled">
                      <li class="ml-4 mt-3">

                        <a href="" class="content-list-unstyled">
                          <div class="notification-item">
                            <h4 class="item-title">PTTK</h4>
                            <p class="item-info">PTTK reminder</p>
                          </div>
                        </a>
                      </li>
                      <li class="ml-4 mt-3">

                        <a href="" class="content-list-unstyled">
                          <div class="notification-item">
                            <h4 class="item-title">PTTK</h4>
                            <p class="item-info">PTTK reminder</p>
                          </div>
                        </a>
                      </li>
                      <li class="ml-4 mt-3">

                        <a href="" class="content-list-unstyled">
                          <div class="notification-item">
                            <h4 class="item-title">PTTK</h4>
                            <p class="item-info">PTTK reminder</p>
                          </div>
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
              <?php } ?>
              <!--Notification-->
              
              <span><?php echo $FullName ?></span>
              <ul class="nav-img list-unstyled ">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $AvatarSrc ?>" width="40" height="40" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="Profile.php?request=profile">Profile</a>
                    <a class="dropdown-item" href="../Handle/LogoutProcess.php">Log Out</a>
                  </div>
                </li>
              </ul>

            </div>

          </div>
        </nav>

      </div>

    </div>
  </div>

</body>

</html>