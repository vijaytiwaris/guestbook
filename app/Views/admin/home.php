<?= $this->extend('admin/template/base') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room Title</th>
                <th scope="col">Room Type</th>
                <th scope="col">Room Size</th>
                <th scope="col">Max Guests</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($room as $key => $row) : ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $row['room_title'] ?></td>
                    <td><?= $row['room_type'] ?></td>
                    <td><?= $row['room_size'] ?></td>
                    <td><?= $row['max_guest'] ?></td>
                    <td><?= $row['des'] ?></td>
                    <td><img src="<?= base_url('uploads/' . $row['image']) ?>" alt="Room Image" style="max-width: 100px;"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>