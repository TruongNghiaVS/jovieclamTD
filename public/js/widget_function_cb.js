$(document).ready(function(){			
	//refeshValue();
	$('#default_usd').formatCurrency();
	$('#gross_salary_adv').on('keyup', function(){ ($this).formatCurrency(); });
	$('#num_of_depend, #reduct_personal, #reduct_family, #minium_wage').numeric();
	$('#social, #health, #unemployed, #trade_union').numericdot();
	$('#reduct_personal, #reduct_family, #minium_wage').formatCurrency();	
	$('#social, #health, #unemployed, #trade_union').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 1 });	
	
	$('#num_of_depend, #reduct_personal, #reduct_family, #minium_wage').blur(function(){
		$(this).formatCurrency();
	});
	
	$('#gross_salary').change(function(){
		$(this).formatCurrency();
		$('#gross_salary_adv').val($(this).val());		
		$('#change_salary').val($(this).val().replace(/[^0-9\.]+/g,''));
	});
        
	
	$('#gross_salary_adv').blur(function(){
		if($(this).val() == ''){			
			if($('input:radio[name=currency]:checked').val()=='usd'){
				$(this).val(_language.msg_gross_salary_in_USD);
			}else{
				$(this).val(_language.msg_gross_salary_in_VND);
			}
		}
	});
	
	$('#gross_salary_adv').focus(function(){		
		if($('input:radio[name=currency]:checked').val()=='usd'){
			if($(this).val() == _language.msg_gross_salary_in_USD)	
				$(this).val('');	
		}else{
			if($(this).val() == _language.msg_gross_salary_in_VND)	
				$(this).val('');	
		}
	});
	
	$('#num_of_depend').change(function(){
		if($(this).val() > 10){
			$('#num_of_depend').val('');
			$('#num_of_depend').focus();
			alert(_language.msg_num_of_depend_limit);
			return false;
		}
		$('#num_of_depend_adv').val($(this).val());						
		$('#reduct_family').val(parseInt($(this).val()) * parseInt(_language.msg_reduct_family_default));
		$('#reduct_family').formatCurrency();		
	});
	$('input[name="chkFullWage"]:radio').change(function(){
		if($(this).val() == 1){
			$('#fullwageOther').attr('disabled', true);
		}else{
			$('#fullwageOther').attr('disabled', false);			
			$('#fullwageOther').focus();
		}
	});
	$('input[name="currency"]:radio').change(function(){
		if($(this).val()=='usd'){
			$('#divCurrency').css('display', 'inline');				
			$('#span_unit').html(_language.msg_usd);
		}else{
			$('#divCurrency').css('display', 'none');
			$('#span_unit').html(_language.msg_vnd);	
			$('#divChangeSalary').css('display', 'none');			
		}
		$('#gross_salary').val('');	
		$('#gross_salary_adv').val('');		
		$('#gross_salary_adv').focus();
	});
	$('input[name="chkUnemployed"]:checkbox').change(function(){		
		if($(this).is(':checked')){
			$('#unemployed').attr('disabled', false);
			$('#unemployed').val(_language.msg_unemployed_default);
			$('#unemployed').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 1 });
		}else{			
			$('#unemployed').attr('disabled', 'disabled');
			$('#unemployed').val(0);			
		}
	});
	
        $('input[name="chkTradeUnion"]:checkbox').change(function(){		
		if($(this).is(':checked')){
			$('#trade_union').attr('disabled', false);
			$('#trade_union').val(_language.msg_trade_union_default);
			$('#trade_union').formatCurrency({ colorize: true, negativeFormat: '-%s%n', roundToDecimalPlace: 1 });
		}else{
			$('#trade_union').attr('disabled', 'disabled');
			$('#trade_union').val(0);	
			
		}
	});
        
	$('#gross_salary_adv').change(function(){		
		var default_usd = parseInt($('#default_usd').val().replace(/[^0-9\.]+/g,''));
		var gross_salary_adv = parseInt($('#gross_salary_adv').val().replace(/[^0-9\.]+/g,''));				
		if(gross_salary_adv > 0){
                    if($('input:radio[name=currency]:checked').val()=='usd'){			
                            $('#divChangeSalary').css('display', 'inline');
                            var change_salary = default_usd*gross_salary_adv;			
                            $('#span_salary').html(change_salary).formatCurrency();
                            $('#change_salary').val(change_salary);			
                    }else{
                            $('#divChangeSalary').css('display', 'none');
                            $('#change_salary').val(0);
                            $('#change_salary').val(gross_salary_adv);
                    }

                    $('#gross_salary').val($('#gross_salary_adv').val()).formatCurrency();
                    $('#gross_salary').addClass('label-active');
		}else{
                    $('#divChangeSalary').css('display', 'none');
                    $('#change_salary').val(0);
                    $('#change_salary').val(gross_salary_adv);
                }
	});
        
        $('#gross_salary_adv').keyup(function(){
            setTimeout(function(){ 
                var default_usd = parseInt($('#default_usd').val().replace(/[^0-9\.]+/g,''));
		var gross_salary_adv = parseInt($('#gross_salary_adv').val().replace(/[^0-9\.]+/g,''));				
		if(gross_salary_adv > 0){
                    if($('input:radio[name=currency]:checked').val()=='usd'){			
                            $('#divChangeSalary').css('display', 'inline');
                            var change_salary = default_usd*gross_salary_adv;			
                            $('#span_salary').html(change_salary).formatCurrency();
                            $('#change_salary').val(change_salary);			
                    }else{
                            $('#divChangeSalary').css('display', 'none');
                            $('#change_salary').val(0);
                            $('#change_salary').val(gross_salary_adv);
                    }

                    $('#gross_salary').val($('#gross_salary_adv').val()).formatCurrency();
                    $('#gross_salary').addClass('label-active');
		}else{
                    $('#divChangeSalary').css('display', 'none');
                    $('#change_salary').val(0);
                    $('#change_salary').val(gross_salary_adv);
                }
            
            }, 500);
		
	});
	
	$('#num_of_depend_adv').change(function(){
		$('#num_of_depend').val($(this).val());		
		$('#reduct_family').val(parseInt($(this).val()) * parseInt(_language.msg_reduct_family_default));
		$('#reduct_family').formatCurrency();
	});
});

