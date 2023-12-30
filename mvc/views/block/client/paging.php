<?php
$index = strpos($_SERVER['QUERY_STRING'], '&');
$QUERY_STRING = substr($_SERVER['QUERY_STRING'], $index + 1);
$QUERY_STRING = explode('&', $QUERY_STRING);
// show_array($QUERY_STRING);
$QUERY_STRING_NEW = [];

foreach ($QUERY_STRING as $item) {
    $array_new = explode('=', $item);
    $QUERY_STRING_NEW[$array_new[0]] = $array_new[1];
}
$QUERY_STRING = '';
$QUERY_STRING_CATE = '';
$QUERY_STRING_MIN_MAX = '';
foreach ($QUERY_STRING_NEW as $key => $value) {
    if ($key != 'cate' && $key != 'rl') {
        $QUERY_STRING_CATE .= '&' . $key . '=' . $value;
    }
    if ($key != 'min' && $key != 'max' && $key != 'rl') {
        $QUERY_STRING_MIN_MAX .= '&' . $key . '=' . $value;
    }
    $QUERY_STRING .= '&' . $key . '=' . $value;
}
$QUERY_STRING = trim($QUERY_STRING, '&');
$QUERY_STRING_CATE = trim($QUERY_STRING_CATE, '&');
$QUERY_STRING_MIN_MAX = trim($QUERY_STRING_MIN_MAX, '&');
?>
