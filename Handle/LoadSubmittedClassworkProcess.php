<?php
require_once 'DataAccess.php';
$query = "SELECT * FROM assignment WHERE ClassworkID = ? AND UserName = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("is", $ClassworkID, $UserName);
$stmt->execute();
$resultAssignment = $stmt->get_result(); ?>
<?php if ($resultAssignment->num_rows > 0) { ?>
    <?php
    while ($rowAssignment = $resultAssignment->fetch_assoc()) {
    ?>
        <div class="d-inline-block">
            <!-- <iframe src="http://docs.google.com/gview?url=<?php //echo $rowDocument["FileSrc"] 
                                                                ?>&embedded=true" frameborder="0"></iframe> -->
            <embed scrolling="no" class="border border-dark rounded" src="<?php echo $rowAssignment["AssignmentSrc"] ?>" class="mr-4 ml-4" width="300" height="70px"></embed>
        </div>
    <?php } ?>
<?php } ?>