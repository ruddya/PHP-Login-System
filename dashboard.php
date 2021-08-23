<?php 
	//allow the config
	define('__CONFIG__', true);
	//require config
	require_once "inc/config.php"; 

    // Check if user logged in
    Page::ForceLogin();

    $User = new User($_SESSION['user_id']);

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
            <h2>Dashboard</h2>
            <p> Hello <?php echo $User->email; ?>, you registered <?php echo $User->reg_time; ?>. </p>
            <p><a href="logout.php">LOGOUT</a></p>
    	</div>
    	<?php require_once "inc/footer.php"; ?>
    </body>
</html>