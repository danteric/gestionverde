<html>
<header>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
    body { font-size: 12px; }
    h1, h2, h3, h4, h5 {
      margin: 0;
    }
  </style>
  </header>
<script>
 var pdfInfo = {};
 var x = document.location.search.substring(1).split('&');
  for (var i in x) { var z = x[i].split('=',2); pdfInfo[z[0]] = unescape(z[1]); }
  function getPdfInfo() {
    var page = pdfInfo.page || 1;
    var pageCount = pdfInfo.topage || 1;
    document.getElementById('pdf_page_current').textContent = page;
    document.getElementById('pdf_page_count').textContent = pageCount;
  }
/*
function subst() {
  var vars= {};
  var x   = document.location.search.substring(1).split('&');
  for(var i in x) {var z=x[i].split('=',2);vars[z[0]] = unescape(z[1]);}
  var x=['frompage','topage','page','webpage','section','subsection','subsubsection'];
  for(var i in x) {
    var y = document.getElementsByClassName(x[i]);
    for(var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
  }
}
*/
</script>
</head>
<body style="border:0; margin: 0;" onload="getPdfInfo()">
  <?php echo $sf_data->getRaw('cabecera') ?>
</body>
</html>