<?php
function bn_number($str) {
    $en=array(1,2,3,4,5,6,7,8,9,0);
    $bn=array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str=str_replace($en,$bn,$str);return $str;
}

  function bn1_date($str) {
    $en=array(1,2,3,4,5,6,7,8,9,0);
    $bn=array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $str=str_replace($en,$bn,$str);
    $en=array('January','February','March','April','May','June','July','August','September','October','November','December');
    $en_short=array('Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec');
    $bn=array('জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','অগাস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
    $bn_short=array('জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','অগাস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর');
    $str=str_replace($en,$bn,$str);
    $str=str_replace($en_short,$bn,$str);
    $en=array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
    $en_short=array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
    $bn_short=array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $bn=array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
    $str=str_replace($en,$bn,$str);$str=str_replace($en_short,$bn_short,$str);
    $en=array('am','pm');$bn=array('সকাল ','বিকাল ');
    $str=str_replace($en,$bn,$str);
    return $str;
}