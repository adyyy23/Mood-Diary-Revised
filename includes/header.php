<?php
// Simple header include - place inside pages where needed
?>
<header class="app-topbar">
  <div style="display:flex;align-items:center;gap:12px">
    <div style="width:44px;height:34px;border-radius:8px;background:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,0.06)">
      <!-- small browser address bar mock -->
      <input style="width:420px;border:0;background:transparent;font-size:14px;color:#333" placeholder="Search or paste a link" />
    </div>
  </div>

  <div style="display:flex;align-items:center;gap:12px">
    <button title="Share" class="icon" aria-label="Share">
      <img src="/assets/images/icon-share.svg" alt="share" width="18" height="18" />
    </button>
    <button title="Download" class="icon" aria-label="Download">
      <img src="/assets/images/icon-download.svg" alt="download" width="18" height="18" />
    </button>
    <div style="width:36px;height:36px;border-radius:999px;background:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,0.06);font-weight:700">A</div>
  </div>
</header>
