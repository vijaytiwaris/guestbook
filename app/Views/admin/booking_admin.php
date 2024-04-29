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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Emd Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Room Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payment</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payment Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">subAdmin Approved</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Admin Approved</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($alldata as $data)  : ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $data['name'] ?></h6>
                           
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['emp_id'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['room_id'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['total_amount'] ?></p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['payment_status'] ?></p>
                      </td>


                      <td class="align-middle text-center text-sm">
                      <?php if($data['subadmin_approved'] == 1): ?>
    <a href="#" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
        <span class="badge badge-sm bg-gradient-success">Approved</span>
    </a>
<?php else: ?>
    <a href="#" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
        <span class="badge badge-sm bg-gradient-danger">Disapproved</span>
    </a>
<?php endif; ?>

                      </td>
                 
                      <td class="align-middle text-center">
                      <?php if($data['admin_approved'] == 1): ?>
                      <a href="<?= base_url('admin/admin_approved/' . $data['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <span class="badge badge-sm bg-gradient-success">Approved</span>
                        </a>
                        <?php else: ?>
                        <a href="<?= base_url('admin/admin_approved/' . $data['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <span class="badge badge-sm bg-gradient-danger">Disapproved</span>
                        </a>
                        <?php endif; ?>

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
