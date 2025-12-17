<h1>Programmes</h1>

<ul>
<?php foreach ($programmes as $programme): ?>
    <li>
        <a href="<?= $this->Url->build('/academic/programme-view/' . $programme->id) ?>">
            <?= h($programme->programme_name) ?> (<?= h($programme->programme_code) ?>)
        </a>
        <?php if ($programme->faculty): ?>
            - <?= h($programme->faculty->faculty_name) ?>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>
