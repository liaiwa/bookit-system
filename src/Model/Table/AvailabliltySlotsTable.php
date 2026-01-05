<?php

// src/Model/Table/AvailabilitySlotsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class AvailabilitySlotsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('availability_slots');
        $this->setPrimaryKey('id');

        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
            'className' => 'Users'
        ]);

        $this->hasMany('Appointments', [
            'foreignKey' => 'slot_id'
        ]);
    }

    public function incrementBookedCount($id)
    {
        $this->query()
            ->update()
            ->set($this->getConnection()->newQuery()->func()->sum('booked_count + 1'))
            ->where(['id' => $id])
            ->execute();
    }

    public function decrementBookedCount($id)
    {
        $this->query()
            ->update()
            ->set($this->getConnection()->newQuery()->func()->sum('booked_count - 1'))
            ->where(['id' => $id, 'booked_count >' => 0])
            ->execute();
    }
}