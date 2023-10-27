(function() {
    let slideIndex = 0; // Move the slideIndex variable here

    showSlides();

    function showSlides() {
      myslidecontainer = document.getElementById('slid');
      
      // variable to store the HTML output
      const put = [];

      // for each product...
      data.forEach((currentSlid, imageNo) => {
        const imageSrc = assetURL + currentSlid.image;
        // add this product to the output
        put.push(
          `<div class="myslides">
          <img src="${imageSrc}" alt="${currentSlid.product_name}" width="100">
            <div class="productname"> ${currentSlid.product_name} </div>
            <div class="price"> # ${currentSlid.price} </div>
            <div class="description"> ${currentSlid.description} </div>
          </div>`
        );
      });

      myslidecontainer.innerHTML = put.join('');
      slidesContinue();
    }

    function slidesContinue() {
      const slides = document.getElementsByClassName("myslides");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }
      slides[slideIndex - 1].style.display = "block";
      setTimeout(slidesContinue, 5000);
    }
  })();


  
  




      
(function() {
    const cart = [];
  const put = [];

  data.forEach((currentSlid, imageNo) => {
    const imageSrc = assetURL + currentSlid.image;
  put.push(
    `<div class="myslidest">
      <div class="product_imaget">
      <img src="${imageSrc}" alt="${currentSlid.product_name}" width="100">
      </div>
      <div class="productnamet"> ${currentSlid.product_name} </div>
      <div class="pricet"> # ${currentSlid.price} </div>
      <div class="descriptiont"> ${currentSlid.description} </div>
      <div>
        <button class="add-to-cart-button" data-product="${imageSrc}" data-product-id="${currentSlid.id}" data-product-name="${currentSlid.product_name}" data-product-price="${currentSlid.price}">
          Add to Cart
        </button>
      </div>
    </div>`
  );
});


// Append the generated product details to the 'cartItemsContainer'
const cartItemsContainer = document.getElementById('cartItemsContainer');
cartItemsContainer.innerHTML = put.join('');

// After displaying the message
const messageContainer = document.getElementById('messageContainer');
messageContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });


// Cart data structure to hold added products


// Attach click event listener to each 'Add to Cart' button
const addToCartButtons = document.querySelectorAll('.add-to-cart-button');



// Attach click event listener to each 'Add to Cart' button
addToCartButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    const productId = button.getAttribute('data-product-id');
    const productName = button.getAttribute('data-product-name');
    const productPrice = parseFloat(button.getAttribute('data-product-price'));

    // Find the existing cart item, if it exists
    const existingCartItem = cart.find(item => item.productId === productId);

    if (existingCartItem) {
        // If the item is already in the cart, increment its quantity
        existingCartItem.quantity++;

        // Recalculate the itemPrice based on the updated quantity
        existingCartItem.itemPrice = existingCartItem.productPrice * existingCartItem.quantity;
    } else {
        // If the item is not in the cart, add it with an initial quantity of 1
        const newItem = {
            productId,
            productName,
            productPrice,
            quantity: 1
        };

        // Calculate the initial itemPrice
        newItem.itemPrice = newItem.productPrice * newItem.quantity;

        cart.push(newItem);
    }

    // Update the cart UI and total price
    updateCartUI();
    updateTotalPrice();
    console.log(cart);

    // Update the message container with success message
    messageContainer.innerHTML = `${productName} has been added to your cart.</br> <a id="viewCartLink" href="/cart">View Your Cart</a>`;
    
	// Add an event listener to the "View Your Cart" link
const viewCartLink = document.getElementById('viewCartLink');
viewCartLink.addEventListener('click', function(event) {
    // Prevent the default behavior of the link
    event.preventDefault();

    // Send the entire cart data to the server-side script for storage
const xhr = new XMLHttpRequest();
xhr.open('POST', '/add-to-cart', true);
xhr.setRequestHeader('Content-Type', 'application/json');

// Set the X-CSRF-TOKEN header
xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

// Convert the cart data to JSON and send it in the request body
const jsonData = JSON.stringify(cart);

xhr.onload = function () {
    if (xhr.status === 200) {
        console.log('Cart data sent successfully');
        window.location.href = '/cart';
    } else {
        console.error('Error storing cart data');
    }
};

xhr.onerror = function () {
    console.error('An error occurred while sending the request.');
};

xhr.ontimeout = function () {
    console.error('The request timed out.');
};

// Send the JSON data in the request body
xhr.send(jsonData);

    
});


	
	
    
    // Reset the message after a short delay
    setTimeout(() => {
      messageContainer.textContent = '';
    }, 8000); // 8 seconds
  });
});

// ... (your existing code)


function updateCartUI() {
    // Get the cart items list container
    const cartItemsList = document.querySelector('.cart-items');
  
    // Clear any previous content from the list
    cartItemsList.innerHTML = '';
  
    // Populate the cart items list with the current cart contents
    cart.forEach(item => {
      const listItem = document.createElement('li');
      const itemPrice = (item.quantity * item.productPrice).toFixed(2); // Calculate the item price
      listItem.textContent = `${item.productName} (Qty: ${item.quantity}) - #$${itemPrice}`;
      cartItemsList.appendChild(listItem);
    });
  }
  
  // Function to update the total price
  function updateTotalPrice() {
    // Calculate the total price
    let totalPrice = 0;
  
    cart.forEach(item => {
      const itemPrice = item.quantity * item.productPrice;
      totalPrice += itemPrice;
    });
  
    // Display the total price
    const totalPriceElement = document.getElementById('total-price');
    if (totalPriceElement) {
      totalPriceElement.textContent = `Total Price: #$${totalPrice.toFixed(2)}`;
    } else {
      console.error('Total price element not found.');
    }
  }
  

})();
// ...




        const text = document.querySelector(".sec-text");
        const textLoad = () => {
            setTimeout(() => {
                text.textContent = "stunning shoes";
            }, 0);
            setTimeout(() => {
                text.textContent = "classic slippers";
            }, 4000);
            setTimeout(() => {
                text.textContent = "All variety of fits";
            }, 8000); //1s = 1000 milliseconds
        }
        textLoad();
        setInterval(textLoad, 12000);
    

