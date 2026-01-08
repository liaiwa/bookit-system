<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * ProgrammesTable class
 *
 * Handles programmes data
 */
class ProgrammesTable extends Table
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

        $this->setTable('programmes');
        $this->setPrimaryKey('id');
        $this->setDisplayField('programme_name');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'LEFT',
        ]);

        $this->hasMany('Students', [
            'foreignKey' => 'programme_id',
        ]);
    }
}
