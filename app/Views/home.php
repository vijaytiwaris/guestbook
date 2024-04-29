

<?= $this->include('template/header') ?>


<div class="container">
  <h2 class="mt-5 mb-3 text-center">Room List</h2>
  
  <div class="row">
 

    <?php foreach ($rooms as $room)  : ?>
    <div class="col-md-4 mb-4">
      <div class="card room-box">
        <img src="<?= base_url('uploads/' . $room['image']) ?>" class="card-img-top" alt="Room 1">
        <div class="card-body">
          <h5 class="room_title"><?= $room['room_title'] ?></h5>
          <h6 class="room_title">Max Guest: <?= $room['max_guest'] ?></h6>
          <a href="<?= base_url('room_details/' . $room['id']) ?>" class="btn room_book_btn ">Book Now</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  


  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
