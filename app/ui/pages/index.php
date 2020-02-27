<?php
    require APPROOT . '/ui/inc/header.php';
?>

<div class="wrapper fadeInDown">
    <?php echo print_r($data); ?>
    <div id="formContent">

        <div class="fadeIn first">
            <span class="invalidFeedback"> <?php echo $data['emailError'] ?> </span>
            <span class="invalidFeedback"> <?php echo $data['passwordError']; ?> </span>
            <span class="invalidFeedback"> <?php print_r( $data['loggedInUser']);?> </span>
        </div>

        <form id="login-form" method="POST" action="<?php echo URLROOT;?>/user/login">

            <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">

        </form>
        <a class="underlineHover" href="<?php echo URLROOT; ?>/pages/register">Register</a>

        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>

<?php
    require APPROOT . '/ui/inc/footer.php';
?>
