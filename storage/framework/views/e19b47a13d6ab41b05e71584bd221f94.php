

<?php $__env->startSection('content'); ?>
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Create New Task</h1>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Dashboard</a>
    </div>

    <div class="card">
        <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Task Name</label>
                <input type="text" name="name" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course</label>
                    <select name="course_id" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Deadline</label>
                    <input type="datetime-local" name="deadline" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Priority</label>
                    <select name="priority" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Link (Optional)</label>
                    <input type="url" name="link" placeholder="https://..." style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Create Task</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/tasks/create.blade.php ENDPATH**/ ?>