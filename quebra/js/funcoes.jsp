<!-- Java Script para verificção de email -->
<script type="text/javascript" src="js/jquery.js"></script>
<script>
function checkEmail(email)
{
if(email.length > 0)
   {
   if (email.indexOf(' ') >= 0)
      alert("email addresses cannot have spaces in them");
   else if (email.indexOf('@') == -1)
      alert("a valid email address must have an @ in it");
   }
}

</SCRIPT>
<!-- Fim Java Script para verificção de email -->
<!-- Função java script para mascara de numeros 
Exemplo de uso Coloque no campo do formulário (<input type="text" name="cep" onkeypress="mascara(this, '#####-###')" />)
Para usar com outras formações como CPF ou CNPJ e afins so configura os (###.###.###.## ) <- CPF
 -->
<script>
function mascara(src, mask){
var i = src.value.length;
var saida = mask.substring(0,1);
var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
{
src.value += texto.substring(0,1);
}
} 
</script>
<!-- Função java script para mascara de numeros -->
<!-- Função checa formulário -->
 <script>
 	
 	function letra(let)
 	{
   var nums = "0123456789"
   var valornum;
   var lets = "0123456789" // "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
   var valor;
   //Letras
   for (var i=0;i<let.value.length;i++)
   if (i < 2){
   {
   	valor = let.value.substring(i,i+1) 
   	if (lets.indexOf(valor) != -1)
   	{
     let.value = let.value.substring(0,i);
     break;
   	}
   }
   			} else {
   //numeros
   for (var i=3;i<let.value.length;i++)
   {
   	valornum=let.value.substring(i,i+1) 
   	if (nums.indexOf(valornum) == -1)
   	{
     let.value = let.value.substring(0,i);
     break;
   	}
   }
 	}
						}

 
 


function tabenter(event,campo){
	var tecla = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (tecla==13) {
		campo.focus();
	}
}


<!--  Função auto tab -->
function autoTab(input, e)  {   
  var ind = 0;  
  var isNN = (navigator.appName.indexOf("Netscape")!=-1);  
  var keyCode = (isNN) ? e.which : e.keyCode;   
  var nKeyCode = e.keyCode;   
  if(keyCode == 13){   
    if (!isNN) {window.event.keyCode = 0;} // evitar o beep  
    ind = getIndex(input);  
    if (input.form[ind].type == 'textarea') {  
      return;  
    }  
    ind++;  
    input.form[ind].focus();   
    if (input.form[ind].type == 'text') {  
      input.form[ind].select();   
    }  
  }   
  
  function getIndex(input) {   
    var index = -1, i = 0, found = false;   
    while (i < input.form.length && index == -1)   
      if (input.form[i] == input) {  
        index = i;  
          if (i < (input.form.length -1)) {  
           if (input.form[i+1].type == 'hidden') {  
       index++;   
     }  
     if (input.form[i+1].type == 'button' && input.form[i+1].id == 'tabstopfalse') {  
       index++;   
     }  
   }  
      }  
      else   
   i++;   
    return index;   
  }  
}   

</script>
<!--  Fim Função auto tab -->
<!-- Fim Função checa formulário -->