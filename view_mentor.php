<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/db.php');
include('db_functions.php');

?>

    <div class="container py-5">
        <div class="row mt-4">
            <?php
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection, $query);
                $check_mentor = mysqli_num_rows($query_run) > 0;
                
                if($check_mentor)
                {
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                            <div class="col-md-4">
                                <div class="card"  style="margin-bottom: 10px;">
                                    <div class="card-body">
                                        <img src="admin/upload/<?php echo $row['image']; ?>" class="card-img-top" alt="Mentor Images">
                                        <h2 class="card-title"> <?php echo $row['fullname']; ?> </h2>
                                        <p class="card-text">
                                            Dummy Data
                                        </p>
                                        <button>Connect</button>
                                    </div>
                                </div>
                             </div>
                        <?php
                       
                    }

                }
                else
                {
                    echo "No faculty found";
                }
                
            ?>

            
        </div>

    </div>







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>