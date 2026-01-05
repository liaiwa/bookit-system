<?php

// src/Model/Table/BlockedSlotsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class BlockedSlotsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('blocked_slots');
        $this->setPrimaryKey('id');

        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
            'className' => 'Users',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Creators', [
            'foreignKey' => 'created_by',
            'className' => 'Users'
        ]);
    }
}