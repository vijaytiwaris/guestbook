<?= $this->extend('admin/template/base2') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <h2>Edit Sub Admin</h2>
    <form action="<?= base_url('admin/update_sub_admin/' . $sub_admin['id']) ?>" method="post" enctype="multipart/form-data">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?= $sub_admin['name'] ?>" required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="form-control" value="<?= $sub_admin['email'] ?>" required><br>

       

        <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>
<?= $this->endSection() ?>
