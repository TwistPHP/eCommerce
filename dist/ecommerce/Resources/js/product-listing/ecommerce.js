// product listing page js
var TwistAJAX = new twistajax( '/manager/ajax/ecommerce' );

$(document).ready(function(){
	$('.createdDate span').hover(function(){
		$(this).parent().toggleClass('active');
	})
	$('form.filter').submit(function(e){
		e.preventDefault();
		var strOrderVal = $('div [data-name="order"] .selectOptions .selected').attr('data-value');
		var strCategory = $('div [data-name="category"] .selectOptions .selected').attr('data-value');
		console.log(strOrderVal+strCategory);
		var jsonOrderPostData = {
			"productOrder" : strOrderVal,
			"productCategory" : strCategory
		};
		reOrder(jsonOrderPostData);
	});
});
function reOrder(jsonOrderPostData){
	TwistAJAX.post(
		'products/sortProducts',
		{ product: jsonOrderPostData }
	)
		.then( response => {
			$(".product-viewing").html("");
			$(".product-viewing").append(response.html);
			productOrder = response.products;
		} )
		.catch( e => {
			console.error( 'ajax error:', e );
		} );
}