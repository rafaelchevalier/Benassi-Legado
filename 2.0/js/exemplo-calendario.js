$(document).ready(function(){
	

	/* ACORDDION 
		$('h2.accordion').click(function(){
			$(this).next().slideToggle("slow");
			$('.calendario').remove();
		});
	*/
	
	$('#data0').focus(function(){
		$(this).calendario({ 
			target: '#data0'
		});
	});
	
	$('#data1').focus(function(){
		$(this).calendario({ 
			target: '#data1'
		});
	});
/*************************************************************/	
	$('#data2').focus(function(){
		$(this).calendario({ 
			target: '#data2'
		});
	});
/*************************************************************/
	$('#data3').focus(function(){
		$(this).calendario({ 
			target: '#data3'
		});
	});
/*************************************************************/
	$('#data4').focus(function(){
		$(this).calendario({ 
			target: '#data4'
		});
	});
/*************************************************************/
	$('#data5').focus(function(){
		$(this).calendario({ 
			target: '#data5'
		});
	});
/*************************************************************/
	$('#data6').focus(function(){
		$(this).calendario({ 
			target: '#data6'
		});
	});
/*************************************************************/
	$('#data7').focus(function(){
		$(this).calendario({ 
			target: '#data7'
		});
	});
/*************************************************************/
	$('#data8').focus(function(){
		$(this).calendario({ 
			target: '#data8'
		});
	});
/*************************************************************/
	$('#data9').focus(function(){
		$(this).calendario({ 
			target: '#data9'
		});
	});
/*************************************************************/
	$('#data10').focus(function(){
		$(this).calendario({ 
			target: '#data10'
		});
	});
/*************************************************************/
	$('#data11').focus(function(){
		$(this).calendario({ 
			target: '#data11'
		});
	});
/*************************************************************/
	$('#data12').focus(function(){
		$(this).calendario({ 
			target: '#data12'
		});
	});
/*************************************************************/	
	$('#data13').focus(function(){
		$(this).calendario({ 
			target: '#data13'
		});
	});
/*************************************************************/	
	$('#data14').focus(function(){
		$(this).calendario({ 
			target: '#data14'
		});
	});
/*************************************************************/	
	$('#data15').focus(function(){
		$(this).calendario({ 
			target: '#data15'
		});
	});
/*************************************************************/	
	$('#data16').focus(function(){
		$(this).calendario({ 
			target: '#data16'
		});
	});
/*************************************************************/	
	$('#data17').focus(function(){
		$(this).calendario({ 
			target: '#data17'
		});
	});
/*************************************************************/	
	$('#data18').focus(function(){
		$(this).calendario({ 
			target: '#data18'
		});
	});
/*************************************************************/	
	$('#data19').focus(function(){
		$(this).calendario({ 
			target: '#data19'
		});
	});
/*************************************************************/	
	$('#data20').focus(function(){
		$(this).calendario({ 
			target: '#data20'
		});
	});
/*************************************************************/	
	$('#data21').focus(function(){
		$(this).calendario({ 
			target: '#data21'
		});
	});
/*************************************************************/	
	$('#data22').focus(function(){
		$(this).calendario({ 
			target: '#data22'
		});
	});
/*************************************************************/	
	$('#data23').focus(function(){
		$(this).calendario({ 
			target: '#data23'
		});
	});
/*************************************************************/	
	$('#data24').focus(function(){
		$(this).calendario({ 
			target: '#data24'
		});
	});
/*************************************************************/	
$('#data25').focus(function(){
		$(this).calendario({ 
			target: '#data25'
		});
	});
/*************************************************************/	
$('#data26').focus(function(){
		$(this).calendario({ 
			target: '#data26'
		});
	});
/*************************************************************/	
$('#data27').focus(function(){
		$(this).calendario({ 
			target: '#data27'
		});
	});
/*************************************************************/	
$('#data28').focus(function(){
		$(this).calendario({ 
			target: '#data28'
		});
	});
/*************************************************************/	
$('#data29').focus(function(){
		$(this).calendario({ 
			target: '#data29'
		});
	});
/*************************************************************/	
$('#data30').focus(function(){
		$(this).calendario({ 
			target: '#data30'
		});
	});
/*************************************************************/	
$('#data31').focus(function(){
		$(this).calendario({ 
			target: '#data31'
		});
	});
/*************************************************************/	
$('#data32').focus(function(){
		$(this).calendario({ 
			target: '#data32'
		});
	});
/*************************************************************/	
$('#data33').focus(function(){
		$(this).calendario({ 
			target: '#data33'
		});
	});
/*************************************************************/	
$('#data34').focus(function(){
		$(this).calendario({ 
			target: '#data34'
		});
	});
/*************************************************************/	
$('#data35').focus(function(){
		$(this).calendario({ 
			target: '#data35'
		});
	});
/*************************************************************/	
$('#data36').focus(function(){
		$(this).calendario({ 
			target: '#data36'
		});
	});
/*************************************************************/	
$('#data37').focus(function(){
		$(this).calendario({ 
			target: '#data37'
		});
	});
/*************************************************************/	
$('#data38').focus(function(){
		$(this).calendario({ 
			target: '#data38'
		});
	});
/*************************************************************/	
$('#data39').focus(function(){
		$(this).calendario({ 
			target: '#data39'
		});
	});
/*************************************************************/	
$('#data40').focus(function(){
		$(this).calendario({ 
			target: '#data40'
		});
	});
/*************************************************************/	




$('#data_11').focus(function(){
		$(this).calendario({ 
			target: '#data_11'
		});
	});
/*************************************************************/


$('#data_10').focus(function(){
		$(this).calendario({ 
			target: '#data_10'
		});
	});
/*************************************************************/





	
	$('#data_1').focus(function(){
		$(this).calendario({ 
			target:'#data_1'
		});
	});
	
	
	$('#data_2').focus(function(){
		$(this).calendario({ 
			target:'#data_2',
			top:0,
			left:130
		});
	});
	
	
	$('#data_3').focus(function(){
		$(this).calendario({ 
			target:'#data_3',
			closeClick:false
		});
	});

	$('#data_4').focus(function(){
		$(this).calendario({ 
			target :'#data_4',
			dateDefault:$(this).val()
		});
	});
	
	
	$('#data_5_dia, #data_5_mes, #data_5_ano').focus(function(){
		$(this).calendario({ 
			targetDay :'#data_5_dia',
			targetMonth :'#data_5_mes',
			targetYear :'#data_5_ano',
			dateDefault: $('#data_5_dia').val()+"/"+$('#data_5_mes').val()+"/"+$('#data_5_ano').val(),
			referencePosition : '#data_5_dia'
		});
	});	
	
	$('#data_6').focus(function(){
		$(this).calendario({ 
			target :'#data_6',
			dateDefault:$(this).val(),
			minDate:'10/11/2008',
			maxDate:'25/01/2009'
		});
	});
});
	$('#data_7').focus(function(){
		$(this).calendario({ 
			target :'#data_7',
			dateDefault:$(this).val()
		});
	});
	

