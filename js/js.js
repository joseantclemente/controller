function viewport()
{
	var e = window
	, a = 'inner';
	
	if ( !( 'innerWidth' in window ) )
	{
		a = 'client';
		e = document.documentElement || document.body;
	}
	return { width : e[ a+'Width' ] , height : e[ a+'Height' ] }
}



/*
function setActive() {

  liObj = document.getElementById('navegador').getElementsByTagName('li');
  aObj = document.getElementById('navegador').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) {
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      liObj[i].className='active';
	  aObj[i].className='active';
    }
  }
}*/