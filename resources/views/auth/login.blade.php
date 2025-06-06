<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        screens: {
          "4xl": { max: "1920px" },
          "3xl": { max: "1500px" },
          "2xl": { max: "1240px" },
          xl: { max: "1024px" },
          lg: { max: "992px" },
          md: { max: "767px" },
          sm: { max: "479px" },
          xsm: { max: "320px" },
        },
      },
    };
  </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>

    <form method="POST" action="{{ url('/login') }}">
      @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your email"
        />
      </div>

      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Password</label>
        <input
          type="password"
          name="password"
          id="password"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter your password"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300"
      >
        Login
      </button>
    </form>
  </div>

</body>
</html>
