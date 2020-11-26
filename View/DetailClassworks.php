<?php
require '../Handle/ConfirmLogged.php';
include '../Handle/LoadClassworkDetailProcess.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <?php include 'Header.php' ?>
        <div class="container pt-4">
            <div class="row">
                <!--Detail ClassWork-->
                <div class="col-8">
                    <div class="rounded">
                        <div class="p-2">
                            <div class="mt-2">
                                <h5 class="font-weight-bold d-inline"><?php echo $Title ?></h5>
                                <span class="meta small font-italic">(Posted: <?php echo $Time ?>)</span>
                                <span class="text-muted float-right mt-2">Due: <?php echo $DeadLine ?></span>
                            </div>

                            <hr class="font-weight-bold">
                            <div id="" class="">
                                <div class="panel-body border-bottom text-break">
                                    <p><?php echo $Description ?></p>
                                    <?php include '../Handle/LoadMaterialProcess.php'; ?>
                                </div>
                                <div class="rounded f-flex justify-content-left p-2 mt-2">
                                    <?php include '../Handle/LoadCommentClassworkProcess.php'; ?>
                                    <form action="../Handle/CreateClassworkCommentProcess" method="POST" class="form-control-lg">
                                        <div class="input-group mb-3 mt-2">
                                            <div class="input-group-prepend">
                                                <span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="<?php echo $AvatarSrc ?>" class="avatar rounded-circle" alt="" width="30" height="30" aria-hidden="true"></span>
                                            </div>
                                            <input type="hidden" name="encryptCode" value="<?php echo $encryptCode ?>">
                                            <input type="hidden" name="ClassworkID" value="<?php echo $ClassworkID ?>">
                                            <input type="text" class="form-control mt-0 rounded-pill mr-2" name="txtComment" placeholder="Comment" aria-describedby="basic-addon1">
                                            <button class="btn btn-outline-secondary form-control-md mt-0 rounded-pill" type="submit">Comment</button>
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
                    <div class="shadow border rounded p-4">
                        <div class="border-bottom">
                            <h3 class="d-inline">Submit Work</h3>
                            <?php
                            require '../Handle/CheckSubmit.php';
                            if ($resultAssignment->num_rows > 0) {
                            ?>
                                <p class="float-right mt-2 font-italic">Submitted</p>
                            <?php } else { ?>
                                <p class="float-right mt-2 font-italic">Assigned</p>
                            <?php } ?>
                        </div>
                        <?php if ($resultAssignment->num_rows > 0) { ?>
                            <div>
                                <form action="../Handle/DeleteSubmitClassworkProcess" method="POST" class="text-center">
                                    <input type="hidden" name="ClassworkID" value="<?php echo $ClassworkID ?>">
                                    <input type="hidden" name="encryptCode" value="<?php echo $encryptCode ?>">

                                    <?php include '../Handle/LoadSubmittedClassworkProcess.php' ?>

                                    <input class="btn btn-outline-secondary form-control rounded-pill ml-auto mt-3  text-center" type="submit" value="Unsubmit">
                                </form>
                            </div>
                        <?php } else { ?>

                            <div class="mt-3">
                                <form action="../Handle/SubmitClassworkProcess" method="POST" enctype="multipart/form-data" class="mb-3 text-center">
                                    <div class="custom-file overflow-hidden rounded-pill mb-3 mt-2 p-3">
                                        <input type="hidden" name="ClassworkID" value="<?php echo $ClassworkID ?>">
                                        <input type="hidden" name="encryptCode" value="<?php echo $encryptCode ?>">
                                        <input id="customFile" type="file" name="fileUpload[]" class="custom-file-input rounded-pill" multiple>
                                        <label for="customFile" class="custom-file-label rounded-pill text-left">Choose file</label>
                                    </div>
                                    <input class="btn btn-outline-secondary form-control rounded-pill ml-auto mt-3  text-center" type="submit" value="Submit">
                                </form>
                            </div>
                        <?php } ?>
                        <script src="javascript/main.js"></script>
                    </div>
                </div>
                <!--submit -->
            </div>
        </div>

    </div>
</body>

</html>

<?php
include '../DialogMessage.php';
if (isset($_GET["msg"])) {
    echo "<script>$('#Message').modal({show: true})</script>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>