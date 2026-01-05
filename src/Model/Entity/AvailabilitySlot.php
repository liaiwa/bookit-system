<?php

// src/Model/Entity/AvailabilitySlot.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class AvailabilitySlot extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'booked_count' => false,
    ];

    protected function _getTimeRange()
    {
        return $this->start_time->format('H:i') . ' - ' . $this->end_time->format('H:i');
    }

    protected function _getIsFull()
    {
        return $this->booked_count >= $this->max_bookings;
    }

    protected function _getRemainingSlots()
    {
        return max(0, $this->max_bookings - $this->booked_count);
    }
}