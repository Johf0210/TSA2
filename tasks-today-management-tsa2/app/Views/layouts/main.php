<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Tasks for Today') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>
            <nav aria-label="Main navigation">
                <a href="<?= site_url('/') ?>">Today</a>
                <a href="<?= site_url('tasks') ?>">All Tasks</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('about') ?>">About</a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a class="nav-action" href="<?= site_url('tasks/new') ?>">New task</a>
                    <form class="inline-form" method="post" action="<?= site_url('logout') ?>">
                        <?= csrf_field() ?>
                        <button type="submit" class="link-button">Log out</button>
                    </form>
                <?php else: ?>
                    <a class="nav-action" href="<?= site_url('login') ?>">Log in</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container page-content">
        <?php if ($message = session()->getFlashdata('message')): ?><div class="flash success"><?= esc($message) ?></div><?php endif; ?>
        <?php if ($error = session()->getFlashdata('error')): ?><div class="flash error"><?= esc($error) ?></div><?php endif; ?>
        <?= $this->renderSection('content') ?>
    </main>
    <footer class="site-footer">
        <div class="container">IT0049 · Tasks for Today Management System</div>
    </footer>
</body>
</html>
