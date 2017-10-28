<?php

function sort_date_news ($array) {
    $date_key = [];

    foreach ($array as $key => $value) {
        $key_tmp_exlp = explode('.', $value[3]);
        $key_tmp_replaced = $key_tmp_exlp[2].$key_tmp_exlp[1].$key_tmp_exlp[0].(100000 + $value[0]);
        $date_key[$key_tmp_replaced] = $value;
    }

    krsort($date_key);

    return $date_key;
}

