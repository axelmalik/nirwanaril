<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Nirwana</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');
    </style>
  </head>
  <body class="m-0 p-0 font-montserrat bg-cover bg-no-repeat bg-center flex" style="background-image: url(img/background.png)">
    <div class="absolute left-[82%] transform -translate-x-1/2 translate-y-1/2 w-[400px]">
      <img src="img/logo-nirwana.png" class="logo" />
      <form action="auth/proses_login.php" method="post">
        <div class="divide-y divide-gray-200">
          <div class="py-1 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="relative">
              <input
                autocomplete="off"
                id="nama_admin"
                name="nama_admin"
                type="text"
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-green-600"
                placeholder="Nama"
              />
              <label
                for="nama_admin"
                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                >Nama</label
              >
            </div>
            <div class="relative">
              <input
                autocomplete="off"
                id="password"
                name="password"
                type="password"
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-green-600"
                placeholder="Password"
              />
              <label
                for="password"
                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm"
                >Password</label
              >
            </div>
            <div class="relative">
              <button type="submit" class="block w-full bg-green-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
