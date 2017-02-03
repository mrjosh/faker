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
        $name = array_rand($this->objects['names']);

        return $this->objects['names'][$name];
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
        $name = array_rand($this->objects['families']);

        return $this->objects['families'][$name];
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
        $name = array_rand($this->objects['companies']);

        return $this->objects['companies'][$name];
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
        $prefix = array_rand($this->objects['prefixTelePhones']);

        $prefix = $this->objects['prefixTelePhones'][$prefix];

        return string('0' . $prefix . randomNumber(7));
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
        $prefix = array_rand($this->objects['prefixPhones']);

        $prefix = $this->objects['prefixPhones'][$prefix];

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
        $service = array_rand($this->objects['mailServices']);

        $service = $this->objects['mailServices'][$service];

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
        $domain = array_rand($this->objects['domains']);

        $domain = $this->objects['domains'][$domain];

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
        $protocol = array_rand($this->objects['protocols']);

        $protocol = $this->objects['protocols'][$protocol];
        
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
        $name = array_rand($this->objects['address']);

        return string($this->objects['address'][$name]);
    }

}
