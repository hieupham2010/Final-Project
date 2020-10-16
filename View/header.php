<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <!--header -->
  <div class="header mt-4">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ml-auto">
      <a class="navbar-brand" href="MainPage.php" id="logo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQXUhPDDSVmzWhYaXJZAFOIkTZU-pyux0Aaow&usqp=CAU" width="30" height="30" alt="logo">
        <span>TDT Classroom</span>
      </a>
      <div class="collapse navbar-collapse" id="navbar-list-6 col col-sm-3">
        <div class="navbar-nav ml-auto ">
          <a href="#" class="mt-4">
            <span><?php echo $UserName ?></span>
          </a>
          <ul class="list-unstyled mt-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://royale.apache.org/wp-content/uploads/2016/06/blank-profile-picture.png" width="40" height="40" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="../Handle/LogoutProcess.php">Log Out</a>
              </div>
            </li>
          </ul>
        </div>

    </nav>

  </div>
</body>

</html>