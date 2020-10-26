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
	.nav-link {
		border: none !important;
		border-bottom: none !important;
	}

	.People-Card-List {
		width: 200%;
	}

	.people-type {
		border-bottom: 1px solid #5086de;
	}

	.list-group {
		margin-top: 32px;
	}

	.nav-link:active {
		border-bottom: 1px solid #5086de;
	}

	.card-post {
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

	#share-idea {
		cursor: pointer;
	}


	@media only screen and (max-width: 1100px),
	(min-device-width: 976px) and (max-device-width: 750px) {


		aside {
			display: inline-block;
		}
	}
</style>

<body>

	<div class="container-fluid">

		<?php include 'Header.php' ?>

		<div class="container ">

			<!--inside navbar-->
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a class="nav-link active" href="#home">Class</a>
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
				<div id="home" class="container tab-pane active">
					<div class="container-fluid mt-5">
						<div class="row ">
							<!--body main-->
							<div class="col col-12 ">
								<main role="main" class="container">
									<!--jumbotron-->
									<div class="jumbotron  border border-info shadow">
										<h1><?php echo $ClassName ?></h1>
										<hr class="my-4">
										<p class="lead font-italic"><span class="font-weight-bold">Subject</span> <?php echo $SubjectName ?></p>
										<p class="lead font-italic"><span class="font-weight-bold">Room</span> <?php echo $Room ?></p>
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
												<div class="blog-comment h-50 relative">

													<ul class="comments list-unstyled  ">
														<li class="cmt-detail shadow rounded h-75 ">
															<div id="share-idea" class="shadow mt-5 rounded f-flex justify-content-left p-4 ">
																<img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="40" height="40" aria-hidden="true">
																Share your idea
															</div>
															<!--Post area-->

															<div class="collapse" id="collapseShow">
																<div class="card-post card-body">
																	<div class="md-form">
																		<textarea class="md-textarea form-control" rows="3" value="...">....</textarea>
																		<div class="input-group mt-2">
																			<div class="custom-file">
																				<input type="file" class="custom-file-input" id="inputGroupFile04">
																				<label class="custom-file-label" for="inputGroupFile04">Choose file</label>
																			</div>
																			<div class="input-group-append">
																				<button type="reset" class="btn btn-outline-secondary" id="cancel">Cancel</button>
																			</div>

																			<div class="input-group-append">
																				<button class="btn btn-outline-secondary" type="button">Post</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- End Post area-->
														</li>
													</ul>
													<div class="shadow mt-5 rounded f-flex justify-content-left p-3">
														<img src="images/avatarUploads/DefaultAvatar.png" class="avatar rounded-circle" alt="" width="40" height="40" aria-hidden="true">
														<span class="meta">Dec 19, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></span>
														<div class="post-comments">
															<p>
																Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																Etiam a sapien odio, sit amet
															</p>
														</div>
														<form action="">
															<div>
																<textarea class="sm-textarea form-control " rows="3" value="...">....</textarea>
															</div>
															<div class="mt-2 ml-auto">
																<button class="btn btn-outline-secondary" type="button">Comment</button>
															</div>
														</form>


													</div>

													<!--Comment area-->

												</div>

											</div>
											<!-- End Display post area-->
								</main>
							</div>

						</div>
					</div>
				</div>
				<div id="ClassWork" class="container tab-pane fade">
					<ul>
						<li>
							<!--Accordion wrapper-->
							<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

								<!-- Accordion card -->
								<div class="ClassWord-card shadow rounded">

									<!-- Card header -->
									<div class="card-header" role="tab" id="headingOne1">

										<div data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
											<h5 class="mb-0">
												ClassWork TitleadfClassWork TitleadfClassWork TitleadfClassWork TitleadfClassWork TitleadfClassWork TitleadfClassWork TitleadfClassWork TitleadfClassWork Titleadf
											</h5>
											Due Date/Time: <span id="due-datetime"></span>
										</div>

									</div>

									<!-- Card body -->
									<div id="collapseOne1" class="collapse show " role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
										<p>Date/Time: <span id="datetime"></span></p>
										<div class="card-body">

										</div>
									</div>

								</div>
								<!-- Accordion card -->

							</div>
							<!-- Accordion wrapper -->
						</li>


						<li>
							<!--Accordion wrapper-->
							<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

								<!-- Accordion card -->
								<div class="ClassWord-card shadow rounded">

									<!-- Card header -->
									<div class="card-header" role="tab" id="headingOne1">

										<div data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
											<h5 class="mb-0">
												ClassWork Title
											</h5>
											Due Date/Time: <span id="due-datetime"></span>
										</div>

									</div>

									<!-- Card body -->
									<div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
										<p>Date/Time: <span id="datetime"></span></p>
										<div class="card-body">

										</div>
										<div>
											<input type="text">
										</div>
									</div>

								</div>
								<!-- Accordion card -->

							</div>
							<!-- Accordion wrapper -->
						</li>
					</ul>

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
			document.getElementById("datetime").innerHTML = dt.toLocaleString();
			document.getElementById("due-datetime").innerHTML = dt.toLocaleString();
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