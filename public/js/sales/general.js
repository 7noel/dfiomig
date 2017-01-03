$(document).ready(function(){

	$('#txtCompany').autocomplete({
		source: "/api/companies/autocompleteAjax/",
		minLength: 4,
		select: function(event, ui){
			$('#company_id').val(ui.item.id);
			$('#lstSeller').focus();
		}
	});
	/*$('#txtSeller').autocomplete({
		source: "/api/sellers/autocompleteAjax/",
		minLength: 4,
		select: function(event, ui){
			$('#seller_id').val(ui.item.id);
			$('#txtCompany').focus();
		}
	});*/

//autocomplete para elementos agregados por javascript
	$(document).on('focus','.txtDesign', function (e) {
		//console.log($(this));
		if ( !$(this).data("autocomplete") ) {
			e.preventDefault();
			$(this).autocomplete({
				source: "/api/designs/autocompleteAjax/",
				minLength: 4,
				select: function(event, ui){
					if(isDesignEnabled(this, ui.item.id.id)){
						$(this).parent().parent().find('.designId').val(ui.item.id.id);
						$(this).parent().parent().find('.unitId').val(ui.item.id.unit_id);
						$(this).parent().parent().find('.design_id').text(ui.item.id.id);
						$(this).parent().parent().find('.txtPrecio').val(ui.item.id.price);
						
						$(this).parent().parent().find('.txtCantidad').focus();
					}
				}
			});
		}
	});
	$(document).on('change','.txtCantidad, .txtPrecio, .txtDscto', function (e) {
		calcTotalItem(this);
		calcTotalOrder();
	});
	$('#btnAddProduct').click(function(e){
		var items = $('#items').val();
		if (items>0) {
			if ($("input[name='details["+(items-1)+"][basic_design_id]']").val() == "") {
				$("input[name='details["+(items-1)+"][txtDesign]']").focus();
			} else{
				renderTemplateRowProduct();
			};
		} else{
			renderTemplateRowProduct();
		};
	});
});

function validateItem (myElement, id) {
	n = $(myElement).parent().parent().find(id).val();
	n = Math.round(parseFloat(n)*100)/100;
	if (isNaN(n)) {n=0.00};
	$(myElement).parent().parent().find(id).val(n.toFixed(2));
	return n;
}
function calcTotalItem (myElement) {
	cantidad = validateItem(myElement,'.txtCantidad');
	precio = validateItem(myElement,'.txtPrecio');
	dscto = validateItem(myElement,'.txtDscto');
	D = Math.round(cantidad * precio * dscto) / 100;
	total = Math.round((cantidad*precio-D)*100)/100;
	$(myElement).parent().parent().find('.txtTotal').text( total.toFixed(2) );
}
function calcTotalOrder () {
	var gross_value = 0;
	var discount = 0;
	var subtotal = 0;
	var total = 0;
	var q,p,d;
	$('#tableItems tr').each(function (index, vtr) {
		q = parseFloat($(vtr).find('.txtCantidad').val());
		p = parseFloat($(vtr).find('.txtPrecio').val());
		d = parseFloat($(vtr).find('.txtDscto').val());
		gross_value = Math.round(q*p*100)/100 + gross_value;
		discount = Math.round(q*p*d)/100 + discount;
	});
	subtotal = gross_value - discount;
	total = Math.round(subtotal * (100 + 18))/100;


	$('#mGrossValue').text(gross_value.toFixed(2));
	$('#mDiscount').text(discount.toFixed(2));
	$('#mSubTotal').text(subtotal.toFixed(2));
	$('#mTotal').text(total.toFixed(2));
}
function activateTemplate (id) {
	var t = document.querySelector(id);
	return document.importNode(t.content, true);
}

function renderTemplateRowProduct () {
	var clone = activateTemplate("#template-row-item");
	var items = $('#items').val();
	clone.querySelector("[data-designid]").setAttribute("name", "details[" + items + "][basic_design_id]");
	clone.querySelector("[data-unitid]").setAttribute("name", "details[" + items + "][unit_id]");
	clone.querySelector("[data-design]").setAttribute("name", "details[" + items + "][txtDesign]");
	clone.querySelector("[data-cantidad]").setAttribute("name", "details[" + items + "][quantity]");
	clone.querySelector("[data-precio]").setAttribute("name", "details[" + items + "][price]");
	clone.querySelector("[data-dscto]").setAttribute("name", "details[" + items + "][discount]");
	clone.querySelector("[data-isdeleted]").setAttribute("name", "details[" + items + "][is_deleted]");
	if (items>0) {$("input[name='details["+(items-1)+"][txtDesign]']").attr('disabled', true);};
	
	items = parseInt(items) + 1;
	$('#items').val(items);
	$("#tableItems").append(clone);
	$("input[name='details["+(items-1)+"][txtDesign]']").focus();
}

function isDesignEnabled (myElement, id) {
	var b = true
	$('#tableItems tr .designId').each(function (index, d) {
		if ($(d).val() == id) {
			alert("Este diseño ya fue registrado");
			setTimeout(function(){ 
				$(myElement).parent().parent().find('.txtDesign').val('');
				$(d).parent().find('.isdeleted').attr('checked', false);
				$(d).parent().find('.txtCantidad').focus();
			}, 300);
			b = false;
		};
	});
	return b;
}