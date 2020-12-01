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
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script>
       $ (document).ready(function() {
           if((window).width() <=670){
               $('profile-text').css('display','none')
           }
       })
    </script>
</head>

<body>
    <?php include 'Header.php' ?>

    <div class="container">
        <form action="../Handle/UpdateProfileProcess" method="POST" enctype="multipart/form-data">
            <div class="fb-profile rounded-circle row">
                <img  class="fb-image-lg " src="https://wowslider.com/sliders/demo-76/data1/images/bookshelf349946_1280.jpg" alt="Profile image example" />
                <div  class="fb-image-profile wrapPicture">
                    <img class=" avatar " src="<?php echo $AvatarSrc ?>" width="200px" height="200px" />
                    <div class="chooseFile"></div>
                    <input type="file" name="imageUpload" class="chooseImg">
                </div>

                <div class="fb-profile-text" id="fb-profile-text">
                    <h1 id="profile-text"><?php echo $FullName ?></h1>
                </div>
            </div>
            <div class="mainSection row  my-5">

                <div class="col-md-4 mt-5">
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                        <div class="m-auto mt-5">
                            <a class="nav-link active text-muted" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                            <a class="nav-link text-decoration-none text-muted" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Update Profile</a>
                        </div>

                    </ul>
                </div>
                <div class="tab-content col-md-8">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table col-md-10">
                            <thead class="border-0">
                                <tr>
                                    <th scope="col" colspan="2" class="text-center border-0">
                                        <h2>PERSONAL INFORMATION</h2>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" ">
                                <tr >
                                    <th scope="row" class="">Full Name</th>
                                    <td class="">
                                        <p><?php echo $FullName ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="">Birth Date</th>
                                    <td class="">
                                        <p><?php echo $DateOfBirth ?></p>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row" class="">Email</th>
                                    <td class="">
                                        <p><?php echo $Email ?></p>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row" class="">Phone Number</th>
                                    <td class="">
                                        <?php echo $PhoneNumber ?>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <table class="table col-md-10">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2" class="text-center border-0">
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
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>


</html>
<?php
if (isset($_GET["msg"])) {
    echo "<script>$('#Message').modal({show: true})</script>";
}
?>