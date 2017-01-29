<?php

namespace Josh\Faker;

/**
 * Faker object
 *
 * @author Alireza Josheghani <josheghani.dev@gmail.com>
 * @since 12 Dec 2016
 * @property string $fullname
 * @property string $lastname
 * @property integer $phone
 * @property integer $telephone
 * @property integer $age
 * @property string $email
 * @property string $domain
 * @property string $website
 * @property string $pageUrl
 */
class Faker
{

    /**
     * Getter gender type
     *
     * @var string | null
     */
    protected $gender = null;

    /**
     * Set male format of firstnames
     *
     * @return $this
     */
    public function male()
    {
        $this->gender = 'male';

        return $this;
    }

    /**
     * Set female format of firstnames
     *
     * @return $this
     */
    public function female()
    {
        $this->gender = 'female';

        return $this;
    }

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
        $instance = new Generator($this->gender);

        return $instance->$method();
    }

}