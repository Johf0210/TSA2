<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="hero compact">
    <p class="eyebrow">WELCOME</p>
    <h1>Tasks for today</h1>
    <p class="lead">A focused view of the work scheduled for <?= esc($today) ?>.</p>
</section>
<section class="section-heading">
    <h2>Today’s tasks</h2>
    <span class="count"><?= count($tasks) ?> task<?= count($tasks) === 1 ? '' : 's' ?></span>
</section>
<?php if (! session()->get('isLoggedIn')): ?><p class="helper">Log in to create, edit, or archive tasks.</p><?php endif; ?>
<?php if ($tasks === []): ?>
    <p class="empty">There are no tasks scheduled for today.</p>
<?php else: ?>
    <div class="task-list">
        <?php foreach ($tasks as $task): ?>
            <article class="task-card">
                <div>
                    <h3><?= esc($task['title']) ?></h3>
                    <p class="muted">Scheduled for <?= esc($task['task_date']) ?></p>
                </div>
                <span class="status <?= esc($task['status']) ?>"><?= esc(ucfirst($task['status'])) ?></span>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>
