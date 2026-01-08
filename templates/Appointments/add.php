<div class="card shadow-sm">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Book Consultation</h2>
      <?= $this->Html->link('Back to List', ['action' => 'index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?= $this->Form->create($appointment) ?>

    <div class="row g-3">
      <div class="col-md-6">
        <?= $this->Form->control('student_id', [
          'label' => 'Student',
          'options' => $students,
          'empty' => '-- Select Student --',
          'class' => 'form-select'
        ]) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->control('lecturer_id', [
          'label' => 'Lecturer',
          'options' => $lecturers,
          'empty' => '-- Select Lecturer --',
          'class' => 'form-select'
        ]) ?>
      </div>

      <div class="col-md-4">
        <?= $this->Form->control('appointment_date', [
          'type' => 'date',
          'label' => 'Appointment Date',
          'class' => 'form-control'
        ]) ?>
      </div>

      <div class="col-md-4">
        <?= $this->Form->control('start_time', [
          'type' => 'time',
          'label' => 'Start Time',
          'class' => 'form-control'
        ]) ?>
      </div>

      <div class="col-md-4">
        <?= $this->Form->control('end_time', [
          'type' => 'time',
          'label' => 'End Time',
          'class' => 'form-control'
        ]) ?>
      </div>

      <div class="col-12">
        <?= $this->Form->control('notes', [
          'type' => 'textarea',
          'label' => 'Purpose / Notes',
          'rows' => 4,
          'class' => 'form-control',
          'placeholder' => 'Example: Discuss assignment, FYP, marks, etc.'
        ]) ?>
      </div>

      <div class="col-md-6">
        <?= $this->Form->control('status', [
          'label' => 'Status',
          'class' => 'form-control',
          'value' => 'Pending'
        ]) ?>
        <small class="text-muted">Default: Pending</small>
      </div>

      <div class="col-md-6">
        <?= $this->Form->control('booking_code', [
          'label' => 'Booking Code',
          'class' => 'form-control',
          'placeholder' => 'Auto-generated if empty'
        ]) ?>
        <small class="text-muted">Biarkan kosong pun boleh (auto generate).</small>
      </div>

      <div class="col-12 pt-2">
        <?= $this->Form->button('Submit Booking', ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-outline-danger ms-2']) ?>
      </div>
    </div>

    <?= $this->Form->end() ?>
  </div>
</div>
