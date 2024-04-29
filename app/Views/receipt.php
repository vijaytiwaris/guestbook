<?= $this->include('template/header') ?>
    <div class="container">
        <div class="receipt">
            <h2 class="text-center mb-4">Payment Receipt</h2>
            <div class="receipt-details">
                <p><strong>Order ID:</strong> <?= $orderId ?></p>
                <p><strong>Booking Amount:</strong> <?= $bookingAmount ?></p>
             
            </div>
            <p class="thank-you text-center">Thank you for your payment!</p>
            <div class="text-center">
                <a href="/" class="btn btn-home">Go to Homepage</a>
            </div>
        </div>
    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
