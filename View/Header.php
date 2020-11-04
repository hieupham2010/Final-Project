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


<body>

  <div class="container-fluid header">
    <div class="row border-bottom border-primary">

      <div class="col-2 mt-1 pt-4">
        <a class="navbar-brand" href="MainPage" id="logo">
          <img src="images/LogoTDT/LogoTDT.png" width="30" height="30" alt="logo">
          <span>TDT Classroom</span>
        </a>
      </div>

      <div class="col-10">
        <nav class=" navbar navbar-expand-lg">
          <div class="collapse navbar-collapse">
            <div class="navbar-nav ml-auto">

              <?php require '../Handle/AccountRole.php'; ?>
              <?php if (!isset($_GET["request"]) && !isset($_GET["id"])) { ?>
                <ul class="nav-img list-unstyled mt-3 pt-1 mr-2">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <svg focusable="false" width="24px" height="24px" viewBox="0 0 24 24">
                        <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                        <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                      </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="navbarDropdownMenuLink">
                      <?php if ($AccountType == 0 || $AccountType == 1) { ?>
                        <a class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#JoinClass">Join Class</a>
                        <a class="dropdown-item waves-effect waves-light" data-target="#AddClass" data-toggle="modal">Add Class</a>
                      <?php } else { ?>
                        <a class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#JoinClass">Join Class</a>
                      <?php } ?>
                    </div>
                  </li>
                </ul>
                <!--Search -->
                <div class="search-Bar mt-4 mr-4">
                  <form action="MainPage" method="GET">
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
              <?php } ?>
              <!--Notification-->

              <span class="mt-3 p-2"><?php echo $FullName ?></span>
              <ul class="nav-img list-unstyled mt-2">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo $AvatarSrc ?>" width="40" height="40" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="MainPage">Dashboard</a>
                    <a class="dropdown-item" href="Profile?request=profile">Profile</a>
                    <a class="dropdown-item" href="../Handle/LogoutProcess">Log Out</a>
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