<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <title>GameGen</title>
</head>
<body>
    <form name="login" action="" method="post" accept-charset="utf-8">
<?php


  $user="Login";
  $userhref="login.php";
  $server_address = "localhost";
  $username = "root";
  $password = "";
  $db_name = "gamegen";
  $db = new mysqli($server_address, $username, $password, $db_name);
  if(isset($_POST['btnregister'])){
                        $name=$_POST["txtName"];
                        $password2=$_POST["txtpassword"];
                        $email=$_POST["txtEmail"];
                        $username2=$_POST["txtusername"];
                        $db->query("INSERT INTO user (name, email, username, pass) 
                                    VALUES ('$name', '$email', '$username2', '$password2');");
    header('Location: index.php');
        exit;
    }
?>
    
    <div style="align:center; padding:10%; " aria-live="assertive">
        <table align="center" style="border:1px ridge #00b1ff; width:519px; height: 28px;">
            <thead>
                <center ><strong><h1>GameGen</h1></strong></center>
            </thead>
            
            
            <tr>
                <td align="center" colspan="2">
                    <hr style="color: #00B1FF" />    
                </td>
            </tr>
            <tr>
                <td align="center">
                    <strong>Name :</strong>
                </td>
                <td>
                    <input ID="txtName" name="txtName"  Width="227px" />
                </td>
            </tr>   
            <tr>
                <td align="center" style="width: 50%;">
                    <strong>Username:</strong>
                </td>
                <td style="width: 50%;">
                    <input name="txtusername" ID="txtusername" Width="225px" />
                </td>
            </tr>         
           
            <tr>
                <td align="center">
                    <strong>Email:</strong>
                </td>
                <td>
                    <input ID="txtEmail" name="txtEmail"  Width="227px" />
                </td>
            </tr>   
             <tr>
                <td align="center" style="width: 50%;">
                    <strong>Password :</strong>
                </td>
                <td style="width: 50%;">
                    <input name="txtpassword" ID="txtpassword" TextMode="Password" Width="225px" />
                </td>
            </tr>         
            
            <tr>
                <td align="center" class="auto-style3">
                    &nbsp;
                </td>
                 <td class="auto-style3">
                     <input name="btnregister" type="submit" value="Sign Up" ID="btnregister" BorderColor="#333399" BorderStyle="Ridge"/> 
                 </td>
            </tr>
             <tr>
                <td align="center" colspan="2">
                    <hr style="color: #00B1FF" />
                </td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>