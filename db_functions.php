<?php include('includes/db.php');

session_start();
?>



<?php


    // inserting values into the users table
    if(isset($_POST['registerbtn']))
    {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmpassword'];
        $usertype = $_POST['insert_usertype'];
        $image = $_FILES["image"]['name'];
        // $status = $_POST['status'];

        $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query_run = mysqli_query($connection, $query);
        $count = mysqli_num_rows($query_run);
       
        if($count==1) {  
            $_SESSION['status'] = "Username or E-mail existing";
            header('Location: register.php');
            
        } else 
        if($password === $cpassword){

            $query = "INSERT INTO users(`fullname`, `username`, `email`, `password`, `usertype`, `image`, `status`)"; 
            $query .= "VALUES ('$fullname', '$username', '$email', '$password', '$usertype', '$image', 'pending')";
            $query_run = mysqli_query($connection, $query);

            
            if($query_run)
            { 
                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/".$_FILES["image"]["name"]);
                $_SESSION['success'] = "Registeration Successful";
                header('Location: register.php');
            } else {
                $_SESSION['status'] = "Registeration Not Succesful";
                header('Location: index.php');
            }
        } 
        else {
            
            $_SESSION['status'] = "Password does not match";
            header('Location: register.php');
        }
    };

   
    //updating  data file into database
    if(isset($_POST['updatebtn']))
    {
        $id = $_POST['edit_id'];
        $username = $_POST['edit_username'];
        $fullname = $_POST['edit_fullname'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];
        $usertype_update = $_POST['update_usertype'];
        
        

        $query = "UPDATE users SET username='$username', fullname='$fullname', email='$email', password='$password', usertype='$usertype_update' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if($query_run) {
            $_SESSION['success'] = "Your data is updated";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Your data is not updated";
            header('Location: register.php');
        }
    };


    //Delete data from database
    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM users WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Your data is deleted";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Your data is not deleted";
            header('Location: register.php');
        }
    };


    //login authentication for multi users
    if(isset($_POST['login_btn']))
    {
        $email_login = $_POST['email'];
        $password_login = $_POST['password'];

        $email_login = mysqli_real_escape_string($connection, $email_login);
        $password_login = mysqli_real_escape_string($connection, $password_login);


        $query = "SELECT * FROM users WHERE email='$email_login' AND password='$password_login'";
        $query_run = mysqli_query($connection, $query);
        $usertype = mysqli_fetch_array($query_run);

        while($row = mysqli_fetch_array($query_run))
        {
            $db_user_id = $row['id'];
            $db_fullname = $row['fullname'];
            $db_username = $row['username'];
            $db_email = $row['email'];
            $db_password = $row['password'];
            $db_usertype = $row['usertype'];
            $db_image = $row['image'];
        }

        if($usertype['usertype'] == "admin")
        {
            $_SESSION['username'] = $db_username;
            $_SESSION['fullname'] = $db_fullname;
            $_SESSION['email'] = $db_email;
            $_SESSION['usertype'] = $db_usertype;
            $_SESSION['image'] = $db_image;
            $_SESSION['username'] = $email_login;
            
            header('Location: admin/admin.php');
        } 
        else if ($usertype['usertype']  == "mentor")
        {
            
            $_SESSION['username'] = $email_login;
            $_SESSION['fullname'] = $db_fullname;
            $_SESSION['email'] = $db_email;
            $_SESSION['usertype'] = $db_usertype;
            $_SESSION['image'] = $db_image;
            header('Location: mentor/mentor.php');
        }
        elseif ($usertype['usertype'] == "mentee")
        {
            $_SESSION['username'] = $email_login;
            $_SESSION['fullname'] = $db_fullname;
            $_SESSION['email'] = $db_email;
            $_SESSION['usertype'] = $db_usertype;
            $_SESSION['image'] = $db_image;
           
            header('Location: index.php');
        }
        else 
        {
            $_SESSION['status'] = "Email id/ Password is invalide";
            header('Location: login.php');
        }
    };


        // // inserting values into the users table
        //     if(isset($_POST['addDept']))
        //     {
        //         $deptname = $_POST['dept_name'];
           
        //         $query = "INSERT INTO department(dept_name)"; 
        //         $query .= "VALUES ('$deptname')";
        //         $query_run = mysqli_query($connection, $query);
        
        //         if($query_run)
        //         {
                    
        //             $_SESSION['success'] = "Successful";
        //             header('Location: dept.php');
        //         } else {
        //             $_SESSION['status'] = "Not Succesful";
        //             header('Location: /admin.php');
        //         }
        //     } else {
                
        //         $_SESSION['status'] = "Password does not match";
        //         header('Location: /admin.php');
        //     }
        
    
        
    

?>