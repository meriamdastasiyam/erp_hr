<?php include('header.php'); ?>

<div class="container" >
    <br><br><br><br><br>
  <form method="post">
    <div class="panel-body">
    <center>
        <img src="image/admin_login.gif" style="height: 200px;width: 400px;">
    <div class="form-group">
      <input type="text" class="form-control" id="email" placeholder="Enter username....." name="user" style="width: 300px">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password....." name="pwd" style="width: 300px">
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </center>
    </div>
  </form>
</div>

<?php
$conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
if (isset($_POST['submit'])) {
    session_start();
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $query = "SELECT * FROM admin WHERE username='$user' AND password='$pwd'";
    $result = mysqli_query($conn,$query)or die(mysql_error());
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if( $num_row > 0 ) {    
    $_SESSION['id']=$row['id']; 
    ?>
    echo "<script>alert('Login Success!!'); window.location='index.php'</script>";
    <?php 
    }
    else{ ?>
    echo "<script>alert('Login Error! Please check your Username and Password'); window.location='index.php'</script>";
    <?php 
    }
}
?>

<!-- <div class="container">
    <div class="margin-top">
        <div class="row">	
            <div class="span12">
                <div class="sti">
                </div>
                <div class="login" style="background-color: rgb(15, 15, 87);">
                    <div class="alert alert-info" style="background-color: rgb(15, 15, 87);"><strong>Admin Login..</strong></div>
                    <form class="form-horizontal" method="POST">
                        <div class="control-group" >
                            <label class="control-label" for="inputEmail"><strong>Username</strong></label>
                            <div class="controls">
                                <input type="text" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword"><strong>Password</strong></label>
                            <div class="controls">
                                <input type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button id="login" name="submit" type="submit" class="btn"><i class="fa fa-sign-in"></i>&nbsp;Submit</button>
                            </div>
                            <?php
                            $conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
                            if (isset($_POST['submit'])) {
                                session_start();
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                                $result = mysqli_query($conn,$query)or die(mysql_error());
                                $num_row = mysqli_num_rows($result);
                                $row = mysqli_fetch_array($result);
                                if ($num_row > 0) {
                                    header('location:dasboard.php');
                                    $_SESSION['id'] = $row['id'];
                                } else {
                                    ?>
                                    <br>
                                    <br>
                                    <div class="alert alert-danger">!Access Denied</div>	
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </form>

                </div>
            </div>		
        </div>
    </div>
</div> -->
