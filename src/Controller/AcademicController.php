<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;

/**
 * AcademicController class
 *
 * Handles academic-related actions including faculties, programmes, and students
 */
class AcademicController extends AppController
{
    // =========================
    // INDEX - REQUIRED METHOD
    // =========================

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null Redirects to faculties page
     */
    public function index(): ?Response
    {
        // Redirect to faculties page (or show dashboard)
        return $this->redirect(['action' => 'faculties']);
    }

    // =========================
    // FACULTIES
    // =========================

    /**
     * Faculties method
     *
     * @return void Renders view
     */
    public function faculties(): void
    {
        $Faculties = $this->fetchTable('Faculties');

        $faculties = $Faculties->find()
            ->orderAsc('Faculties.faculty_name')
            ->all();

        $this->set(compact('faculties'));
    }

    /**
     * Faculty view method
     *
     * @param int|null $id Faculty id
     * @return void Renders view
     * @throws \Cake\Http\Exception\NotFoundException When faculty not found
     */
    public function facultyView(?int $id = null): void
    {
        if (!$id) {
            throw new NotFoundException('Faculty not found');
        }

        $Faculties = $this->fetchTable('Faculties');

        $faculty = $Faculties->find()
            ->where(['Faculties.id' => $id])
            ->contain([
                'Programmes' => function ($q) {
                    return $q->orderAsc('Programmes.programme_name');
                },
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

    /**
     * Programmes method
     *
     * @return void Renders view
     */
    public function programmes(): void
    {
        $Programmes = $this->fetchTable('Programmes');

        $programmes = $Programmes->find()
            ->contain(['Faculties'])
            ->orderAsc('Programmes.programme_name')
            ->all();

        $this->set(compact('programmes'));
    }

    /**
     * Programme view method
     *
     * @param int|null $id Programme id
     * @return void Renders view
     * @throws \Cake\Http\Exception\NotFoundException When programme not found
     */
    public function programmeView(?int $id = null): void
    {
        if (!$id) {
            throw new NotFoundException('Programme not found');
        }

        $Programmes = $this->fetchTable('Programmes');

        $programme = $Programmes->find()
            ->where(['Programmes.id' => $id])
            ->contain([
                'Faculties',
                'Students' => function ($q) {
                    return $q->orderAsc('Students.student_id');
                },
            ])
            ->first();

        if (!$programme) {
            throw new NotFoundException('Programme not found');
        }

        $this->set(compact('programme'));
    }

    // =========================
    // STUDENTS
    // =========================

    /**
     * Students method
     *
     * @return void Renders view
     */
    public function students(): void
    {
        $Students = $this->fetchTable('Students');

        $students = $Students->find()
            ->contain(['Programmes' => ['Faculties'], 'Users'])
            ->orderAsc('Students.student_id')
            ->all();

        $this->set(compact('students'));
    }

    /**
     * Student view method
     *
     * @param int|null $id Student id
     * @return void Renders view
     * @throws \Cake\Http\Exception\NotFoundException When student not found
     */
    public function studentView(?int $id = null): void
    {
        if (!$id) {
            throw new NotFoundException('Student not found');
        }

        $Students = $this->fetchTable('Students');

        $student = $Students->find()
            ->where(['Students.id' => $id])
            ->contain(['Programmes' => ['Faculties'], 'Users'])
            ->first();

        if (!$student) {
            throw new NotFoundException('Student not found');
        }

        $this->set(compact('student'));
    }
}
