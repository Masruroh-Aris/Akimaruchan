

<?php $__env->startSection('content'); ?>
<div style="max-width: 1200px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <h1 style="font-size: 1.8rem;">Academic Transcript</h1>
        <a href="<?php echo e(route('transcripts.create')); ?>" class="btn btn-primary">+ Add Grade</a>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
        <!-- GPA Summary Card -->
        <div class="card" style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white;">
            <h3 style="margin-bottom: 0.5rem; font-size: 1.1rem; opacity: 0.9;">Cumulative GPA (IPK)</h3>
            <div style="font-size: 3.5rem; font-weight: 800; margin-bottom: 0.5rem;"><?php echo e(number_format($ipk, 4)); ?></div>
            <p style="opacity: 0.9;">Total SKS: <?php echo e($totalSKS); ?></p>
        </div>

        <!-- Path to 4.00 Analysis Card -->
        <div class="card">
            <h3 style="margin-bottom: 1rem; font-size: 1.1rem; color: var(--text-muted);">Path to Perfect 4.00</h3>
            <?php if($improvableCourses->count() > 0): ?>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <div style="width: 50px; height: 50px; background: #FFF4DE; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        🚀
                    </div>
                    <div>
                        <p style="font-weight: 600; font-size: 1.1rem;"><?php echo e($improvableCourses->count()); ?> Courses to Improve</p>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">Retake <?php echo e($sksToRetake); ?> SKS to reach 4.00</p>
                    </div>
                </div>
                <div style="background: #F9FAFB; padding: 1rem; border-radius: 8px; max-height: 100px; overflow-y: auto;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.5rem;">Recommended for retake:</p>
                    <ul style="margin: 0; padding-left: 1.2rem; font-size: 0.85rem;">
                        <?php $__currentLoopData = $improvableCourses->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($course->course_name); ?> (<?php echo e($course->grade); ?>)</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($improvableCourses->count() > 3): ?>
                            <li>...and <?php echo e($improvableCourses->count() - 3); ?> more</li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 1rem;">
                    <span style="font-size: 2rem;">🏆</span>
                    <p style="font-weight: 600; margin-top: 0.5rem;">Perfect Score!</p>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">You have a 4.00 GPA. Keep it up!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="card" style="padding: 0; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #F9FAFB; text-align: left;">
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">No</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Code</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Course Name</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">SKS</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Grade</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Mutu</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-muted);">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transcripts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transcript): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="border-bottom: 1px solid #F0F3F8;">
                    <td style="padding: 1rem; color: var(--text-muted);"><?php echo e($index + 1); ?></td>
                    <td style="padding: 1rem; font-family: monospace; font-size: 0.9rem;"><?php echo e($transcript->code); ?></td>
                    <td style="padding: 1rem; font-weight: 500;"><?php echo e($transcript->course_name); ?></td>
                    <td style="padding: 1rem;"><?php echo e($transcript->sks); ?></td>
                    <td style="padding: 1rem;">
                        <?php if($transcript->grade): ?>
                            <span class="badge" style="background: <?php echo e($transcript->grade == 'A' ? '#DEF7EC' : ($transcript->grade == 'B' ? '#E1EFFE' : '#FFF4DE')); ?>; color: <?php echo e($transcript->grade == 'A' ? '#03543F' : ($transcript->grade == 'B' ? '#1E429F' : '#92400E')); ?>;">
                                <?php echo e($transcript->grade); ?>

                            </span>
                        <?php else: ?>
                            <span style="color: var(--text-muted);">-</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding: 1rem; font-weight: 600;"><?php echo e(number_format($transcript->quality_points, 2)); ?></td>
                    <td style="padding: 1rem;">
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="<?php echo e(route('transcripts.edit', $transcript->id)); ?>" class="btn" style="padding: 0.4rem 0.8rem; background: #DBEAFE; color: #2563EB; font-size: 0.8rem;">Edit</a>
                            <form action="<?php echo e(route('transcripts.destroy', $transcript->id)); ?>" method="POST" onsubmit="return confirm('Delete this grade?');" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn" style="padding: 0.4rem 0.8rem; background: #FFE2E5; color: #F95959; font-size: 0.8rem;">Del</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/transcripts/index.blade.php ENDPATH**/ ?>