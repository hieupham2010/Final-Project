<?php
require_once 'DataAccess.php';
$query = "SELECT * FROM users WHERE UserID IN (SELECT UserID FROM accounts WHERE UserName IN 
(SELECT UserName FROM classmembers WHERE ClassID = ?) AND AccountType = 1)";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $ClassID);
$stmt->execute();
$result = $stmt->get_result();
$id = 0;
while ($row = $result->fetch_assoc()) {
    $query = "SELECT * FROM accounts WHERE UserID = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $row["UserID"]);
    $stmt->execute();
    $resultAccount = $stmt->get_result();
    $rowAccount = $resultAccount->fetch_assoc();
    require '../View/DialogDeleteLecturer.php';
    $query = "SELECT * FROM classmembers WHERE UserName = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $rowAccount["UserName"]);
    $stmt->execute();
    $resultFounder = $stmt->get_result();
    $rowFounder = $resultFounder->fetch_assoc();
?>
    <li class="List-Student p-1 border-bottom">
        <div class="form-group mt-3">
            <img src="<?php echo $rowAccount["AvatarSrc"] ?>" width="40" height="40" class="rounded-circle mr-3 mb-2">
            <span><?php echo $row["FullName"] ?></span>
            <?php if ($AccountType == 0 || $AccountType == 1 && $UserName != $rowAccount["UserName"] && $rowFounder["Founder"] != 1) { ?>
                <div class="dropdown-tdoc dropdown dropdown-menu-right float-right mt-3">
                    <a class="dropdown-toggle bg-transparent  d-flex flex-wrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info active-none text-left" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" data-toggle="modal" data-target="#DeleteLecturer<?php echo $id ?>" >Remove</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </li>
<?php $id++; }?>