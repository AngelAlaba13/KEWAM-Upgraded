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
    background: radial-gradient(circle, rgba(255,0,0,0.9), rgba(255,0,0,0));
    animation: twinkle 2s infinite ease-in-out;
    opacity: 0.6;
    filter: blur(90px);
  
  }
  
  .orb:nth-child(2) {
    width: 220px;
    height: 220px;
    bottom: 60%;
    right: 30%;
    animation-duration: 3s;
  }

    .orb:nth-child(3) {
    width: 350px;
    height: 350px;
    bottom: 40%;
    right: 85%;
    animation-duration: 3s;
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
   <div
        class="absolute w-[80px] h-[80px] 
        bg-[rgb(255,28,28)] 
        rounded-full blur-[50px] z-[1] animate-pulse
        top-[77%] left-[88%] translate-x-[-50%] translate-y-[-50%]">
    </div>

<div x-data="starField()" class="relative w-full min-h-screen flex items-center justify-center">
  <div class="absolute inset-0 z-0">
    <canvas id="stars" class="w-full h-full"></canvas>
  </div>
  
  <div class="orb"></div>
  <div class="orb"></div>
  
  <div class= "flex w-[50%] ">
    <div class=" z-50 flex justify-start text-start font-bold text-white text-7xl  ">
                KEWAM Computer and Services Shop
            </div>
  </div>
    <div
      class=" z-10 max-w-md w-[50%] bg-white bg-opacity-10 border border-[rgba(255,255,255,0.59)] backdrop-blur-md rounded-2xl shadow-xl p-10 text-white animate-fadeIn">

      <h2 class="text-4xl font-extrabold mb-8 text-center tracking-wide drop-shadow-md">Login</h2>

      <form method="POST" action="{{ route('section.login') }}" class="space-y-9">
        @csrf

        @if ($errors->any())
        <div
          x-data="{ showError: true }"
          x-show="showError"
          x-init="setTimeout(() => showError = false, 3000)"
          x-transition:leave="transition ease-in duration-500"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="fixed top-[57px] right-2 z-50 bg-red-700 text-white px-4 py-2 rounded shadow-lg"
        >
          <ul class="list-disc pl-4">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div>
          <label for="email" class="text-white text-md">Email Address</label>
          <input id="email" type="email" name="email" required autofocus placeholder="Email address"
            class="w-full bg-[#ffffff1b] border-b-2 border-red-600 py-2 px-2 text-white placeholder-transparent
                   focus:outline-none focus:border-red-400 rounded-lg focus:ring-1 focus:ring-red-400 transition" />
        </div>

        <div>
          <label for="password" class="text-white text-md">Password</label>
          <input id="password" type="password" name="password" required placeholder="Password"
            class=" w-full bg-[#ffffff1b] border-b-2 border-red-600 py-2 px-2 text-white placeholder-transparent
                   focus:outline-none focus:border-red-400 focus:ring-1 rounded-lg focus:ring-red-400 transition" />
        </div>

        <div class="flex justify-center gap-3">
          <button type="button" onclick="window.location.href='{{ route('section.registration') }}'"
            class="bg-transparent border border-red-400 text-white px-6 py-2 rounded hover:bg-red-600 hover:text-white transition-all duration-300">
            Register
          </button>

          <button type="submit"
            class="flex justify-center w-24 relative items-center py-2 px-6 bg-gradient-to-r from-red-600 to-red-800
                   rounded-md font-semibold text-white tracking-wide overflow-hidden group">
            <span class="relative z-10">Log In</span>
            <span
              class="absolute inset-0 bg-red-900 opacity-30 rounded-xl blur-lg scale-110 group-hover:scale-100 group-hover:opacity-60 transition-all"></span>
          </button>
        </div>
      </form>
    </div>
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


