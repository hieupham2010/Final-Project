<?php
require '../Handle/ConfirmLogged.php';
require '../Handle/ClassInfoProcess.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/style.css">
	<title>Class</title>
</head>
<style>
	@media all and (max-width: 768px) {
		#collapseShow {
			display: none;
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
									<div class="jumbotron  border border-info shadow pt-4 pb-4 text-break ">
										<h1 class="text-truncate"><?php echo $ClassName ?></h1>
										<?php require '../Handle/AccountRole.php' ?>
										<hr class="my-4">
										<?php if ($AccountType == 0 || $AccountType == 1) { ?>
											<p class="lead font-italic"><span class="font-weight-bold">Class Code</span> <?php echo $ClassID ?></p>
											<p class="lead font-italic"><span class="font-weight-bold">Subject</span> <?php echo $SubjectName ?></p>
											<p class="lead font-italic"><span class="font-weight-bold">Room</span> <?php echo $Room ?></p>
										<?php } else { ?>
											<p class="lead font-italic"><span class="font-weight-bold">Subject</span> <?php echo $SubjectName ?></p>
											<p class="lead font-italic"><span class="font-weight-bold">Room</span> <?php echo $Room ?></p>
											<p class="invisible" class="lead font-italic"><span class="font-weight-bold">Class Code</p>
										<?php } ?>
									</div>
									<!--jumbotron-->

									<!--Display post area-->
									<div class="container rounded p-2 ">
										<div class="row">

											<div class="col-md-12">
												<!--Comment area-->
												<div class="blog-comment relative ">

													<ul class="comments list-unstyled  h-100">
														<li class="cmt-detail shadow rounded h-100">
															<div id="share-idea" class="share-idea  shadow mt-5 rounded f-flex justify-content-center p-4" data-toggle="collapse">
																<img src="<?php echo $AvatarSrc ?>" class="avatar rounded-circle" alt="" width="50px" height="50px" aria-hidden="true">
																Share your opinion
															</div>
															<!--Post area-->
															<div class="collapse" id="collapseShow">
																<div class="card-post card-body">
																	<div class="md-form">
																		<form action="../Handle/CreatePostProcess" method="POST" enctype="multipart/form-data">
																			<textarea class="md-textarea form-control" required placeholder="Share your opinion" name="txtPost" rows="3"></textarea>
																			<div class="input-group mt-2">

																				<div class="custom-file">
																					<input type="hidden" name="encryptCode" value="<?php echo $encryptCode ?>">
																					<input type="file" class="custom-file-input" id="customFile" name="fileUpload[]" id="inputGroupFile02" multiple />
																					<label class="custom-file-label text-truncate" for="customFile">Choose file</label>
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

				<?php include 'DialogCreateClasswork.php'; ?>
				<div id="ClassWork" class="container tab-pane fade">

					<div class="faqs-page block col-md-12 mt-5">
						<!--Dialog Assignment-->
						<?php if ($AccountType == 0 || $AccountType == 1) { ?>
							<div class="mr-5 text-right">
								<button class="btn btn-secondary-outline btn-primary rounded-pill" type="button" data-target="#CreateClasswork" data-toggle="modal">Create Classwork<span class="caret"></span></button>
							</div>
						<?php } ?>
						<!--Dialog Assignment-->
						<ul class="list-unstyled p-2">
							<?php include '../Handle/LoadClassworkProcess.php' ?>
						</ul>
					</div>

				</div>

				<div id="People" class="container tab-pane fade">

					<div class="col-12 People-Card-List mt-5">

						<ul class="list-group list-unstyled">
							<?php include 'DialogInvitePeople.php' ?>
							<h2 class="people-type">
								Teachers
								<!-- Add people-->
								<a class="btn btn-link float-right p-1 " type="button" data-toggle="modal" data-target="#InvitePeople">
									<svg class="" width="2em" height="2em" viewBox="0 0 20 20" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
									</svg>
								</a>
							</h2>
							<?php include '../Handle/LoadLecturerClassProcess.php' ?>
						</ul>
						<ul class="list-group list-unstyled">
							<div class="people-type pb-1 mt-3">
								<h2 class="d-inline">
									Students
									<!-- Add people-->
									<?php include '../Handle/CountStudent.php' ?>
									<h6 class="float-right mb-0 mt-3"><?php echo $NumStudent ?> Students</h6>
								</h2>

							</div>
							<?php include '../Handle/LoadClassMembersProcess.php' ?>
						</ul>

					</div>
				</div>
			</div>
			<!--body left-->
		</div>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="style/style.css">
		<script type="text/javascript" src="javascript/main.js"></script>
	</div>
</body>

</html>
<?php
include '../DialogMessage.php';
if (isset($_GET["msg"])) {
	echo "<script>$('#Message').modal({show: true})</script>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>