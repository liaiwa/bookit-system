<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class LecturersController extends AppController
{
    public function index()
    {
        $Lecturers = $this->fetchTable('Lecturers');

        $lecturers = $Lecturers->find()
            ->contain(['Faculties'])
            ->orderAsc('Lecturers.lecturer_id')
            ->all();

        $this->set(compact('lecturers'));
    }

    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException('Lecturer not found');
        }

        $Lecturers = $this->fetchTable('Lecturers');

        $lecturer = $Lecturers->find()
            ->where(['Lecturers.id' => (int)$id])
            ->contain([
                'Faculties',
                'AvailabilitySlots' => function ($q) {
                    return $q->orderAsc('AvailabilitySlots.slot_date')
                        ->orderAsc('AvailabilitySlots.start_time');
                },
            ])
            ->first();

        if (!$lecturer) {
            throw new NotFoundException('Lecturer not found');
        }

        $this->set(compact('lecturer'));
    }
}
