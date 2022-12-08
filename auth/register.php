<?php require "../includes/header.php"?>
<?php require "../config/config.php"?>
<?php
    if(isset($_POST['register'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $phoneno = $_POST['phoneno'];
        $address = $_POST['address'];
        $role_id = $_POST['role_id'];
        if(empty($fullname || $username || $email || $password || $phoneno || $address || $role_id ))
        {
            echo "<script>alert('one or more inputs are empty)";
        }
        if($password != $confirm_password)
        {
            // echo "<script>alert('password and confirm password doesnot match)";
            $error = "password and confirm password doesnot match";
        }
        else 
        {
            // $insert = $conn->prepare("INSERT INTO users (fullname,username,email,password,confirm_password,phoneno,address,role_id) VALUES(:fullname,:username,:email,:password,:confirm_password,:phoneno,:address,:role_id)");

            // $insert->execute([
            //     ':fullname' => $fullname,
            //     ':username' => $username,
            //     ':email' => $email,
            //     ':password' => password_hash($password,PASSWORD_DEFAULT),
            //     ':confirm_password' => $confirm_password,
            //     ':phoneno' => $phoneno,
            //     ':address' => $address,
            //     ':role_id' => $role_id,
            // ]);

            
            $sql = "INSERT INTO users (fullname,username,email,password,confirm_password,phoneno,address,role_id) VALUES ('$fullname','$username','$email',md5('$password'),md5('$confirm_password'),'$phoneno','$address','$role_id')";         
            $query = mysqli_query($conn,$sql);
            echo "<script>alert('Your account created successfully!!!')</script>";
            header ("location:login.php");
        }
    }
?>
    <div class="container">

        <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form class="user" method="post" name="userForm" enctype="multipart/form-data" action="register.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="fullname">Full Name<span class="required" style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="fullname" value="<?php echo isset($editData) ? $editData['fullname'] : ""; ?>" name="fullname" placeholder="Fullname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="username">Username<span class="required" style="color:red;">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="username" value="<?php echo isset($editData) ? $editData['username'] : ""; ?>" placeholder="Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-3">
                                    <label for="email">Email<span class="required" style="color:red;">*</span></label>
                                    <input type="email" class="form-control form-control-user" id="email" value="<?php echo isset($editData) ? $editData['email'] : ""; ?>" placeholder="Email Address" name="email" required>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password">Password<span class="required" style="color:red;">*</span></label>
                                        <input type="password" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['password'] : ""; ?>" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="confirm_password">Confirm Password<span class="required" style="color:red;">*</span></label>
                                        <input type="password" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['password'] : ""; ?>" id="confirmpassword" placeholder="Confirm Password" name="confirm_password">
                                    </div>
                                    <!-- <?php
                                            // echo isset($error)?$error:'';
                                            ?> -->
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="phoneno">Phone Number</label>
                                        <input type="text" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['phoneno'] : ""; ?>" id="phoneno" placeholder="Phone number" name="phoneno">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-user" value="<?php echo isset($editData) ? $editData['address'] : ""; ?>" id="address" placeholder="Address" name="address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <br>
                                        <select name="role_id" id="role_id" class="form-select" selected style="border-radius:20px;">
                                            <?php
                                            $active = 'selected="selected"';
                                            $inactive = '';
                                            if (isset($editData)) {
                                                if (!$editData['role_id']) {
                                                    $active = '';
                                                    $inactive = 'selected = "selected"';
                                                }
                                            }
                                            ?>
                                            <option value="2" <?php echo $active; ?>>Seller</option>
                                            <option value="3" <?php echo $inactive; ?>>Customer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center pt-3">
                                    <button name="register" type="submit" class="btn btn-user btn-success" style="margin-right:20px;">Register Account</button>
                                </div>
                            </form>
                            <hr>
                            <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php require "../includes/footer.php"?>