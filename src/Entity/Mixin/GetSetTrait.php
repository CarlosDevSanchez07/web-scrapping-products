<?php

namespace App\Entity\Mixin;

use Doctrine\ORM\Mapping as ORM;

trait GetSetTrait
{
    /**
     * Get property
     *
     * @param string $name
     *
     * @return mixed
     */
    public function get($name) {
        return $this->$name;
    }

    /**
     * Set property
     *
     * @param string $name
     *
     * @return object
     */
    public function set($name, $value) {
        $this->$name = $value;

        return $this;
    }
}