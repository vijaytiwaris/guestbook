<!-- createuser.php -->

<?= $this->include('template/header') ?>
<div class="main-content form-box">
    <h2>Sign Up</h2>
    <?php if(session()->has('error')): ?>
        <div style="color: red;">
            <?php echo session('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/signup_save" method="post">
        <div>
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= old('name') ?> " required>
        </div>
        <div>
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= old('email') ?>" required>
        </div>
        <div>
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" class="form-control" name="password" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>

