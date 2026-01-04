<?php
/**
 * @var \App\Model\Entity\Programme $programme
 */
?>

<h1><?= h($programme->programme_name) ?></h1>

<p>
    <strong>Programme Code:</strong>
    <?= h($programme->programme_code) ?>
</p>

<p>
    <strong>Faculty:</strong>
    <?= h($programme->faculty->faculty_name ?? '-') ?>
</p>

<p>
    <strong>Duration:</strong>
    <?= h($programme->duration_years) ?> years
</p>

<p>
    <strong>Total Credits:</strong>
    <?= h($programme->total_credits) ?>
</p>

<?php if (!empty($programme->students)) : ?>
    <h2>Students</h2>
    <ul>
        <?php foreach ($programme->students as $student) : ?>
            <li><?= h($student->student_id) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
