<?php
require_once 'DataAccess.php';
require_once 'EncryptClassCode.php';
require 'GetExtension.php';
$query = "SELECT * FROM post WHERE ClassID = ? ORDER BY PostID DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $ClassID);
$stmt->execute();
$result = $stmt->get_result();
$id = 0;
while ($row = $result->fetch_assoc()) {
    require '../View/DialogUpdatePost.php';
    require '../View/DialogDeletePost.php';
    $query = "SELECT FullName FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $row["UserName"]);
    $stmt->execute();
    $resultFullName = $stmt->get_result();
    $rowFullName = $resultFullName->fetch_assoc();

    $query = "SELECT AvatarSrc FROM accounts WHERE UserName = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $row["UserName"]);
    $stmt->execute();
    $resultAvatarSrc = $stmt->get_result();
    $rowAvatarSrc = $resultAvatarSrc->fetch_assoc();
?>
    <div>
        <div class="shadow rounded f-flex justify-content-left p-5 border">
            <div class="">
                <div class="mb-2">
                    <?php if ($AccountType == 0 || $AccountType == 1 || $UserName == $row["UserName"]) { ?>
                        <a class="dropdown-toggle mb-5 float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info active-none text-left" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" data-toggle="modal" data-target="#UpdatePost<?php echo $id ?>">Update</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#DeletePost<?php echo $id ?>">Delete</a>
                        </div>
                    <?php } ?>
                    <img src="<?php echo $rowAvatarSrc["AvatarSrc"] ?>" class="avatar rounded-circle" alt="" width="50" height="50" aria-hidden="true">
                    <span class="meta"><?php echo $rowFullName["FullName"] ?></span>
                    <span class="meta small font-italic">(Posted: <?php echo $row["Time"] ?>)</span>
                </div>
            </div>
            <hr>
            <div class="post-comments">
                <p class="text-break"><?php echo $row["Message"] ?></p>
                <?php
                $query = "SELECT * FROM documents WHERE PostID = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $row["PostID"]);
                $stmt->execute();
                $resultDocument = $stmt->get_result(); ?>
                <?php if ($resultDocument->num_rows > 0) { ?>

                    <?php
                    while ($rowDocument = $resultDocument->fetch_assoc()) {
                    ?>
                        <div class="d-inline-block text-center text-truncate content-attach m-4">
                            <a href="http://localhost/Final-Project/View/<?php echo $rowDocument["FileSrc"] ?>" download="<?php echo $rowDocument["FileName"] ?>">
                                <?php echo getExtension($rowDocument["FileSrc"]) ?>
                                <br>
                                <?php echo $rowDocument["FileName"] ?>
                            </a>
                        </div>
                    <?php } ?>

                <?php } ?>
            </div>
            <hr>
            <?php
            $query = "SELECT * FROM comments WHERE PostID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $row["PostID"]);
            $stmt->execute();
            $resultComment = $stmt->get_result(); ?>
            <?php if ($resultComment->num_rows > 0) { ?>
                <div class="ContainHideComment">
                    <span class="CommentHide<?php echo $id ?> ml-4"><?php echo $resultComment->num_rows ?> Class comments</span>
                </div>
            <?php } else { ?>
                <span class="ml-4">Class comments</span>
            <?php } ?>
            <div class="Comment<?php echo $id ?> ml-3">

                <?php $idComment = 0;
                while ($rowComment = $resultComment->fetch_assoc()) {

                    require '../View/DialogDeleteComment.php';
                    require '../View/DialogUpdateComment.php';
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
                                <a class="dropdown-item" data-toggle="modal" data-target="#UpdateComment<?php echo $idComment ?>">Edit</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#DeleteComment<?php echo $idComment ?>">Remove</a>
                            </div>
                        <?php } ?>
                        <div class="post-comments ml-5 text-break">
                            <p><?php echo $rowComment["Message"] ?></p>
                        </div>
                    </div>
                <?php $idComment++;
                } ?>
            </div>
            <div class="rounded f-flex justify-content-left mt-3">
                <form class="form-control-lg" action="../Handle/CreateCommentProcess" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="<?php echo $AvatarSrc ?>" class="avatar rounded-circle" alt="" width="30" height="30" aria-hidden="true"></span>
                        </div>
                        <input type="hidden" name="ClassID" value="<?php echo encryptClassCode($ClassID) ?>">
                        <input type="hidden" name="PostID" value="<?php echo $row["PostID"] ?>">
                        <input type="text" class="form-control mt-0 rounded-pill mr-2" name="txtComment" placeholder="Comment" rows="3" aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary form-control-md mt-0 rounded-pill" type="submit">Comment</button></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo
        '<script>
        $(document).ready(function() {
        $(".Comment' . $id . '").hide();
        $(".CommentHide' . $id . '").click(function() {
            $(".Comment' . $id . '").toggle(300);
        });
        });
        </script>' ?>

<?php $id++;
} ?>