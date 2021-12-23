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
                <div class="card mt-4">
                    <div class="card-header bg-secondary">
                        <h4 class="card-title mb-0 text-white text-capitalize d-flex justify-content-between">register form <a href="login.php" class="text-white">login</a></h4>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['err_msg'])){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['err_msg'];
                                    unset($_SESSION['err_msg']);
                                ?>
                            </div>
                        <?php            
                            }
                        ?>

                        <?php       
                            if(isset($_SESSION['success_msg'])){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['success_msg'];
                                    unset($_SESSION['success_msg']);
                                ?>
                            </div>
                        <?php            
                            }
                        ?>
                        
                        <form action="register_post.php" method="post">
                            <div class="mb-3">
                                <label class="form-label text-capitalize">your name</label>
                                <input type="text" class="form-control" name="user_name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize">your email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize">your phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-capitalize">your password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">register</button>
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

