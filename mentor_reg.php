<?php
// include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/db.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <form action="db_functions.php" method="POST">
    

      <div class="form-group">
      <label for="FullName " >Full Name</label>
        <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name">
      </div>

      <div class="row">
        <div class="col" >
        <label for="selectGender " >Gender</label>
          <select name="" id="selectGender" class="form-control" >
            <option value="" selected>Male</option>
            <option value="">Female</option>
          </select>
        </div>

        <div class="col">
          <label for="DOB">D.O.B</label>
          <input type="date" class="form-control">
        </div>  
      </div>

      <div class="form-group">
      <br>
            <label>School</label>
            <select name="school" class="form-control">
                <option value="Middlesex"> Middlesex University </option>
                <option value="Birmighan"> Birmighan University</option>
            </select>
        </div>
        
        <?php 
          $query = "SELECT dept_name FROM department";
          $query_run = mysqli_query($connection, $query);
        
        ?>
        <div class="form-group">
            <label>Department</label>
            <select name="dept" class="form-control">
                <?php while($row1 = mysqli_fetch_array($query_run)):; ?>
                 <option> <?php echo $row1[0]; ?> </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course" class="form-control" placeholder="Course">
        </div>

        <div class="custom-file">
          <label class="custom-file-label" for="customFile">Upload a profile picture</label>
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose File</label>
        </div>

        <div class="form-group">
          <br>
          <label>Bio</label>
          <textarea type="text" class="form-control"></textarea>
        </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>

    <div class="modal-body">

        

    </div>

    </form>
  </div>

  <div class="card-body">

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
    
  </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>