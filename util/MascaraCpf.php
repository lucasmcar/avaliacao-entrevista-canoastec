<?php

class MascaraCpf
{
    static function mascara($val, $mascara) {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mascara)-1; $i++) {
            if($mascara[$i] == '#') 
            {
                if(isset($val[$k]))
                {
                    $maskared .= $val[$k++];
                } 
            } else 
            {
                if(isset($mascara[$i]))
                {
                    $maskared .= $mascara[$i];
                } 
            }
        }
        return $maskared;
    }
}