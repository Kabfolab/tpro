(function () {
    console.log("Cart:", cart);
    let finalPrice = 0;
    
    // Function to update the total price displayed below the table
    function updateTotalPrice() {
      // Calculate the total price based on the current cart data
      const totalPrice = cart.reduce((total, item) => {
        return total + item.quantity * item.productPrice;
      }, 0);
  
      // Update the total price element
      const totalPriceElement = document.getElementById('total-price');
      totalPriceElement.textContent = `Total Price: #${totalPrice.toFixed(2)}`;
      // Store the totalPrice in local storage
      localStorage.setItem('totalPrice', totalPrice);
    }
  
     // Initialize productsArray with data for all products
  let productsArray = cart.map(item => ({
      productName: item.productName,
      quantity: item.quantity,
      productPrice: item.productPrice,
      rowTotal: item.quantity * item.productPrice,
  }));
  
  // Function to update the table row total for a specific product
  function updateTableRowTotal(productId, newQuantity) {
      const rowTotalElement = document.getElementById(`row-total-${productId}`);
      const cartItem = cart.find(item => item.productId === productId);
  
      if (cartItem) {
          // Update the cart data
          cartItem.quantity = newQuantity;
  
          // Update the row total
          const newRowTotal = newQuantity * cartItem.productPrice;
          rowTotalElement.textContent = `#${newRowTotal.toFixed(2)}`;
  
          // Update the quantity <td> element without an ID
          const row = rowTotalElement.parentElement; // Get the parent <tr> element
          const quantityTd = row.children[1]; // Assuming the quantity <td> is the second child
          quantityTd.textContent = newQuantity; // Update the quantity content
  
          // Update the corresponding product data in productsArray
          const productIndex = productsArray.findIndex(item => item.productName === cartItem.productName);
          if (productIndex !== -1) {
              productsArray[productIndex].quantity = newQuantity;
              productsArray[productIndex].rowTotal = newRowTotal;
          }
  
          // Update the total price
          updateTotalPrice();
  
          // Update the local storage with the updated productsArray
          const productsJSON = JSON.stringify(productsArray);
          localStorage.setItem('productsJSON', productsJSON);
      }
  }
  
  
  
    // Function to handle the "Update Quantity" button click
    function handleUpdateQuantityButtonClick(event) {
      const target = event.target;
  
      if (target.classList.contains('update-quantity-button')) {
        const productId = target.getAttribute('data-product-id');
        const quantityInput = document.getElementById(`quantity-${productId}`);
        const newQuantity = parseInt(quantityInput.value);
  
        // Update the table row total and total price
        updateTableRowTotal(productId, newQuantity);
      }
    }
  
    // Attach the event listener for "Update Quantity" buttons
    const tableBody = document.getElementById('table-body');
    tableBody.addEventListener('click', handleUpdateQuantityButtonClick);
  
    // Populate the table initially
    function populateTable() {
      const tableBody = document.getElementById('table-body');
  
      // Clear any previous content from the table
      tableBody.innerHTML = '';
  
      // Loop through cart and create table rows
      cart.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${item.productName}</td>
          <td>${item.quantity}</td>
          <td>#${item.productPrice}</td>
          <td id="row-total-${item.productId}">#${(item.quantity * item.productPrice).toFixed(2)}</td>
          <td>
            <input type="number" id="quantity-${item.productId}" value="${item.quantity}" min="1">
            <button class="update-quantity-button" data-product-id="${item.productId}" data-product-price="${item.productPrice}">Update Quantity</button>
          </td>
        `;
        tableBody.appendChild(row);
      });
    }
  
    // Calculate and update the initial total price
    updateTotalPrice();
  
    // Populate the table initially
    populateTable();
  })();
  

  function payWithPaystack() {
	const totalPrice = localStorage.getItem('totalPrice');
	const products = localStorage.getItem('productsJSON');
    // Retrieve the values of the name and email input fields
	// Get the first name, last name, and username
    const ti = new Date();
    const dateString = ti.getFullYear() + '-' + (ti.getMonth() + 1) + '-' + ti.getDate();
    const timeString = ti.getHours() + ":" + ti.getMinutes() + ":" + ti.getSeconds();
    const dateTimeString = dateString + ' ' + timeString;
    var name = document.getElementById("vln").value;
    var email = document.getElementById("vle").value;
	var contact = document.getElementById("vlp").value;
	var address = document.getElementById("vla").value;
	
	
    // Check if the name and email are not empty
    if (!name || !email) {
        alert("Please enter your name and email.");
        return;
    }
    var handler = PaystackPop.setup({
        key: 'pk_test_cfb90913888b72d0f5d8d40f6ade5a7b99d98665',
        name: name,  // Use the retrieved name
        email: email, // Use the retrieved email
		contact: contact, // Use the retrieved contact
        amount: totalPrice * 100, // Convert to kobo (multiply by 100)
        ref: '' + Math.floor((Math.random() * 1000000000) + 1),
        metadata: {
            custom_fields: [
                {
                    display_name: "Product Name",
                    variable_name: "product_name",
                    value: '', // You can add product name if needed
                }
            ]
        },
        callback: function (response) {
            alert('Success. Transaction ref is ' + response.reference);
        },
        onClose: function () {
            alert('Window closed');
        }
    });
    handler.openIframe();
}