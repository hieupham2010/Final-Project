
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
  .dropdown-toggle::after {
    content: none !important;
  }

  /*header*/


  .dropdown-toggle:before {
    display: none !important;
    content: none !important;
  }
</style>

<body>
  <!--header -->
  <div class="header mt-4">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light  border-bottom ml-auto">
      <a class="navbar-brand" href="MainPage.php" id="logo">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQXUhPDDSVmzWhYaXJZAFOIkTZU-pyux0Aaow&usqp=CAU" width="30" height="30" alt="logo">
        <span>TDT Classroom</span>
      </a>
      <div class="collapse navbar-collapse" id="navbar-list-6 col col-sm-3">



        <div class="navbar-nav ml-auto ">

          <div class="dropleft">
            <a class="nav-link dropdown-toggle waves-effect waves-light mr-3 mt-3 mb-3 align-center" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-plus"></i>
              <svg focusable="false" width="24" height="24" viewBox="0 0 24 24">
                <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
              </svg>
            </a>



            <div class="dropdown-menu dropdown-menu-center dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <a class="dropdown-item waves-effect waves-light" href="#" data-toggle="modal" data-target="#JoinClass">Join Class</a>
              <a class="dropdown-item waves-effect waves-light" href="#" data-target="#ModalCenter" data-toggle="modal">Add Class</a>
            </div>

            <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="ModalLongTitle">Create Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <!-- class content -->
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="className" class="col-form-label">Class Name</label>
                        <input type="text" class="form-control" id="className">
                      </div>
                      <div class="form-group">
                        <label for="subject" class="col-form-label">Subject</label>
                        <input type="text" class="form-control" id="subject">
                      </div>
                      <div class="form-group">
                        <label for="Room" class="col-form-label">Room</label>
                        <input type="text" class="form-control" id="Room">
                      </div>
                    </form>
                  </div>
                  <!-- class content -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create Class</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!--Join Class-->
          <div class="modal fade" id="JoinClass" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLongTitle">Join Class</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <h3><label for="classCode" class="col-form-label">Class Code</label></h3>
                      <p>Ask your teacher class code, and enter it here</p>
                      <input type="text" class="form-control" id="classCode">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Join Class</button>
                </div>
              </div>
            </div>
          </div>



          <a href="#" class="mt-4">
            <span><?php echo $FullName ?></span>
          </a>
          <ul class="list-unstyled mt-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $avatar ?>" width="40" height="40" class="rounded-circle">
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