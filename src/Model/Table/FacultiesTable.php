<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class FacultiesTable extends Table
{
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
