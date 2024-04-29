<?= $this->extend('admin/template/base') ?>


<?= $this->section('content') ?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Sub Admin</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach ($alldata as $data)  : ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $data['name'] ?></h6>
                           
                          </div>
                         
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $data['email'] ?></p>
                      </td>
                     
                      <td class="align-middle text-center text-sm">
                        <a href="<?= base_url('admin/edit_sub_admin/' . $data['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                        </a>
                      </td>
                 
                      <td class="align-middle text-center">
                      <a href="<?= base_url('admin/delete_sub_admin/' . $data['id']) ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
