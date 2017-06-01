<?php

    $passwd = '123456';

    $hash = password_hash($passwd,PASSWORD_DEFAULT);

    echo "$hash<br>";

    $passwd2 = '654321';

    $hash2 = password_hash($passwd,PASSWORD_DEFAULT);

    echo "$hash2<br>";

    if (password_verify($passwd,$hash)){
        echo 'same';
    } else { echo 'different';}