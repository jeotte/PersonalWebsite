<?php

if (isset($_POST['submit'])) {  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'jeotte@gmail.com'; 
    $subject = 'Feedback from my site';
		
    $body = 'Name: ' . $name . "\r\n\r\n";
    $body .= 'Email: ' . $email . "\r\n\r\n";
    $body .= 'Comments: ' . $message;
		
	if ($name != '' && $email != '' && $message != '') {
		$success = mail($to, $subject, $message);
			
		if ($success) {
			header("Location: contactSubmit.php");
			exit;
		} else {
			$error = true;
		}
	} else { 
        	$blankFields = true;
    	}
}

?>

<!DOCTYPE HTML>
<html>
	<?php include('header.php'); ?>
	<body>
	
		<?php include('nav.php'); ?>
	
		<div class='container' >
			<div class='well well-lg outerDiv'>
				<div class='row'>
					<h2 class="sectionTitle">Contact</h2>
				</div>
			
			<div class='row text-center'>
				<a href="https://www.linkedin.com/in/jessicaeotte" style="text-decoration:none;" target='_blank'>
					<span style="font: 80% Arial,sans-serif; color:#0783B6;">
						<img src="https://static.licdn.com/scds/common/u/img/webpromo/btn_in_20x15.png" width="20" height="15" alt="View Jessica Otte's LinkedIn profile" style="vertical-align:middle;" border="0">
					</span>
				</a>
				|
				<a href="https://www.facebook.com/jeotte" style="text-decoration:none;" rel='nofollow' target='_blank'>
					<span style="font: 80% Arial,sans-serif; color:#0783B6;">
						<img src='images/square-facebook-128.png' width="20" height="15" alt="View Jessica Otte's Facebook profile" style="vertical-align:middle;" border="0">
					</span>
				</a>
			</div>
			
			<br />
			<div class='form-group row formDiv'>
			<form method='post' action='contact.php' >
        <?php 
					if (isset($blankFields) && $blankFields === true) echo '<p class="phpError">Make sure all fields are filled in.</p>'; 
					if (isset($error) && $error === true) echo '<p class="phpError">An error has occurred.  The message was not sent.</p>'; 
				?>
				<label for='name'>Name*</label>
				<input name='name' type='text' id='name' class='form-control' placeholder='Your name' value='<?php if (isset($name)) echo $name; ?>'>
            
				<label for='email'>Email*</label>
				<input name='email' type='email' id='email' class='form-control' placeholder='Your email' value='<?php if (isset($email)) echo $email; ?>'>
            
				<label for='message'>Message*</label>
				<textarea name='message' id='message' class='form-control' placeholder='Your message' ><?php if (isset($message)) echo $message; ?></textarea>
            
				<input id='submit' name='submit' type='submit' value='Submit'>
        
			</form>
    </div></div></div>
	
	</body>

</html>