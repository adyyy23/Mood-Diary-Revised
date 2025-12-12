<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: /login.php');
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Daily Affirmations — Mood Tracker</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/theme.css">
  <style>
    .affirm-card{padding:48px;border-radius:12px;min-height:260px;display:flex;justify-content:center;align-items:center;text-align:center}
    .affirm-card blockquote{font-size:22px;line-height:1.4;margin:0;color:#1f2a1f}
  </style>
</head>
<body>
  <?php include __DIR__ . '/includes/sidebar.php'; ?>
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="app-main">
    <h1 style="font-size:32px;margin-bottom:12px;">Daily Affirmations</h1>

    <div class="affirm-card card">
      <blockquote>“I am calm. I am resilient. I find peace within myself.”</blockquote>
    </div>

    <div style="margin-top:16px;display:flex;gap:8px;">
      <button class="btn">Play</button>
      <button class="btn btn--outline">Shuffle</button>
      <button class="btn btn--outline">Save</button>
    </div>
  </main>
</body>
</html>
