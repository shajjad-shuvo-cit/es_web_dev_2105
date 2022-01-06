<?php
    session_start();
    require_once '../header.php';
    require_once '../db.php';
    require_once 'navbar.php';

    if(!isset($_SESSION['user_status'])){
        header('location: ../login.php');
    }


    $get_query = "SELECT * FROM service_items";
    $from_db = mysqli_query($db_connect,$get_query);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-capitalize">service heading add form</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_item_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label  lass="form-label">heading</label>
                                <input type="text" class="form-control" name="service_item_head">
                            </div>
                            <div class="mb-3">
                                <label  lass="form-label">detail</label>
                                <input type="text" class="form-control" name="service_item_detail">
                            </div>
                            <div class="mb-3">
                                <label  lass="form-label">image</label>
                                <input type="file" class="form-control"  name="service_item_image">
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
                    <h5 class="card-title text-info text-capitalize">service heading table</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>black head</th>
                                <th>green head</th>
                                <th>sub head</th>
                            </thead>

                            <tbody>
                                <?php
                                    foreach($from_db as $service):
                                ?>
                                <tr>
                                    <td><?=$service['service_item_head']?></td>
                                    <td><?=$service['service_item_detail']?></td>
                                    <td><img src="../<?=$service['image_location']?>" alt="" style="width:100px;"></td> 
                                </tr>

                                <?php
                                    endforeach
                                ?>
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