<?php
require_once 'DataAccess.php';
require 'GetExtension.php';
$query = "SELECT * FROM assignment WHERE ClassworkID = ? AND UserName = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("is", $ClassworkID, $UserName);
$stmt->execute();
$resultAssignment = $stmt->get_result(); ?>
<?php if ($resultAssignment->num_rows > 0) { ?>
    <?php
    while ($rowAssignment = $resultAssignment->fetch_assoc()) {
    ?>
        <div class="submit-file text-left mt-3">
            <div class="d-block text-truncate text-primary ">
                <a href="http://localhost/Final-Project/View/<?php echo $rowAssignment["AssignmentSrc"] ?>" download="<?php echo $rowAssignment["FileName"] ?>">
                    <?php echo getExtension($rowAssignment["AssignmentSrc"]) ?>
                    <?php echo $rowAssignment["FileName"] ?>
                </a>
            </div>
        </div>

    <?php } ?>
<?php } ?>