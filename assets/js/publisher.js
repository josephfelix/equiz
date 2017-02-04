window.addEventListener('load', function()
{
	if ( document.cookie.indexOf('clicouquiz') == -1 )
	{
		document.getElementById('blanked-box-equiz').style.display = 'block';
		document.getElementById('box-equiz').style.display = 'block';
		
		
		document.getElementById('blanked-box-equiz')
		.onclick = function()
		{
			/* var data = new Date();
			data.setTime(data.getTime() + (60*60*1000));
			document.cookie = "clicouquiz=1; expires="+data.toUTCString()+"; path=/"; */
			
			window.open('http://testequizagora.com', '', "width=1024, height=768, left=0, top=0, resizable=yes, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no");
			window.focus();
			document.getElementById('box-equiz').style.display = 'none';
			document.getElementById('blanked-box-equiz').style.display = 'none';
		}
		document.getElementById('box-equiz')
		.onclick = function()
		{
			/* var data = new Date();
			data.setTime(data.getTime() + (60*60*1000));
			document.cookie = "clicouquiz=1; expires="+data.toUTCString()+"; path=/"; */
			
			window.open('http://testequizagora.com', '', "width=1024, height=768, left=0, top=0, resizable=yes, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no");
			window.focus();
			document.getElementById('box-equiz').style.display = 'none';
			document.getElementById('blanked-box-equiz').style.display = 'none';
		}
		
		setTimeout(function()
		{
			document.getElementById('box-equiz').style.display = 'none';
			document.getElementById('blanked-box-equiz').style.display = 'none';
		}, 6000);
	}
}, true);