// Global user functions
ieHover = function() {
	var ieLIs = document.getElementById('nav').getElementsByTagName('li');
	for (var i=0; i<ieLIs.length; i++) if (ieLIs[i]) {
		ieLIs[i].onmouseover=function() {
		var ieUL = this.getElementsByTagName('ul')[0];
		if (ieUL) {
		var ieMat = document.createElement('iframe');
						ieMat.style.width=ieUL.offsetWidth+"px";
						ieMat.style.height=ieUL.offsetHeight+"px";
						ieUL.insertBefore(ieMat,ieUL.firstChild);
						ieUL.style.zIndex="99";
						}

			this.className+=" iehover";
			}
		ieLIs[i].onmouseout=function() {
		var ieUL = this.getElementsByTagName('ul')[0];
		if (ieUL) { ieUL.removeChild(ieUL.firstChild); }
			this.className=this.className.replace(' iehover', '');
			}
			}
	}
if (window.attachEvent) window.attachEvent('onload', ieHover);
