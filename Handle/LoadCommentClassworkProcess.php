<?php
require 'DataAccess.php';
$query = "SELECT * FROM classworkcomment WHERE ClassworkID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $ClassworkID);
$stmt->execute();
$resultComment = $stmt->get_result(); ?>
<?php if ($resultComment->num_rows > 0) { ?>
    <div class="ContainHideComment">
        <span class="CommentHide ml-4"><?php echo $resultComment->num_rows ?> Class comments</span>
    </div>
<?php } else { ?>
    <span class="ml-4">Class comments</span>
<?php } ?>
<div class="Comment ml-3">
    <?php $id = 0;
    while ($rowComment = $resultComment->fetch_assoc()) {

        require '../View/DialogDeleteClassworkComment.php';
        require '../View/DialogUpdateClassworkComment.php';
        $query = "SELECT AvatarSrc FROM accounts WHERE UserName = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $rowComment["UserName"]);
        $stmt->execute();
        $resultAvatarSrcComment = $stmt->get_result();
        $rowAvatarSrcComment = $resultAvatarSrcComment->fetch_assoc();
        $query = "SELECT FullName FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $rowComment["UserName"]);
        $stmt->execute();
        $resultFullNameComment = $stmt->get_result();
        $rowFullNameComment = $resultFullNameComment->fetch_assoc();
    ?>
        <div class="post-comments mb-2 mt-3">
            <img src="<?php echo $rowAvatarSrcComment["AvatarSrc"] ?>" class="avatar rounded-circle" width="30" height="30" aria-hidden="true">
            <span><?php echo $rowFullNameComment["FullName"] ?></span>
            <span class="meta small font-italic">(Commented: <?php echo $rowComment["Time"] ?>)</span>
            <?php if ($AccountType == 0 || $AccountType == 1 || $UserName == $rowComment["UserName"]) { ?>
                <a class="dropdown-toggle mt-2 float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-three-dots-vertical float-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info active-none text-left" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" data-toggle="modal" data-target="#UpdateClassworkComment<?php echo $id ?>">Edit</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#DeleteClassworkComment<?php echo $id ?>">Remove</a>
                </div>
            <?php } ?>
            <div class="post-comments ml-5 text-break">
                <p><?php echo $rowComment["Message"] ?></p>
            </div>
        </div>
    <?php $id++;
    } $connection->close();?>
</div>
