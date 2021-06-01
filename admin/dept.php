<?php include('includes/security.php'); ?> 
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/db.php'); ?>



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number of Mentor</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $query = "SELECT * FROM users WHERE usertype = 'mentor' && status = 'registered'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);

                                                    echo '<h1> '.$row.'</h1>';
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Number of Mentee</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                                    $query = "SELECT * FROM users WHERE usertype = 'mentee'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);

                                                    echo '<h1> '.$row.'</h1>';
                                                ?>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function HideTable3() {
                            var T = document.getElementById("table3-responsive");
                            T.style.display = "block";  
                            };

                        
                        </script>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Mentor Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    $query = "SELECT * FROM users WHERE usertype = 'mentor' && status = 'unregistered'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);

                                                    echo '<h1> '.$row.'</h1>';
                                                ?>
                                            </div>

                                            <a href="#" onclick="HideTable3()"> View Request</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Department modal -->
                    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Department Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> Add Department
                        </button>
                        </div>
                        <form action="db_functions.php" method="POST">

                        <div class="modal-body">

                            <div class="form-group">
                                <label> Department Name </label>
                                <input type="text" name="dept_name" class="form-control" placeholder="Enter Department name">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="addDept" class="btn btn-primary">Save</button>
                        </div>
                        </form>

                    </div>
                    </div>
                    </div>
                    <!-- end of add depatment modal -->

                     <!-- Edit Department modal -->
                     <div class="modal fade" id="addadminprofile2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Department Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span> Edit Department
                        </button>
                        </div>
                        <form action="db_functions.php" method="POST">

                        <div class="modal-body">

                            <div class="form-group">
                                <label> Department Name </label>
                                <input type="text" name="dept_name" class="form-control" placeholder="Enter Department name">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="addDept" class="btn btn-primary">Save</button>
                        </div>
                        </form>

                    </div>
                    </div>
                    </div>
                    <!-- end of edit depatment modal -->

                    <?php 
                        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                        {
                            echo '<h2> '.$_SESSION['success'].'</h2>';
                            unset($_SESSION['success']);
                        }
                        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                        {
                            echo '<h2> '.$_SESSION['status'].'</h2>';
                            unset($_SESSION['status']);
                        }
                    
                    ?>
                   
                    <div class="table-responsive">
                    <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                                    Add Department
                                    </button>
                            </h6>
                        </div>

                        <?php
                        $query = "SELECT * FROM department";
                        $query_run = mysqli_query($connection, $query);

                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <h2>Department</h2>
                        <thead>
                            <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th>EDIT </th>
                            <th>DELETE </th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            if(mysqli_num_rows($query_run) > 0)
                            {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>

                                <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['dept_name']; ?> </td>
                                <td>
                                    <form action="dept_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button  type="submit" name="edit_btn" class="btn btn-success" data-toggle="modal" data-target="#addadminprofile"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="db_functions.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                                </tr>

                                <?php
                                }
                                }
                            else {
                            echo "No Record Found";
                            }

                        ?>
                        
                        </tbody>
                        </table>

                    </div>
                    <!-- end of table 1 - department table -->

                     <!-- View Mentor RequestTable -->
                     <div id="table3-responsive" style="display: none;">

<?php
$query = "SELECT * FROM users WHERE usertype = 'mentor' && status = 'unregistered'";
$query_run = mysqli_query($connection, $query);

?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<h2>Mentors Request</h2>
<thead>
    <tr>
    <th> ID </th>
    <th> Username </th>
    <th>Full Name </th>
    <th>Email</th>
    <th>Password</th>
    <th>Approve </th>
    <th>Delete </th>
    </tr>
</thead>
<tbody>

<?php
    if(mysqli_num_rows($query_run) > 0)
    {
    while($row = mysqli_fetch_assoc($query_run))
    {
    ?>

        <tr>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['username']; ?> </td>
        <td> <?php echo $row['fullname']; ?></td>
        <td> <?php echo $row['email']; ?></td>
        <td> <?php echo $row['password']; ?> </td>
        <td>
            <form action="db_functions.php" method="post">
            
                <input type="hidden" name="approve_id" value="<?php echo $row['id']; ?>">
                <button  type="submit" name="approve_btn" class="btn btn-success"> Approve</button>
            </form>
        </td>
        <td>
            <form action="db_functions.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                <button type="submit" name="delete_btn" class="btn btn-danger"> Delete</button>
            </form>
        </td>
        </tr>

        <?php
        }
        }
    else {
    echo "No Record Found";
    }

?>

</tbody>
</table>

</div>
<!-- end of table of mentor request -->

                      

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         


    <?php include('includes/scripts.php'); ?>
    <?php include('includes/footer.php'); ?>

    
    

    

