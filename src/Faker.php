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
 * @property integer $phone
 * @property integer $telephone
 * @property integer $age
 * @property string $email
 * @property string $domain
 * @property string $website
 * @property string $pageUrl
 * @property string $company
 * @property string $mobile
 * @property string $address
 */
class Faker extends FakerBase {

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
