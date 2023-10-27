<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	  <title>See Product Details</title>
      <link rel="stylesheet" href="{{ asset('css/qz.css') }}">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>


<div class="flex-container">
<nav>
  <h3>Enny Wears_ And More</h3>
</nav>    
      <div id="slid" class="sld"></div>
         <ul class="ml">
                <li><a href="tfva.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
  <!-- Other list items -->
        </ul>
</div>

<div class="fctw">
<div class="pf">
<nav class="navtw">
  <h3>Enny Wears_ And More</h3>
</nav>
<div  id="des" class="opn">
		<i class="fas fa-bars larger-icon" id="men"  style="color:white;"></i><span></span>
		</div>
		<i class="fas fa-times" id="clos" style="color:white; display:none;"></i>
		<ul id="menu" class="mnu" style="display:none;">
                <li><a href="tfva.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
  <!-- Other list items -->
        </ul>
</div>
</div>
      <div id="slid" class="sld" style="background-color:grey;"></div>


  
  <div class="int">
        <h1><marquee>Welcome to Enny Wears_And More online store. Browse our products and start shopping!</marquee></h1>
    </div>
	<div class="container">
        <span class="text first-text">Cherising you our customers, we provide you:</span>
        <span class="text sec-text">stunning shoes</span>
    </div>
  
 <section style="background-color: grey; margin-left: 0px;" class="ic">
    <div class="navigation">
  <span class="prev" onclick="navigate('prev')">&lt; <</span>
  <span class="next" onclick="navigate('next')">> &gt;</span>
</div>
<div id="cartItemsContainer" class="row-container"></div>
<div class="cart">
  <h2>Shopping Cart</h2>
  <ul class="cart-items"></ul>
  <h1 id="total-price"></h1>
</div>
<div id="messageContainer" class="message"></div>
 </section>

 <script>
    const data = @json($products);
</script>

<script>
    const assetURL = "{{ asset('storage/images/') }}";
</script>

<script src="{{ asset('js/qz.js') }}"></script>


<footer>
<div style="text-align:center" class="ico"> 
		<a href="#" class="fa fa-facebook larger-icon" style="background-color:white"></a>
            <a href="#" class="fa fa-telegram larger-icon" style="background-color:white"></a>
		</div>


        <p>&copy; <?php echo date("Y"); ?> Enny Wears_And More. All rights reserved.</p>
    </footer>

    </body>
</html>


