<style>
    html,body{
        background: white;
    }
</style>
<div class="login-page text-center" style="margin: auto">
    <img src="<?php echo base_url("assets/images/new/smilealign_logo_03.png")?>" style="width: 300px">
    <br/>
    <br/>
    <div class="form">
<!--        <form class="register-form">-->
<!--            <input type="text" placeholder="name"/>-->
<!--            <input type="password" placeholder="password"/>-->
<!--            <input type="text" placeholder="email address"/>-->
<!--            <button>create</button>-->
<!--            <p class="message">Already registered? <a href="#">Sign In</a></p>-->
<!--        </form>-->
        <form class="login-form" id="admin_login">
            <input type="text" placeholder="username" id="login_username" name="login_username"/>
            <input type="password" placeholder="password" id="login_password" name="login_password"/>
            <button type="submit" style="background: #73cde1">login</button>
            <div class="error-message"></div>
<!--            <p class="message">Not registered? <a href="#">Create an account</a></p>-->
        </form>
    </div>
</div>