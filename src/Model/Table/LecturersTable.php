<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class LecturersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('lecturers');
        $this->setDisplayField('lecturer_id');
        $this->setPrimaryKey('id');

        // relationships ikut schema.sql
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'LEFT',
        ]);

        $this->hasMany('AvailabilitySlots', [
            'foreignKey' => 'lecturer_id',
        ]);

        $this->hasMany('Appointments', [
            'foreignKey' => 'lecturer_id',
        ]);
    }
}
