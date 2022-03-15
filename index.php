<?php

include "./configuration/config.php";
session_start();
error_reporting(0);

$instit_user = $_POST['instit-user'];
$instit_pass = $_POST['instit-pass'];

$incorrectPass;

if (isset($_POST['instit-submit']) && isset($_POST['instit-user']) && isset($_POST['instit-pass'])) {
	$instit_sql = "SELECT * FROM `schools_list` WHERE `schoolusername` = '$instit_user' AND `schoolpassword` = '$instit_pass'";
	$instit_result = mysqli_query($conn, $instit_sql);

	if ($instit_result) {
		$instit_result_verifier = mysqli_fetch_assoc($instit_result);
		if ($instit_result_verifier) {
			$_SESSION['instit'] = $instit_user;
			header("Location: ./Dashboard/institution/");
		}
		if (!$instit_result_verifier) {
			echo "<script>alert('The username or password is incorrect')</script>";
		}
	}
}

?>

<html>

<head>
	<title>StudStats</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="og-title" content="StudStats">
	<meta name="og-description" content="Manage your Educational Institution completely online. Make your students statistics, analytics and progress on online. Plan your classes, exam schedules and declare results online.">
	<link rel="stylesheet" href="./styles/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="./styles/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body class="loginer">

	<div class="mx-auto mt-5 outer" style="width: 40%;">
		<div class="w-100 mx-auto">
			<div class="w-100  float-end">
				<div class=" w-75 mx-auto">
					<div class="btn-group">
						<button class="colorful-button btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<div class="wrapper">
								<span id="drop-spanner">Select Here</span>
								<div class="circle circle-12"></div>
								<div class="circle circle-11"></div>
								<div class="circle circle-10"></div>
								<div class="circle circle-9"></div>
								<div class="circle circle-8"></div>
								<div class="circle circle-7"></div>
								<div class="circle circle-6"></div>
								<div class="circle circle-5"></div>
								<div class="circle circle-4"></div>
								<div class="circle circle-3"></div>
								<div class="circle circle-2"></div>
								<div class="circle circle-1"></div>
							</div>
						</button>

						<ul class="dropdown-menu">
							<li><a class="dropdown-item" style="cursor: pointer;" id="instit-selector">Institution Login</a></li>
							<li><a class="dropdown-item" style="cursor: pointer;" id="student-selector">Student Login</a></li>
							<li><a class="dropdown-item" style="cursor: pointer;" id="teacher-selector">Teacher Login</a></li>
							<li><a class="dropdown-item" style="cursor: pointer;" id="studstat-selector">StudStats Admin Login</a></li>
						</ul>
					</div>

					<h1 class="mt-5 mx-5" id="selectors">Please Select from above list to login</h1>

					<!-- Institution Login -->
					<div class="mt-3 mb-3 " id="institutionlogin">
						<h3 class="text-dark larger-txt  px-3 ">Institution Login</h3>
						<form action="" class="px-3" method="POST">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input id="user" name="instit-user" type="text" class="input">
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" name="instit-pass" class="input" data-type="password">
							</div>
							<div class="group my-4 ">
								<div class=" w-100 mx-4 ">

									<button class="colorful-button btn-lg float-end " name='instit-submit' type="submit" value="instit-submit">
										<div class="wrapper">
											<span>Submit</span>
											<div class="circle circle-12"></div>
											<div class="circle circle-11"></div>
											<div class="circle circle-10"></div>
											<div class="circle circle-9"></div>
											<div class="circle circle-8"></div>
											<div class="circle circle-7"></div>
											<div class="circle circle-6"></div>
											<div class="circle circle-5"></div>
											<div class="circle circle-4"></div>
											<div class="circle circle-3"></div>
											<div class="circle circle-2"></div>
											<div class="circle circle-1"></div>
										</div>
									</button>
								</div>
							</div>
							<?php echo $incorrectPass; ?>
						</form>
					</div>

					<!-- Student Login -->
					<div class="mt-3 mb-3 " id="studentlogin">
						<h3 class="text-dark larger-txt  px-3 ">Student Login</h3>
						<form action="" class="px-3" method="POST">
							<div class="group">
								<div class="d-flex">
									<label for="code" class="label w-25">Code</label>
									<label for="user" class="label w-75">Username</label>
								</div>
								<div class="d-flex">
									<input id="code" name="scl-code" type="text" class="input w-25">
									<input id="user" name="stu-user" type="text" class="input w-75">
								</div>
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" name="stu-pass" class="input" data-type="password">
							</div>
							<div class="group my-4 ">
								<div class=" w-100 mx-4 ">
									<button class="colorful-button btn-lg float-end " name='stu-submit' value="stu-submit" type="submit">
										<div class="wrapper">
											<span>Submit</span>
											<div class="circle circle-12"></div>
											<div class="circle circle-11"></div>
											<div class="circle circle-10"></div>
											<div class="circle circle-9"></div>
											<div class="circle circle-8"></div>
											<div class="circle circle-7"></div>
											<div class="circle circle-6"></div>
											<div class="circle circle-5"></div>
											<div class="circle circle-4"></div>
											<div class="circle circle-3"></div>
											<div class="circle circle-2"></div>
											<div class="circle circle-1"></div>
										</div>
									</button>
								</div>
							</div>
						</form>
					</div>

					<!-- Teacher Login -->
					<div class="mt-3 mb-3 " id="teacherlogin">
						<h3 class="text-dark larger-txt  px-3 ">Teacher Login</h3>
						<form action="" class="px-3" method="POST">
							<div class="group">
								<div class="d-flex">
									<label for="code" class="label w-25">Code</label>
									<label for="teacher-user" class="label w-75">Username</label>
								</div>
								<div class="d-flex">
									<input id="code" name="teacher-code" type="text" class="input w-25">
									<input id="teacher-user" name="teacher-user" type="text" class="input w-75">

								</div>
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" name="teacher-pass" class="input" data-type="password">
							</div>
							<div class="group my-4 ">
								<div class=" w-100 mx-4 ">
									<button class="colorful-button btn-lg float-end " name='teacher-submit' type="submit" value="teacher-submit">
										<div class="wrapper">
											<span>Submit</span>
											<div class="circle circle-12"></div>
											<div class="circle circle-11"></div>
											<div class="circle circle-10"></div>
											<div class="circle circle-9"></div>
											<div class="circle circle-8"></div>
											<div class="circle circle-7"></div>
											<div class="circle circle-6"></div>
											<div class="circle circle-5"></div>
											<div class="circle circle-4"></div>
											<div class="circle circle-3"></div>
											<div class="circle circle-2"></div>
											<div class="circle circle-1"></div>
										</div>
									</button>
								</div>
							</div>
						</form>
					</div>

					<!-- Studstats Staff Login -->
					<div class="mt-3 mb-3 " id="studStatlogin">
						<h3 class="text-dark larger-txt  px-3 ">StudStats Admin Login</h3>
						<form action="" class="px-3" method="POST">
							<div class="group">
								<label for="user" class="label">Username</label>
								<input id="user" name="studstat-admin-user" type="text" class="input">
							</div>
							<div class="group">
								<label for="pass" class="label">Password</label>
								<input id="pass" type="password" name="studstat-admin-pass" class="input" data-type="password">
							</div>
							<div class="group my-4 ">
								<div class=" w-100 mx-4 ">
									<button class="colorful-button btn-lg float-end " name='studstat-submit' type="submit" value="studstat-submit">
										<div class="wrapper">
											<span>Submit</span>
											<div class="circle circle-12"></div>
											<div class="circle circle-11"></div>
											<div class="circle circle-10"></div>
											<div class="circle circle-9"></div>
											<div class="circle circle-8"></div>
											<div class="circle circle-7"></div>
											<div class="circle circle-6"></div>
											<div class="circle circle-5"></div>
											<div class="circle circle-4"></div>
											<div class="circle circle-3"></div>
											<div class="circle circle-2"></div>
											<div class="circle circle-1"></div>
										</div>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="./scripts/logins/loginselector.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
	<script src="./styles/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<!--script>
		$("form").submit(function() {
			$.post($(this).attr("action"), $(this).serialize());
			return false;
		});
	</script-->
</body>

</html>