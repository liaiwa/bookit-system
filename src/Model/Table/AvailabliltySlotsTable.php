<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * AvailabilitySlotsTable class
 *
 * Handles availability slots data
 */
class AvailabilitySlotsTable extends Table
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

        $this->setTable('availability_slots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
            'joinType' => 'INNER',
        ]);
    }
}
