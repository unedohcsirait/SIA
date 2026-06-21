<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
$namasekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
$ns=mysql_fetch_array($namasekolah);
echo htmlspecialchars($ns['isi_pengaturan']);
?></title>
<meta name="description" content="Website Resmi SMPN 2 Binjai — Membangun Generasi Unggul">
<meta name="keywords" content="SMPN 2 Binjai, Sekolah, Pendidikan, Sumatera Utara">
<meta name="author" content="SMPN 2 Binjai">
<meta name="robots" content="index, follow">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<!-- Dark Elegant Theme -->
<link rel="stylesheet" href="file/tema/edisi_spesial/css/dark-elegant.css">

<!-- Legacy jQuery (tabs + form validation) -->
<script src="file/tema/edisi_spesial/js/jquery.min.js"></script>
<script src="file/tema/edisi_spesial/js/highslide.js"></script>
<script src="file/tema/edisi_spesial/js/gen_validatorv4.js"></script>
<script>
$(document).ready(function(){
  // Tabs
  $(".tab_content").hide();
  $("ul.tabs li:first").addClass("active").show();
  $(".tab_content:first").show();
  $("ul.tabs li").click(function(){
    $("ul.tabs li").removeClass("active");
    $(this).addClass("active");
    $(".tab_content").hide();
    var t = $(this).find("a").attr("href");
    $(t).fadeIn();
    return false;
  });
  // Datepicker fallback
  try {
    if ($.fn.datepicker) {
      $("#tanggal").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true });
      $("#tanggal1").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true });
    }
  } catch(e) {}
  if (!$.fn.datepicker) { $("#tanggal,#tanggal1").attr("type","date"); }
  // Highslide config
  if (typeof hs !== 'undefined') {
    hs.graphicsDir = 'file/tema/edisi_spesial/js/graphics/';
    hs.outlineType  = 'rounded-white';
  }
});
</script>
</head>
