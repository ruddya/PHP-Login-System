<?php 
	//allow the config
	define('__CONFIG__', true);
	//require config
	require_once "inc/config.php"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body>

    	<div class="uk-section uk-container">
    		<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
    			<form class="uk-form-stacked js-login" autocomplete="off">
				    <div class="uk-margin">
				        <label class="uk-form-label" for="form-stacked-text">Email</label>
				        <div class="uk-form-controls">
				            <input class="uk-input" id="form-stacked-text" type="email" required="required" placeholder="email@email.com">
				        </div>
				    </div>
				    <div class="uk-margin">
				        <label class="uk-form-label" for="form-stacked-text">Password</label>
				        <div class="uk-form-controls">
				            <input class="uk-input" id="form-stacked-text" type="password" required="required" placeholder="password">
				        </div>
				    </div>
				    <div class="uk-margin">
				        <button class="uk-button uk-button-default" type="submit">Login</button>
				    </div>
				</form>
    		</div>
    	</div>
    	<?php require_once "inc/footer.php"; ?>
    </body>
</html>