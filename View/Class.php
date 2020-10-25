<?php require '../Handle/ConfirmLogged.php' ?>
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
</style>

<body>

	<div class="container-fluid">

		<?php include 'Header.php' ?>

		<div class="container">

			<!--inside navbar-->
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a class="nav-link active" href="#home">Class</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#menu1">Class Work</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#menu2">People</a>
				</li>
			</ul>

			<!--inside navbar-->

			<!-- Tab panes -->
			<div class="tab-content">
				<div id="home" class="container tab-pane active">
					<div class="container-fluid mt-5">
						<div class="row">
							<!--body main-->
							<div class="col col-12 ">
								<main role="main" class="container">
									<!--jumbotron-->
									<div class="jumbotron  border border-info shadow">
										<h1>Class title</h1>
										<hr class="my-4">
										<a>
											<p class="lead">Some link teacher post</p>
										</a>
									</div>
									<!--jumbotron-->



									<!--Display post area-->

									<div class="container ">
										<div class="row">
											<div class="col-sm-3  shadow">
												<!-- Sidebar -->
												<aside class="border rounded-lg mt-4 justify-content-left ">
													<h1>Class Work</h1>
													<ul class="list-unstyled ml-4">
														<li><a>Class Work 1</a></li>
														<li><a>Class Work 1</a></li>
														<li><a>Class Work 1</a></li>
														<li><a>Class Work 1</a></li>
													</ul>
												</aside>
											</div>


											<div class="col-sm-9">

												<!--Post area-->
												<div class="Comment-Area .bg-white shadow rounded-lg ">
													<form class="PostForm .bg-white">
														<div class="form-group">
															<input class="form-control input-lg" type="text" name="comment" class="form-control" placeholder="Share your ideas"></input>
														</div>

														<span><input type="file" class="form-control-file w-25" id="chooseFile" style="float: left;"></span>
														<span><input type="submit" class="form-control-file btn btn-info w-25" style="float: right;"></span>

													</form>
												</div>
												<!-- End  Post area-->

												<!--Comment area-->
												<div class="blog-comment shadow ">
													<hr />
													<ul class="comments list-unstyled d-flex justify-content-center rounded">
														<li class="clearfix">
															<img src="images/avatarUploads/DefaultAvatar.png" class="avatar" alt="" width="40" height="40">
															<div class="post-comments">
																<p class="meta">Dec 19, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
																<p>
																	Lorem ipsum dolor sit amet, consectetur adipiscing elit.
																	Etiam a sapien odio, sit amet
																</p>
															</div>

														</li>
													</ul>
												</div>
												<!--Comment area-->
											</div>

										</div>
									</div>
									<!-- End Display post area-->
								</main>
							</div>

						</div>
					</div>
				</div>
				<div id="menu1" class="container tab-pane fade">
					<h3>Menu 1</h3>
				</div>
				<div id="menu2" class="container tab-pane fade">
					<h3>Menu 2</h3>
				</div>
			</div>




			<!--body left-->

		</div>
	</div>
</body>

</html>