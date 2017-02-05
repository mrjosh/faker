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
     * @return Generator
     */
    function faker()
    {
        return new Generator();
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

        for($i = 1;$i <= $length;$i++){
            $num = $numbers[rand(0,strlen($numbers) - 1)];
            
            if($num == 0 && $i == 1){
                $i = 1;
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
     * @throws \Exception
     */
    function randomString($length = 20, $type = null){

        $characters = [
            'uppercase' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'lowercase' => 'abcdefghijklmnopqrstuvwxyz'
        ];

        if(($type !== 'uppercase' && $type !== 'lowercase') && ! is_null($type)){
            throw new \Exception("The type of $type does not exists!");
        }

        if(! is_null($type)){
            $characters = $characters[$type];
        } else {
            $characters = $characters['lowercase'] . $characters['uppercase'];
        }

        $string  = '';

        for($i = 1;$i <= $length;$i++){
            $string .= $characters[rand(0,strlen($characters) - 1)];
        }

        return $string;
    }

}

if(! function_exists('isMeliCode')){
    /**
     * Check is meli code function
     *
     * @param $value
     * @return bool
     */
    function isMeliCode($value)
    {
        $sub = 0;
        if (!preg_match('/^\d{8,10}$/', $value)) {
            return false;
        }
        if (strlen($value) == 8) {
            $value = '00' . $value;
        } elseif (strlen($value) == 9) {
            $value = '0' . $value;
        }
        for ($i = 0; $i <= 8; $i++) {
            $sub = $sub + ( $value[$i] * ( 10 - $i ) );
        }
        if (( $sub % 11 ) < 2) {
            $control = ( $sub % 11 );
        } else {
            $control = 11 - ( $sub % 11 );
        }
        if ($value[9] == $control) {
            return true;
        } else {
            return false;
        }
    }
}
