<?php
    include 'sqlPdo.php';
    session_start();

        if (isset($_POST['account'])){
            $PDO = @new PDO($dsn, $username, $passwd, $options);

            $account = $_POST['account'];
        $password = $_POST['password'];
        $sql = 'select * from member where account = ?';

//        echo  $password;}
//
        $stat= $PDO->prepare($sql);
        $stat->execute([$account]);

        if ($stat->rowCount()>0){
            $memberObj = $stat->fetchObject();
            $_SESSION['id']=$memberObj;
            if(password_verify($password, $memberObj->password)){
//                echo 'OK';
                header('Location:main.php');
            }else {echo '密碼有誤';}


//            echo $memberObj->id;
        }else {
            echo '請輸入正確帳號';
        }




}else {echo '請輸入帳號';}
?>


<form method="post">

    Account:
    <input type="text" name="account"> <br>
    Password:
    <input type="password" name="password">
    <br>
    <input type="submit" value="login">


</form>
