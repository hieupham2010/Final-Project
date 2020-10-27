<?php
require_once 'DataAccess.php';
$ciphering = "AES-128-CTR"; 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
$encryption_iv = '2010200978194772'; 
$encryption_key = "518H0501"; 
if(isset($_GET["key"]) && !empty($_GET["key"])) {
    $key = $_GET["key"];
    $query = "SELECT * FROM classrooms WHERE ClassID IN (SELECT ClassID FROM classmembers WHERE UserName = ?) 
    AND ClassName LIKE BINARY '%$key%' OR SubjectName LIKE BINARY '%$key%' OR Room LIKE BINARY '%$key%' 
    OR ClassName LIKE '%$key%' OR SubjectName LIKE '%$key%' OR Room LIKE '%$key%'";
}else {
    $query = "SELECT * FROM classrooms WHERE ClassID IN (SELECT ClassID FROM classmembers WHERE UserName = ?)";
}
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $UserName);
$stmt->execute();
$result = $stmt->get_result();
$id = 0;
while ($row = $result->fetch_assoc()) {
    require 'DialogDeleteClass.php';
    require 'DialogUpdateClass.php';
?>
    <li class="list-group-item border-0">
        <div class="card border-info rounded-lg">
            <img src="http://placehold.it/700x400" class="card-img-top" alt="...">
            <!--Class-->
            <div class="card-body">
                <h5 class="card-title">
                    <div>
                        <div>
                            <!-- dấu 3 chấm ở đây -->
                            <div class="dropdown-tdoc dropdown dropdown-menu-right" style="z-index: 1; position: absolute; top: 5px; right: 5px;">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="dropdown-svg" width="24px" height="24px" viewBox="0 0 24 24" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
                                    <?php if ($AccountType == 0) { ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#UpdateClass<?php echo $id ?>">Update Class</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#DeleteClass<?php echo $id ?>">Delete Class</a>
                                        <a class="dropdown-item" href="Class?id=<?php echo urlencode(openssl_encrypt($row["ClassID"], $ciphering, $encryption_key, $options, $encryption_iv));?>">Go To Class</a>
                                    <?php } else if ($AccountType == 1) { ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#UpdateClass<?php echo $id ?>">Update Class</a>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#DeleteClass<?php echo $id ?>">Delete Class</a>
                                        <a class="dropdown-item" href="Class?id=<?php echo urlencode(openssl_encrypt($row["ClassID"], $ciphering, $encryption_key, $options, $encryption_iv));?>">Go To Class</a>
                                    <?php } else { ?>
                                        <a class="dropdown-item" href="Class?id=<?php echo urlencode(openssl_encrypt($row["ClassID"], $ciphering, $encryption_key, $options, $encryption_iv));?>">Go To Class</a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- dấu 3 chấm ở đây -->
                        </div>
                        <div class="float-right ml-auto" id="backdrop" style="z-index: 1; position: absolute; right: 10px; top: 150px">
                            <img src="<?php echo $row["AvatarSrc"] ?>" alt="avatar" width="60" height="60" class="rounded-circle">
                        </div>
                        <a class="card-text mt-3" id="class" href="Class?id=<?php echo urlencode(openssl_encrypt($row["ClassID"], $ciphering, $encryption_key, $options, $encryption_iv));?>"><?php echo $row["ClassName"] ?></a>
                    </div>
                </h5>
                <p class="card-text"><?php echo $row["SubjectName"] ?>-<?php echo $row["Room"] ?></p>
            </div>
        </div>
    </li>
<?php $id++;
}  ?>