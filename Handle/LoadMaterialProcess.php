<?php
require_once 'DataAccess.php';
$query = "SELECT * FROM material WHERE ClassworkID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $ClassworkID);
$stmt->execute();
$resultMaterial = $stmt->get_result(); ?>
<?php if ($resultMaterial->num_rows > 0) { ?>
    <?php
    while ($rowMaterial = $resultMaterial->fetch_assoc()) {
    ?>

        <div class="d-inline-block">
            <!-- <iframe src="http://docs.google.com/gview?url=<?php //echo $rowDocument["FileSrc"] 
                                                                ?>&embedded=true" frameborder="0"></iframe> -->
            <embed scrolling="no" src="<?php echo $rowMaterial["MaterialSrc"] ?>" class="mr-4 ml-4 mt-2" width="160.5px" height="130px"></embed><br>
            <a class="ml-5 p-3" href="http://localhost/Final-Project/View/<?php echo $rowMaterial["MaterialSrc"] ?>" download="<?php echo $rowMaterial["FileName"] ?>">Download</a>
        </div>
    <?php } ?>
<?php } ?>