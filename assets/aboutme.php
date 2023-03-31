<head>
	<title>My Personal Page</title>
</head>
<body>
	<?php 
		$name = "Your Name";
		$age = 25;
		$occupation = "Your Occupation";
		$hobbies = array("Hobby 1", "Hobby 2", "Hobby 3");
		$about_me = "Write something about yourself.";
	?>

	<h1><?php echo $name ?>'s Personal Page</h1>

	<h2>About Me</h2>
	<p><?php echo $about_me ?></p>

	<h2>Personal Information</h2>
	<ul>
		<li>Age: <?php echo $age ?></li>
		<li>Occupation: <?php echo $occupation ?></li>
		<li>Hobbies:
			<ul>
				<?php 
					foreach ($hobbies as $hobby) {
						echo "<li>$hobby</li>";
					}
				?>
			</ul>
		</li>
	</ul>
</body>