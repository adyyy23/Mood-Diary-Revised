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
  <title>Explore Emotions — Mood Tracker</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/theme.css">
  <style>
    .emotion-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
    .emotion-card{padding:28px;border-radius:14px;min-height:140px;display:flex;flex-direction:column;justify-content:center;align-items:flex-start;box-shadow:0 8px 20px rgba(0,0,0,0.04)}
    .emotion-card .icon{margin-bottom:12px;background:transparent}
    .emotion-card small{color:var(--muted)}
  </style>
</head>
<body>
  <?php include __DIR__ . '/includes/sidebar.php'; ?>
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="app-main">
    <h1 style="font-size:32px;margin-bottom:12px;">Explore Emotions</h1>

    <div class="emotion-grid">
      <?php
      $emotions = ['Joy','Calm','Sadness','Anger','Stressed','Confident','Relaxed','Energetic','Surprised'];
      $colors = ['#f9e8b8','#dbefff','#f3dff8','#fde0d8','#e6f6e9','#f7e9f5','#e9f7f7','#fdeff0','#fef3d9'];
      foreach($emotions as $i => $e):
      ?>
        <div class="emotion-card card" style="background:linear-gradient(180deg, <?php echo $colors[$i%count($colors)]; ?>, rgba(255,255,255,0.6));">
          <div class="icon icon--large">🙂</div>
          <div style="font-weight:700;font-size:18px"><?php echo htmlspecialchars($e); ?></div>
          <small>Learn about <?php echo htmlspecialchars(strtolower($e)); ?></small>
        </div>
      <?php endforeach; ?>
    </div>

  </main>
</body>
</html>
