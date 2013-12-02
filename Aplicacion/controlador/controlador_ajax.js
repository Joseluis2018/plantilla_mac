// JavaScript Document	adNum = 0;
	
	setTimeout("AdOMatic()", 1000);
	

function flipAd()
{
        adNum++;
        alto=54;
        ancho=48;
        if(adNum > 2)
        {
        	adNum = 1;
        	alto=45;
        	ancho=39;
        }
        i = 1;        
        dot = document.images["ayuda"].src.lastIndexOf(".gif");
        dot--;
        newsrc = document.images["ayuda"].src.substring(0, dot);
        newsrc += adNum + ".gif";
        document.images["ayuda"].src = newsrc;
        document.images["ayuda"].height = alto;
        document.images["ayuda"].width = ancho;
}

function AdOMatic()
{
        flipAd();
        
        setTimeout("AdOMatic()", 1000);
}




function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false; 
	try 
	{ 
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// Creacion del objet AJAX para IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
}

