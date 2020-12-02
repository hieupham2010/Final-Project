<?php require '../Handle/ConfirmLogged.php' ?>
<?php require '../Handle/AccountRole.php' ?>
<?php if ($AccountType != 0) exit; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/main.js"></script>
    <title>Manage Account</title>
</head>

<body>
    <div class="container-fluid">
        <?php include 'Header.php' ?>
        <div class="container py-5">
            <table class="bg-white rounded shadow m-auto text-center table table-hover">
                <thead>
                    <tr class="border-bottom-0">
                        <th scope="col">#</th>
                        <th scope="col">Account</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Current Role</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php require '../Handle/LoadAccountProcess.php' ?>
            </table>

        </div>
    </div>
</body>

</html>