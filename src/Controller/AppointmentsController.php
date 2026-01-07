<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;

/**
 * AppointmentsController class
 *
 * Handles appointment-related actions
 */
class AppointmentsController extends AppController
{
    /**
     * Index method
     *
     * @return void Renders view
     */
    public function index(): void
    {
        $this->paginate = [
            'contain' => ['Students', 'Lecturers'],
            'order' => ['Appointments.id' => 'DESC'],
            'limit' => 20,
        ];

        $Appointments = $this->fetchTable('Appointments');
        $appointments = $this->paginate($Appointments);

        $this->set(compact('appointments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise
     */
    public function add(): ?Response
    {
        $Appointments = $this->fetchTable('Appointments');
        $appointment = $Appointments->newEmptyEntity();

        // Dropdown data
        $Students = $this->fetchTable('Students');
        $Lecturers = $this->fetchTable('Lecturers');

        $students = $Students->find('list', [
            'keyField' => 'id',
            'valueField' => 'student_id',
        ])
            ->orderAsc('student_id')
            ->toArray();

        $lecturers = $Lecturers->find('list', [
            'keyField' => 'id',
            'valueField' => 'lecturer_id',
        ])
            ->orderAsc('lecturer_id')
            ->toArray();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Default status kalau kosong
            if (empty($data['status'])) {
                $data['status'] = 'Pending';
            }

            // Auto booking_code kalau kosong
            if (empty($data['booking_code'])) {
                $data['booking_code'] = 'BK' . date('YmdHis') . random_int(100, 999);
            }

            $appointment = $Appointments->patchEntity($appointment, $data);

            if ($Appointments->save($appointment)) {
                $this->Flash->success('Appointment booking saved!');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Failed to save appointment. Please check the form.');
        }

        $this->set(compact('appointment', 'students', 'lecturers'));

        return null;
    }
}
