<?php

namespace Josh\Faker;

class FakerBase {

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
    
}