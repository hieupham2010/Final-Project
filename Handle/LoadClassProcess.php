<?php
require_once 'DataAccess.php';
$query = "SELECT * FROM classrooms WHERE ClassID IN (SELECT ClassID FROM classmembers WHERE UserName = ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $UserName);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
?>
    <li class="list-group-item border-0 ">
        <div class="card border-info">
            <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
            <!--Class-->
            <div class="card-body">
                <h5 class="card-title">
                    <a id="class" href="#"><?php echo $row["ClassName"] ?></a>
                </h5>
                <p class="card-text"><?php echo $row["SubjectName"] ?>-<?php echo $row["Room"] ?></p>
            </div>
        </div>
    </li>
<?php } ?>