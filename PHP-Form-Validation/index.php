<?php
include 'validFluent.php';


if (empty($_POST)) {
	// setting some start values
	$vf = new ValidFluent(array());
	$vf->name('userName')
		->setValue('mahmudfrzl')
		->setError('ooopps, name already in use!');
} else {
	//validate $_POST data
	$vf = new ValidFluent($_POST);

	$vf->name('email')
		->required('you need to type something here')
		->email()
		->minSize(8);

	$vf->name('date')
		->required()
		->date();

	if ($vf->name('userName')
		->alfa()
		->minSize(3)
		->maxSize(12)

		->name('choseOne')
		->oneOf('az:tr:en:fr:other')

		->name('password1')
		->required()
		->minSize(3)
		->alfa()

		->name('password2')
		->required()
		->equal($_POST['password1'], 'passwords did not match')

		->isGroupValid()
	)
		echo "Validation Passed \n";
	else
		echo "validation errors";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style type="text/css">
		html {
			background-color:#6B12D9
		}

		label {
			display: block;
			margin-bottom: 10px;
			margin-top: 10px;
			font-size: 12px;
		}

		.error {
			color: red;
		}


		.form_div {
			display: flex;
			justify-content: center;

		}

		button {
			margin-top: 15px;
			justify-content: center;
			width: 80%;
			height: 25px;
			background-color: #4F46E5;
			border-radius: 5px;
		}

		form {
			padding: 20px;
			border-radius: 10px;
			box-shadow: 1px 1px 10px 10px rgba(0, 0, 0, 0.2);
			background-color: #fff;
		}
	</style>
	<title></title>
</head>

<body>
	<div class="form_div">
		<form method="POST">

			<div class="input_div">

				<label for="userName">User Name</label>
				<input type="text" name="userName" value="<?php echo $vf->getValue('userName'); ?>" />
				<span class="error">
					<?php echo $vf->getError('userName'); ?>
				</span>
			</div>

			<div class="input_div">

				<label for="email">EMAIL</label>
				<input type="text" name="email" value="<?php echo $vf->getValue('email'); ?>" />
				<span class="error">
					<?php echo $vf->getError('email'); ?>
				</span>
			</div>

			<div class="input_div">

				<label for="date">DATE</label>
				<input type="text" name="date" value="<?php echo $vf->getValue('date'); ?>" />
				<span class="error">
					<?php echo $vf->getError('date'); ?>
				</span>
			</div>


			<div class="input_div">

				<label for="date">language 'az' 'tr' 'en' 'fr' or 'other'</label>
				<input type="text" name="choseOne" value="<?php echo $vf->getValue('choseOne'); ?>" />
				<span class="error">
					<?php echo $vf->getError('choseOne'); ?>
				</span>
			</div>

			<div class="input_div">

				<label for="password1">Password</label>
				<input type="text" name="password1" value="<?php echo $vf->getValue('password1'); ?>" />
				<span class="error">
					<?php echo $vf->getError('password1'); ?>
				</span>
			</div>

			<div class="input_div">

				<label for="password2">Confirm Password</label>
				<input type="text" name="password2" value="<?php echo $vf->getValue('password2'); ?>" />
				<span class="error">
					<?php echo $vf->getError('password2'); ?>
				</span>
			</div>

			<div style="display: flex;justify-content:center">
				<button type="submit">Submit</button>
			</div>

		</form>
	</div>
	<?php
	// put your code here
	?>
</body>

</html>