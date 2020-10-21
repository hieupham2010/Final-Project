<?php require '../Handle/ConfirmLogged.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>TDT Class Room</title>
  <script type="text/javascript" src="javascript/main.js"></script>

</head>
<style>

</style>

<body>
  </div>
  <div class="container-fluid">

    <?php include 'Header.php' ?>

    <!--body-->
    <div class="row m-0">
      <!--Body left-->
      <div class="col col-sm-10 mt-5">
        <!--Element-->

        <ol class="list-group list-group-horizontal">
          <?php require '../Handle/LoadClassProcess.php'?>
          <!--
          <li class="list-group-item border-0 ">
            <div class="card border-info">
              <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
             
              <div class="card-body">
                <h5 class="card-title">
                  <a id="class" href="#">Class Name</a>
                </h5>
                <p class="card-text">Description</p>
              </div>
            </div>
          </li>
          <li class="list-group-item border-0 ">
            <div class="card border-info">
              <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
             
              <div class="card-body">
                <h5 class="card-title">
                  <a id="class" href="#">Class Name</a>
                </h5>
                <p class="card-text">Description</p>

              </div>
            </div>
          </li>

          <li class="list-group-item border-0 ">
            <div class="card border-info">
              <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
              
              <div class="card-body">
                <h5 class="card-title">
                  <a id="class" href="#">Class Name</a>
                </h5>
                <p class="card-text">Description</p>

              </div>
            </div>
          </li>

          <li class="list-group-item border-0 ">
            <div class="card border-info">
              <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
             
              <div class="card-body">
                <h5 class="card-title">
                  <a id="class" href="#">Class Name</a>
                </h5>
                <p class="card-text">Description</p>

              </div>
            </div>
          </li>

          <li class="list-group-item border-0 ">
            <div class="card border-info">
              <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
              
              <div class="card-body">
                <h5 class="card-title">
                  <a id="class" href="#">Class Name</a>
                </h5>
                <p class="card-text">Description</p>

              </div>
            </div>
          </li>

          <li class="list-group-item border-0 ">
            <div class="card border-info">
              <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
              
              <div class="card-body">
                <h5 class="card-title">
                  <a id="class" href="#">Class Name</a>
                </h5>
                <p class="card-text">Description</p>

              </div>
            </div>
          </li>
-->
        </ol>
      </div>
      <!--Body right-->
      <div class=" body-right col col-sm-2 rounded-sm mt-5">

        <aside id="to-do">
          <div class="header-wrap text-left  ">
            <h2>
              <span>To Do</span>
            </h2>
          </div>

          <div class="border-bottom"></div>

          <ul class="list-unstyled p-auto mt-2">
            <li class="mt-1"><a href="">Nofitification 1</a></li>
            <li class="mt-1"><a href="">Nofitification 2</a></li>
            <li class="mt-1"><a href="">Nofitification 3</a></li>
            <li class="mt-1"><a href="">Nofitification 3</a></li>

          </ul>
        </aside>

      </div>

    </div>

    </aside>

    </row>
</body>

</html>