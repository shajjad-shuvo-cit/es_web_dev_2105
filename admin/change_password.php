<?php
    session_start();
    require_once '../header.php';
    require_once 'navbar.php';
    require_once '../db.php';


    if(!isset($_SESSION['user_status'])){
        header('location: ../login.php');
    }
?>
    <section>
        <div class="container">
            <div class="row">`
                <div class="col-lg-8 m-auto">
                    <div class="card mt-4">
                        <div class="card-header bg-secondary">
                            <h5 class="title text-capitalize text-white d-flex justify-content-between">password change form </h5>
                        </div>
                        <div class="card-body">
                        <?php
                            if(isset($_SESSION['pass_change_err'])){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['pass_change_err'];
                                    unset($_SESSION['pass_change_err']);
                                ?>
                            </div>
                        <?php            
                            }
                        ?>

                        <?php
                            if(isset($_SESSION['pass_change_ok'])){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['pass_change_ok'];
                                    unset($_SESSION['pass_change_ok']);
                                ?>
                            </div>
                        <?php            
                            }
                        ?>
                        <form action="change_password_post.php" method="post">
                               <div class="mb-3">
                                   <label class="text-primary text-capitalize">old password</label>
                                   <input type="password" name="old_pass" class="form-control">
                               </div>
                               <div class="mb-3">
                                   <label class="text-primary text-capitalize">new password</label>
                                   <input type="password" name="new_pass" class="form-control">
                               </div>
                               <div class="mb-3">
                                   <label class="text-primary text-capitalize">confirm password</label>
                                   <input type="password" name="confirm_pass" class="form-control">
                               </div>
                               <div class="mb-3">
                                   <button type="submit" class="btn btn-primary text-capitalize">change</button>
                               </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    require_once '../footer.php';
?>