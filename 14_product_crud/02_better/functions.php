<?php
function randomString($n) # GENERATES A RANDOM STR $n characters long;
{
    $chars = 'qwertyuiopasdfghjklzxcvbnm0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($chars) - 1);
        $str .= $chars[$index];
    }

    return $str;
}
