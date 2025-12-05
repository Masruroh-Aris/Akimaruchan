

<?php $__env->startSection('content'); ?>
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Edit Course</h1>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <form action="<?php echo e(route('courses.update', $course->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course Name</label>
                    <input type="text" name="name" value="<?php echo e($course->name); ?>" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">SKS</label>
                    <input type="number" name="sks" value="<?php echo e($course->sks); ?>" min="1" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Lecturer</label>
                    <input type="text" name="lecturer" value="<?php echo e($course->lecturer); ?>" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Target Grade</label>
                    <input type="text" name="target_grade" value="<?php echo e($course->target_grade); ?>" placeholder="A" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Progress (%)</label>
                <input type="range" name="progress" min="0" max="100" value="<?php echo e($course->progress); ?>" oninput="this.nextElementSibling.value = this.value" style="width: 100%;">
                <output style="font-weight: bold; color: var(--primary);"><?php echo e($course->progress); ?></output>%
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Learning Contract</label>
                <textarea name="learning_contract" rows="3" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;"><?php echo e($course->learning_contract); ?></textarea>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Achievements / Updates</label>
                <textarea name="achievements" rows="3" placeholder="What have you learned so far?" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;"><?php echo e($course->achievements); ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Update Course</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/courses/edit.blade.php ENDPATH**/ ?>