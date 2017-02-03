<?php

namespace Josh\Faker;

if(! function_exists('string')){
    /**
     * Return string of variable
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 3 Feb 2016
     * @param $value
     * @return string
     */
    function string($value)
    {
        return (string)$value;
    }
}

if(! function_exists('faker')){
    /**
     * Return the faker instance
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 3 Feb 2016
     * @return Faker
     */
    function faker()
    {
        return new Faker();
    }
}

if(! function_exists('randomNumber')){
    /**
     * Return random number
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 3 Feb 2016
     * @param int $length
     * @param bool $int
     * @return int|string
     */
    function randomNumber($length = 20, $int = false)
    {
        $numbers = "0123456789";

        $number  = '';

        for($i = 1;$i < $length;$i++){
            $num = $numbers[rand(0,strlen($numbers) - 1)];
            if($num === 0 && $i === 1){
                continue;
            }

            $number .= $num ;
        }

        if($int){
            return (integer)$number;
        }

        return string($number);
    }
}

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
            $string .= $characters[rand(0,strlen($characters) - 1)];
        }

        return $string;
    }

}
