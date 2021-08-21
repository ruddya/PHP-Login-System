<?php 
    //allow the config
    define('__CONFIG__', true);
    //require config
    require_once "inc/config.php"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/uikit.min.css" />
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
    </head>
    <body>

        <div class="uk-section uk-container">
            <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">
                <form class="uk-form-stacked js-register" autocomplete="off">
                    <h2>Register</h2>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="email-input">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="email-input" type="email" required="required" placeholder="email@email.com">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="password-input">Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="password-input" type="password" required="required" placeholder="password">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="password-repeat-input">Re-type Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="password-repeat-input" type="password" required="required" placeholder="password">
                        </div>
                    </div>
                    <div class="uk-margin uk-alert uk-alert-danger js-error" style="display:none;">
                    </div>
                    <div class="uk-margin">
                        <button class="uk-button uk-button-default" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once "inc/footer.php"; ?>
    </body>
</html>