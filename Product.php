<script>
//Initialize local storage shopping cart
var product_cart = [];
if(localStorage.product_cart)
{
	product_cart = JSON.parse(localStorage.product_cart);
	showCart();
}
else{
	product_cart=[];
}
       
function addToCart() {
	//Add new product into shopping cart
	var newProduct = new Object();
		var snack = document.getElementById("snackbar");
		snack.className = "show";
		setTimeout(function(){ snack.className = snack.className.replace("show", ""); }, 3000);  
		var e = document.getElementById("color");
		newProduct.title = document.getElementById("title").innerHTML;
		newProduct.price = document.getElementById("price").innerHTML;
		newProduct.qty =  document.getElementById("qty").value;
		newProduct.color =  e.options[e.selectedIndex].value;
		newProduct.image =  document.getElementById("image").innerHTML;
		newProduct.permalink =  document.getElementById("permalink").innerHTML;
		for (var i in product_cart) {
			if(product_cart[i].title == newProduct.title)
			{
				product_cart[i].qty = newProduct.qty;
			product_cart[i].color = newProduct.color;
				saveCart();
				return;
			}
		}    			
	product_cart.push(newProduct )   
	saveCart();   
}

function deleteItem(index){
	//Delete product from local storage cart
	product_cart.splice(index,1); // delete item at index
	saveCart();
}

function showCart() {
	//Display cart data to user
	var retrievedObject = localStorage.getItem('product_cart');
	console.log('retrievedObject: ', JSON.parse(retrievedObject));
	for (var i in product_cart) {
		var item = product_cart[i];
		var productTotal = item.price * item.qty;
		
		document.getElementById("cartBody").innerHTML += 
		"<tr><td>" + item.title + "</td><td>" +
		item.price + "€" + "</td><td>" + item.qty + "</td><td>"
		+ item.productTotal + "</td><td>"
		+ "<button onclick='deleteItem(" + i + ")'>Delete</button></td></tr>"
	} 
}
	
function saveCart() {
	//Save data into local storage cart
	if ( window.localStorage)
	{
		localStorage.product_cart = JSON.stringify(product_cart);
	}
}
</script>