<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">PROFILE</p>
<h1>Demo user profile</h1>
<?php if ($user): ?>
    <div class="profile-card">
        <p class="profile-label">Full name</p><h2><?= esc($user['full_name']) ?></h2>
        <p class="profile-label">Username</p><p><?= esc($user['username']) ?></p>
        <p class="profile-label">Email</p><p><?= esc($user['email']) ?></p>
        <p class="profile-label">Member since</p><p><?= esc($user['created_at']) ?></p>
    </div>
<?php else: ?>
    <p class="empty">No demo user was found.</p>
<?php endif; ?>
<?= $this->endSection() ?>
