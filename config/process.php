<?php

// Register

    $registerSuccess = null;
    $errorPassword = null;

    if(isset($_POST['register']))
    {
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $token = rand(100000 , 999999);

        if($password == $passwordConf){
            global $conn;
            $result = $conn->prepare("INSERT INTO users SET username=?, mobile=?, password=?, passwordConf=?, token=?");
            $result->bindValue(1, $username);
            $result->bindValue(2, $mobile);
            $result->bindValue(3, $password);
            $result->bindValue(4, $passwordConf);
            $result->bindValue(5, $token);
            $result->execute();

            $registerSuccess = true;
            header('Location:token.php?registerSuccess=true');
        }else{
            $errorPassword = true;
        }
    }


// Token

    $activeSuccess = null;
    $errorToken = null;

    if(isset($_POST['inserToken']))
    {
        $token = $_POST['token'];

        global $conn;
        $result = $conn->prepare("UPDATE users SET status=? WHERE token=?");
        $result->bindValue(1, 1);
        $result->bindValue(2, $token);
        $result->execute();

        $result = $conn->prepare("SELECT * FROM users WHERE token=?");
        $result->bindValue(1, $token);
        $result->execute();

        if($result->rowCount() > 0){
            $activeSuccess = true;
            header('Location:login.php?activeSuccess=true');
        }else{
            $errorToken = true;
        }
    }


// Login

    $loginSuccess = null;
    $errorLogin = null;
    $noActive = null;

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        global $conn;
        $result = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $result->bindValue(1, $username);
        $result->bindValue(2, $password);
        $result->execute();

        if($result->rowCount() > 0){
            $rows = $result->fetch(PDO::FETCH_ASSOC);

            $_SESSION['login'] = true;
            $_SESSION['id'] = $rows['id'];
            $_SESSION['username'] = $rows['username'];
            $_SESSION['mobile'] = $rows['mobile'];
            $_SESSION['password'] = $rows['password'];
            $_SESSION['status'] = $rows['status'];

            if($rows['status'] == 1){
                $loginSuccess = true;
                header('Location:index.php?loginSuccess=true');
            }else{
                $noActive = true;
                header('Location:token.php?noActive=true');
            }
        }else{
            $errorLogin = true;
        }
    }
