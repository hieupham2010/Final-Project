<?php
require_once 'DataAccess.php';
$query = "SELECT * FROM classwork WHERE ClassID = ? ORDER BY ClassworkID DESC";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $ClassID);
$stmt->execute();
$result = $stmt->get_result();
$id = 0;
while ($row = $result->fetch_assoc()) {
    require '../View/DialogDeleteClasswork.php';
    require '../View/DialogUpdateClasswork.php';
?>

    <li class="p-3">
        <div class="shadow p-3 bg-white rounded" id="accordion2" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default ">
                <div class="mt-2 ml-3 mr-3">
                    <div class="row">
                        <div class="col-11">
                            <a role="button" class="item-question bg-white pb-3 pt-3 collapsed text-decoration-none text-dark d-block" data-toggle="collapse" href="#collapse<?php echo $id ?>" aria-expanded="false" aria-controls="collapse1a">
                                <h5>
                                    <?php echo $row["Title"] ?>
                                </h5>
                                <span class="meta small font-italic">(Posted: <?php echo $row["Time"] ?>)</span>
                            </a>
                        </div>
                        <div class="col-1">
                            <div class="dropdown-tdoc dropdown dropdown-menu-right float-right mt-4">
                                <a class="dropdown-toggle mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-info active-none text-left" aria-labelledby="navbarDropdownMenuLink-4">
                                    <?php if ($AccountType == 0 || $AccountType == 1) { ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#DeleteClasswork<?php echo $id ?>">Delete Classwork</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#UpdateClasswork<?php echo $id ?>">Update Classwork</a>
                                        <a class="dropdown-item" href="../View/DetailClassworks?id=<?php echo urlencode($encryptCode) ?>&ClassworkID=<?php echo $row["ClassworkID"] ?>">View material</a>
                                    <?php } else { ?>
                                        <a class="dropdown-item" href="../View/DetailClassworks?id=<?php echo urlencode($encryptCode) ?>&ClassworkID=<?php echo $row["ClassworkID"] ?>">View material</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel">
                        <hr>
                        <div class="panel-body text-break">
                            <p><?php echo $row["Description"] ?></p>
                            <?php
                            $query = "SELECT * FROM material WHERE ClassworkID = ?";
                            $stmt = $connection->prepare($query);
                            $stmt->bind_param("i", $row["ClassworkID"]);
                            $stmt->execute();
                            $resultMaterial = $stmt->get_result();
                            ?>
                            <?php if ($resultMaterial->num_rows > 0) { ?>
                                <?php while ($rowMaterial = $resultMaterial->fetch_assoc()) { ?>
                                    <div class="d-inline-block">
                                        <!-- <iframe src="http://docs.google.com/gview?url=<?php //echo $rowDocument["FileSrc"] 
                                                                                            ?>&embedded=true" frameborder="0"></iframe> -->
                                        <embed scrolling="no" src="<?php echo $rowMaterial["MaterialSrc"] ?>" class="mr-4 ml-4 mt-2" width="160.5px" height="130px"></embed><br>
                                        <a class="ml-5 p-3" href="http://localhost/Final-Project/View/<?php echo $rowMaterial["MaterialSrc"] ?>" download="<?php echo $rowMaterial["FileName"] ?>">Download</a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="p-3 mt-2">
                            <a href="DetailClassWorks?id=<?php echo urlencode($encryptCode) ?>&ClassworkID=<?php echo $row["ClassworkID"] ?>" class="text-decoration-none text-muted mt-3 font-weight-bold">View material</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php $id++;
} ?>