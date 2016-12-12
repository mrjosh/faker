<?php

if(! function_exists('randomString')){

    /**
     * Get random string
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @param int $length
     * @param null $type
     * @return string
     */
    function randomString($length = 20, $type = null){

        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $lowercase = 'abcdefghijklmnopqrstuvwxyz';

        if(is_null($type)){

            $characters = $uppercase . $lowercase;

        } elseif ($type = 'lowercase'){

            $characters = $lowercase;

        } else {
            $characters = $uppercase;
        }

        $string  = '';

        for($i = 1;$i < $length;$i++){
            $string .= $characters[rand(0,strlen($characters))];
        }

        return $string;
    }

}