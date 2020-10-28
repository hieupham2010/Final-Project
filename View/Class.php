<?php
require '../Handle/ConfirmLogged.php';
require '../Handle/ClassInfoProcess.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="javascript/main.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Class</title>
</head>

<body>

	<div class="container-fluid">

		<?php include 'Header.php' ?>

		<div class="container ">

			<!--inside navbar-->
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a class="nav-link active" href="#Class" data-toggle="tab">Class</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#ClassWork" data-toggle="tab">Class Work</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#People" data-toggle="tab">People</a>
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
															<div id="share-idea" class="share-idea  shadow mt-5 rounded f-flex justify-content-left p-4" data-toggle="collapse">
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
										<form action="">
											<div class="mt-2">
												<a role="button" class="item-question collapsed text-decoration-none  text-dark " data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
													<div class="form-group ">
														<h5 class="block">SomeThing teacher post
															<div class="dropdown-tdoc dropdown dropdown-menu-right float-right ">
																<a class="dropdown-toggle mb-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
																	</svg>
																</a>
																<div class="dropdown-menu dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
																	<a class="dropdown-item" data-toggle="dropdown">Delete ClassWork</a>
																	<a class="dropdown-item" data-toggle="dropdown">Report</a>
																	<a class="dropdown-item" data-toggle="dropdown">Coppy link</a>
																</div>
															</div>
														</h5>

													</div>
												</a>


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
														<a href="DetailClassWorks.php" class="text-decoration-none text-muted mt-3 font-weight-bold">View full assignment details</a>
													</div>
												</div>

											</div>
										</form>

									</div>
							</li>
						</ul>

					</div>

				</div>

				<div id="People" class="container tab-pane fade">

					<div class="col-12 People-Card-List mt-5">

						<!--Dialog Assignment-->
						<div class="dropdown">
							<button class="btn btn-secondary-outline dropdown-toggle  rounded-pill" type="button" data-toggle="dropdown">Add ClassWork
								<span class="caret"></span></button>
							<ul class="dropdown-menu list-unstyled 	text-left">
								<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#CrClassWork">Assignment</a></li>
								<li><a class="dropdown-item" href="#">Quiz</a></li>
							</ul>





						</div>
						<!--Dialog Assignment-->

						<ul class="list-group list-unstyled">

							<h2 class="people-type">
								Teachers
								<!-- Add people-->
								<a class="btn btn-link float-right p-1 " type="button" data-toggle="modal" data-target="#InviteStudent">
									<svg class="" width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
									</svg>
								</a>
							</h2>
							<li class="List-Teahcer p-3 border-bottom">
								<div>
									<ul class="list-unstyled">
										<li>
											<form action="">
												<div class="form-group">
													<img id="teacher-1" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
													<span class="">Teacher 1</span>


													<!-- 3 chấm teacher -->
													<div class="dropdown-tdoc dropdown dropdown-menu-right " style="z-index: 1; position: absolute; top: 150px; right: 30px;">
														<a class="dropdown-toggle bg-transparent  d-flex flex-wrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
															</svg>
														</a>
														<div class="dropdown-menu dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
															<a class="dropdown-item" data-toggle="dropdown">Remove people</a>
														</div>
													</div>
													<!-- 3 chấm teacher -->
												</div>


											</form>

										</li>
									</ul>




								</div>

							</li>
						</ul>
						<ul class="list-group list-unstyled ">
							<h2 class="people-type">Students
								<!-- Add people-->
								<a class="btn btn-link float-right p-1 " type="button" data-toggle="modal" data-target="#InviteStudent">
									<svg class="" width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
									</svg>
								</a></h2>
							<li class="List-Student p-3 border-bottom">

								<form action="">
									<div class="form-group">
										<img id="student-1" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
										<span>Student 1</span>
										<div class="dropdown-tdoc dropdown dropdown-menu-right float-right mt-2	">
											<a class="dropdown-toggle bg-transparent  d-flex flex-wrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
												<a class="dropdown-item" data-toggle="dropdown">Remove people</a>
											</div>
										</div>
									</div>
								</form>

							</li>
							<li class="List-Student p-3 border-bottom">

								<form action="">
									<div class="form-group">
										<img id="student-1" src="images/avatarUploads/DefaultAvatar.png" width="40" height="40" class="rounded-circle">
										<span>Student 1</span>
										<div class="dropdown-tdoc dropdown dropdown-menu-right float-right mt-2	">
											<a class="dropdown-toggle bg-transparent  d-flex flex-wrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-info active-none" aria-labelledby="navbarDropdownMenuLink-4">
												<a class="dropdown-item" data-toggle="dropdown">Remove people</a>
											</div>
										</div>
									</div>
								</form>

							</li>

						</ul>

					</div>
				</div>
			</div>
			<!--body left-->

		</div>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="style/style.css">
		<script type="text/javascript" src="main.js"></script>
</body>

</html>
<?php
include '../DialogMessage.php';
if (isset($_GET["msg"])) {
	echo "<script>$('#Message').modal({show: true})</script>";
}
?>