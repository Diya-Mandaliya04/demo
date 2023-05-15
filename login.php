<!DOCTYPE html>
<?php
  include("connection.php");
  
  session_start();

  if(isset($_SESSION["username"]))
  {
     header("location:select.php");   
  }
  
  if(isset($_REQUEST["submit"]))
  {
   $uname=$_REQUEST['unm'];
   $pass=$_REQUEST['ps'];
   $sel=mysqli_query($con,"select * from reg where uname='$uname' and pass='$pass'");
   $row=mysqli_num_rows($sel);
   if($row==1)
   {
    $_SESSION["username"]=$uname;
    header("location:select.php");
   }
   else
   {
    header("location:login.php?msg");
   }
  }
?>
<html>
<head>
    <title>Login</title>
</head> 
<body>
    <h2>
        <?php
        if(isset($_REQUEST['msg']))
        {
            echo "try again";
        }
        ?>
    </h2>
    <form>
        <table border="1" cellpadding="3" cellspacing="5" align="center">
          <tr>
            <th>username</th>
            <td><input type="text" name="unm" ></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><input type="password" name="ps"></td>
          </tr>
          <tr>
            <th colspan="2"><input type="submit" name="submit"></th>
          </tr>
        </table>
    </form>
</body>   
</html>