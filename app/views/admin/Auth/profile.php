<?php include_once "./app/views/admin/Show/header.php"; ?>
<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Profile</h1>

					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="img/avatars/avatar-4.jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0"><?=$_SESSION['name']?></h5>
									<div class="text-muted mb-2">Admin</div>

									<div>
										<a class="btn btn-primary btn-sm" href="#">Follow</a>
										<a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
									</div>
								</div>
								<hr class="my-0" />
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">San Francisco, SA</a>
										</li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">GitHub</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Boston</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span class="fas fa-globe fa-fw me-1"></span> <a href="#">staciehall.co</a></li>
										<li class="mb-1"><span class="fab fa-twitter fa-fw me-1"></span> <a href="#">Twitter</a></li>
										<li class="mb-1"><span class="fab fa-facebook fa-fw me-1"></span> <a href="#">Facebook</a></li>
										<li class="mb-1"><span class="fab fa-instagram fa-fw me-1"></span> <a href="#">Instagram</a></li>
										<li class="mb-1"><span class="fab fa-linkedin fa-fw me-1"></span> <a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Thay đổi thông tin</h5>
								</div>
								<div class="card-body h-100">
									<div class="col-12 col-xl-16">
										<div class="card">
											<div class="card-body">
												<form action="" method="post" entype="multipart/form">
												<div class="mb-3">
														<label class="form-label">Tên</label>
														<input type="text" name="name" value="<?=$_SESSION['name']?>" class="form-control" placeholder="Email">
													</div>
													<div class="mb-3">
														<label class="form-label">Email</label>
														<input type="email" name="email" value="<?=$_SESSION['email']?>" class="form-control" placeholder="Email">
													</div>
													<div class="mb-3">
														<label class="form-label w-100">avatar</label>
														<input type="file">
														<small class="form-text text-muted">Vui lòng chọn ảnh có kích thước nhỏ !</small>
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<?php include_once "./app/views/admin/Show/footer.php"; ?>