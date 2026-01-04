<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * LecturersTable class
 *
 * Handles lecturers data
 */
class LecturersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table
     * @return void
     */
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
