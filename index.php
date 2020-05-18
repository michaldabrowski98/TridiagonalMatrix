<!DOCTYPE html>
<html>
<head>
	<title>Tridiagonal matrix</title>
		<!-- CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
</head>
	<body>
		<img src="img.jpg">
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="form-group">
					<label>a:</label>
					<input type="text" class="form-control" name="a"><br/>
					<label>b:</label>
					<input type="text" class="form-control" name="b"><br/>
					<label>c:</label>
					<input type="text" class="form-control" name="c"><br/>
					<label>d:</label>
					<input type="text" class="form-control" name="d"><br/>
					<input type="submit" class="btn btn-success float-right" name = 'submit' value="Calc">
				</div>
			</form>
			<div class="wyniki">
			<?php
			include 'include/calc.inc.php';

			if (isset($_POST['submit'])) {
				$a = $_POST['a'];
				$b = $_POST['b'];
				$c = $_POST['c'];
				$d = $_POST['d'];

				$a = explode(',',$a);
				$b = explode(',',$b);
				$c = explode(',',$c);
				$d = explode(',',$d);

				$n = sizeof($a);

				$solve = new TridiagonalMatrix($a,$b,$c,$d,$n);

				$results = $solve->calc();
				
				echo "<h3>Wyniki:</h3>";
				foreach ($results as $res) {
					echo $res.'<br/>';
				}
			}
			?>
		</div>
		</div>
		
		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> </script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"> </script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"> </script>
	</body>
</html>

