<?php 
    session_start();
    $UserName = $_SESSION["username"];
    if(!isset($_SESSION["logged"]) && $_SESSION["logged"] !== true) {
      header("Location: ../index.php");
      exit;
    }else{
      if(isset($_SESSION["timeLoginExpire"]) && time() - $_SESSION["timeLoginExpire"] > 600) {
        require_once '../Handle/LogoutProcess.php';
      }else{
        $_SESSION["timeLoginExpire"] = time();
      }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <title>TDT Class Room</title>
  <script type="text/javascript" src="javascript/main.js"></script>

</head>
<!-- <style>
#class{
  font-size: 24px;
  text-align: left;

.navbar-brand span{
  font-size: 20px;
}
  .border-bottom {
    border-bottom: 1px solid #66a5e3 !important;
  }

  .border {
    border: 1px solid #66a5e3 !important;
  }
 
  .card:hover {
    text-decoration: none;
    color: #080808;
    box-shadow: 0 1px;
    cursor: pointer;
  }

  .list-group-item {
    max-width: 300px;
    height: 300px;
  }

  ol {
    list-style-type: none;
    flex-wrap: wrap;
    display: flex;
    /* -webkit-flex-wrap: wrap; */
    flex-wrap: wrap;
    /* padding-left: 1.5rem; */
    padding-top: 1.5rem;
    display: block;
    list-style-type: decimal;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
  }

  @media only screen and (max-width: 992px) {
    body:not(.course-menu-expanded) .body-right {
      display: none;
      width: 288px;
      padding-left: 24px;
    }
  } -->

<style>
  .dropdown-toggle::after{
    border: none;
    display: block;
  }
</style>

<body>
  </div>
  <div class="container-fluid">

    <!--header -->
    <div class="header mt-4">
      <!--navbar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ml-auto">
        <a class="navbar-brand" href="#" id="logo">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQXUhPDDSVmzWhYaXJZAFOIkTZU-pyux0Aaow&usqp=CAU"
            width="30" height="30" alt="logo">
          <span>TDT Classroom</span>
        </a>
        <div class="collapse navbar-collapse" id="navbar-list-6 col col-sm-3">
					<div class="navbar-nav ml-auto ">
						<a href="#" class="mt-4">
							<span><?php echo $UserName ?></span>
						</a>
						<ul class="list-unstyled">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="https://royale.apache.org/wp-content/uploads/2016/06/blank-profile-picture.png"
										width="40" height="40" class="rounded-circle">
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

    <div class="container-fluid ">


      <!--body-->
      <div class="row m-0">
        <!--Body left-->
        <div class="col col-sm-10 mt-5">
          <!--Element-->

          <ol class="list-group list-group-horizontal">



            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">

                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" name="image" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>


            <li class="list-group-item border-0 ">
              <div class="card  border-info">
                <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
                <!--Class-->
                <div class="card-body">
                  <h5 class="card-title">
                    <a id="class" href="#">Class Name</a>
                  </h5>
                  <p class="card-text">Description</p>

                </div>
              </div>
            </li>
          </ol>
        </div>

        <!--Body right-->
        <div class=" body-right col col-sm-2   rounded-sm mt-5">

          <aside id="to-do">
            <div class="header-wrap text-left  ">
              <h2>
                <span>To Do</span>
              </h2>
            </div>

            <div class="border-bottom">
            </div>

            <div class="nofitication mt-2">
              <ul class="list-unstyled ">


                <li><a href="">Nofitification 1</a></li>
                <li><a href="">Nofitification 2</a></li>
                <li><a href="">Nofitification 3</a></li>
                <li><a href="">Nofitification 3</a></li>

              </ul>

            </div>

          </aside>
        </div>
      </div>
</body>

</html>