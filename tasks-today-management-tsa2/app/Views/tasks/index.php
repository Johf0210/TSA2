<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">TASK LIST</p>
<h1>All tasks</h1>
<p class="lead">Every task in the system, ordered by scheduled date.</p>
<div class="toolbar">
    <?php if (session()->get('isLoggedIn')): ?>
        <a class="button" href="<?= site_url('tasks/new') ?>">New task</a>
    <?php else: ?>
        <a class="button secondary" href="<?= site_url('login') ?>">Log in to manage tasks</a>
    <?php endif; ?>
</div>
<div class="table-wrap">
    <table>
        <thead><tr><th>Title</th><th>Status</th><th>Task date</th><th>Created</th><?php if (session()->get('isLoggedIn')): ?><th>Actions</th><?php endif; ?></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><span class="status <?= esc($task['status']) ?>"><?= esc(ucfirst($task['status'])) ?></span></td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
                <?php if (session()->get('isLoggedIn')): ?><td class="actions"><a href="<?= site_url("tasks/{$task['id']}/edit") ?>">Edit</a><form class="inline-form" method="post" action="<?= site_url("tasks/{$task['id']}/archive") ?>"><?= csrf_field() ?><button class="text-button danger" type="submit">Archive</button></form></td><?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
