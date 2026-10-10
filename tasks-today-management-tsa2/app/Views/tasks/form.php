<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="form-page">
    <p class="eyebrow">TASK MANAGEMENT</p>
    <h1><?= esc($formHeading) ?></h1>
    <p class="lead">Required fields are marked in the form. Archived tasks are kept in the database but hidden from public lists.</p>
    <?php if (isset($validation)): ?><div class="flash error"><?= esc($validation->listErrors()) ?></div><?php endif; ?>
    <form class="form-card" method="post" action="<?= esc($formAction) ?>">
        <?= csrf_field() ?>
        <label for="title">Title <span class="required">*</span></label>
        <input id="title" name="title" type="text" maxlength="150" value="<?= esc(old('title', $task['title'] ?? '')) ?>" required>
        <label for="status">Status</label>
        <select id="status" name="status">
            <?php foreach (['pending' => 'Pending', 'in-progress' => 'In progress', 'completed' => 'Completed'] as $value => $label): ?>
                <option value="<?= esc($value) ?>" <?= ($task['status'] ?? 'pending') === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
            <?php endforeach; ?>
        </select>
        <label for="task_date">Task date <span class="required">*</span></label>
        <input id="task_date" name="task_date" type="date" value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>" required>
        <div class="form-actions"><button class="button" type="submit">Save task</button><a class="button secondary" href="<?= site_url('tasks') ?>">Cancel</a></div>
    </form>
</section>
<?= $this->endSection() ?>
