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
function initPageScripts() {
  // Tabs
  $(".tab_content").hide();
  $("ul.tabs li:first").addClass("active").show();
  $(".tab_content:first").show();
  $("ul.tabs li").off("click").on("click", function(){
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
}

$(document).ready(function(){
  initPageScripts();
});

// ===== AJAX Navigation =====
(function(){
  var wrapper;

  function getAjaxUrl(href) {
    if (!href || href === '#' || href === '') return null;
    if (href === 'index.php' || href === './') return 'ajax.php';
    if (href.startsWith('?')) return 'ajax.php' + href;
    if (href.startsWith('index.php?')) return 'ajax.php?' + href.slice('index.php?'.length);
    return null;
  }

  function loadPage(href, pushState) {
    var ajaxUrl = getAjaxUrl(href);
    if (!ajaxUrl) return false;

    wrapper = document.getElementById('ajax-wrapper');
    if (!wrapper) return false;

    wrapper.style.opacity = '0.5';
    wrapper.style.transition = 'opacity 0.15s';

    fetch(ajaxUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(function(r){ return r.text(); })
      .then(function(html){
        wrapper.innerHTML = html;
        wrapper.style.opacity = '1';
        if (pushState) history.pushState({ href: href }, '', href);
        window.scrollTo({ top: 0, behavior: 'smooth' });
        initPageScripts();
      })
      .catch(function(){
        wrapper.style.opacity = '1';
        window.location.href = href;
      });

    return true;
  }

  document.addEventListener('click', function(e){
    var link = e.target.closest('a[href]');
    if (!link) return;
    var href = link.getAttribute('href');
    if (!href) return;

    // Skip external, admin, elearning, and other non-page links
    if (href.startsWith('http') || href.startsWith('//')) return;
    if (/^(admin|elearningku|kontenweb|instalasi)\//.test(href)) return;
    if (link.target === '_blank') return;
    if (href === '#' || href === '') return;

    if (loadPage(href, true)) {
      e.preventDefault();
    }
  });

  window.addEventListener('popstate', function(e){
    var href = (e.state && e.state.href) ? e.state.href : (location.search || 'index.php');
    loadPage(href, false);
  });
})();
</script>
</head>
