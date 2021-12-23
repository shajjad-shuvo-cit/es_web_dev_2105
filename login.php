<?php
    session_start();
    require_once('header.php');

    if(isset($_SESSION['user_status'])){
        header('location: admin/dashboard.php');
    }
?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-3">
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-capitalize d-flex justify-content-between">login form <a href="register.php">register</a></h5>
                    </div>
                    <div class="card-body">
                    <form action="login_post.php" method="post">
                            <?php
                                if(isset($_SESSION['login_err'])){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['login_err'];
                                    unset($_SESSION['login_err']);
                                ?>
                            </div>
                            <?php
                                }   
                            ?>
                            <div class="mb-3">
                                <label class="form-label text-capitalize">your email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-capitalize">your password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    

<?php
    require_once('footer.php');
?>