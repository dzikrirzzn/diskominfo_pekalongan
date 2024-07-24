<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Correct Dropdown Structure</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
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

    .dropdown-animation {
        animation: fadeIn 0.3s ease-out;
    }
    </style>
</head>

<body>
    <nav x-data="{ scrolled: false, showNav: true, lastScrollY: 0, timeout: null, isOpen: false }" x-init="window.addEventListener('scroll', () => {
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
             }, 300);
         })" :class="{'transform -translate-y-full': !showNav, 'transform translate-y-0': showNav}"
        class="fixed w-full z-50 py-2 transition-transform duration-500 ease-in-out border-b-2 border-white h-24 bg-yellow-500">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <a href="{{ route('home') }}">
                <div class="text-black font-bold flex items-center mt-4 ms-7">
                    <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-12 mr-3">
                    <div class="flex flex-col">
                        <div class="text-l">PEMERINTAH</div>
                        <div class="text-xl">KOTA PEKALONGAN</div>
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
            <div :class="{'hidden': !isOpen, 'block': isOpen}"
                class="w-full lg:flex lg:items-center lg:w-auto mt-3 mr-5">
                <ul class="lg:flex space-y-2 lg:space-y-0 lg:space-x-4">
                    @foreach($navItems as $item)
                    @if($item->is_dropdown && $item->children->isNotEmpty())
                    <li class="relative" x-data="{ dropdownOpen: false }">
                        <a href="#" class="block text-black hover:text-gray-200 text-xl"
                            @click.prevent="dropdownOpen = !dropdownOpen">{{ $item->title }}</a>
                        <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="absolute left-0 mt-2 w-48 bg-white border rounded-lg shadow-lg dropdown-animation">
                            <ul>
                                @foreach($item->children as $child)
                                <li><a href="{{ $child->url }}"
                                        class="block px-4 py-2 text-black hover:bg-gray-200 rounded-lg transition-colors duration-300">{{ $child->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @else
                    <li><a href="{{ $item->url }}"
                            class="block text-black hover:text-gray-200 text-base">{{ $item->title }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>