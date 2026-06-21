<!DOCTYPE html>
<?php include "../konfigurasi/koneksi.php"; ?>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SMPN 2 Binjai | Admin Panel</title>

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-- jQuery (untuk fitur lama) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<style>
  :root {
    --sidebar-width: 260px;
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --sidebar-bg: #0f172a;
    --sidebar-text: #94a3b8;
    --sidebar-active-bg: rgba(37, 99, 235, 0.15);
    --sidebar-active-text: #60a5fa;
    --topbar-height: 64px;
  }

  * { box-sizing: border-box; }

  body {
    font-family: 'Inter', sans-serif;
    background: #f1f5f9;
    color: #1e293b;
    margin: 0;
    padding: 0;
  }

  /* ===== SIDEBAR ===== */
  #sidebar {
    position: fixed;
    top: 0; left: 0;
    width: var(--sidebar-width);
    height: 100vh;
    background: var(--sidebar-bg);
    z-index: 1000;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease;
    overflow-y: auto;
  }

  .sidebar-brand {
    padding: 20px 20px 16px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
  }
  .sidebar-brand-icon {
    width: 40px; height: 40px;
    background: var(--primary);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #fff; flex-shrink: 0;
  }
  .sidebar-brand-text { line-height: 1.2; }
  .sidebar-brand-text strong { color: #f1f5f9; font-size: 14px; display: block; }
  .sidebar-brand-text span { color: #64748b; font-size: 11px; }

  .sidebar-nav { padding: 16px 0; flex: 1; }
  .nav-section-label {
    font-size: 10px; font-weight: 600; letter-spacing: 1px;
    color: #475569; text-transform: uppercase;
    padding: 8px 20px 4px;
  }

  .sidebar-link {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 20px;
    color: var(--sidebar-text);
    text-decoration: none;
    font-size: 13.5px; font-weight: 500;
    border-radius: 0;
    transition: all 0.2s;
    position: relative;
  }
  .sidebar-link i { font-size: 17px; width: 20px; text-align: center; flex-shrink: 0; }
  .sidebar-link:hover {
    background: rgba(255,255,255,0.05);
    color: #e2e8f0;
  }
  .sidebar-link.active {
    background: var(--sidebar-active-bg);
    color: var(--sidebar-active-text);
    border-right: 3px solid var(--primary);
  }
  .sidebar-link.active i { color: var(--sidebar-active-text); }

  /* ===== TOPBAR ===== */
  #topbar {
    position: fixed;
    top: 0; left: var(--sidebar-width);
    right: 0; height: var(--topbar-height);
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 24px;
    z-index: 999;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
  }

  .topbar-left { display: flex; align-items: center; gap: 16px; }
  .topbar-title { font-weight: 600; font-size: 16px; color: #1e293b; }

  .topbar-right { display: flex; align-items: center; gap: 12px; }
  .topbar-user {
    display: flex; align-items: center; gap: 10px;
    padding: 6px 14px;
    border-radius: 8px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    text-decoration: none; color: #1e293b;
    font-size: 13px; font-weight: 500;
  }
  .topbar-user:hover { background: #f1f5f9; color: #1e293b; }
  .user-avatar {
    width: 30px; height: 30px;
    background: var(--primary);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 13px; font-weight: 600;
  }

  /* ===== MAIN CONTENT ===== */
  #main-content {
    margin-left: var(--sidebar-width);
    margin-top: var(--topbar-height);
    min-height: calc(100vh - var(--topbar-height));
    padding: 28px;
  }

  /* ===== STAT CARDS ===== */
  .stat-card {
    background: #fff;
    border-radius: 12px;
    padding: 20px 22px;
    border: 1px solid #e2e8f0;
    display: flex; align-items: center; gap: 16px;
    transition: box-shadow 0.2s;
    text-decoration: none; color: inherit;
  }
  .stat-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); color: inherit; }
  .stat-icon {
    width: 48px; height: 48px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; flex-shrink: 0;
  }
  .stat-info { flex: 1; }
  .stat-value { font-size: 28px; font-weight: 700; line-height: 1; }
  .stat-label { font-size: 12px; color: #64748b; margin-top: 3px; }

  /* ===== CONTENT CARDS ===== */
  .content-card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
  }
  .content-card-header {
    padding: 16px 20px;
    border-bottom: 1px solid #f1f5f9;
    display: flex; align-items: center; justify-content: space-between;
  }
  .content-card-header h6 {
    margin: 0; font-weight: 600; font-size: 14px; color: #1e293b;
  }
  .content-card-body { padding: 20px; }

  /* ===== PAGE HEADER ===== */
  .page-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 24px;
  }
  .page-header h4 { margin: 0; font-weight: 700; font-size: 20px; }
  .page-header .breadcrumb { margin: 0; }

  /* ===== TABLES ===== */
  .table-modern { border-collapse: separate; border-spacing: 0; width: 100%; }
  .table-modern th {
    background: #f8fafc;
    padding: 12px 16px;
    font-size: 12px; font-weight: 600; color: #64748b;
    text-transform: uppercase; letter-spacing: 0.5px;
    border-bottom: 1px solid #e2e8f0;
  }
  .table-modern td {
    padding: 12px 16px;
    font-size: 13.5px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
  }
  .table-modern tr:last-child td { border-bottom: none; }
  .table-modern tbody tr:hover { background: #f8fafc; }

  /* ===== BADGES ===== */
  .badge-hadir { background: #dcfce7; color: #166534; }
  .badge-sakit { background: #fef9c3; color: #854d0e; }
  .badge-izin { background: #dbeafe; color: #1e40af; }
  .badge-alfa  { background: #fee2e2; color: #991b1b; }

  /* ===== FORMS ===== */
  .form-label { font-size: 13px; font-weight: 500; color: #374151; }
  .form-control, .form-select {
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 14px;
    padding: 8px 12px;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
    outline: none;
  }
  .btn-primary-custom {
    background: var(--primary);
    color: #fff;
    border: none;
    padding: 9px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
  }
  .btn-primary-custom:hover { background: var(--primary-dark); }

  /* ===== ALERTS ===== */
  .alert-modern {
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 13.5px;
    border: none;
    display: flex; align-items: center; gap: 10px;
  }
  .alert-success-modern { background: #dcfce7; color: #15803d; }
  .alert-danger-modern  { background: #fee2e2; color: #dc2626; }
  .alert-warning-modern { background: #fef9c3; color: #b45309; }

  /* ===== FOOTER ===== */
  #footer {
    text-align: center;
    padding: 16px;
    color: #94a3b8;
    font-size: 12px;
    border-top: 1px solid #e2e8f0;
    margin-top: 32px;
  }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 768px) {
    #sidebar { transform: translateX(-100%); }
    #sidebar.show { transform: translateX(0); }
    #topbar { left: 0; }
    #main-content { margin-left: 0; }
  }
</style>
</head>
