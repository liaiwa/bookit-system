<h1><?= h($faculty->faculty_name) ?> (<?= h($faculty->faculty_code) ?>)</h1>

<h3>Programmes under this faculty</h3>

<?php if (!empty($faculty->programmes)): ?>
    <ul>
    <?php foreach ($faculty->programmes as $p): ?>
        <li>
            <a href="<?= $this->Url->build('/academic/programme-view/' . $p->id) ?>">
                <?= h($p->programme_name) ?> (<?= h($p->programme_code) ?>)
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No programmes found under this faculty.</p>
<?php endif; ?>

<p><a href="<?= $this->Url->build('/academic/faculties') ?>">← Back to Faculties</a></p>
