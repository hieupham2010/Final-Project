<?php
require '../Handle/ConfirmLogged.php';
include '../DialogMessage.php';
if (!isset($_GET["request"]) || empty($_GET["request"])) {
    header("Location: MainPage.php");
    exit;
}
?>
<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".chooseImg").on('change', function() {
                readURL(this);
            });

            $(".chooseFile").on('click', function() {
                $(".chooseImg").click();
            });
        });
    </script>

</head>

<style>
    .mainSection {
        box-shadow: 0px 5px 5px 5px black;
    }

    .wrapPicture {
        position: relative;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin: 50px auto;
    }

    .wrapPicture:hover {
        cursor: pointer;
        content: "Change Avatar";
    }

    .chooseFile {
        position: absolute;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .avatar {
        height: 100%;
        width: 100%;
        transition: all .3s ease;

    }

    .avatar:after {
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 200px;
        text-align: center;
    }
</style>

<body>
    <?php include 'Header.php' ?>

    <div class="container">
        <div class="fb-profile rounded-circle row">
            <img align="left" class="fb-image-lg " src="https://wowslider.com/sliders/demo-76/data1/images/bookshelf349946_1280.jpg" alt="Profile image example" />
            <div align="left" class="fb-image-profile wrapPicture">
                <form action="">
                <img class="avatar rounded-circle img-thumbnail" src="<?php echo $AvatarSrc ?>" alt="Profile image example" />
                <div class="chooseFile">a</div>
                <input type="file" class="chooseImg">
                </form>
            </div>

            <div class="fb-profile-text">
                <h1><?php echo $FullName ?></h1>
            </div>
        </div>

        <div class="mainSection row  my-5">

            <div class="col-md-2 mt-5">
                <ul class="nav nav-stacked mt-4" role="tablist">
                    <div class="m-auto mt-5">
                        <li role="presentation" class="active"><a class="text-decoration-none text-muted" href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation"><a class="text-decoration-none text-muted" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Update Profile</a></li>
                    </div>

                </ul>
            </div>
            <div class="tab-content col-md-10">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <table class="table col-md-10">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">
                                    <h2>PERSONAL INFORMATION</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" m-5 text-center">
                            <tr>
                                <th scope="row">Full Name</th>
                                <td>
                                    <p><?php echo $FullName ?></p>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">Birth Date</th>
                                <td>
                                    <p><?php echo $DateOfBirth ?></p>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>
                                    <p><?php echo $Email ?></p>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">Phone Number</th>
                                <td>
                                    <?php echo $PhoneNumber ?>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <form action="../Handle/UpdateProfileProcess" method="POST" enctype="multipart/form-data">
                        <table class="table col-md-10">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2" class="text-center">
                                        <h2>UPDATE PERSONAL INFORMATION</h2>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" m-5 text-center">
                                <tr>
                                    <th scope="row">Full Name</th>
                                    <td>
                                        <input type="text" name="txtFullName" required class="form-control" placeholder="Full Name" value="<?php echo $FullName ?>">
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">Birth Date</th>
                                    <td>
                                        <input type="date" name="txtDateOfBirth" id="txtDateOfBirth" required class="form-control" value="<?php echo $DateOfBirth ?>">
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>
                                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" required class="form-control" value="<?php echo $Email ?>">
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td>
                                        <input type="tel" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Phone Number" pattern="[0-9]{10}" required class="form-control" value="<?php echo $PhoneNumber ?>">
                                    </td>

                                </tr>
                                <tr>
                                    <th></th>
                                    <td> <input type="submit" value="Update" class="btn btn-outline-info btn-rounded btn-block waves-effect z-depth-0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<script src="../js/jquery-3.1.1.min.js" type=text/javascript> </script> <script src="../js/bootstrap.min.js" type=text/javascript> </script> <script src="../js/custom.js" type=text/javascript> </script> <script>
    $(function () {
    $('#myTab li:last-child a').tab('show')
  })
  
</script>

</html>
<?php
if (isset($_GET["msg"])) {
    echo "<script>$('#Message').modal({show: true})</script>";
}
?>