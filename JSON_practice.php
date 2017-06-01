<?php
//include 'sqlPdo2.php';
//
//$JSON = file_get_contents('http://data.coa.gov.tw/Service/OpenData/FromM/FarmerMarketData.aspx');
//
////var_dump($JSON);
//$root = json_decode($JSON);
//
//
//
//
//
//$sql = 'insert into practice (county,mname,tel,gps,addr,note) value(?,?,?,?,?,?)';
//
//$PDO= new PDO($dsn,$username,$passwd,$options);
//
//foreach ($root as $data){
//$county = $data->縣市 ;
//$mname = $data->市集名稱;
//$tel = $data->電話;
//$gps = $data->GPS;
//$addr = $data->營業地址;
//$note = $data->市集介紹;
//
//
//$stat = $PDO->prepare($sql);
//$stat->execute([$county,$mname,$tel,$gps,$addr,$note]);
//
//}



//
//foreach ($root as $data){
//    echo $data->縣市.":";
//    echo $data->市集名稱.",";
////    echo $data->市集介紹.",";
//    echo $data->電話.",";
//    echo $data->GPS.",";
//    echo $data->營業地址."<br>";
//}


?>

<?php
    include 'sqlPdo2.php';
    $PDO = new PDO($dsn,$username,$passwd,$options);
    $sql = 'select * from practice';
    $stat= $PDO->prepare($sql);
     $stat->execute();

?>

<table border="1" width="100%">
    <tr>
        <td>id</td>
        <td>county</td>
        <td>mname</td>
        <td>tel</td>
        <td>addr</td>
        <td>gps</td>
        <td>note</td>
    </tr>
    <?php
//        foreach ($rs as $data){
//            echo '<tr>';
//            echo "<td>$data->id</td>";
//            echo '</tr>';
//        }


        while($row = $stat->fetchObject()){
            echo '<tr>';
            echo "<td>$row->id</td>";
            echo "<td>$row->county</td>";
            echo "<td>$row->mname</td>";
            echo "<td>$row->tel</td>";
            echo "<td>$row->addr</td>";
            echo "<td>$row->gps</td>";
            echo "<td>$row->note</td>";
            echo '</tr>';

        }


    ?>

</table>



