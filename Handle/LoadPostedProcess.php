<?php
require_once 'DataAccess.php';
$query = "SELECT * FROM post WHERE ClassID = ? ORDER BY PostID DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $ClassID);
$stmt->execute();
$result = $stmt->get_result();

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
                <img src="<?php echo $row2["AvatarSrc"] ?>" class="avatar rounded-circle" alt="" width="40" height="40" aria-hidden="true">
                <span class="meta"><?php echo $row1["FullName"] ?></span>
                <span class="meta small font-italic">(Posted: <?php echo $row["Time"] ?>)</span>
            </div>
            <hr>
            <div class="post-comments">
                <p><?php echo $row["Message"] ?></p>
            </div>
            <hr>
            <div class="rounded f-flex justify-content-left">
                <form class="form-control-lg">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="35" height="35" aria-hidden="true"></span>
                        </div>
                        <input type="text" class="form-control mt-0 rounded-pill mr-2" rows="3" placeholder=". . ." aria-describedby="basic-addon1">
                        <button class="btn btn-outline-secondary form-control-md mt-0 rounded-pill" type="button">Comment</button></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>