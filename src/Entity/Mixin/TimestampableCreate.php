<?php

namespace App\Entity\Mixin;

use Doctrine\ORM\Mapping as ORM;

trait TimestampableCreate
{
    /**
     * @var \DateTime $createTime
     *
     * @ORM\Column(name="create_time", type="datetime")
     */
    private $createTime;


    /**
     * Get createTime
     *
     * @return \Datetime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set createTime
     *
     * @param \Datetime $createTime
     * @return $this
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function setTimestamps()
    {
        $now = new \DateTime();

        if (is_null($this->createTime)) {
            $this->createTime = $now;
        }

    }
}