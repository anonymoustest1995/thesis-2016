        
        <div class="container form-sign-in-wrapper">
            <form class="form-signin" method="post">
                <h2 class="form-signin-heading">Sign in</h2>
                <p><?php echo @$err; ?></p>
                <input type="text" name="user_username" class="form-control" placeholder="Username" />
                <input type="password" name="user_password" class="form-control" placeholder="Password" />
                <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-fw"></i> Sign in</button>
            </form>
        </div>