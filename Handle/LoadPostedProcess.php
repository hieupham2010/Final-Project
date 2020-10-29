<?php
require_once 'DataAccess.php';
require_once 'EncryptClassCode.php';
$query = "SELECT * FROM post WHERE ClassID = ? ORDER BY PostID DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $ClassID);
$stmt->execute();
$result = $stmt->get_result();
$id = 0;
while ($row = $result->fetch_assoc()) {
    $query = "SELECT FullName FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $row["UserName"]);
    $stmt->execute();
    $result1 = $stmt->get_result();
    $row1 = $result1->fetch_assoc();

    $query = "SELECT AvatarSrc FROM accounts WHERE UserName = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $row["UserName"]);
    $stmt->execute();
    $result2 = $stmt->get_result();
    $row2 = $result2->fetch_assoc();

?>
    <div>
        <div class="shadow  rounded f-flex justify-content-left p-5 border">

            <div class="">
                <img src="<?php echo $row2["AvatarSrc"] ?>" class="avatar rounded-circle" alt="" width="50" height="50" aria-hidden="true">
                <span class="meta"><?php echo $row1["FullName"] ?></span>
                <span class="meta small font-italic">(Posted: <?php echo $row["Time"] ?>)</span>
            </div>
            <hr>
            <div class="post-comments">
                <p><?php echo $row["Message"] ?></p>
            </div>
            <hr>
            <?php
            $query = "SELECT * FROM comments WHERE PostID = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $row["PostID"]);
            $stmt->execute();
            $result3 = $stmt->get_result(); ?>
            <?php if ($result3->num_rows > 0) { ?>
                <div class="ContainHideComment">
                    <span class="CommentHide<?php echo $id ?> ml-4"><?php echo $result3->num_rows ?> class comments</span>
                </div>

            <?php } ?>
            <div class="Comment<?php echo $id ?>">
                <?php while ($row3 = $result3->fetch_assoc()) {
                    $query = "SELECT AvatarSrc FROM accounts WHERE UserName = ?";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $row3["UserName"]);
                    $stmt->execute();
                    $result4 = $stmt->get_result();
                    $row4 = $result4->fetch_assoc();
                    $query = "SELECT FullName FROM users WHERE UserID = (SELECT UserID FROM accounts WHERE UserName = ?)";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $row3["UserName"]);
                    $stmt->execute();
                    $result5 = $stmt->get_result();
                    $row5 = $result5->fetch_assoc();
                ?>
                    <div class="post-comments ml-3 mb-2 mt-3">
                        <img src="<?php echo $row4["AvatarSrc"] ?>" class="avatar rounded-circle" width="30" height="30" aria-hidden="true">
                        <span><?php echo $row5["FullName"] ?></span>
                        <span class="meta small font-italic">(Commented: <?php echo $row3["Time"] ?>)</span>
                        <div class="post-comments ml-5">
                            <p><?php echo $row3["Message"] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="rounded f-flex justify-content-left mt-3">
                <form class="form-control-lg" action="../Handle/CreateCommentProcess" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="<?php echo $AvatarSrc ?>" class="avatar rounded-circle" alt="" width="30" height="30" aria-hidden="true"></span>
                        </div>
                        <input type="hidden" name="ClassID" value="<?php echo encryptClassCode($ClassID) ?>">
                        <input type="hidden" name="PostID" value="<?php echo $row["PostID"] ?>">
                        <input type="text" class="form-control mt-0 rounded-pill mr-2" name="txtComment" rows="3" placeholder=". . ." aria-describedby="basic-addon1">
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