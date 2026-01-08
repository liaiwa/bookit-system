<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * FacultiesTable class
 *
 * Handles faculties data
 */
class FacultiesTable extends Table
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

        $this->setTable('faculties');
        $this->setDisplayField('faculty_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Programmes', [
            'foreignKey' => 'faculty_id',
        ]);
    }
}
