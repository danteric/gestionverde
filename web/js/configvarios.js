function CambiaColor(esto,fondo,texto)
		{
			colorfondo=esto.style.background;
			esto.style.background=fondo;
			esto.style.color=texto;
			return colorfondo;
		}
		
		function CambiaColor2(esto,texto)
		{
			esto.style.background=colorfondo;
			esto.style.color=texto;
		}