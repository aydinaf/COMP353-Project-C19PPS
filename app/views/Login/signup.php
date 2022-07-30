<html>

<head>
	<title>Sign Up</title>
</head>

<body>
	<div class="container">
		<h1>Signup</h1>

		<form method="post" action="/Login/signup" class="form-horizontal">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" />
			</div>
			<div class="form-group">
				<label for="firstName">First Name</label>
				<input type="text" class="form-control" name="firstName" id="firstName" />
			</div>
			<div class="form-group">
				<label for="lastName">Last Name</label>
				<input type="text" class="form-control" name="lastName" id="lastName" />
			</div>
			<div class="form-group">
				<label for="citizenship">Country</label>
				<input type="text" class="form-control" name="citizenship" id="citizenship" />
			</div>
			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="text" class="form-control" name="email" id="email" />
			</div>
			<div class="form-group">
				<label for="phone">Phone Number</label>
				<input type="number" class="form-control" placeholder="5141234567" name="phone" id="phone" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" />
			</div>
			<div class="form-group">
				<label for="confirm-password">Confirm Password</label>
				<input type="password" class="form-control" name="confirm-password" id="confirm-password" />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default" name="action" value="Register" />
			</div>
		</form>


		<div>
</body>

</html>