<?php
    require APPROOT . '/ui/inc/header.php';
?>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>This is a simpleRegister Form made using Boostrap.</p>
        </div>

        <form id="register-form" class="form-content" method="post" action="<?php echo URLROOT;?>/user/register">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="name *" name="name" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="last name *" name="lastName" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="email *" name="email" value=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="password *" name="password" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="confirm password *" name="confirmedPassword" value=""/>
                    </div>
                </div>
            </div>
            <button type="submit" class="btnSubmit">Submit</button>
            <a class="underlineHover" href="<?php echo URLROOT; ?>/pages/index">Login</a>
        </form>
    </div>
</div>

<?php
    require APPROOT . '/ui/inc/footer.php';
?>
