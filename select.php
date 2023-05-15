<!DOCTYPE html>
<html lang="en">
    <?php
       include("connection.php");

       session_start();

       if(isset($_REQUEST['del']))
       {
        $id=$_REQUEST['del'];
        mysqli_query($con,"delete from reg where id='$id'");
        header("refresh:2;select.php");
       }
    ?>
<head></head>
<body>
<table align="center" border="2" cellpadding="5" cellspacing="5">
    <tr>
        <th colspan="4">Records</th>
        <th colspan="3">
        <?php 
        if(isset($_SESSION['username']))
        {
           echo "hello  ".$_SESSION['username'];
        }
        else
        {
            header("location:login.php");
        }
        ?></th>
        <th colspan="1"><a href="logout.php">Logout</a></th>
    </tr>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Fullname</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Hobby</th>
        <th>Country</th>
        <th>Action </th>
    </tr>
    <?php
        
        $sel=mysqli_query($con ,"select * from reg join country on reg.country = country.c_id ");
        while($fetch=mysqli_fetch_array($sel))
        {
    ?>
    <tr>
        <td><?php echo $fetch['uname']; ?></td>
        <td><?php echo $fetch['pass']; ?></td>
        <td><?php echo $fetch['fname']; ?></td>
        <td><?php echo $fetch['address']; ?></td>
        <td><?php echo $fetch['gender']; ?></td>
        <td><?php echo $fetch['hobby']; ?></td>
        <td><?php echo $fetch['co_nm']; ?></td>
        <td><a href="reg.php?ed=<?php echo $fetch['id']; ?>">Edit</a> | <a href="select.php?del=<?php echo $fetch['id']; ?>">Delete</a></td>
    </tr> 
    <?php
        }
    ?>
</table>
</body>
</html>