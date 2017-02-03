<?php

use Josh\Faker\Faker;

class FakerTest extends PHPUnit_Framework_TestCase
{
    protected $objects = [];

    public function __construct()
    {
        parent::__construct();

        $this->objects = require __DIR__ . '/../objects.php';
    }

    public function testFirstName()
    {
        $this->assertTrue(in_array(Faker::firstname(),$this->objects['names']));
    }

    public function testLastName()
    {
        $this->assertTrue(in_array(Faker::lastname(),$this->objects['families']));
    }

    public function testCompany()
    {
        $this->assertTrue(in_array(Faker::company(),$this->objects['companies']));
    }

    public function testMobile()
    {
        $phonePrefix = substr(str_replace(0,'',Faker::mobile()), 0, 3);

        $this->assertTrue(in_array($phonePrefix,$this->objects['prefixTelePhones']));
    }

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

    public function testAge()
    {
        $age = \Josh\Faker\faker()->age;

        $assert = false;

        if($age <= 70 && $age >= 17){
            $assert = true;
        }

        $this->assertTrue($assert);

        $this->assertNotFalse($assert);
    }

    public function testEmail()
    {
        $email = \Josh\Faker\faker()->email;

        $this->assertNotFalse(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    public function testDomain()
    {
        $this->assertRegExp('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/',Faker::domain());
    }
    
}