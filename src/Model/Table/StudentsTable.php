<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class StudentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setPrimaryKey('id');
        $this->setDisplayField('student_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('Programmes', [
            'foreignKey' => 'programme_id',
            'joinType' => 'LEFT',
        ]);
    }
}
