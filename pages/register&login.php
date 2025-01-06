<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <style>
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <script>
    function toggleForm() {
      const formContainer = document.getElementById('form-container');
      const imageContainer = document.getElementById('image-container');
      const isRegistration = formContainer.dataset.form === 'registration';

      // Add animation
      formContainer.classList.add('fade-in');
      imageContainer.classList.add('fade-in');

      // Toggle form content
      formContainer.innerHTML = isRegistration
        ? `
        <form action="login.php" method="POST" class="lg:max-w-md w-full">
          <h3 class="text-gray-800 text-3xl font-extrabold mb-12">Login</h3>
          <div class="space-y-6">
            <div>
              <label for="email" class="text-gray-800 text-sm mb-2 block">Email</label>
              <input id="email" name="email" type="email" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
            </div>
            <div>
              <label for="password" class="text-gray-800 text-sm mb-2 block">Password</label>
              <input id="password" name="password" type="password" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
            </div>
          </div>
          <div class="mt-12">
            <button type="submit" class="py-4 px-8 text-sm font-semibold text-white tracking-wide bg-blue-600 hover:bg-blue-700 focus:outline-none">
              Login
            </button>
          </div>
          <p class="text-sm text-gray-800 mt-6">Don't have an account
          <p class="text-sm text-gray-800 mt-6">Don't have an account? <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1" onclick="toggleForm()">Register here</a></p>
        </form>
      `
        : `
        <form action="register.php" method="POST" class="lg:max-w-md w-full">
          <h3 class="text-gray-800 text-3xl font-extrabold mb-12">Registration</h3>
          <div class="space-y-6">
            <div>
              <label for="name" class="text-gray-800 text-sm mb-2 block">Name</label>
              <input id="name" name="name" type="text" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter name" />
            </div>
            <div>
              <label for="email" class="text-gray-800 text-sm mb-2 block">Email</label>
              <input id="email" name="email" type="email" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
            </div>
            <div>
              <label for="password" class="text-gray-800 text-sm mb-2 block">Password</label>
              <input id="password" name="password" type="password" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
            </div>
          </div>
          <div class="mt-12">
            <button type="submit" class="py-4 px-8 text-sm font-semibold text-white tracking-wide bg-blue-600 hover:bg-blue-700 focus:outline-none">
              Create an account
            </button>
          </div>
          <p class="text-sm text-gray-800 mt-6">Already have an account? <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1" onclick="toggleForm()">Login here</a></p>
        </form>
      `;

      // Update the form state
      formContainer.dataset.form = isRegistration ? 'login' : 'registration';

      // Reorder the form and image for each state
      if (isRegistration) {
        formContainer.parentElement.insertBefore(imageContainer, formContainer);
      } else {
        formContainer.parentElement.appendChild(imageContainer);
      }

      // Remove animation class after completion
      setTimeout(() => {
        formContainer.classList.remove('fade-in');
        imageContainer.classList.remove('fade-in');
      }, 500);
    }
  </script>
</head>
<body>
<div class="font-[sans-serif]">
  <div class="min-h-screen flex fle-col items-center justify-center p-6">
    <div class="grid lg:grid-cols-2 items-center gap-6 max-w-7xl max-lg:max-w-xl w-full">
      <div id="form-container" data-form="registration" class="lg:max-w-md w-full">
        <form action="register.php" method="POST">
          <h3 class="text-gray-800 text-3xl font-extrabold mb-12">Registration</h3>
          <div class="space-y-6">
            <div>
              <label for="name" class="text-gray-800 text-sm mb-2 block">Name</label>
              <input id="name" name="name" type="text" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter name" />
            </div>
            <div>
              <label for="email" class="text-gray-800 text-sm mb-2 block">Email</label>
              <input id="email" name="email" type="email" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter email" />
            </div>
            <div>
              <label for="password" class="text-gray-800 text-sm mb-2 block">Password</label>
              <input id="password" name="password" type="password" required class="bg-gray-100 w-full text-gray-800 text-sm px-4 py-4 focus:bg-transparent outline-blue-500 transition-all" placeholder="Enter password" />
            </div>
          </div>
          <div class="mt-12">
            <button type="submit" class="py-4 px-8 text-sm font-semibold text-white tracking-wide bg-blue-600 hover:bg-blue-700 focus:outline-none">
              Create an account
            </button>
          </div>
          <p class="text-sm text-gray-800 mt-6">Already have an account? <a href="javascript:void(0);" class="text-blue-600 font-semibold hover:underline ml-1" onclick="toggleForm()">Login here</a></p>
        </form>
      </div>
      <div id="image-container" class="h-full max-lg:mt-12">
        <img src="https://readymadeui.com/login-image.webp" class="w-full h-full object-cover" alt="Dining Experience" />
      </div>
    </div>
  </div>
</div>
</body>
</html>
