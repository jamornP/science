<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Admin</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/science/certificate/components/link.php";?>
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="font-kanit vh-100 d-flex justify-content-center align-items-center">
    <div class="card mb-3">
		<div class="card-header bg-primary text-white">
			<h4>เข้าสู่ระบบ</h4>
		</div>
		<div class="card-body">
			
			<form action="checkLogin.php" class="mb-3" method="POST">
				<?php
					if($_GET['msg']) {
						echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
					}
				?>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
                <div class="text-end">
				    <button type="submit" class="btn btn-primary mt-2">Login</button>
                </div>
			</form>
			<!-- <a href="register.php">สมัครใช้งานใหม่</a> -->
		</div>
	</div>
</body>
</html>