<h1>Faculties</h1>

<ul>
<?php foreach ($faculties as $faculty): ?>
    <li>
        <a href="<?= $this->Url->build('/academic/faculty-view/' . $faculty->id) ?>">
            <?= h($faculty->faculty_name) ?> (<?= h($faculty->faculty_code) ?>)
        </a>
    </li>
<?php endforeach; ?>
</ul>

<p><a href="<?= $this->Url->build('/academic/programmes') ?>">View all Programmes →</a></p>
