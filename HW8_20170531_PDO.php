<?php
//
include 'sqlPdo.php';


//需先new　一個PDO
$PDO = @new PDO($dsn, $username, $passwd, $options);

//如果有delete的id　則執行這個if
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $sql = "delete from member where id={$delid}";

    $PDO->query($sql);
}




///SHOW全部的select
$sql = 'select * from member';

$rs = $PDO->query($sql);


//$db = @new mysqli('127.0.0.1','root'
//    ,'root','iii');

//
////



//    $db->query($sql);
//}
//
//
//$sql = 'select * from member';
//$rs = $db->query($sql);



?>


<a href="addMember_PDO.php">New</a>
<table width="100%" border="1">
    <tr>
        <td>id</td>
        <td>account</td>
        <td>password</td>
        <td>realname</td>
        <td>delete</td>
        <td>edit</td>
    </tr>
<!--    --><?php

        while ($row = $rs->fetchObject()){
            echo '<tr>';
            echo "<td>{$row->id}</td>";
            echo "<td>{$row->account}</td>";
            echo "<td>{$row->password}</td>";
            echo "<td>{$row->realname}</td>";
            echo "<td><a href='?delid={$row->id}'>Del</a></td>";
            echo "<td><a href='editMember_PDO.php?editid={$row->id}'>Edit</a></td>";
            echo '</tr>';
        }


//    ?>


</table>

