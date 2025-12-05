<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Akimaruchan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg: #F3F4F6;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .login-card {
            background: white;
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            z-index: 10;
        }
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .mascot {
            font-size: 4rem;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
            display: inline-block;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .input-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4B5563;
        }
        input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
            box-sizing: border-box;
        }
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }
        .btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .btn:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }
        .btn:active {
            transform: translateY(0);
        }
        .error-msg {
            color: #EF4444;
            background: #FEF2F2;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        /* Cute Background Elements */
        .bg-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            z-index: 1;
            opacity: 0.6;
        }
        .blob-1 {
            width: 300px;
            height: 300px;
            background: #C7D2FE;
            top: -100px;
            left: -100px;
            animation: move 10s infinite alternate;
        }
        .blob-2 {
            width: 250px;
            height: 250px;
            background: #FDE68A;
            bottom: -50px;
            right: -50px;
            animation: move 8s infinite alternate-reverse;
        }
        @keyframes move {
            from { transform: translate(0, 0); }
            to { transform: translate(20px, 20px); }
        }

        /* Click Animation Class */
        .clicked {
            animation: pop 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        @keyframes pop {
            0% { transform: scale(1); }
            50% { transform: scale(0.95); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="bg-blob blob-1"></div>
    <div class="bg-blob blob-2"></div>

    <div class="login-card">
        <div class="mascot" id="mascot">🐱</div>
        <div class="logo">
            <span></span> Akimaruchan
        </div>
        <p style="color: #6B7280; margin-bottom: 2rem;">Please enter your NIM to continue</p>

        <?php if(session('error')): ?>
            <div class="error-msg">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login.post')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="input-group">
                <label>NIM</label>
                <input type="text" name="nim" placeholder="2023..." required autocomplete="off">
            </div>
            <button type="submit" class="btn" id="loginBtn">Login 🚀</button>
        </form>
    </div>

    <script>
        const btn = document.getElementById('loginBtn');
        const mascot = document.getElementById('mascot');
        const mascots = ['🐱', '🐼', '🐰', '🦊', '🐨'];

        btn.addEventListener('click', function() {
            // Add pop animation
            this.classList.add('clicked');
            setTimeout(() => this.classList.remove('clicked'), 300);

            // Change mascot randomly for fun
            const randomMascot = mascots[Math.floor(Math.random() * mascots.length)];
            mascot.innerText = randomMascot;
            mascot.style.animation = 'none';
            mascot.offsetHeight; /* trigger reflow */
            mascot.style.animation = 'float 0.5s ease-in-out infinite';
        });
    </script>
</body>
</html>
<?php /**PATH E:\MY PROJECT\akimaruchan\resources\views/auth/login.blade.php ENDPATH**/ ?>