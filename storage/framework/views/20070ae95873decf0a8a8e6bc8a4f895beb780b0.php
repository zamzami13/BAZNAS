<!doctype html>
<html lang="en" class="fullscreen-bg">
<style type="text/css">
	.putar {
	  display: inline-block;
	  background-color: #0074d9;
	  height: 100px;
	  width: 100px;
	  font-size: 1px;
	  padding: 1px;
	  color: white;
	  margin-right: 5px;
	  margin-left: 5px;
	  animation: roll 3s infinite;
	  transform: rotate(30deg);
	  opacity: .7;
	}

	@keyframes  roll {
	  0% {
	    transform: rotate(0);
	  }
	  100% {
	    transform: rotate(360deg);
	  }
	}
</style>
<head>
	<title>Login | BAZNAS Batang Hari</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/linearicons/style.css')); ?>">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/main.css')); ?>">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/demo.css')); ?>">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('admin/assets/img/apple-icon.png')); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('admin/assets/img/favicon.png')); ?>">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?php echo e(asset('admin/assets/img/logo-dark.png')); ?>" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="/postlogin" method="POST">
								<?php echo e(csrf_field()); ?>

								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input name="email" type="email" class="form-control" id="signin-email"  placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="password" type="password" class="form-control" id="signin-password"  placeholder="Password">
								</div>
								<div class="form-group clearfix">
									
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Software Pengelolaan Keuangan Baznas</h1>
							<p>by Q Squad, 2020.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
