<?php
require '../Handle/ConfirmLogged.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
                    <div class="rounded">
                        <div class="p-2">
                            <div class="mt-2">
                                <a role="button" class="text-decoration-none  text-dark font-weight-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
                                    <h3 class="font-weight-bold">Class Work Title</h3>
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
                        <form action="" class="mb-3">
                            <div class="custom-file overflow-hidden rounded-pill mb-3 mt-2 p-3">
                                <input id="customFile" type="file" class="custom-file-input rounded-pill">
                                <label for="customFile" class="custom-file-label rounded-pill">Add file</label>
                            </div>
                            <input class="btn btn-outline-secondary form-control rounded-pill" type="submit" value="Submit">
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