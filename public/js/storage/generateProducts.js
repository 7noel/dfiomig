$(document).ready(function(){
	
	$('.btnAddProduct').click(function(e){
		renderTemplateRowProduct();
	});

});

function activateTemplate (id) {
	var t = document.querySelector(id);
	return document.importNode(t.content, true);
}

function renderTemplateRowProduct () {
	var clone = activateTemplate("#template-row-product");
	var items = $('#items').val();
	clone.querySelector("[data-size_id]").setAttribute("name", "products[" + items + "][size_id]");
	clone.querySelector("[data-code_cut]").setAttribute("name", "products[" + items + "][code_cut]");
	clone.querySelector("[data-use_set_price]").setAttribute("name", "products[" + items + "][use_set_price]");
	clone.querySelector("[data-description]").setAttribute("name", "products[" + items + "][description]");
	items = parseInt(items) + 1;
	$('#items').val(items);
	$("#table-products").append(clone);
}