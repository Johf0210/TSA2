<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="auth-card">
    <p class="eyebrow">AUTHENTICATION</p>
    <h1>Log in to manage tasks</h1>
    <p class="lead">The public pages stay open. Log in when you need to create, edit, or archive a task.</p>
    <?php if (! empty($error)): ?><div class="flash error"><?= esc($error) ?></div><?php endif; ?>
    <?php if (isset($validation)): ?><div class="flash error"><?= esc($validation->listErrors()) ?></div><?php endif; ?>
    <form class="form-card" method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" value="<?= esc(old('username')) ?>" required autocomplete="username">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required autocomplete="current-password">
        <button class="button" type="submit">Log in</button>
    </form>
    <p class="muted">Demo account: <strong>johf0210</strong> / <strong>password123</strong></p>
</section>
<?= $this->endSection() ?>
