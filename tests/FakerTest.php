<?php

use Josh\Faker\Faker;
use function Josh\Faker\isMeliCode;

class FakerTest extends PHPUnit_Framework_TestCase
{
    protected $objects = [];

    /**
     * FakerTest constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->objects = require __DIR__ . '/../objects.php';
    }

    /**
     * Test firstname genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testFirstName()
    {
        $this->assertTrue(in_array(Faker::firstname(),$this->objects['names']));
    }

    /**
     * Test lastname genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testLastName()
    {
        $this->assertTrue(in_array(Faker::lastname(),$this->objects['families']));
    }

    /**
     * Test company genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testCompany()
    {
        $this->assertTrue(in_array(Faker::company(),$this->objects['companies']));
    }

    /**
     * Test mobile genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testMobile()
    {
        $phonePrefix = substr(str_replace(0,'',Faker::mobile()), 0, 3);

        $this->assertTrue(in_array($phonePrefix,$this->objects['prefixTelePhones']));
    }

    /**
     * Test phone genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testPhone()
    {
        $all = $this->objects['prefixPhones'];

        $test = false;

        for ($i=1;$i < 4;$i++){
            $test = in_array(

                substr(str_replace(0,'',Faker::telephone()), 0, $i)

                , $all
            );

            if($test){
                break;
            } else {
                continue;
            }
        }

        $this->assertTrue($test);

        $this->assertNotFalse($test);
    }

    /**
     * Test age genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testAge()
    {
        $age = Faker::age();

        $assert = false;

        if($age <= 70 && $age >= 17){
            $assert = true;
        }

        $this->assertTrue($assert);

        $this->assertNotFalse($assert);
    }

    /**
     * Test email genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testEmail()
    {
        $email = Faker::email();

        $this->assertNotFalse(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /**
     * Test domain genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testDomain()
    {
        $this->assertRegExp('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/',Faker::domain());
    }

    /**
     * Test city genrator
     *
     * @author Vahid Almasi <vahid.almasi71@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testCity()
    {
        $this->assertTrue(in_array(Faker::city(),$this->objects['city']));
    }

    /**
     * Test melicode genrator
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 4 Feb 2017
     * @return void
     */
    public function testMeliCode()
    {
        $this->assertTrue(isMeliCode(Faker::meliCode()));
    }
    
}