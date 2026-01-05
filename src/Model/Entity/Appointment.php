<?php
require 'vendor/autoload.php'; // kalau ada CakePHP

// Simulate entity
class TestEntity extends \Cake\ORM\Entity {
    public $status = 'approved';
    public $start_time;
    public $end_time;

    public function __construct() {
        $this->start_time = new \DateTime('10:00');
        $this->end_time = new \DateTime('11:00');
    }

    // Paste 3 function _get dari Appointment.php sini
    protected function _getTimeRange() { /* ... */ }
    protected function _getStatusColor() { /* ... */ }
    protected function _getTealBadge() { /* ... */ }
}

$test = new TestEntity();
echo $test->time_range . "\n"; // Output: 10:00 - 11:00
echo $test->status_color . "\n"; // Output: success
echo $test->teal_badge; // Output: bg-teal text-white