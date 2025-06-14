<?php $__env->startSection('title', 'Tambah Task'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="mb-4">📝 Tambah Task Baru</h2>

    <form method="POST" action="<?php echo e(route('tasks.store')); ?>">
        <?php echo csrf_field(); ?> <!-- WAJIB! Kalau tidak ada, akan selalu redirect ke login -->

        <div class="mb-3">
            <label for="title" class="form-label">Judul Task</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" name="due_date" id="due_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category" id="category" class="form-select">
                <option value="tugas">Tugas</option>
                <option value="organisasi">Organisasi</option>
                <option value="kuliah">Kuliah</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending">Belum Selesai</option>
                <option value="completed">Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web_project1\resources\views/tasks/create.blade.php ENDPATH**/ ?>