function show_advance_cal()
{
	$.fancybox({ 
		href: "#AdvancedCalculator"				
	})		
}
/*function currencyJsonpCallback(data)
{
	$('#default_usd').val(data);
	$('#default_usd').formatCurrency();
}*/

function refeshValue()
{
	$.ajax({
		url: TN+"/widget/load-default-usd-cb",
		jsonp: "callback",		
		dataType: "jsonp",	
		//jsonpCallback: "currencyJsonpCallback",
		success: function(json) {
			$('#default_usd').val(json);
			$('#default_usd').formatCurrency();
		},	
		error: function(e) {
		   console.log(e.message);
		}		
	})	
}

function calTax(total)
{
	if(total <= arrRange[0])
		return parseFloat(total * 5 / 100) - parseInt(arrRangeMinus[0]);
	else if(total <= arrRange[1] && total > arrRange[0])
		return parseFloat(total * 10 / 100) - parseInt(arrRangeMinus[1]);
	else if(total <= arrRange[2] && total > arrRange[1])
		return parseFloat(total * 15 / 100) - parseInt(arrRangeMinus[2]);
	else if(total <= arrRange[3] && total > arrRange[2])
		return parseFloat(total * 20 / 100) - parseInt(arrRangeMinus[3]);
	else if(total <= arrRange[4] && total > arrRange[3])
		return parseFloat(total * 25 / 100) - parseInt(arrRangeMinus[4]);
	else if(total <= arrRange[5] && total > arrRange[4])
		return parseFloat(total * 30 / 100) - parseInt(arrRangeMinus[5]);
	else
		return parseFloat(total * 35 / 100) - parseInt(arrRangeMinus[6]);
}

