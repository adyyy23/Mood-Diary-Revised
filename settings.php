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
  <title>Settings — Mood Tracker</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/theme.css">
</head>
<body>
  <?php include __DIR__ . '/includes/sidebar.php'; ?>
  <?php include __DIR__ . '/includes/header.php'; ?>

  <main class="app-main">
    <h1 style="font-size:32px;margin-bottom:12px;">Settings</h1>

    <section class="card" style="margin-bottom:18px;">
      <h3 style="margin:0 0 8px 0;">Account & Profile</h3>
      <div style="display:flex;gap:16px;align-items:center;">
        <div style="width:64px;height:64px;border-radius:999px;background:#eef2f0;display:flex;align-items:center;justify-content:center;font-size:28px;color:#888;">A</div>
        <div>
          <div style="font-weight:700;"><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></div>
          <div style="color:var(--muted);font-size:13px;margin-top:4px;">Subscription: Premium Plan</div>
          <div style="margin-top:8px;"><a class="btn btn--outline" href="profile.php">Change Profile Photo</a> <a class="btn" href="account.php" style="margin-left:8px;">Manage Subscription</a></div>
        </div>
        <div style="margin-left:auto;display:flex;flex-direction:column;gap:8px;">
          <div style="font-weight:700;">Notifications</div>
          <label style="display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" checked /> <span style="color:var(--muted);font-size:14px;">Daily check-in reminder</span>
          </label>
        </div>
      </div>
    </section>

    <section class="card" style="margin-bottom:18px;">
      <h3 style="margin:0 0 8px 0;">App Appearance</h3>
      <div style="display:flex;gap:12px;align-items:center;flex-wrap:wrap;">
        <label style="display:flex;align-items:center;gap:8px;"><input type="radio" name="theme" checked/> Light</label>
        <label style="display:flex;align-items:center;gap:8px;"><input type="radio" name="theme"/> Dark</label>
        <div style="margin-left:auto;color:var(--muted);">Theme brightness</div>
      </div>
    </section>

    <section class="card" style="margin-bottom:18px;">
      <h3 style="margin:0 0 8px 0;">Privacy & Support</h3>
      <p style="color:var(--muted);">Manage your data, export or request deletion.</p>
      <div style="display:flex;gap:8px;margin-top:8px;"><a class="btn btn--outline" href="help.php">FAQ / Help</a><a class="btn" href="contact.php">Contact Support</a></div>
    </section>

  </main>
</body>
</html>
