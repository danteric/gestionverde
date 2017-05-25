
	<script language="text/javascript">
		// Code for Vertical Menu
		navHover = function() {
			var lis = document.getElementById("navmenu-h").getElementsByTagName("LI");
			for (var i=0; i<lis.length; i++) {
				lis[i].onmouseover=function() {
				this.className+=" iehover";
				}
				lis[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" iehover\\b"), "");
				}
			}
		}

		if (window.attachEvent) window.attachEvent("onload", navHover);

	</script>
<script type="text/javascript">
$(document).ready(function()
{
$('[title]').each(function(k,html){
  $(html).tooltip(
    {
      'title':     $(html).attr('title'),
      'placement': 'bottom'
  })}
  );
}
);
$(document).ready(function(){
    $(".sticker").sticky(
    	{
    		topSpacing:0,
    		className: 'bar-is-sticky'
    	});
  });
</script>	