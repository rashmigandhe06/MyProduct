<?php

if(!function_exists('num_rows')){
    function num_rows($page, $limit){
        if(is_null($page)){
            $page=1;
        }

        $num = ($page * $limit) - ($limit-1);
        return $num;
    }
}
