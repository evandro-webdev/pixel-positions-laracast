<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pixel Positions</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
  @vite(['resources/js/app.js'])
</head>
<body class="bg-black text-white font-hanken-grotesk pb-8">

  <div class="px-10">
    <div class="border-b border-white/10">
      <nav class="flex justify-between items-center py-4  max-w-[986px] mx-auto">
        <div>
          <a href="/"><img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo image"></a>
        </div>
  
        <div class="space-x-6 font-bold">
          <a href="">Jobs</a>
          <a href="">Careers</a>
          <a href="">Salaries</a>
          <a href="">Companies</a>
        </div>
  
        @auth
          <div class="space-x-6 font-bold flex items-center">
            <a href="/jobs/create">Post a Job</a>
            
            <div class="relative group" id="dropdown-container">
              <x-forms.button>{{ Auth::user()->name }}</x-forms.button>
              <div class="absolute right-0 mt-2 w-48 bg-white/5 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100
                          group-hover:visible transition-all duration-300 transform -translate-y-1 group-hover:translate-y-0">
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-white hover:bg-white/10">Perfil</a>
                    <a href="/jobs/dashboard" class="block px-4 py-2 text-white hover:bg-white/10">Dashboard</a>
                    <x-forms.form method="POST" rest-method="DELETE" action="/logout">
                      <button class="w-full px-4 py-2 text-white text-left cursor-pointer hover:bg-white/10">Logout</button>
                    </x-forms.form>
                </div>
              </div>
            </div>
          </div>
        @endauth

        @guest
          <div class="space-x-6 font-bold">
            <a href="/register">Sign up</a>
            <a href="/login">Log in</a>
          </div>
        @endguest
      </nav>
    </div>

    <main class="mt-10 max-w-[986px] mx-auto">
      {{ $slot }}
    </main>
  </div>

</body>
</html>