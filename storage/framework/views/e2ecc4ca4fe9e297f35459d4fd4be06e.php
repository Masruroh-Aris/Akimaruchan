<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akimaruchan - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C5DD3;
            --secondary: #FF754C;
            --bg: #F0F3F8;
            --text: #11142D;
            --text-muted: #808191;
            --white: #FFFFFF;
            --sidebar-width: 250px;
            --right-sidebar-width: 300px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--white);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            border-right: 1px solid #E4E4E4;
            z-index: 10;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo span {
            color: var(--primary);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem 1rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-item:hover, .nav-item.active {
            background: var(--primary);
            color: var(--white);
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            margin-right: var(--right-sidebar-width);
            padding: 2rem;
        }

        /* Right Sidebar */
        .right-sidebar {
            width: var(--right-sidebar-width);
            background: var(--white);
            padding: 2rem;
            position: fixed;
            height: 100vh;
            right: 0;
            top: 0;
            border-left: 1px solid #E4E4E4;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            transition: transform 0.3s ease;
            z-index: 9;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .right-sidebar {
                transform: translateX(100%); /* Push aside */
            }
            .main-content {
                margin-right: 0; /* Expand main content */
            }
        }

        /* Utilities */
        .card {
            background: var(--white);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .badge {
            padding: 0.3rem 0.8rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-high { background: #FFE2E5; color: #F95959; }
        .badge-medium { background: #FFF4DE; color: #FFAF4E; }
        .badge-low { background: #DCFCE7; color: #22C55E; }
        
        .badge-todo { background: #E2E8F0; color: #475569; }
        .badge-progress { background: #DBEAFE; color: #2563EB; }
        .badge-submitted { background: #DCFCE7; color: #16A34A; }

    </style>
</head>
<body>
    
    <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2880b66d47486b4bfeaf519598a469d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>

    <main class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php if (isset($component)) { $__componentOriginal9a9942538d738d045237b705335695e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a9942538d738d045237b705335695e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.right-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('right-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a9942538d738d045237b705335695e1)): ?>
<?php $attributes = $__attributesOriginal9a9942538d738d045237b705335695e1; ?>
<?php unset($__attributesOriginal9a9942538d738d045237b705335695e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a9942538d738d045237b705335695e1)): ?>
<?php $component = $__componentOriginal9a9942538d738d045237b705335695e1; ?>
<?php unset($__componentOriginal9a9942538d738d045237b705335695e1); ?>
<?php endif; ?>

    <!-- Toggle Button for Mobile/Tablet -->
    <button id="sidebar-toggle" style="
        position: fixed; 
        bottom: 2rem; 
        right: 2rem; 
        width: 50px; 
        height: 50px; 
        border-radius: 50%; 
        background: var(--primary); 
        color: white; 
        border: none; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.2); 
        cursor: pointer; 
        z-index: 100;
        display: none; /* Hidden by default */
        align-items: center; 
        justify-content: center;
        font-size: 1.5rem;
    ">
        📅
    </button>

    <script>
        const toggleBtn = document.getElementById('sidebar-toggle');
        const rightSidebar = document.querySelector('.right-sidebar');
        
        // Show button only on smaller screens
        function checkScreenSize() {
            if (window.innerWidth <= 1200) {
                toggleBtn.style.display = 'flex';
            } else {
                toggleBtn.style.display = 'none';
                rightSidebar.style.transform = 'translateX(0)'; // Reset
            }
        }
        
        window.addEventListener('resize', checkScreenSize);
        checkScreenSize(); // Initial check

        // Toggle Logic
        let isSidebarVisible = false;
        toggleBtn.addEventListener('click', () => {
            isSidebarVisible = !isSidebarVisible;
            if (isSidebarVisible) {
                rightSidebar.style.transform = 'translateX(0)';
                rightSidebar.style.boxShadow = '-5px 0 20px rgba(0,0,0,0.1)';
            } else {
                rightSidebar.style.transform = 'translateX(100%)';
                rightSidebar.style.boxShadow = 'none';
            }
        });
    </script>

</body>
</html>
<?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/layouts/app.blade.php ENDPATH**/ ?>