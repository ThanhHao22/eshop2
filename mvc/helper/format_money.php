<?php
function format_money($money){
    return number_format($money, 0, '','.') . "₫";
}