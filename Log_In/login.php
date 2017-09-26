<?php
  include("login_back.php");
?>

<html>
<head>
    <title>Login</title>
    </head>

<body>
    <div class="Login-field">
        <h1>Login</h1>
        <form method = "post">
            <input type="text" name="username" required="required" placeholder="Username">
            <input type="password" name="password" required="required" placeholder="Password">
            <button type="submit" name="login" value="login_submit" class="submit_login">Login</button>
        </form>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </div>
</body>


    <style>
        body {
            background-color: aliceblue;
        }

        .Login-field {
            padding: 40px;
            border-radius: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            width: 300px;
            overflow: hidden;
            margin: 0 auto 10px;
            background-color: gainsboro;
            margin-top: 200px;
        }

        .Login-field h1 {
            text-align: center;
        }

        input[type=text], input[type=password] {
            font-size: 15px;
            width: 100%;
            height: 30px;
            margin-bottom: 10px;
            position: relative;
            border-top: 1px solid;
        }

        .submit_login {
            width: 30%;
            display: block;
            height: 20px;
            border: 0px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }
    </style>

</html>
