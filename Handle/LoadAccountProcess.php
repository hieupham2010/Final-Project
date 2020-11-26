<?php
require 'DataAccess.php';
if (isset($_GET["key"]) && !empty($_GET["key"])) {
    $key = $_GET["key"];
    $query = "SELECT * FROM accounts WHERE UserName LIKE '%$key%'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = "SELECT * FROM accounts";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
}
$id = 1;
while ($row = $result->fetch_assoc()) {
    $query = "SELECT * FROM users WHERE UserID = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i" , $row["UserID"]);
    $stmt->execute();
    $resultAccount = $stmt->get_result();
    $rowAccount = $resultAccount->fetch_assoc();
?>
    <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $row["UserName"] ?></td>
        <td><?php echo $rowAccount["FullName"] ?></td>
        <td><?php echo $rowAccount["PhoneNumber"] ?></td>
        <td><?php echo $rowAccount["Email"] ?></td>
        <?php if ($row["AccountType"] == 0) { ?>
            <td>Admin</td>
        <?php } else if ($row["AccountType"] == 1) { ?>
            <td>Lecturer</td>
        <?php } else { ?>
            <td>Student</td>
        <?php } ?>
        <td>
            <div class="dropdown-tdoc dropdown dropdown-menu-right text-right">
                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="18px" height="18px" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info active-none text-left" aria-labelledby="navbarDropdownMenuLink-4">
                    <?php if ($row["AccountType"] == 0) { ?>
                        <a class="dropdown-item" href="../Handle/ChangeRoleProcess?UserName=<?php echo $row["UserName"] ?>&TargetRole=Student">Student</a>
                        <a class="dropdown-item" href="../Handle/ChangeRoleProcess?UserName=<?php echo $row["UserName"] ?>&TargetRole=Lecturer">Lecturer</a>
                    <?php } else if ($row["AccountType"] == 1) { ?>
                        <a class="dropdown-item" href="../Handle/ChangeRoleProcess?UserName=<?php echo $row["UserName"] ?>&TargetRole=Admin">Admin</a>
                        <a class="dropdown-item" href="../Handle/ChangeRoleProcess?UserName=<?php echo $row["UserName"] ?>&TargetRole=Student">Student</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="../Handle/ChangeRoleProcess?UserName=<?php echo $row["UserName"] ?>&TargetRole=Admin">Admin</a>
                        <a class="dropdown-item" href="../Handle/ChangeRoleProcess?UserName=<?php echo $row["UserName"] ?>&TargetRole=Lecturer">Lecturer</a>
                    <?php } ?>
                </div>
            </div>
        </td>
    </tr>
<?php $id++;
}
$connection->close(); ?>