<?php
require '../Handle/ConfirmLogged.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'Header.php' ?>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">

                <!--Detail ClassWork-->
                <div class="col-8">
                    <a role="button" class="item-question collapsed text-decoration-none  text-dark font-weight-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
                        <span class="relative">
                            <div class="dropdown-tdoc dropdown dropdown-menu-right absolute" style="z-index: 1; position: absolute; top: 20px; right: 40px;">
                                <a class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
                                    <a class="dropdown-item" data-toggle="dropdown">Report</a>
                                </div>
                            </div>
                        </span>
                    </a>
                    <div class="rounded">
                        <div class="p-2">
                            <div class="mt-2">
                                <a role="button" class="text-decoration-none  text-dark font-weight-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">

                                    <h3 class="font-weight-bold">Class Work Title
                                    </h3>
                                </a>
                                <span class="text-muted">Teacher name</span>
                                <span class="text-muted float-right">Due day</span>
                                <p>Points</p>
                            </div>

                            <hr class="font-weight-bold">
                            <div id="" class="">
                                <div class="panel-body border-bottom">
                                    <p>
                                        Detail assingments
                                        Detail assingments
                                        Detail assingments
                                        Detail assingments
                                        Detail assingmentsDetail assingmentsDetail assingmentsDetail assingmentsDetail assingmentsDetail assingmentsDetail assingments
                                    </p>
                                </div>

                                <div class="rounded f-flex justify-content-left p-2 mt-2">
                                    <form class="form-control-lg">
                                        <h6>Public Comment</h6>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="35" height="35" aria-hidden="true"></span>
                                            </div>
                                            <input type="text" class="form-control mt-0 rounded-pill mr-2" rows="3" placeholder="..." aria-describedby="basic-addon1">
                                            <button class="btn btn-outline-secondary form-control-md mt-0 rounded-pill" type="button">Comment</button></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Detail ClassWork-->


                <!--submit -->
                <div class="col-4">
                    <div class="shadow border rounded p-3">
                        <h3 class=" border-bottom">Submit Work</h3>

                        <form action="" class="mb-3    text-center">
                            <div class="custom-file overflow-hidden rounded-pill mb-3 mt-2 p-3">
                                <input id="customFile" type="file" class="custom-file-input rounded-pill">
                                <label for="customFile" class="custom-file-label rounded-pill text-left">Add file</label>
                            </div>
                            <input class="btn btn-outline-secondary form-control rounded-pill ml-auto text-center  " type="submit" value="Submit">
                        </form>


                        <h6>Private Comment</h6>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="35" height="35" aria-hidden="true"></span>
                            </div>
                            <input type="text" class="form-control mt-0 rounded-pill mr-2" rows="3" placeholder="..." aria-describedby="basic-addon1">
                            <button class="btn btn-outline-secondary form-control-md mt-0 rounded-pill" type="button">Comment</button></input>
                        </div>
                    </div>
                </div>
                <!--submit -->
            </div>
        </div>

    </div>
</body>

</html>