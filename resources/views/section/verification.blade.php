<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(ellipse at bottom, #2b0000, #000);
            overflow: hidden;
        }

        .orb {
            position: absolute;
            border-radius: 80%;
            background: radial-gradient(circle, rgba(255, 0, 0, 0.9), rgba(255, 0, 0, 0));
            animation: twinkle 2s infinite ease-in-out;
            opacity: 0.6;
            filter: blur(90px);
        }

        .orb:nth-child(2) {
            width: 250px;
            height: 250px;
            bottom: 55%;
            right: 25%;
            animation-duration: 3s;
        }

        .orb:nth-child(3) {
            width: 350px;
            height: 350px;
            bottom: 5%;
            right: 58%;
            animation-duration: 3s;
        }

        .orb:nth-child(4) {
            width: 200px;
            height: 200px;
            top: 85%;
            left: 80%;
            animation-duration: 4s;
        }
        

        @keyframes twinkle {
            0%, 100% {
                opacity: 0.6;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.1);
            }
        }
    </style>
</head>

<body>
    <div x-data="starField()" class="relative w-full min-h-screen flex items-center justify-center">

        <!-- Starfield Background -->
        <div class="absolute inset-0 z-0">
            <canvas id="stars" class="w-full h-full"></canvas>
        </div>

        <!-- Glowing Orbs -->
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>

        <!-- Glassmorphic Verification Box -->
        <div
            class="z-10 max-w-md w-full bg-white bg-opacity-10 border border-[rgba(255,255,255,0.59)] backdrop-blur-md rounded-2xl shadow-xl p-10 text-white animate-fadeIn text-center">

            <h2 class="text-3xl font-bold mb-4 drop-shadow-md">Verify Your Email</h2>
            <p class="text-md mb-4">Please check your inbox for a verification link.</p>
            <p class="text-sm mb-6 opacity-80">If you didn't receive an email, you can request a new one below.</p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full py-2 px-4 bg-gradient-to-r from-red-600 to-red-800 rounded-md font-semibold text-white tracking-wide shadow-lg hover:opacity-90 transition-all duration-300">
                    Resend Verification Email
                </button>
            </form>
        </div>
    </div>

    <script>
        function starField() {
            return {
                init() {
                    const canvas = document.getElementById('stars');
                    const ctx = canvas.getContext('2d');
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;

                    const stars = Array.from({ length: 150 }, () => ({
                        x: Math.random() * canvas.width,
                        y: Math.random() * canvas.height,
                        radius: Math.random() * 1.5 + 0.5,
                        speed: Math.random() * 0.5 + 0.1
                    }));

                    function drawStars() {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        ctx.fillStyle = 'rgba(255,255,255,0.8)';
                        for (let star of stars) {
                            ctx.beginPath();
                            ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
                            ctx.fill();
                            star.y += star.speed;
                            if (star.y > canvas.height) star.y = 0;
                        }
                        requestAnimationFrame(drawStars);
                    }
                    drawStars();
                }
            }
        }
    </script>
</body>

</html>
