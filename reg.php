<!DOCTYPE html>
<html lang="en">
    <?php
     include("connection.php");
    // error_reporting(0);

     if(isset($_REQUEST['submit']))
     {

     $uname=$_REQUEST['uname'];
     $pass=$_REQUEST['pass'];
     $fname=$_REQUEST['fname'];
     $address=$_REQUEST['address'];
     $gender=$_REQUEST['gen'];
     $hob=$_REQUEST['h'];
     $hobby=implode(",",$hob);
     $country=$_REQUEST['country'];

     
     $qry = mysqli_query($con,"insert into reg (uname,pass,fname,address,gender,hobby,country) values ('$uname','$pass','$fname','$address','$gender','$hobby','$country')");
     
    if($qry=true)
     {
        header("location:reg.php?msg");
     }

    }
     
    if(isset($_REQUEST['ed']))
    {
      $id=$_REQUEST['ed'];
      $sel=mysqli_query($con,"select * from reg where id='$id'");
      $record=mysqli_fetch_array($sel);
      //echo "<pre>";
    }
    
    if(isset($_REQUEST['update']))
    {
     $id=$_REQUEST['ed'];
     $uname=$_REQUEST['uname'];
     $pass=$_REQUEST['pass'];
     $fname=$_REQUEST['fname'];
     $address=$_REQUEST['address'];
     $gender=$_REQUEST['gen'];
     $hob=$_REQUEST['h'];
     $hobby=implode(",",$hob);
     $country=$_REQUEST['country'];

     mysqli_query($con,"update reg set uname='$uname',pass='$pass',fname='$fname',address='$address',gender='$gender',hobby='$hob',country='$country' where id='$ed'");

     header("location:reg.php");
    }

    ?>
<head>
</head>
<body>
    <form method="post">
        <h3 align="center">
          <?php
              if(isset($_REQUEST['msg']))
              {
                echo "Data inserted";
              }
          ?>
        </h3>
       <table border="2" cellpadding="2" cellspacing="2" align="center">
          <tr>
            <th colspan="2">
              <?php
              if(isset($_REQUEST['ed'])) 
              {
                echo "Update page";
              }
              else
              {
                echo "Regestration page";
              }
              ?>
            </th>
          </tr>
           <tr>
            <th>username</th>
            <td><input type="text" name="uname" value="<?php echo $record['uname']; ?>"></td> 
           </tr>
           <tr>
            <th>Password</th>
            <td><input type="password" name="pass" value="<?php echo $record['pass']; ?>"></td>
           </tr>
           <tr>
            <th>Fname</th>
            <td><input type="text" name="fname" value="<?php echo $record['fname']; ?>"></td> 
           </tr>
           <tr>
            <th>Address</th>
            <td><input type="text" name="address" value="<?php echo $record['address']; ?>"></td> 
           </tr>
           <tr>
            <th>Gender</th>
            <td><input type="radio" name="gen" value="male"
            <?php
            if(isset($_REQUEST['ed']))
            {
              if($record["gender"]=="male")
              {
                echo "checked";
              }
            }
            ?>
            >Male
            <input type="radio" name="gen" value="female"
            <?php
            if(isset($_REQUEST['ed']))
            {
              if($record["gender"]=="female")
              {
                echo "checked";
              }
            }
            ?>    
            >Female
           </td> 
           </tr>
           <tr>
            <th>Hobby</th>
            <td>
                <input type="checkbox" name="h[]" value="cricket"
                <?php
                 if(isset($_REQUEST['ed']))
                 {
                  $a=$record['hobby'];
                  $b=explode(",",$a);
                  if(in_array("cricket",$b))
                  {
                    echo "checked";
                  }
                 }
                ?>
                >cricket
                <input type="checkbox" name="h[]" value="art"
                <?php
                 if(isset($_REQUEST['ed']))
                 {
                  $a=$record['hobby'];
                  $b=explode(",",$a);
                  if(in_array("art",$b))
                  {
                    echo "checked";
                  }
                 }
                ?>
                >Art
            </td>
           </tr>
           <tr>
             <th>Country</th>
             <td>
              <select name="country">
               <?php
               $sel=mysqli_query($con,"select * from country");
               while($row=mysqli_fetch_array($sel))
               {
                if($row["c_id"]==$record["country"])
                {
                ?>
               <option value="<?php echo $row["c_id"]; ?>" selected><?php echo $row["co_nm"]; ?></option>
               <?php
                }
                else
                { 
               ?>
               <option value="<?php echo $row["c_id"]; ?>"><?php echo $row["co_nm"]; ?></option>
               <?php
                }
              }
              ?>
              </select>
             </td>
           </tr>
           <tr>
            <?php
            if(isset($_REQUEST["ed"]))
            {
            ?>
            <th colspan="2"><input type="submit" value="update" name="update"></th>
            <?php 
            }
            else
            {
            ?>
            <th colspan="2"><input type="submit" value="submit" name="submit"></th>
            <?php
            }
            ?>
            </tr>
            <tr>
            <th colspan="2"><input type="reset" value="clear" name="clear"></th>
           </tr>
       </table>
    </form>
</body>
</html>