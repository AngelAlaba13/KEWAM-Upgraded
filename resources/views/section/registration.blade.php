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
    filter: blur(60px);
  
  }
  
  .orb:nth-child(2) {
    width: 250px;
    height: 250px;
    bottom: 5%;
    right: 23%;
    animation-duration: 3s;
  }

    .orb:nth-child(3) {
    width: 350px;
    height: 350px;
    bottom: 50%;
    right: 60%;
    animation-duration: 3s;
  }

    .orb:nth-child(4) {
        width: 400px;
        height: 400px;
        top: 20%;
        left: 70%;
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

<div x-data="starField()" class="relative w-full min-h-screen flex items-center justify-center">
  <!-- Starfield Canvas -->
  <div class="absolute inset-0 z-0">
    <canvas id="stars" class="w-full h-full"></canvas>
  </div>

  <!-- Glowing orbs -->
  <div class="orb"></div>
  <div class="orb"></div>

  <!-- Form Section -->
  <div class="relative z-10 w-[50%]">
    <div class="flex flex-col items-center justify-center border bg-white/10 border-white/30 backdrop-blur-xl m-28 mt-[80px] mb-10 p-12 pt-10 pb-10 rounded-[35px] shadow-2xl">
      <p class="text-[rgb(255,255,255)] text-4xl font-bold ">REGISTER NOW</p>

      <form action="{{ route('section.registration') }}" method="POST" class="w-full pt-10">
        @csrf
        @if ($errors->any())
        <div
          x-data="{ showError: true }"
          x-show="showError"
          x-init="setTimeout(() => showError = false, 3000)"
          x-transition:leave="transition ease-in duration-500"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="fixed top-6 right-6 z-50 bg-red-700 text-white px-4 py-2 rounded shadow-lg"
        >
          <ul class="list-disc pl-4">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="mb-4">
          <label for="email" class="block text-white font-semibold">Email</label>
          <input type="email" name="email" id="email" required class="w-full h-10 p-2 border border-red-400 bg-black bg-opacity-40 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div class="flex flex-row gap-3 justify-between">
          <div class="mb-4 w-[60%]">
            <label for="name" class="block text-white font-semibold">Name</label>
            <input type="text" name="name" id="name" required autofocus class="w-full h-10 p-2 border border-red-400 bg-black bg-opacity-40 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
          </div>

          <div class="mb-4 w-[40%]">
            <label for="role" class="block text-white font-semibold">Role</label>
            <input type="text" name="role" id="role" required class="w-full h-10 p-2 border border-red-400 bg-black bg-opacity-40 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
          </div>
        </div>

        <div class="mb-4">
          <label for="password" class="block text-white font-semibold">Password</label>
          <input type="password" name="password" id="password" required class="w-full h-10 p-2 border border-red-400 bg-black bg-opacity-40 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div class="mb-4">
          <label for="conPassword" class="block text-white font-semibold">Confirm Password</label>
          <input type="password" name="password_confirmation" id="conPassword" required class="w-full h-10 p-2 border border-red-400 bg-black bg-opacity-40 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
        </div>

        <div class="flex justify-end gap-4 pt-10">
          <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded shadow-md hover:bg-red-600 transition-all duration-300">Register</button>
          <button type="button" onclick="window.location.href='{{ route('section.login') }}'" class="bg-transparent border border-red-400 text-white px-6 py-2 rounded hover:bg-red-600 hover:text-white transition-all duration-300">Cancel</button>
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