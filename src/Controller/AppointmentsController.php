<?php
declare(strict_types=1);

namespace App\Controller;

class AppointmentsController extends AppController
{
    public function index()
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

    public function add()
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
                return $this->redirect(['action' => 'index']); // return wajib
            }

            $this->Flash->error('Failed to save appointment. Please check the form.');
        }

        $this->set(compact('appointment', 'students', 'lecturers'));
    }
}
