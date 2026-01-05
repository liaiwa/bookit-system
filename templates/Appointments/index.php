<h1>Appointments</h1>

<?php if (empty($appointments->toArray())): ?>
    <p>No appointments found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($appointments as $a): ?>
            <li>
                <a href="<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'view', $a->id]) ?>">
                    <?= h($a->booking_code) ?> - <?= h($a->status) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
