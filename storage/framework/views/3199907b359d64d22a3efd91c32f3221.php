

<?php $__env->startSection('content'); ?>
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Course Details</h1>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem;">
            <div>
                <span class="badge" style="background: #E5F7FF; color: #0095FF; margin-bottom: 0.5rem; display: inline-block;"><?php echo e($course->sks); ?> SKS</span>
                <h2 style="font-size: 1.8rem; margin-bottom: 0.5rem;"><?php echo e($course->name); ?></h2>
                <p style="color: var(--text-muted); font-size: 1.1rem;">Lecturer: <?php echo e($course->lecturer); ?></p>
            </div>
            <div style="text-align: right;">
                <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.2rem;">Target Grade</p>
                <span style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e($course->target_grade ?? '-'); ?></span>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <span>Current Progress</span>
                <span style="font-weight: 600;"><?php echo e($course->progress); ?>%</span>
            </div>
            <div style="width: 100%; height: 10px; background: #F0F3F8; border-radius: 5px; overflow: hidden;">
                <div style="width: <?php echo e($course->progress); ?>%; height: 100%; background: var(--primary); border-radius: 5px;"></div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem; padding-top: 2rem; border-top: 1px solid #F0F3F8;">
            <div>
                <h4 style="margin-bottom: 1rem;">Learning Contract</h4>
                <div style="background: #F9FAFB; padding: 1rem; border-radius: 12px; font-size: 0.95rem; line-height: 1.6;">
                    <?php echo e($course->learning_contract ?? 'No contract defined yet.'); ?>

                </div>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem;">Achievements / Updates</h4>
                <div style="background: #F9FAFB; padding: 1rem; border-radius: 12px; font-size: 0.95rem; line-height: 1.6;">
                    <?php echo e($course->achievements ?? 'No updates yet.'); ?>

                </div>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; padding-top: 1.5rem; border-top: 1px solid #F0F3F8;">
            <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="btn btn-primary" style="flex: 1; text-align: center;">Update Progress</a>
            <form action="<?php echo e(route('courses.destroy', $course->id)); ?>" method="POST" style="flex: 1;" onsubmit="return confirm('Delete this course?');">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn" style="width: 100%; background: #FFE2E5; color: #F95959;">Delete Course</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/courses/show.blade.php ENDPATH**/ ?>