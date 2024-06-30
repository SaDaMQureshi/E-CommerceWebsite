function check() {
  let productPrize = parseFloat(document.getElementById("productPrize").value);
  let productQuantity = parseInt(document.getElementById("Quantity").value);
  let deliveryCharges = parseFloat(document.getElementById("deliveryFee").value);
  let totalProductsAmount = document.getElementById("totalAmoutOfProduct");
  let totalAmount = document.getElementById("totalAmount");


  let totalProductPrizeWithQanutity = productPrize * productQuantity;
  totalProductsAmount.value += totalProductPrizeWithQanutity;
  
  let subTotal = deliveryCharges + totalProductPrizeWithQanutity;


  totalAmount.value = subTotal+"$";
  console.log(subTotal)
}