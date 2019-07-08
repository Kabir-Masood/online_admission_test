<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Online Admission Test - Admin Change Password</title>

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-success">
	<div class="card-body">
		<div class="table-responsive">
			<h2>Change Password</h2>

			<form action="change_password.php" method="post">
				<div class="form-group">
					<label for="text">Old Password:</label>
					<input type="text" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" required="required" size="100">
				</div>
				<div class="form-group">
					<label for="text">New Password:</label>
					<input type="text" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required="required" size="100">
				</div>
				<div class="form-group">
					<label for="text">Confirm New Password:</label>
					<input type="text" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm new password" required="required" size="100">
				</div>
				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>
</body>
</html>