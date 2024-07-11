<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Dropdown</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>

<body>
    <nav x-data="{ scrolled: false, showNav: true, lastScrollY: 0, timeout: null }" x-init="window.addEventListener('scroll', () => {
             clearTimeout(timeout);
             if (window.scrollY > lastScrollY) {
                 showNav = false;
             } else {
                 showNav = true;
             }
             lastScrollY = window.scrollY;
             scrolled = window.scrollY > 0;
             timeout = setTimeout(() => {
                 showNav = true;
             }, 300); // Adjust the timeout duration as needed
         })"
        :class="{'bg-yellow-500': scrolled, 'bg-transparent': !scrolled, 'transform -translate-y-full': !showNav, 'transform translate-y-0': showNav}"
        class="fixed w-full z-50 py-2 transition-transform duration-500 ease-in-out">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <a href="{{ route('home') }}">
                <div class="text-black font-bold flex items-center">
                    <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-10 mr-2">
                    <div class="flex flex-col">
                        <div class="text-xs">Pemerintah</div>
                        <div class="text-xs">Kota Pekalongan</div>
                    </div>
                </div>
            </a>
            <button @click="isOpen = !isOpen" class="block lg:hidden">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': isOpen, 'inline-flex': !isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !isOpen, 'inline-flex': isOpen }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div :class="{'hidden': !isOpen, 'block': isOpen}" class="w-full lg:flex lg:items-center lg:w-auto">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-4">
                    @foreach($navItems as $item)
                    @if($item->is_dropdown)

                    <li class="relative group">
                        <a href="#" class="block text-black hover:text-gray-200 text-sm">{{ $item->title }}</a>
                        <ul
                            class="absolute left-0 w-40 mt-2 bg-white border rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 hidden group-hover:block">
                            @foreach($item->children as $child)
                            <li><a href="{{ $child->url }}"
                                    class="block px-4 py-2 text-black hover:bg-gray-200">{{ $child->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ $item->url }}"
                            class="block text-black hover:text-gray-200 text-sm">{{ $item->title }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>