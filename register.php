<?php
session_start();
include('includes/header.php'); 
include('includes/db.php');
include('db_functions.php');
?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <!-- session to display if password and confirmed password is the same or not -->
                            <?php 
                            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
                            {
                                echo '<h3> '.$_SESSION['success'].'</h3>';
                                unset($_SESSION['success']);
                            }
                            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                            {
                                echo '<h3> '.$_SESSION['status'].'</h3>';
                                unset($_SESSION['status']);
                            }
                            
                            ?>
                            <form action="admin/db_functions.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control form-control-user" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" 
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                         placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirmpassword" class="form-control form-control-user"
                                            placeholder="Repeat Password">
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select name="insert_usertype" class="form-control form-control-user">
                                            <option value="mentor"> Mentor </option>
                                            <option value="mentee"> Mentee</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="myImages" name="image">
                                    </div>

                                    <!-- <div class="form-group">
                                        <input hidden value="unregistered" type="text" name="status" class="form-control form-control-user" 
                                            placeholder="Email Address">
                                     </div> -->
                                    
                                <button type="submit" name="registerbtn" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>