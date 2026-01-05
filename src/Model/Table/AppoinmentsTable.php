<?php

// src/Model/Table/AppointmentsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class AppointmentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('appointments');
        $this->setPrimaryKey('id');
        $this->setDisplayField('booking_code');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'className' => 'Users'
        ]);
        $this->belongsTo('Lecturers', [
            'foreignKey' => 'lecturer_id',
            'className' => 'Users'
        ]);
        $this->belongsTo('AvailabilitySlots', [
            'foreignKey' => 'slot_id'
        ]);

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('purpose')
            ->notEmptyString('purpose', 'Sila pilih tujuan temujanji.')

            ->scalar('meeting_mode')
            ->allowEmptyString('meeting_mode')

            ->scalar('meeting_link')
            ->allowEmptyString('meeting_link')
            ->urlWithProtocol('meeting_link', 'Sila masukkan URL yang sah jika online.');

        return $validator;
    }

    public function beforeSave($event, $entity, $options)
    {
        $date = $entity->appointment_date;
        $start = $entity->start_time;
        $end = $entity->end_time;
        $lecturerId = $entity->lecturer_id;

        // Generate booking_code kalau baru
        if ($entity->isNew() && !$entity->booking_code) {
            $entity->booking_code = strtoupper('B' . substr(uniqid(), -8));
        }

        // === CONFLICT CHECKS ===
        $query = $this->find();
        $conflict = $query->where([
            'lecturer_id' => $lecturerId,
            'appointment_date' => $date,
            'status IN' => ['pending', 'approved'],
            'OR' => [
                ['start_time <' => $end, 'end_time >' => $start]
            ]
        ])->count();

        if ($conflict > 0) {
            $entity->setError('start_time', 'Slot masa ini sudah ditempah oleh pelajar lain.');
            return false;
        }

        // Check blocked_slots
        $blocked = $this->getAssociation('BlockedSlots')->find()
            ->where([
                'is_active' => 1,
                'block_date' => $date,
                'start_time <=' => $end,
                'end_time >=' => $start,
                'OR' => [
                    'lecturer_id' => $lecturerId,
                    'lecturer_id IS NULL'
                ]
            ])->count();

        if ($blocked > 0) {
            $entity->setError('appointment_date', 'Slot ini diblok oleh admin/lecturer.');
            return false;
        }

        // Check max_bookings kalau slot_id ada
        if ($entity->slot_id && $entity->isNew()) {
            $slot = $this->AvailabilitySlots->get($entity->slot_id);
            if ($slot->booked_count >= $slot->max_bookings) {
                $entity->setError('slot_id', 'Slot ini sudah penuh.');
                return false;
            }
        }

        return true;
    }

    public function afterSave($event, $entity, $options)
    {
        if ($entity->isNew() && $entity->slot_id) {
            $this->AvailabilitySlots->incrementBookedCount($entity->slot_id);
        }
    }

    public function afterDelete($event, $entity, $options)
    {
        if ($entity->slot_id && in_array($entity->status, ['pending', 'approved'])) {
            $this->AvailabilitySlots->decrementBookedCount($entity->slot_id);
        }
    }
}