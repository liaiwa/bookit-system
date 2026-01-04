<h1>Students</h1>

<ul>
<?php foreach ($students as $s): ?>
    <li>
        <a href="<?= $this->Url->build('/academic/student-view/' . $s->id) ?>">
            <?= h($s->student_id) ?>
        </a>

        <?php if ($s->programme): ?>
            - <?= h($s->programme->programme_name) ?>
            <?php if (!empty($s->programme->faculty)): ?>
                (<?= h($s->programme->faculty->faculty_name) ?>)
            <?php endif; ?>
        <?php else: ?>
            - (No programme)
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>
