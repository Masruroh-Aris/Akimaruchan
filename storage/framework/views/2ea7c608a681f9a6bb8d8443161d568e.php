<div class="right-sidebar">
    <!-- Profile Section (Always Visible) -->
    <div class="profile-section" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
        <div style="width: 50px; height: 50px; background: #ddd; border-radius: 50%; overflow: hidden;">
            <img src="https://api.dicebear.com/9.x/avataaars/svg?seed=Masruroh&top=hijab&hatColor=000000&backgroundColor=ffdfbf" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="flex: 1;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <h4 style="margin-bottom: 0.2rem;"><?php echo e($student->name ?? 'Student'); ?></h4>
                <a href="<?php echo e(route('profile.edit')); ?>" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;" title="Edit Profile">✏️</a>
            </div>
            <p style="font-size: 0.8rem; color: var(--text-muted);">
                NIM: <?php echo e($student->nim ?? '-'); ?> • Sem <?php echo e($student->semester ?? '-'); ?>

                <br>
                TA: <?php echo e($student->academic_year ?? '-'); ?>

            </p>
        </div>
    </div>

    <!-- Collapsible Calendar -->
    <div class="accordion-item" style="margin-bottom: 1rem;">
        <div class="accordion-header" onclick="toggleAccordion('calendar-content')" style="cursor: pointer; display: flex; align-items: center; justify-content: space-between; padding: 0.8rem; background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin: 0; font-size: 1rem;">Calendar 📅</h3>
            <span id="calendar-icon" style="transition: transform 0.3s;">▼</span>
        </div>
        <div id="calendar-content" style="display: none; margin-top: 1rem; animation: slideDown 0.3s ease-out;">
            <div class="card" style="padding: 1rem; text-align: center;">
                <p style="font-weight: 700; font-size: 1.2rem; margin-bottom: 1rem;"><?php echo e($calendar['month']); ?></p>
                <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 0.5rem; font-size: 0.8rem;">
                    <span style="color: var(--text-muted); font-weight: 600;">S</span>
                    <span style="color: var(--text-muted); font-weight: 600;">M</span>
                    <span style="color: var(--text-muted); font-weight: 600;">T</span>
                    <span style="color: var(--text-muted); font-weight: 600;">W</span>
                    <span style="color: var(--text-muted); font-weight: 600;">T</span>
                    <span style="color: var(--text-muted); font-weight: 600;">F</span>
                    <span style="color: var(--text-muted); font-weight: 600;">S</span>
                    
                    <?php for($i = 0; $i < $calendar['startDayOfWeek']; $i++): ?>
                        <span></span>
                    <?php endfor; ?>

                    <?php for($day = 1; $day <= $calendar['daysInMonth']; $day++): ?>
                        <div style="
                            padding: 5px; 
                            border-radius: 50%; 
                            cursor: pointer; 
                            transition: all 0.2s;
                            <?php echo e($day == $calendar['today'] ? 'background: var(--primary); color: white; font-weight: bold;' : ''); ?>

                        "
                        onmouseover="this.style.backgroundColor = '<?php echo e($day == $calendar['today'] ? 'var(--primary)' : '#F3F4F6'); ?>'"
                        onmouseout="this.style.backgroundColor = '<?php echo e($day == $calendar['today'] ? 'var(--primary)' : 'transparent'); ?>'"
                        >
                            <?php echo e($day); ?>

                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Collapsible Reminders -->
    <div class="accordion-item">
        <div class="accordion-header" onclick="toggleAccordion('reminders-content')" style="cursor: pointer; display: flex; align-items: center; justify-content: space-between; padding: 0.8rem; background: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin: 0; font-size: 1rem;">Reminders 🔔</h3>
            <span id="reminders-icon" style="transition: transform 0.3s;">▼</span>
        </div>
        <div id="reminders-content" style="display: none; margin-top: 1rem; animation: slideDown 0.3s ease-out;">
            <?php if(isset($upcomingExams) && $upcomingExams->count() > 0): ?>
                <div style="margin-bottom: 1rem;">
                    <h4 style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px;">Upcoming Exams</h4>
                    <?php $__currentLoopData = $upcomingExams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card" style="padding: 1rem; display: flex; align-items: center; gap: 1rem; margin-bottom: 0.8rem; border-left: 4px solid #FFB020;">
                        <div style="width: 40px; height: 40px; background: #FFF4DE; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #FFB020;">
                            📅
                        </div>
                        <div>
                            <h5 style="margin-bottom: 0.2rem;"><?php echo e($exam->course->name); ?></h5>
                            <p style="font-size: 0.8rem; color: var(--text-muted);"><?php echo e($exam->type); ?> • <?php echo e(\Carbon\Carbon::parse($exam->date)->format('d M, H:i')); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if(isset($upcomingTasks) && $upcomingTasks->count() > 0): ?>
                <div>
                    <h4 style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px;">Priority Tasks</h4>
                    <?php $__currentLoopData = $upcomingTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card" style="padding: 1rem; display: flex; align-items: center; gap: 1rem; margin-bottom: 0.8rem; border-left: 4px solid #F95959;">
                        <div style="width: 40px; height: 40px; background: #FFE2E5; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #F95959;">
                            ⚡
                        </div>
                        <div>
                            <h5 style="margin-bottom: 0.2rem;"><?php echo e($task->name); ?></h5>
                            <p style="font-size: 0.8rem; color: var(--text-muted);"><?php echo e($task->course->name); ?> • <?php echo e(\Carbon\Carbon::parse($task->deadline)->format('d M')); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if((!isset($upcomingExams) || $upcomingExams->count() == 0) && (!isset($upcomingTasks) || $upcomingTasks->count() == 0)): ?>
                <p style="color: var(--text-muted); font-size: 0.9rem; text-align: center; padding: 1rem;">No upcoming exams or high priority tasks. Relax! ☕</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById(id.replace('content', 'icon'));
        
        if (content.style.display === 'none') {
            content.style.display = 'block';
            icon.style.transform = 'rotate(180deg)';
        } else {
            content.style.display = 'none';
            icon.style.transform = 'rotate(0deg)';
        }
    }
</script>
<?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/components/right-sidebar.blade.php ENDPATH**/ ?>