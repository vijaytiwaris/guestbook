<?= $this->extend('admin/template/base') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <form action="<?php echo base_url('admin/sub_admin_save'); ?>" method="post" >

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="form-control" required><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" class="form-control" required><br>

        <input type="submit" value="Submit" class="btn btn-primary">

    </form>
</div>
<?= $this->endSection() ?>
