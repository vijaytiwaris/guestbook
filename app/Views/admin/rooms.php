<?= $this->extend('admin/template/base') ?>


<?= $this->section('content') ?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Product</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Guest</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Booking Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($rooms as $room)  : ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?= base_url('uploads/' . $room['image']) ?>" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $room['room_title'] ?></h6>
                           
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $room['room_type'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $room['max_guest'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $room['booking_amount'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="<?= base_url('admin/edit_room/' . $room['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                        </a>
                      </td>
                 
                      <td class="align-middle text-center">
                      <a href="<?= base_url('admin/delete_room/' . $room['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <span class="badge badge-sm bg-gradient-danger">Delete</span>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



<?= $this->endSection() ?>
