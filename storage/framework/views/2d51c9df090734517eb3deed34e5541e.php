

<?php $__env->startSection('content'); ?>
<div style="max-width: 600px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Edit Profile</h1>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="width: 100px; height: 100px; background: #ddd; border-radius: 50%; overflow: hidden; margin: 0 auto 1rem;">
                <img src="https://api.dicebear.com/9.x/lorelei/svg?seed=<?php echo e($student->name); ?>&backgroundColor=ffdfbf" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h2 style="margin-bottom: 0.5rem;"><?php echo e($student->name); ?></h2>
            <p style="color: var(--text-muted);"><?php echo e($student->nim); ?></p>
        </div>

        <form action="<?php echo e(route('profile.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Semester</label>
                <input type="number" name="semester" value="<?php echo e($student->semester); ?>" min="1" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Academic Year</label>
                <input type="text" name="academic_year" value="<?php echo e($student->academic_year); ?>" placeholder="e.g. 2025/2026" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Save Changes</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/profile/edit.blade.php ENDPATH**/ ?>