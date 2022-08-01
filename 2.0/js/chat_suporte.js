// Script para incorporação do widget chat
		var LHCChatOptions = {};
		LHCChatOptions.opt = {widget_height:340,widget_width:400,popup_height:520,popup_width:500,domain:'rasp.net.br/benassi/2.0'};
		(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
		var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
		po.src = '//webevolution.info/suporte/lhc_web/index.php/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/1/(theme)/1?r='+referrer+'&l='+location;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	
//Fim Script para incorporação do widget chat 