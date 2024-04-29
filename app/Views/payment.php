<?= $this->include('template/header') ?>


    <div class="container">
        <div class="payment-form">
            <h2 class="text-center mb-4">Guest Booking Payment</h2>
            <form action="/processPayment" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="orderId">Order ID:</label>
                    <input type="text" class="form-control" id="orderId" name="orderId" value="<?= $orderId ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="bookingAmount">Booking Amount:</label>
                    <input type="text" class="form-control" id="booking_amount" name="booking_amount" value="<?= $bookingAmount ?>" readonly>
                </div>
             
                <div class="text-center">
                  
                    <button type="button" class="razorpay-button" id="rzp-button">Pay Now</button>
                </div>
            </form>
        </div>
    </div>

   
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
    
    <script>
        document.getElementById('rzp-button').onclick = function(e) {
            // Create a new Razorpay instance
            var razorpay = new Razorpay({
                key: 'rzp_test_FQQAgVZJLjfvT5',
                amount: <?= $bookingAmount * 100 ?>,
                currency: 'INR',
                name: 'Your Company Name',
                description: 'Payment for Booking',
                prefill: {
                    name: '<?= $booking['name'] ?>',
                    contact: '999558568'
                },
                handler: function(response) {
                   
                    alert('Payment successful!');
                    var paymentData = '/success?payment_id=' + response.razorpay_payment_id + '&amount=' + +<?= $bookingAmount ?>+'&order_id='+<?= $orderId ?>;

window.location.href = paymentData;
                }
            });
          
            razorpay.open();
            e.preventDefault();
        };
    </script>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
