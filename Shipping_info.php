<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = 'http://website.com/order-completed/';
}, false );
</script>
<script>
var tabela = document.getElementById("tabela").innerHTML;
if(localStorage.product_cart)
{
	product_cart = JSON.parse(localStorage.product_cart);	
}	
var subtotal = 0, total = 0, counter = 0;
function showCart() {
	//Show cart data to user
	var retrievedObject = localStorage.getItem('product_cart');
	var order_table = document.getElementById("orderTable").innerHTML;
	console.log('retrievedObject: ', JSON.parse(retrievedObject));
	
	document.getElementById("orderTable").innerHTML += 
		"<table style='border-radius: 7px; background: #fafafa; border-collapse: collapse; border: 1px solid #ccc; font-size: 1rem;'>" + 
		"<tr>" +
		"<th style='padding: 15px 40px; border-right: 1px solid #ccc;'>" + "ID" + "</th>" +
		"<th style='padding: 15px 40px; border-right: 1px solid #ccc;'>" + "Product" + "</th>" +
		"<th style='padding: 15px 40px; border-right: 1px solid #ccc;'>" + "Price" + "</th>" +
		"<th style='padding: 15px 40px; border-right: 1px solid #ccc;'>" + "Quantity" + "</th>" +
		"<th style='padding: 15px 40px; border-right: 1px solid #ccc;'>" + "Color" + "</th>" +
		"<th style='padding: 15px 40px; border-right: 1px solid #ccc;'>" + "Total" + "</th>" +
		"</tr>" ;
	for (var i in product_cart) {
		counter = counter + 1;
		var item = product_cart[i];
		prTotal = item.price * item.qty;
		subtotal = subtotal + prTotal;
		total = subtotal;
		
		document.getElementById("displayProduct").innerHTML += 
		"<div class='column is-one-third'>" + 
		"<a href='" + item.permalink + "'><img src='" + item.image + "' /></a>" +
					
				"</div>" + 
				"<div class='column is-two-thirds'>" +
					"<a href='" + item.permalink + "'><h5>" + item.title + "</a></h5>" +
					"<p>" + item.price + "€" + "</p>" +
				"</div>"
		
		document.getElementById("orderTable").innerHTML += 
		
		"<tr>" +
		"<td style='padding: 15px 40px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; font-weight: 500;'>" + counter + "</td>" +
		"<td style='padding: 15px 40px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; font-weight: 500;'>" + item.title + "</td>" +
		"<td style='padding: 15px 40px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; font-weight: 500;'>" + item.price + "€" + "</td>" + 
		"<td style='padding: 15px 40px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; font-weight: 500;'>" + item.qty + "</td>" +
		"<td style='padding: 15px 40px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; font-weight: 500;'>" + item.color + "</td>" +
		"<td style='padding: 15px 40px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; font-weight: 500;'>" + prTotal + "€" + "</td>" + 
		"</tr>";
		
		
	} 
	document.getElementById("orderTable").innerHTML += "</table>";
}
showCart();
document.getElementById("totalNumOfPr").innerHTML = product_cart.length;
document.getElementById("subtotal").innerHTML = subtotal + "€";
document.getElementById("total").innerHTML = total + "€";
</script>