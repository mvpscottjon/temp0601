<?php
        session_start();  ///記得加這行
        include 'sqlPdo.php';

        if(!isset($_GET['editid']))
            header('Location:HW8_20170531_PDO.php');
            $editid = $_GET['editid'];

            $_SESSION['editid']=$editid;   ///為了update 故需記住id的session
            $sql= "select * from member where id = {$editid}";

            $PDO = new PDO($dsn,$username,$passwd,$options);

            $rs = $PDO->query($sql);

            $editObj = $rs->fetchObject();


//            $db = @new mysqli('127.0.0.1','root','root',
//                'iii');
//            $rs= $db->query($sql);
//            $editObj = $rs->fetch_object();






?>



<form action="updateMember.php">
    <table>
        <tr>
<!--            <input type="hidden" name="id" value="--><?php //echo $editObj->id?><!--">-->
            //隱藏id方法不推

            <th>account</th>
            <td><input type="text" name="account" value="<?php echo $editObj->account?>"></td>
        </tr>
        <tr>
            <th>password</th>
            <td><input type="password" name="password" value="<?php echo $editObj->password?>"></td>
        </tr>

        <tr>
            <th>realname</th>
            <td><input type="text" name="realname" value="<?php echo $editObj->realname?>"></td>
        </tr>

        <tr>
            <td><input type="submit" value="sent"></td>
        </tr>

    </table>
</form>
