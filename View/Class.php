<?php
require '../Handle/ConfirmLogged.php';
require '../Handle/ClassInfoProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="javascript/main.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Class</title>

	<script>
		$(document).ready(function() {
			$(".nav-tabs a").click(function() {
				$(this).tab('show');
			});
		});
	</script>
</head>
<style>
	.assignment-card {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-color: #fff;
		background-clip: border-box;
		border: 1px solid #00000020;
		border-radius: 0.5rem;

	}
</style>

<body>

	<div class="container-fluid">

		<?php include 'Header.php' ?>

		<div class="container ">

			<!--inside navbar-->
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a class="nav-link active" href="#Class">Class</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#ClassWork">Class Work</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#People">People</a>
				</li>
			</ul>

			<!--inside navbar-->

			<!-- Tab panes -->
			<div class="tab-content ">
				<div id="Class" class="container tab-pane active">
					<div class="container-fluid mt-5">
						<div class="row ">
							<!--body main-->
							<div class="col col-12 ">
								<main role="main" class="container">
									<!--jumbotron-->
									<div class="jumbotron border border-info shadow pt-4 pb-4">
										<h1><?php echo $ClassName ?></h1>
										<?php require '../Handle/AccountRole.php' ?>
										<hr class="my-4">
										<?php if ($AccountType == 0 || $AccountType == 1) { ?>
											<p class="lead font-italic"><span class="font-weight-bold">Class Code</span> <?php echo $ClassID ?></p>
											<p class="lead font-italic"><span class="font-weight-bold">Subject</span> <?php echo $SubjectName ?></p>
											<p class="lead font-italic"><span class="font-weight-bold">Room</span> <?php echo $Room ?></p>
										<?php } else { ?>
											<p class="lead font-italic"><span class="font-weight-bold">Subject</span> <?php echo $SubjectName ?></p>
											<p class="lead font-italic"><span class="font-weight-bold">Room</span> <?php echo $Room ?></p>
										<?php } ?>
									</div>
									<!--jumbotron-->

									<!--Display post area-->

									<div class="container  rounded p-2 ">
										<div class="row p-2">
											<div class="col-sm-3 mt-4">
												<!-- Sidebar -->
												<aside class="border rounded-lg mt-4 justify-content-left p-2 shadow">
													<h2>Class Work</h2>
													<ul class="list-unstyled ml-4">
														<li><a>Class Work 1</a></li>
														<li><a>Class Work 1</a></li>
														<li><a>Class Work 1</a></li>
														<li><a>Class Work 1</a></li>
													</ul>
												</aside>
											</div>

											<div class="col-sm-9">
												<!--Comment area-->
												<div class="blog-comment h-50 relative ">

													<ul class="comments list-unstyled  ">
														<li class="cmt-detail shadow rounded h-75 ">
															<div id="share-idea" class="share-idea  shadow mt-5 rounded f-flex justify-content-left p-4 ">
																<img src="<?php echo $AvatarSrc ?>" class="avatar rounded-circle" alt="" width="40" height="40" aria-hidden="true">
																Share your idea
															</div>
															<!--Post area-->

															<div class="collapse" id="collapseShow">
																<div class="card-post card-body">
																	<div class="md-form">
																		<form action="../Handle/CreatePostProcess" method="POST" enctype="multipart/form-data">
																			<textarea class="md-textarea form-control" name="txtComment" rows="3" placeholder=". . ."></textarea>
																			<div class="input-group mt-2">
																				<div class="custom-file">
																					<input type="hidden" name="encryptCode" value="<?php echo $encryptCode ?>">
																					<input type="file" class="custom-file-input" id="inputGroupFile04" name="fileUpload">
																					<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
																				</div>
																				<div class="input-group-append">
																					<button type="reset" class="btn btn-outline-secondary" id="cancel">Cancel</button>
																				</div>

																				<div class="input-group-append">
																					<button class="btn btn-outline-secondary" type="submit">Post</button>
																				</div>
																			</div>
																		</form>

																	</div>
																</div>
															</div>
															<!-- End Post area-->
														</li>
													</ul>
													<?php include '../Handle/LoadPostedProcess.php' ?>
													<!--Comment area-->
												</div>
											</div>
											<!-- End Display post area-->
										</div>
									</div>
								</main>
							</div>

						</div>
					</div>
				</div>


				<div id="ClassWork" class="container tab-pane fade">
					<div class="faqs-page block col-md-12 mt-5">
						<ul class="list-unstyled p-2">
							<li class="p-5">
								<div class="panel-group shadow-sm h-100 border p-2 rounded-sm" id="accordion2" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default ">
										<div class="mt-2">
											<a role="button" class="item-question collapsed text-decoration-none  text-dark font-weight-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
												<h5 class="d-block">SomeThing teacher post</h5>
											</a>

										</div>

										<hr>
										<div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
											<div class="panel-body border-bottom">
												<p>
													Detail assingments
													Detail assingments
													Detail assingments
													Detail assingments
													Detail assingmentsDetail assingmentsDetail assingmentsDetail assingmentsDetail assingmentsDetail assingmentsDetail assingments
												</p>
											</div class="panel-body border">
											<div class="p-3 mt-2">
												<a href="DetailClassWorks.php" class="text-decoration-none text-dark mt-3 font-weight-bold">View full assignment details</a>
											</div>
										</div>

									</div>
								</div>
							</li>
						</ul>

					</div>

				</div>

				<div id="People" class="container tab-pane fade">
					<div class="col-12 People-Card-List mt-5">
						<ul class="list-group list-unstyled">
							<h2 class="people-type">
								Teachers
							</h2>
							<li class="List-Teahcer p-3 border-bottom">
								<div>
									<img id="teacher-1" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
									<label for="teacher-1">Teacher 1</label>
								</div>
							</li>
						</ul>
						<ul class="list-group list-unstyled ">
							<h2 class="people-type">Students</h2>
							<li class="List-Student p-3 border-bottom">
								<div>
									<img id="student-1" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
									<label for="student-1">Student 1</label>

								</div>

							</li>
							<li class="List-Student p-3 border-bottom">

								<div>
									<img id="student-2" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
									<label for="student-2">Student 2</label>

								</div>

							</li>
							<li class="List-Student p-3 border-bottom">

								<div>
									<img id="student-3" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
									<label for="student-3">Student 3</label>

								</div>

							</li>
							<li class="List-Student p-3 border-bottom">
								<div>
									<img id="student-4" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
									<label for="student-4">Student 4</label>

								</div>
							</li>
						</ul>

					</div>
				</div>
			</div>
			<!--body left-->

		</div>
		<script>
			var dt = new Date();
			//document.getElementById("datetime").innerHTML = dt.toLocaleString();
			//document.getElementById("due-datetime").innerHTML = dt.toLocaleString();
			var x = document.getElementById("share-idea");




			$("#share-idea").click(function() {
				$("#share-idea").hide("slow", function() {});
				$("#collapseShow").show("slow", function() {
					// Animation complete.
				});


			});
			$("#cancel").click(function() {
				$("#collapseShow").hide("slow", function() {});
				$("#share-idea").show("slow", function() {
					document.getElementById("share-idea").style.display = "block";

				});
			});
		</script>

</body>

</html>
<?php
include '../DialogMessage.php';
if (isset($_GET["msg"])) {
	echo "<script>$('#Message').modal({show: true})</script>";
}
?>