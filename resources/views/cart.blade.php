<html>
<head>
<link rel="stylesheet" href="{{ asset('css/vc.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<h1>Your Cart</h1>

    
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price/Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="table-body">
                
                <tr>
                    <!-- Inside your table for displaying cart items -->
                <tr>
         
                </tr>
                </tr>
			</tbody>
        </table>
		<p id="total-price">Total Price: #0.00</p>
    

    <!-- Your page content here -->
	
	<h3> Please enter Your Details Below to confirm your payment and generate your receipt</h3>
<div class="detl" style="text-align:left">
<div class="header">
        <h2>Details Here!</h2>
		<!-- Using HTML entity for the right arrow -->
<p class="arrow">Fill the form fields pointed to &rarr;</p>

    </div>
<form class="form" action="" name="form1" method="post">
    <div class="input-group">
        <label>Enter Name</label>
        <input id="vln" type="text" name="username" required>
    </div>
    <div class="input-group">
        <label>Enter Email</label>
        <input id="vle" type="email" name="email" required>
    </div>
    <div class="input-group">
        <label>Enter Phone Number</label>
        <input id="vlp" type="text" name="phone" required>
    </div>
	<div class="input-group">
        <label>Enter Your Address</label>
        <textarea id="vla" type="text" name="phone" required></textarea>
    </div>
</form>
</div>
 <div class="mp" style="display:none;">
 <div class="header">
        <h2>Details Here!</h2>
		<!-- Using HTML entity for the right arrow -->
<p class="arrow">Fill the form fields pointed to &rarr;</p>

    </div>
<form class="form" action="" name="form1" method="post">
    <div class="input-group">
        <label>Enter Name</label>
        <input id="vln" type="text" name="username" required>
    </div>
    <div class="input-group">
        <label>Enter Email</label>
        <input id="vle" type="email" name="email" required>
    </div>
    <div class="input-group">
        <label>Enter Phone Number</label>
        <input id="vlp" type="text" name="phone" required>
    </div>
</form>
</div>

<script>
    const cart = @json($cart);
</script>
<script src="{{ asset('js/vc.js') }}"></script>
</script>

<!-- Your JavaScript -->
<h1>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button style="text-align:center;" class="btn" type="button" onclick="payWithPaystack()"> Pay </button> 
</h1>

<script> 

</body>
</html>