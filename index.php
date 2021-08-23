<?php 
    //allow the config
    define('__CONFIG__', true);
    //require config
    require_once "inc/config.php";

    Page::ForceDashboard();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/uikit.min.css" />
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
    </head>
    <body>

    	<div class="uk-section uk-container">
    		<?php 
    			echo "Hello world, today is: ";
    			echo date("Y m d");
    		?>
    		<p>
    			<a href="login.php">Login</a>
    			<a href="register.php">Register</a>
    		</p>
    	</div>
    	<?php require_once "inc/footer.php"; ?>
    </body>
</html>