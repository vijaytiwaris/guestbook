<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('css/style.css');   ?>" >

<div class="main-content form-box">

<?php if(session()->has('error')): ?>
        <div style="color: red;">
            <?php echo session('error'); ?>
        </div>
    <?php endif; ?>

    <h2 >Guest Room Booking Form</h2>

    <form class="booking_form" action="<?= base_url('/roombook') ?>" method="post">

    <input type="hidden" id="room_id" name="room_id" value="<?= $room_id ?>" required>
    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id ?>" required>
    <input type="hidden" id="booking_amount" name="booking_amount" value="<?= $booking_amount ?>" required>

        <div class="mb-3">
            <label for="booking_type" class="form-label">Booking Type</label>
            <select class="form-select form-control" id="booking_type" name="booking_type" required>
                <option value="">Select Booking Type</option>
                <option value="Institutional">Institutional</option>
                <option value="Official">Official</option>
                <option value="Personal">Personal</option>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="arrival_date" class="form-label">Arrival Date</label>
                <input type="date" class="form-control" id="arrival_date" name="arrival_date" required>
            </div>
            <div class="col-md-6">
                <label for="departure_date" class="form-label">Departure Date</label>
                <input type="date" class="form-control" id="departure_date" name="departure_date" required>
            </div>
        </div>
       
        <div class="mb-3">
            <label for="emp_id" class="form-label">EmpID</label>
            <input type="text" class="form-control" id="emp_id" name="emp_id" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label ">Gender</label>
            <select class="form-select form-control" id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="official_address" class="form-label">Official Address</label>
            <input type="text" class="form-control" id="official_address" name="official_address" required>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="col-md-4">
                <label for="pin" class="form-label">PIN</label>
                <input type="text" class="form-control" id="pin" name="pin" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="id_proof" class="form-label">Upload ID Proof</label>
            <input type="file" class="form-control" id="id_proof" name="id_proof" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




