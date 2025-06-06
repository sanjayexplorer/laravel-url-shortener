<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Accept Invitation</title>
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
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-semibold mb-6 text-center">
      Accept Invitation for <span class="text-blue-600">{{ $invitation->email }}</span>
    </h2>

    @if ($errors->any())
      <div class="mb-4 text-sm text-red-600">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('invitations.accept.submit', $invitation->token) }}">
      @csrf

      <div class="mb-4">
        <label for="name" class="block text-gray-700">Name</label>
        <input type="text" name="name" id="name" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-6">
        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
          class="w-full mt-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
        Register
      </button>
    </form>
  </div>
</body>
</html>
