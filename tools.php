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
  <title>Calming Tools — Mood Tracker</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/theme.css">
  <style>
    .tools-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
    .tool-card{padding:22px;border-radius:12px;min-height:110px;display:flex;flex-direction:column;justify-content:center;align-items:flex-start}
  </style>
</head>
<body>
  <?php include __DIR__ . '/includes/sidebar.php'; ?>
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="app-main">
    <h1 style="font-size:32px;margin-bottom:12px;">Calming Tools</h1>

    <div class="tools-grid">
      <?php
      $tools = ['4-7-8 Breathing','Box Breathing','Relaxing Sounds','Guided Meditations','Daily Affirmations','Stretching Animations','Quick Mood Reset'];
      foreach($tools as $t):
      ?>
        <div class="tool-card card">
          <div class="icon icon--large">🔷</div>
          <div style="font-weight:700;margin-top:8px"><?php echo htmlspecialchars($t); ?></div>
          <div style="color:var(--muted);font-size:13px;margin-top:6px">Short description about this tool</div>
        </div>
      <?php endforeach; ?>
    </div>

  </main>
</body>
</html>
