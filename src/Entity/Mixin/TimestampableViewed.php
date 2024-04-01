<?php

namespace App\Entity\Mixin;

use Doctrine\ORM\Mapping as ORM;

trait TimestampableViewed
{

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime_viewed", type="datetime", nullable=true)
     */
    private $datetimeViewed;

    /**
     * Get datetimeViewed
     *
     * @return \Datetime
     */
    public function getDatetimeViewed()
    {
        return $this->datetimeViewed;
    }

    /**
     * Set datetimeViewed
     *
     * @param \Datetime $updatedAt
     * @return $this
     */
    public function setDatetimeViewed($datetimeViewed)
    {
        $this->datetimeViewed = $datetimeViewed;

        return $this;
    }

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function setTimestamps()
    {
        $now = new \DateTime();

        $this->setDatetimeViewed($now);
    }
}