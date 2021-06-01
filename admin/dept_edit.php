<?php 

include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/db.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit - Admin Profile </h6>
    </div>
        <div class="card-body">

        <?php
             if(isset($_POST['edit_btn']))
             {
                 $id = $_POST['edit_id'];
                 
                 $query = "SELECT * FROM department WHERE id='$id'";
                 $query_run = mysqli_query($connection, $query);
                
                 foreach($query_run as $row)
                 {
        ?>
                    <form action="db_functions.php" method="POST">

                      <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                                <label> Department Name </label>
                                <input type="text" name="edit_dept_name" value="<?php echo $row['dept_name'] ?>" class="form-control" placeholder="Enter Department Name">
                            </div>
                            
                        </div>
                        <a href="dept.php"  class=" btn btn-danger">Cancel</a>
                        <button type="submit" name="dept_updatebtn" class="btn btn-primary">Update</button>
                    </form>
       
        <?php
                 }   
             }
        ?>

        </div>
    </div>
    </div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>