function calSalary(isClick)
{	
	
	if($('#gross_salary').val() == '' || $('#gross_salary').val() <= 0 || $('#gross_salary').val() == _language.msg_gross_salary_in_VND){
		if(isClick == 1)
			$('#gross_salary').focus();
		else
			$('#gross_salary_adv').focus();
		alert(_language.msg_please_enter_gross_salary);		
		return false;	
	}else if($('input:radio[name=chkFullWage]:checked').val() == 2 && ($('#fullwageOther').val() == '' || $('#fullwageOther').val() < 0)){
		$('#fullwageOther').focus();
		alert(_language.msg_please_enter_fullwage_other);
		return false;
	}
	if(($('#num_of_depend').val() == '' || $('#num_of_depend').val() < 0 || $('#num_of_depend').val() == _language.msg_number_of_dependants) && isClick == 1)
		$('#num_of_depend').val(0);
		
	var reduct_personal = parseInt($('#reduct_personal').val().replace(/[^0-9\.]+/g,''));
	var reduct_family   = parseInt($('#reduct_family').val().replace(/[^0-9\.]+/g,''));
	//*parseInt($('#num_of_depend_adv').val().replace(/[^0-9\.]+/g,''));
	var insurance		= parseFloat($('#social').val())+parseFloat($('#health').val())+parseFloat($('#unemployed').val())+parseFloat($('#trade_union').val());
	
	if(isClick == 1){
		//var gross_salary = $('#gross_salary').val().replace(/[^0-9\.]+/g,'');		
		//var full_salary = $('#gross_salary').val().replace(/[^0-9\.]+/g,'');
		var chkFullWage = $('input:radio[name=chkFullWage]:checked').val();		
		if(chkFullWage == 1)
			var gross_salary = $('#change_salary').val().replace(/[^0-9\.]+/g,'');
		else
			var gross_salary = $('#fullwageOther').val().replace(/[^0-9\.]+/g,'');
		var full_salary = $('#change_salary').val().replace(/[^0-9\.]+/g,'');
	}else{
		var chkFullWage = $('input:radio[name=chkFullWage]:checked').val();		
		if(chkFullWage == 1)
			var gross_salary = $('#change_salary').val().replace(/[^0-9\.]+/g,'');
		else
			var gross_salary = $('#fullwageOther').val().replace(/[^0-9\.]+/g,'');
		var full_salary = $('#change_salary').val().replace(/[^0-9\.]+/g,'');		
	}
	if(gross_salary > config_salary){
            gross_salary_tax = config_salary;
        }else if(gross_salary < config_min_salary_unemployed){
            var training_worker = $('#training_worker').val();
            if(training_worker == 1)
                gross_salary_tax = parseInt(config_min_salary_unemployed) + parseFloat(config_min_salary_unemployed*7/100);
            else
                gross_salary_tax = config_min_salary_unemployed;
        }else{    
            gross_salary_tax = gross_salary;
        }


	var reduct_tax 		= parseFloat((gross_salary_tax * insurance)/100);
	var total_reduct 	= reduct_personal + reduct_family + reduct_tax;
	var salary_tax 		= full_salary -  total_reduct;
/*
	if(salary_tax > 0)
		var result 			= calTax(salary_tax);
	else
		var result			= 0;	
*/
	//Result	
	$('#gross_salary_result').html(full_salary).formatCurrency();
	var reduct_social	= parseFloat(gross_salary_tax * parseFloat($('#social').val())/100);
                
	$('#socical_result').html(reduct_social).formatCurrency();
	
	var reduct_health	= parseFloat(gross_salary_tax * parseFloat($('#health').val())/100);
	$('#health_result').html(reduct_health).formatCurrency();
	if(gross_salary > config_max_unemployed){
            var reduct_unemployed	= parseFloat( config_max_unemployed * parseFloat($('#unemployed').val())/100);
        }else if(gross_salary < config_min_salary_unemployed){
            var training_worker = $('#training_worker').val();
            if(training_worker == 1)
                var reduct_unemployed	= parseFloat( (parseInt(config_min_salary_unemployed)+parseFloat(config_min_salary_unemployed*7/100)) * parseFloat($('#unemployed').val())/100);
            else
                var reduct_unemployed	= parseFloat( config_min_salary_unemployed * parseFloat($('#unemployed').val())/100);
        }else{    
            var reduct_unemployed	= parseFloat( gross_salary * parseFloat($('#unemployed').val())/100);    
        }
	$('#unemployed_result').html(reduct_unemployed).formatCurrency();
	
	var reduct_trade_union	= parseFloat(gross_salary_tax * parseFloat($('#trade_union').val())/100);
        var min_trade_union = parseFloat(config_basic_salary * 10/100);
        if(reduct_trade_union > min_trade_union)
            reduct_trade_union = min_trade_union;
	$('#trade_union_result').html(reduct_trade_union).formatCurrency();



	salary_tax = Math.max(full_salary-reduct_social-reduct_health-reduct_unemployed-reduct_trade_union, 0);
	$('#salary_tax').html(salary_tax).formatCurrency();
	
/*
	if(full_salary >= (reduct_tax + reduct_personal + reduct_family-reduct_trade_union))
		var tax_income = full_salary - reduct_tax - reduct_personal - reduct_family;
	else
		var tax_income = 0;
*/
	var tax_income = Math.max(0, salary_tax - reduct_personal - reduct_family);
	result = calTax(tax_income);
	$('#tax_income').html(tax_income).formatCurrency();
	
	$('#personal_income_tax').html(result).formatCurrency();
		
	$('#reduct_personal_result').html(reduct_personal).formatCurrency();
	$('#reduct_family_result').html(reduct_family).formatCurrency();	
	
	$('#total_result').html(salary_tax - result).formatCurrency();
        
        if($('#training_worker').val() == 1)            
            $('#training_worker_result').html(_language.msg_trained_worker);
        else
            $('#training_worker_result').html(_language.msg_not_trained_worker);
        var total_allowances = parseInt($('#allowances_salary').val().replace(/[^0-9\.]+/g,''));
        if(isNaN(total_allowances))
            total_allowances = 0;
        $('#total_allowances').html(total_allowances).formatCurrency();
        
        $('#total_result_finished').html(salary_tax - result + total_allowances).formatCurrency();

	if(typeof $.fancybox.open == 'function'){
		$.fancybox.open($("#SalaryResult"));
	}else{
		$.fancybox({
			href: "#SalaryResult"
		});
	}
	return true;
}
