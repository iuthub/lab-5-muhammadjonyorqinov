<?php
	if(!isset($_POST['submit'])){
		header("Location: buyagrade.html");
	}
	else{
		$name = trim($_POST['name']);
		$section = $_POST['section'];
		$cardNumber = trim($_POST['cardNumber']);
		$cardName = $_POST['card'];
		$bool = false;
		if($name == "" || $cardNumber == "")
			$bool = true;
		$data = $name . "; ". $section . "; ". $cardNumber . "; " . $cardName . "\n";
		file_put_contents("suckers.txt", $data, FILE_APPEND);
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		
		<?php if($bool){ ?>

			<h1>Sorry</h1>
			<p>
				You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a>
			</p>

		<?php } else{ ?>

			<h1>Thanks, sucker!</h1>
			<p>
				Your information has been recorded.
			</p>
			
			<hr />
			
			<dl>
				<dt>Name</dt>
				<dd>
				<?=$name?>
				</dd>
				
				<dt>Section</dt>
				<dd>
				<?=$section?>
				</dd>
				
				<dt>Credit Card</dt>
				<dd>
				<?=$cardNumber . "(". $cardName . ")"?>
				</dd>
			</dl>
		
			<p>Here are all the suckers who have submitted here:</p>
			<pre><?=file_get_contents("suckers.txt");?></pre>

		<?php } ?>
</body>


</html>