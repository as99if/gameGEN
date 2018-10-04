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
                    <strong>Username :</strong>
                </td>
                <td>
                    <input ID="txtloginid" name="txtloginid"  Width="227px" />
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
                     <input name="btnLogin" type="submit" value="Login" ID="btnLogin" BorderColor="#333399" BorderStyle="Ridge"/> 
                     <input name="btnSignup" type="submit" value="Sign Up" ID="btnSignup" BorderColor="#333399" BorderStyle="Ridge"/> 
                     <?php 
                     include("Info.php");
                        if(isset($_POST['btnLogin'])){
                        $name=$_POST["txtloginid"];
                        $password2=$_POST["txtpassword"];
                        echo "$name $password2";
                        $qry = "SELECT * FROM user";
                        $result = $db->query($qry);
                        $row = $result->fetch_assoc();
                        while($row!=NULL) {
                            
                            if ($row['username']==$name && $row['pass']==$password2) {
                                    session_start();

                                $_SESSION['username']=$name;
                                header('Location: index.php');

                                exit;
                            }
                            $row = $result->fetch_assoc();
                        }
                    }
                     if(isset($_POST['btnSignup'])){
                        header('Location: registration.php');
        exit;
                     }
                ?>
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

