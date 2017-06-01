<?php
    session_start();
    if(!isset($_SESSION['id'])) {} or die("go hell");



?>






<?php
include 'sqlPdo2.php';
$PDO = new PDO($dsn, $username, $passwd, $options);

//$sql = 'select * from food limit 0,5';
//$sql = 'select * from food order by addr desc';




    $sql = 'select * from food  ORDER by id desc limit 10';
    $stat = $PDO->prepare($sql);
    $stat->execute();


//
//if(isset($_GET['search'])) {
//    $sql = 'select * from food where addr like ?';
//    $get = "%{$_GET['search']}%";
////    echo $get;
////    $text = "%$get%";
////    echo $text;
//    $search = array($get);
//    $stat = $PDO->prepare($sql);
//    $stat->execute($search);
//
//}


?>

Hello,wolrd!!

<form method="get">
    address:<input type="text" name="search">
    <input type="submit" value="search">
</form>

<table border="1" width="100%">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>tel</td>
        <td>address</td>
        <td>hostwords</td>
    </tr>

    <?php
            while($row = $stat->fetchObject()){
                echo '<tr>';
                echo"<td>{$row->fid}</td>";
                echo"<td>{$row->fname}</td>";
                echo"<td>{$row->tel}</td>";
                echo"<td>{$row->addr}</td>";
                echo"<td>{$row->hostwords}</td>";
                echo '</tr>';
            }

    ?>
</table>



<hr>


<a href="logout.php">logout</a>