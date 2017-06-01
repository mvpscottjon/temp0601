<?php
include 'sqlPdo2.php';

$PDO = new PDO($dsn, $username, $passwd, $options);

$JSON=file_get_contents('http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvTravelFood.aspx');

$root = json_decode($JSON);

$sql = 'insert into food (fid,fname,tel,addr,hostwords) values(?,?,?,?,?)';



foreach ($root as $data){
//    echo "{$data->ID}:{$data->Name}<br>";

    $fid=$data->ID;
    $fname=$data->Name;
    $tel=$data->Tel;
    $addr=$data->Address;
    $hostwords=$data->HostWords;

    $stat = $PDO->prepare($sql);

    $stat->execute([$fid,$fname,$tel,$addr,$hostwords]);



}

//echo $JSON;

//
//$json = '{
//            "id":"123",
//            "name": "brad",
//            "lang": [
//                {"name":"Java",
//                 "level": "1"
//                },
//                {"name":"PHP",
//                 "level": "2"
//                },
//                {"name":"Android",
//                 "level": "3"
//                },
//                {"name":"iOS",
//                 "level": "4"
//                }
//            ]}';
//
//$root = json_decode($json);
////var_dump($root);
//
//echo "{$root->lang[0]->name}:{$root->lang[0]->level}<br>
//{$root->lang[2]->name}:{$root->lang[2]->level}";
