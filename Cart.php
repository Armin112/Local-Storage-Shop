
	<script>
	//Initialize local storage shopping cart
	if(localStorage.product_cart)
    {
		product_cart = JSON.parse(localStorage.product_cart);
    }
	var subtotal = 0,total = 0;

function updateCart() {	 
	//Update shopping cart with new informations
	var newProduct = new Object();	
	newProduct.title = product_cart.title;
	newProduct.price = product_cart.price;
	newProduct.color =  product_cart.color;
	newProduct.image =  product_cart.image;
	newProduct.permalink =  product_cart.permalink;
	newProduct.qty =  document.getElementById("qty").value;
		
    for (var i in product_cart) {
		if(product_cart[i].title == newProduct.title)
		{
			product_cart[i].qty = newProduct.qty;
			saveCart();
			return;
		}
	}
	    			
	product_cart.push(newProduct )   
	saveCart();   
    window.location.reload();
}
	  	
function showCart() {
	//Show cart data to user
	var retrievedObject = localStorage.getItem('product_cart');
	console.log('retrievedObject: ', JSON.parse(retrievedObject));
	for (var i in product_cart) {
		var item = product_cart[i];
		prTotal = item.price * item.qty;
		subtotal = subtotal + prTotal;
		total = subtotal;
		
		document.getElementById("displayProduct").innerHTML += 
		"<div class='columns cart-product'>" +
		"<div class='column is-4'>" + 
					"<a href='" + item.permalink + "'><img src='" + item.image + "' /></a>" +
					"<a href='" + item.permalink + "'><h4>" + item.title + "</h4></a>" + 
				"</div>" + 
				"<div class='column is-1'><h4>" + item.price + "€" + "</h4></div>" + 
				"<div class='column is-2'><input type='number' value='" + item.qty + "' class='amount' id='qty-" + i + "'/> <h4></h4></div>" +
				"<div class='column is-2'><h4>" + item.color +  "</h4></div>" +
				"<div class='column is-1'><h4>" + prTotal + "€" + "</h4></div>" + 
				"<div class='column is-2'><div class='buttons'>" + "<a onclick='updateItem(" + i + ")' class='custom-button button-green'>Aktualisieren</a>" + 
				"<a onclick='deleteItem(" + i + ")' class='custom-button button-black'>Löschen</a>" +
				"</div></div>"		
		"</div>"
		
		document.getElementById("displayProductMob").innerHTML += 
		"<div class='columns cart-product'>" +
		"<div class='column is-8'>" + 
					"<a href='" + item.permalink + "'><img src='" + item.image + "' /></a>" +
					"<a href='" + item.permalink + "'><h4>" + item.title + "</h4></a>" + 
				"</div>" + 
				"<div class='column is-2'><h4>" + item.price + "€" + "</h4></div>" + 
				"<div class='column is-2'><input type='number' value='" + item.qty + "' class='amount' id='qty-" + i + "'/> <h4></h4></div>" +
				"</div>" + 
				"<div class='columns cart-product borderr-bottom'>" +
				"<div class='column is-4'><h4>" + item.color +  "</h4></div>" +
				"<div class='column is-2'><h4>" + prTotal + "€" + "</h4></div>" + 
				"<div class='column is-6'><div class='buttons'>" + "<a onclick='updateItem(" + i + ")' class='custom-button button-green'>Aktualisieren</a>" + 
				"<a onclick='deleteItem(" + i + ")' class='custom-button button-black'>Löschen</a>" +
				"</div></div>"
				
		"</div>"
	} 
}

showCart();
document.getElementById("totalNumOfPr").innerHTML = product_cart.length;
document.getElementById("subtotal").innerHTML = subtotal + "€";
document.getElementById("total").innerHTML = total + "€";


function updateItem(index) {
//Update single item in local storage shopping cart	 
var newProduct = new Object();		
	newProduct.qty =  document.getElementById("qty-"+index).value;
	for (var i in product_cart) {
		if(i == index)
		{
			product_cart[i].qty = newProduct.qty;
			saveCart();
				window.location.reload();
			return;
		}
	}
}


function deleteItem(index){
	//Delete product from local storage cart
	product_cart.splice(index,1); // delete item at index
	saveCart();
	window.location.reload();
}

function saveCart() {
	//Save data into local storage cart
	if ( window.localStorage)
	{
		localStorage.product_cart = JSON.stringify(product_cart);
	}
}

	
	</script>