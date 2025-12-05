

<?php $__env->startSection('content'); ?>
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Add New Grade</h1>
        <a href="<?php echo e(route('transcripts.index')); ?>" class="btn" style="background: #E2E8F0; color: var(--text);">Back to Transcript</a>
    </div>

    <div class="card">
        <form action="<?php echo e(route('transcripts.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course Code</label>
                    <input type="text" name="code" placeholder="e.g. MBKP-07..." required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Course Name</label>
                    <input type="text" name="course_name" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">SKS</label>
                    <input type="number" name="sks" min="1" required style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Grade</label>
                    <select name="grade" style="width: 100%; padding: 0.8rem; border: 1px solid #E2E8F0; border-radius: 8px; font-family: inherit; background: white;">
                        <option value="">- Select Grade -</option>
                        <option value="A">A (4.00)</option>
                        <option value="B">B (3.00)</option>
                        <option value="C">C (2.00)</option>
                        <option value="D">D (1.00)</option>
                        <option value="E">E (0.00)</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Add Grade</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/transcripts/create.blade.php ENDPATH**/ ?>