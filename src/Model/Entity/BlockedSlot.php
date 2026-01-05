<?php

// src/Model/Entity/BlockedSlot.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class BlockedSlot extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getTimeRange()
    {
        if (!$this->start_time || !$this->end_time) return 'Full Day';
        return $this->start_time->format('H:i') . ' - ' . $this->end_time->format('H:i');
    }

    // Color untuk reason (teal blue theme friendly)
    protected function _getReasonColor()
    {
        $colors = [
            'holiday'      => 'info',     // teal/light blue
            'maintenance'  => 'warning',
            'emergency'    => 'danger',
            'personal'     => 'secondary',
            'other'        => 'dark'
        ];
        return $colors[$this->reason] ?? 'primary';
    }
}