<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

class AcademicController extends AppController
{
    // =========================
    // FACULTIES
    // =========================
    public function faculties()
    {
        $Faculties = $this->fetchTable('Faculties');

        $faculties = $Faculties->find()
            ->orderAsc('Faculties.faculty_name')
            ->all();

        $this->set(compact('faculties'));
    }

    public function facultyView($id = null)
    {
        if (!$id) {
            throw new NotFoundException('Faculty not found');
        }

        $Faculties = $this->fetchTable('Faculties');

        $faculty = $Faculties->find()
            ->where(['Faculties.id' => (int)$id])
            ->contain([
                'Programmes' => function ($q) {
                    return $q->orderAsc('Programmes.programme_name');
                }
            ])
            ->first();

        if (!$faculty) {
            throw new NotFoundException('Faculty not found');
        }

        $this->set(compact('faculty'));
    }

    // =========================
    // PROGRAMMES
    // =========================
    public function programmes()
    {
        $Programmes = $this->fetchTable('Programmes');

        $programmes = $Programmes->find()
            ->contain(['Faculties'])
            ->orderAsc('Programmes.programme_name')
            ->all();

        $this->set(compact('programmes'));
    }

    public function programmeView($id = null)
    {
        if (!$id) {
            throw new NotFoundException('Programme not found');
        }

        $Programmes = $this->fetchTable('Programmes');

        $programme = $Programmes->find()
            ->where(['Programmes.id' => (int)$id])
            ->contain([
                'Faculties',
                'Students' => function ($q) {
                    return $q->orderAsc('Students.student_id');
                }
            ])
            ->first();

        if (!$programme) {
            throw new NotFoundException('Programme not found');
        }

        $this->set(compact('programme'));
    }

    // =========================
    // STUDENTS  ✅ (NEXT ONE)
    // =========================
    public function students()
    {
        $Students = $this->fetchTable('Students');

        $students = $Students->find()
            ->contain(['Programmes' => ['Faculties'], 'Users'])
            ->orderAsc('Students.student_id')
            ->all();

        $this->set(compact('students'));
    }

    public function studentView($id = null)
    {
        if (!$id) {
            throw new NotFoundException('Student not found');
        }

        $Students = $this->fetchTable('Students');

        $student = $Students->find()
            ->where(['Students.id' => (int)$id])
            ->contain(['Programmes' => ['Faculties'], 'Users'])
            ->first();

        if (!$student) {
            throw new NotFoundException('Student not found');
        }

        $this->set(compact('student'));
    }
}
