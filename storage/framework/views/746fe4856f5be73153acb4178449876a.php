

<?php $__env->startSection('content'); ?>
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Schedule New Exam</h1>
        <a href="<?php echo e(route('exams.index')); ?>" class="btn" style="background: #E2E8F0; color: var(--text);">Back to List</a>
    </div>

    <div class="card">
        <form action="<?php echo e(route('exams.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course</label>
                <select name="course_id" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Date & Time</label>
                    <input type="datetime-local" name="date" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Type</label>
                    <select name="type" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                        <option value="UTS">UTS (Midterm)</option>
                        <option value="UAS">UAS (Final)</option>
                        <option value="Quiz">Quiz</option>
                        <option value="Presentation">Presentation</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Topics / Materials</label>
                <textarea name="topics" rows="4" placeholder="e.g. Chapter 1-5, Sorting Algorithms..." style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Schedule Exam</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/exams/create.blade.php ENDPATH**/ ?>