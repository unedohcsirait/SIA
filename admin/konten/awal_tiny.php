<!DOCTYPE html>
<?php include "../konfigurasi/koneksi.php"; ?>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SMPN 2 Binjai | Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="tiny_mce/tiny_mce_gzip.js"></script>
<script>
try {
  tinyMCE_GZ.init({
    plugins: 'style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras',
    themes: 'simple,advanced',
    languages: 'en',
    disk_cache: true,
    debug: false
  });
} catch(e) {}
try {
  tinyMCE.init({
    mode: "textareas",
    theme: "advanced",
    relative_urls: false,
    plugins: "style,layer,table,advhr,advimage,advlink,emotions,insertdatetime,preview,media,contextmenu,paste,fullscreen,noneditable,visualchars,|,anchor,xhtmlxtras,safari,imagemanager",
    theme_advanced_buttons1: "bold,italic,underline,strikethrough,forecolor,|,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,table,|,link,unlink,image,insertimage,|,sub,sup,|,code",
    theme_advanced_buttons2: "preview,formatselect,fontselect,fontsizeselect,media,emotions,|,outdent,indent,hr,removeformat,visualaid,|,charmap",
    theme_advanced_buttons3: "",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true
  });
} catch(e) {}
</script>
<style>
  body { font-family: 'Inter', sans-serif; background: #f1f5f9; }
  .form-label { font-size:13px; font-weight:500; }
</style>
</head>
