<h1>Student Details</h1>

<p><b>Student ID:</b> <?= h($student->student_id) ?></p>
<p><b>Year of Study:</b> <?= h($student->year_of_study) ?></p>
<p><b>Semester:</b> <?= h($student->semester) ?></p>
<p><b>CGPA:</b> <?= h($student->cgpa) ?></p>

<?php if ($student->programme): ?>
    <p><b>Programme:</b> <?= h($student->programme->programme_name) ?> (<?= h($student->programme->programme_code) ?>)</p>
    <?php if (!empty($student->programme->faculty)): ?>
        <p><b>Faculty:</b> <?= h($student->programme->faculty->faculty_name) ?> (<?= h($student->programme->faculty->faculty_code) ?>)</p>
    <?php endif; ?>
<?php endif; ?>

<p><a href="<?= $this->Url->build('/academic/students') ?>">← Back to Students</a></p>
