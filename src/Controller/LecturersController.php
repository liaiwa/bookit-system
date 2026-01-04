<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

/**
 * LecturersController class
 *
 * Handles lecturer-related actions
 */
class LecturersController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index(): void
    {
        $Lecturers = $this->fetchTable('Lecturers');

        $lecturers = $Lecturers->find()
            ->contain(['Faculties'])
            ->orderAsc('Lecturers.lecturer_id')
            ->all();

        $this->set(compact('lecturers'));
    }

    /**
     * View method
     *
     * @param int|null $id Lecturer id
     * @return void Renders view
     * @throws \Cake\Http\Exception\NotFoundException When lecturer not found
     */
    public function view(?int $id = null): void
    {
        if (!$id) {
            throw new NotFoundException('Lecturer not found');
        }

        $Lecturers = $this->fetchTable('Lecturers');

        $lecturer = $Lecturers->find()
            ->where(['Lecturers.id' => $id])
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
