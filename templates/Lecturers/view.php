<h1>Lecturer Details</h1>

<p><b>Lecturer ID:</b> <?= h($lecturer->lecturer_id) ?></p>
<p><b>Position:</b> <?= h($lecturer->position) ?></p>
<p><b>Office:</b> <?= h($lecturer->office_location) ?></p>

<?php if (!empty($lecturer->faculty)): ?>
    <p><b>Faculty:</b> <?= h($lecturer->faculty->faculty_name) ?></p>
<?php endif; ?>

<h2>Availability Slots</h2>

<?php if (empty($lecturer->availability_slots)): ?>
    <p>No slots yet.</p>
<?php else: ?>
    <ul>
        <?php foreach ($lecturer->availability_slots as $s): ?>
            <li>
                <?= h($s->slot_date) ?> | <?= h($s->start_time) ?> - <?= h($s->end_time) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
