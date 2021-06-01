<?php include('security.php'); ?> 
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
                                class="fas fa-download fa-sm text-white-50"></i> Edit Profile </a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php
                            $query = "SELECT * FROM users WHERE username='$_SESSION[username]'";
                            $query_run = mysqli_query($connection, $query);
                        ?>

                        <h2> My Profile</h2>
                        <?php
                            $row = mysqli_fetch_assoc($query_run);

                            echo "<div><img src='../admin/upload/".$_SESSION['image']."'></div>";
                        ?>


                    </div>

                       
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         


    <?php include('includes/scripts.php'); ?>
    <?php include('includes/footer.php'); ?>

    
    

    

