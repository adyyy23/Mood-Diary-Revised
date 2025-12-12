<?php
// Sidebar include - use on all pages to keep nav consistent
?>
<aside class="app-sidebar">
  <div class="brand">
    <div class="brand-icon">★</div>
    <div style="display:flex;flex-direction:column;">
      <div style="font-weight:700">Mood Tracker</div>
      <div style="font-size:12px;color:var(--muted)">Track your wellbeing</div>
    </div>
  </div>

  <nav class="app-nav">
    <a href="home.php" class="<?= (basename($_SERVER['PHP_SELF'])==='home.php'?'active':'') ?>">
      <img src="/assets/images/icon-home.svg" width="18" height="18" style="opacity:0.9" /> Dashboard
    </a>
    <a href="calendar.php" class="<?= (basename($_SERVER['PHP_SELF'])==='calendar.php'?'active':'') ?>">
      <img src="/assets/images/icon-calendar.svg" width="18" height="18" /> Calendar
    </a>
    <a href="diary.php" class="<?= (basename($_SERVER['PHP_SELF'])==='diary.php'?'active':'') ?>">
      <img src="/assets/images/icon-diary.svg" width="18" height="18" /> Diary
    </a>
    <a href="moods.php" class="<?= (basename($_SERVER['PHP_SELF'])==='moods.php'?'active':'') ?>">
      <img src="/assets/images/icon-mood.svg" width="18" height="18" /> Moods
    </a>
    <a href="progress.php" class="<?= (basename($_SERVER['PHP_SELF'])==='progress.php'?'active':'') ?>">
      <img src="/assets/images/icon-progress.svg" width="18" height="18" /> Progress
    </a>
    <a href="tools.php" class="<?= (basename($_SERVER['PHP_SELF'])==='tools.php'?'active':'') ?>">
      <img src="/assets/images/icon-tools.svg" width="18" height="18" /> Tools
    </a>
    <a href="settings.php" class="<?= (basename($_SERVER['PHP_SELF'])==='settings.php'?'active':'') ?>">
      <img src="/assets/images/icon-settings.svg" width="18" height="18" /> Settings
    </a>
  </nav>

  <div style="margin-top:auto;padding-top:12px">
    <div class="card" style="padding:12px;">
      <div style="font-size:13px;color:var(--muted)">Logged in as</div>
      <div style="font-weight:700;margin-top:6px"><?= $_SESSION['username'] ?? '—' ?></div>
      <a class="btn btn--outline" href="logout.php" style="margin-top:10px;display:inline-block">Log out</a>
    </div>
  </div>
</aside>
