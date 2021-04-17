<?php

$connect = mysqli_connect("localhost","root","durgeshnathsingh","admin_school");

session_start();

if(isset($_SESSION['username']))
{
    header("location:panel.html");
}

if(isset($_POST['login']))
{
    if(empty($_POST['username']) || empty($_POST['password']))

    {
        echo '<script> 
                alert("USERNAME and PASSWORD both are required.");
                </SCRIPT>';
    }
    else
    {
        $username=mysqli_real_escape_string($connect,$_POST["username"]);
        $password=mysqli_real_escape_string($connect,$_POST["password"]);

        $query="SELECT * FROM tbl_admin where username='$username' and password='$password'";
        $result=mysqli_query($connect,$query);

        if(mysqli_num_rows($result)>0)
        {
            $_SESSION["username"]=$username;
            header("location:panel.html");
        }
        else {
            echo'<script> alert("wrong credential")';
        }
    }
}





?>






















<!DOCTYPE html>
<html>
    <head>
        <title>
            ADMIN LOGIN PAGE.
        </title>
            
        <style>
           
            table
            {
                background-color:black;
                border:5px solid rgba(255, 255, 255 ,0.5);
                border-radius:25px;
                background:rgba(0,0,0,0.7);

            }
            body
            {
                background:url("images/scenery2.jpg") no-repeat center center fixed;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }


            #type
            {
                height:32px;
                width: 300px;

                border:0;
                outline:0;
                
                background:transparent;

                border-bottom:3px solid white;
                color: white;
                font-size: 25px;
            }

            input::-webkit-input-placeholder
            {
                font-size:20px;
                line-height:3;
                color:white;
            }
            #btn
            {
                width:200px;
                height: 40px;
                font-size:25px;
                background-color:transparent;
                background:rgba(64, 224, 208,0.7);
                color:white;
                border-radius: 12px;
            }

        </style>




    </head>

    <body>

        <br><br><br><br><br><br><br><br><br>

        <form method="post">

        <table width="20%" border="0" cellspacing="30" align="center">
            <tr>
                <td align="center"><img src="images/login_user_system-administrator.png" width="35%""></td>                
            </tr>
            <tr>
                <td><input type="text" name="username" placeholder="Email" id="type"></td>                
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="********" id="type"></td>                
            </tr>
            <tr>
                <td align="center"><input type="submit" name="login" value="Login" id="btn"></td>                
            </tr>
        </table>

        </form>


    </body>


</html>