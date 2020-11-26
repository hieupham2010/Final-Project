<?php
require 'DataAccess.php';
require 'GetExtension.php';
$query = "SELECT * FROM material WHERE ClassworkID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $ClassworkID);
$stmt->execute();
$resultMaterial = $stmt->get_result(); ?>
<?php if ($resultMaterial->num_rows > 0) { ?>
    <?php
    while ($rowMaterial = $resultMaterial->fetch_assoc()) {
    ?>
        <div class="d-inline-block text-center text-truncate content-attach m-4">
            <a href="http://localhost/Final-Project/View/<?php echo $rowMaterial["MaterialSrc"] ?>" download="<?php echo $rowMaterial["FileName"] ?>">
                <?php echo getExtension($rowMaterial["MaterialSrc"]) ?>
                <br>
                <?php echo $rowMaterial["FileName"] ?>
            </a>
        </div>
    <?php } ?>
<?php }
$connection->close(); ?>