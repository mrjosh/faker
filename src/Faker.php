<?php

namespace Josh\Faker;

/**
 * Faker object
 *
 * @author Alireza Josheghani <josheghani.dev@gmail.com>
 * @since 12 Dec 2016
 * @property string $fullname
 * @property string $firstname
 * @property string $lastname
 * @property integer $telephone
 * @property integer $age
 * @property string $email
 * @property string $domain
 * @property string $website
 * @property string $pageUrl
 * @property string $company
 * @property string $mobile
 * @property string $address
 * @property string $city
 * @property string $meliCode
 * @method static fullname()
 * @method static firstname()
 * @method static lastname()
 * @method static telephone()
 * @method static age($min = 16,$max = 70)
 * @method static email()
 * @method static domain()
 * @method static website()
 * @method static pageUrl()
 * @method static company()
 * @method static mobile()
 * @method static address()
 * @method static city()
 * @method static meliCode()
 */
class Faker
{

    /**
     * Call method from magic method
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 12 Dec 2016
     * @param $method
     * @return mixed
     */
    public function __get($method)
    {
        $instance = new Generator();

        return $instance->$method();
    }

    /**
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 3 Feb 2017
     * @param $method
     * @param $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = new Generator();

        return $instance->$method(...$args);
    }

}
