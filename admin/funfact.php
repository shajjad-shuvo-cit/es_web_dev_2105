<?php
    session_start();
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php';

    if(!isset($_SESSION['user_status'])){
        header('location: ../login.php');
    }


    $get_query = "SELECT * FROM funfacts";
    $from_db = mysqli_query(db_connect(),$get_query);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">funfact add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="funfact_post.php" method="post">
                            <div class="mb-3">
                                <label  lass="form-label"> sub heading</label>
                                <input type="text" class="form-control" name="sub_head" value="<?=(isset($_SESSION['sub_head_done'])) ? $_SESSION['sub_head_done'] : ''?>">

                                <?php if(isset($_SESSION['sub_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['sub_err']?></small> 
                                    <?php unset($_SESSION['sub_err']) ?>   
                                 <?php endif ?>   
                            </div>
                            <div class="mb-3">
                                <label  lass="form-label"> white heading</label>
                                <input type="text" class="form-control" name="white_head" value="<?=(isset($_SESSION['white_head_done'])) ? $_SESSION['white_head_done'] : ''?>">
                                <?php if(isset($_SESSION['white_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['white_err']?></small> 
                                    <?php unset($_SESSION['white_err']) ?>   
                                 <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <label  lass="form-label"> green heading</label>
                                <input type="text" class="form-control" name="green_head" value="<?=(isset($_SESSION['green_head_done'])) ? $_SESSION['green_head_done'] : ''?>">

                                <?php if(isset($_SESSION['green_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['green_err']?></small> 
                                    <?php unset($_SESSION['green_err']) ?>   
                                 <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <label  lass="form-label">para one</label>
                                <input type="text" class="form-control"  name="para_one" value="<?=(isset($_SESSION['para_one_done'])) ? $_SESSION['para_one_done'] : ''?>">
                                <?php if(isset($_SESSION['para_one_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['para_one_err']?></small> 
                                    <?php unset($_SESSION['para_one_err']) ?>   
                                 <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <label  lass="form-label">para two</label>
                                <input type="text" class="form-control"  name="para_two" value="<?=(isset($_SESSION['para_two_done'])) ? $_SESSION['para_two_done'] : ''?>">
                                <?php if(isset($_SESSION['para_two_err'])): ?>
                                    <small class="text-danger"><?=$_SESSION['para_two_err']?></small> 
                                    <?php unset($_SESSION['para_two_err']) ?>   
                                 <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success text-uppercase">add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header">
                    <h5 class="card-title text-info text-capitalize">funfact heading table</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>sub head</th>
                                <th>white head</th>
                                <th>green head</th>
                                <th>para one</th>
                                <th>para two</th>
                                <th>action</th>
                            </thead>

                            <tbody>
                                <?php foreach($from_db as $funfact): ?>
                                   <tr>
                                        <td><?=$funfact['sub_head']?></td>
                                        <td><?=$funfact['white_head']?></td>
                                        <td><?=$funfact['green_head']?></td>
                                        <td><?=$funfact['para_one']?></td>
                                        <td><?=$funfact['para_two']?></td>
                                        <td>-</td>
                                   </tr>     

                                <?php endforeach ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</section>
<?php
    require_once '../footer.php';
?>