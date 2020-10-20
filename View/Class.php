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
	<script src="main.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Class</title>
</head>

<style>


</style>

<body>

	<div class="container-fluid">

		<?php include 'Header.php' ?>

		<!--body left-->
		<div class="container-fluid mt-5">
			<div class="row">
				<div class="col col-2">
					<div class="d-flex" id="wrapper">

						<!-- Sidebar -->
						<div class="bg-light border-right" id="sidebar-wrapper">
							<div class="sidebar-heading">Start Bootstrap </div>
							<div class="list-group list-group-flush">
								<a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
								<a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
								<a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
								<a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
								<a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
								<a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
							</div>
						</div>
					</div>
				</div>


				<!--body main-->
				<div class="col col-10 ">
					<main role="main" class="container">
						<div class="jumbotron  border border-info">
							<h1>Class title</h1>
							<hr class="my-4">
							<a>
								<p class="lead">Some link teacher post</p>
							</a>
						</div>


						<!--Post area-->
						<div class="Comment-Area .bg-white">
							<form class="PostForm .bg-white">
								<div class="form-group">
									<textarea name="comment" class="form-control" rows="3" placeholder="Share your ideas"></textarea>
								</div>
								<div class="">
									<span><input type="file" class="form-control-file" id="chooseFile" style="float: left;"></span>
									<span><input type="submit" class="btn btn-info ml-auto" style="float: right;"></span>
								</div>
							</form>
						</div>
						<!-- End  Post area-->

						<!--Display post area-->
						<div>

							<!--Hiển thị nội dung ở đây -->


							<div class="container bootstrap snippets bootdey">
								<div class="row">
									<div class="col-md-12">
										<div class="blog-comment">
											<hr />
											<ul class="comments">
												<li class="clearfix">
													<img src="https://bootdey.com/img/Content/user_2.jpg" class="avatar" alt="">
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
									</div>
								</div>
							</div>

						</div>
						<!-- End Display post area-->
					</main>
				</div>

			</div>
		</div>


</body>

</html>