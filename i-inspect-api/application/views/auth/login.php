        
<div class="container form-sign-in-wrapper">
    <div class="login-container">
        <h1>I-Inspect: Inspection Application for Occupancy and Annual Inspection</h1>
        <div class="form-login-area">
            <div class="form-title">
                <span>Admin Login</span>
            </div>
            <form class="form-signin" method="post" id="login-form">
                <p><?php echo @$err; ?></p>
                <div class="form-group has-icon">
                    <input type="text" name="user_username" class="form-control" placeholder="Username" autofocus required/>
                    <span class="glyphicon glyphicon-user form-control-icon"></span>
                </div>
                <div class="form-group has-icon">
                    <input type="password" name="user_password" class="form-control" placeholder="Password" required/>
                    <span class="glyphicon glyphicon-lock form-control-icon"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <div class="reg-link">
                    <a href="">I forgot my Password</a>
                </div>
            </form>
        </div>
    </div>
</div>