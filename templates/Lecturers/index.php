<h1>Lecturers</h1>

<?php if (empty($lecturers->toArray())): ?>
    <p>No lecturers found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($lecturers as $l): ?>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'Lecturers', 'action' => 'view', $l->id]) ?>">
                    <?= h($l->lecturer_id) ?> - <?= h($l->position ?? 'Lecturer') ?>
                </a>
                <?php if (!empty($l->faculty)): ?>
                    (<?= h($l->faculty->faculty_name) ?>)
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
