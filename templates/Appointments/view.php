<h1>Appointment Details</h1>

<p><b>Booking Code:</b> <?= h($appointment->booking_code) ?></p>
<p><b>Status:</b> <?= h($appointment->status) ?></p>
<p><b>Date:</b> <?= h($appointment->appointment_date) ?></p>
<p><b>Time:</b> <?= h($appointment->start_time) ?> - <?= h($appointment->end_time) ?></p>

<?php if (!empty($appointment->lecturer)): ?>
    <p><b>Lecturer:</b> <?= h($appointment->lecturer->lecturer_id) ?></p>
<?php endif; ?>

<?php if (!empty($appointment->student)): ?>
    <p><b>Student ID (record):</b> <?= h($appointment->student->student_id) ?></p>
<?php endif; ?>

<?php if (!empty($appointment->availability_slot)): ?>
    <p><b>Slot:</b> <?= h($appointment->availability_slot->slot_date) ?> (<?= h($appointment->availability_slot->start_time) ?>)</p>
<?php endif; ?>
