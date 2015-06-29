<?php

if(isset($_POST['texte']))
{
    echo BBCode(nl2br($_POST['texte']));
}

function BBCode($str){
    $str = str_replace('\r\n','<br />', $str);
    $str = str_replace('[hr]','<hr/>', $str);
    
    $str = str_replace('[i]','<i>', $str);
    $str = str_replace('[b]','<b>', $str);
    $str = str_replace('[u]','<u>', $str);
    for($i = 1; $i <= 100; $i++){
        $str = str_replace('[size=' . $i . ']','<span style="font-size: ' . $i . 'px">', $str);
    }
    $str = str_replace('[left]','<span style="text-align: left">', $str);
    $str = str_replace('[center]','<span style="text-align: center">', $str);
    $str = str_replace('[right]','<span style="text-align: right">', $str);
    $str = str_replace('[justify]','<span style="text-align: justify">', $str);
    $str = str_replace('[img]','<img src="', $str);
    $str = str_replace('[url="','<a href="', $str);
    $str = str_replace('"]','">', $str);

    $str = str_replace('[/i]','</i>', $str);
    $str = str_replace('[/b]','</b>', $str);
    $str = str_replace('[/u]','</u>', $str);
    $str = str_replace('[/size]','</span>', $str);
    $str = str_replace('[/left]','</span>', $str);
    $str = str_replace('[/center]','</span>', $str);
    $str = str_replace('[/right]','</span>', $str);
    $str = str_replace('[/justify]','</span>', $str);
    $str = str_replace('[/img]','"/>', $str);
    $str = str_replace('[/url]','</a>', $str);
    return $str;
} ?>