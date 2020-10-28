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
<<<<<<< HEAD
					<a class="nav-link active" href="#home" data-toggle="tab">Class</a>
=======
					<a class="nav-link active" href="#Class">Class</a>
>>>>>>> d396ef25f2c90e0e843b65715f300a9265a3ae59
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
															<div id="share-idea" class="  shadow mt-5 rounded f-flex justify-content-left p-4 " data-toggle="collapse">
																<img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="40" height="40" aria-hidden="true">
																Share your idea
															</div>
															<!--Post area-->

															<div class="collapse" id="collapseShow">
																<div class="card-post card-body">
																	<div class="md-form">
																		<form action="../Handle/CreateCommentProcess" method="POST" enctype="multipart/form-data">
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
													<div>
														<div class="shadow  rounded f-flex justify-content-left p-5 border">

															<div class="">
																<img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="40" height="40" aria-hidden="true">
																<span class="meta">Dec 19, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></span>
															</div>
															<hr>
															<div class="post-comments">
																<p>
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																	Etiam a sapien odio, sit amet
																</p>


															</div>
															<hr>
															<div class="rounded f-flex justify-content-left">
																<form class="form-control-lg">
																	<div class="input-group mb-3">
																		<div class="input-group-prepend">
																			<span class="avt-group-text mr-2 mt-0" id="basic-addon1"><img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="35" height="35" aria-hidden="true"></span>
																		</div>
																		<input type="text" class="form-control mt-0 rounded-pill mr-2" rows="3" placeholder="..." aria-describedby="basic-addon1">
																		<button class="btn btn-outline-secondary form-control-md mt-0 rounded-pill" type="button">Comment</button></input>
																	</div>
																</form>
															</div>
														</div>


													</div>

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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="style/style.css">
		<script type="text/javascript" src="main.js"></script>
</body>

</html>