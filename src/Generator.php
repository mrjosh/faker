<?php

namespace Josh\Faker;

class Generator
{

    /**
     * List of first names
     *
     * @var array
     */
    protected $objects = [];

    /**
     * Set objects, Generator constructor.
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 3 Feb 2017
     */
    public function __construct()
    {
        $this->objects = require __DIR__ . '/../objects.php';
    }

    /**
     * Get firtname
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return mixed
     */
    public function firstname()
    {
        return $this->getRandomKey('names');
    }

    /**
     * Get last name
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return mixed
     */
    public function lastname()
    {
        return $this->getRandomKey('families');
    }
    
    
    /**
     * Get company name
     *
     * @author Vahid Almasi <vahid.almasi71@gmail.com>
     * @since 29 Jan 2017
     * @return mixed
     */
    public function company()
    {
        return $this->getRandomKey('companies');
    }

    /**
     * Get random firstname and lastname
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function fullname()
    {
        return $this->firstname() . ' ' . $this->lastname();
    }

    /**
     * Get telephone
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function mobile()
    {
        $prefix = $this->getRandomKey('prefixTelePhones');

        $phone = string('0' . $prefix . randomNumber(7));

        return ( strlen($phone) !== 11 ? $phone . rand(1,10) : $phone );
    }

    /**
     * Get random phone
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function telephone()
    {
        $prefix = $this->getRandomKey('prefixPhones');

        return string('0' . $prefix . randomNumber(7));
    }

    /**
     * Get random email
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function email()
    {
        $service = $this->getRandomKey('mailServices');

        return string(randomString(30,'lowercase') . '@' . $service);
    }

    /**
     * Get random domain
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function domain()
    {
        $domain = $this->getRandomKey('domains');

        return string(randomString(20,'lowercase') . $domain);
    }

    /**
     * Get random website
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function website()
    {
        $protocol = $this->getRandomKey('domains');
        
        return string($protocol . '://www' . $this->domain());
    }

    /**
     * Get random page url
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @return string
     */
    public function pageUrl()
    {
        $rand = rand(3,7);

        $string = '';

        $count = rand(2,8);

        for($i=0;$i < $rand;$i++){
            $string .= randomString($count,'lowercase') . '/';
        }

        return rtrim($string,'/');
    }

    /**
     * Get random age
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Dec 2016
     * @param int $min
     * @param int $max
     * @return int
     */
    public function age($min = 16, $max = 70)
    {
        return rand($min,$max);
    }

    /**
     * Get random address
     *
     * @author Vahid Almasi <vahid.almasi71@gmail.com>
     * @since 3 Feb 2017
     * @return mixed
     */
    public function address()
    {
        return $this->getRandomKey('address');
    }

    /**
     * Get random city
     *
     * @author Vahid Almasi <vahid.almasi71@gmail.com>
     * @since 4 Feb 2017
     * @return mixed
     */
    public function city()
    {
        return $this->getRandomKey('city');
    }

    /**
     * Generate random melicode number
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return int|null|string
     */
    public function meliCode()
    {
        $code = $this->generateMeliCode();

        if(is_null($code)){
            $code = $this->generateMeliCode();
        }

        return $code;
    }

    /**
     * Generate meli code
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 5 Feb 2017
     * @return int|null|string
     */
    private function generateMeliCode()
    {
        $code = null;

        for($i = 1;$i < 100;$i++){

            $meli = randomNumber(10,true);

            if(strlen($meli) != 10){
                continue;
            }

            $c = substr($meli,9,1);

            $n = substr($meli,0,1) * 10 +
                substr($meli,1,1) * 9 +
                substr($meli,2,1) * 8 +
                substr($meli,3,1) * 7 +
                substr($meli,4,1) * 6 +
                substr($meli,5,1) * 5 +
                substr($meli,6,1) * 4 +
                substr($meli,7,1) * 3 +
                substr($meli,8,1) * 2;

            $r = $n - (int)($n / 11) * 11;

            if (($r == 0 && $r == $c) || ($r == 1 && $c == 1) || ($r > 1 && $c == 11 - $r)) {

                if(! isMeliCode($meli)){
                    continue;
                }

                $code = $meli;

            } else {
                continue;
            }

            $i++;
        }

        return $code;
    }

    /**
     * Get random key from array
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @param $object
     * @return string
     */
    private function getRandomKey($object = null)
    {
        $name = 0;
        $array = [];

        if(is_array($object)){
            $array = $object;
            $name = array_rand($object);
        } elseif(is_string($object)) {
            $array = $this->objects[$object];
            $name = array_rand($array);
        }

        return string($array[$name]);
    }

}
