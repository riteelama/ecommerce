<?php require "../includes/header.php"?>
<?php require "../config/config.php"?>
<?php require "../includes/session.php"?>
<?php
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email || $password ))
        {
            echo "<script>alert('Please enter both email and password)";
        }
        else{
            // $sql = "SELECT * FROM users WHERE email = '$email'";
            // $query= mysqli_query($conn,$sql);
            // $row_cnt = $query->num_rows;
            // if($row_cnt>0)
            // {
            //     if(password_verify($password,$fetch['password'])){
            //         echo "Welcome to the page";
            //     }
            //     else {
            //         echo "<script>alert('Sorry, the credential is not valid');</script>";
            //     }
            // }

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password')";
            $query = mysqli_query($conn,$sql);
            // echo $sql;
            $data = mysqli_fetch_assoc($query);

            if($data){

                // //for cookie
                // if(isset($_POST['rem'])){
                //     $time = time() + 3600; //for one hour
                //     setcookie("myCookie",$email,$time);
                // }
        
                echo "Welcome to the page";
            //    $_SESSION['loginAccess'] = $email;
            //    header("location: index.php");
            } else {
                echo "<script>alert('Sorry, the credential is not valid');</script>";
                // $error = "Invalid email and password";
            }

            // $login= $conn->query("SELECT * FROM users WHERE email = '$email'");
            // $login->execute();

            // if($login->rowCount() > 0){

            // }
        }
    }
?>

    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="post" action="login.php">
                    <h4 class="text-center mt-3"> Login </h4>
                   
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="">
                            <input type="email"  class="form-control" id="" value="" name="email">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="">
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4 mb-4" type="submit" name="login">Login</button>
                    <div class="text-center">
                        <a class="small text-danger" href="register.php">Don't have an account? Sign up right now!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require "../includes/footer.php"?>       