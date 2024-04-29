<?= $this->extend('admin/template/base2') ?>

<?= $this->section('content') ?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-6">



          <div class="card-body">
       
          <form action="<?= base_url('admin/update_room/' . $room['id']) ?>" method="post" enctype="multipart/form-data">



          <div class="mb-3">
          <label for="room_title">Room Title:</label>
        <input type="text" id="room_title" name="room_title" class="form-control" value="<?= $room['room_title'] ?>" required>
        </div>

        <div class="mb-3">
        <label for="room_type">Room Type:</label>
        <select id="room_type" name="room_type" class="form-control" required>
            <option value="">Select</option>
            <option value="ac" <?= ($room['room_type'] == 'ac') ? 'selected' : '' ?>>AC</option>
            <option value="non-ac" <?= ($room['room_type'] == 'non-ac') ? 'selected' : '' ?>>Non-AC</option>
        </select>
</div>


        <div class="mb-3">
        <label for="room_size">Room Size:</label>
        <select id="room_size" name="room_size" class="form-control" required>
            <option value="">Select</option>
            <option value="single" <?= ($room['room_size'] == 'single') ? 'selected' : '' ?>>Single</option>
            <option value="double" <?= ($room['room_size'] == 'double') ? 'selected' : '' ?>>Double</option>
        </select>
        </div>


        <div class="mb-3">
        <label for="max_guest">Max Guest:</label>
        <input type="number" id="max_guest" name="max_guest" class="form-control" value="<?= $room['max_guest'] ?>" required>
        </div>


        <div class="mb-3">
        <label for="booking_amount">Booking Amount:</label>
        <input type="number" id="booking_amount" name="booking_amount" class="form-control" value="<?= $room['booking_amount'] ?>"  required>
        </div>


        <div class="mb-3">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" class="form-control">
        </div>


        <div class="mb-3">
        <label for="des">Description:</label>
        <textarea id="des" name="des" rows="4" cols="50" class="form-control" required><?= $room['des'] ?></textarea>
        </div>

              
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update Room</button>
              </div>
            </form>
          </div>
        </div>
      </div>


<?= $this->endSection() ?>
