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
             }, 300);
         })" :class="{'bg-yellow-500': scrolled, 'bg-transparent': !scrolled, 'transform -translate-y-full': !showNav, 'transform translate-y-0': showNav}" class="fixed w-full z-50 py-2 transition-transform duration-500 ease-in-out">
        <div class="container mx-auto flex justify-between items-center flex-wrap">
            <a href="{{ route('home') }}">
                <div class="text-black font-bold flex items-center mt-1 ms-12">
                    <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-10 mr-2">
                    <div class="flex flex-col">
                        <div class="text-xs">Pemerintah</div>
                        <div class="text-xs">Kota Pekalongan</div>
                    </div>
                </div>
            </a>

            <div class="hidden sm:flex sm:items-center">
                @foreach($navItems as $item)
                @if($item->parent_id === null)
                @if($item->children->isEmpty())
                <a href="{{ $item->url }}"
                    class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">{{ $item->title }}</a>
                @else
                <div class="relative" @mouseenter="activeDropdown = {{ $item->id }}"
                    @mouseleave="activeDropdown = null">
                    <button
                        class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 inline-flex items-center">
                        {{ $item->title }}
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="activeDropdown === {{ $item->id }}"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute z-10 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="menu" aria-orientation="vertical">
                            @foreach($item->children as $child)
                            <a href="{{ $child->url }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">{{ $child->title }}</a>
                            @endforeach
                        </div>
                    </li>
                    @else
                    <li><a href="{{ $item->url }}" class="block text-black hover:text-gray-200 text-sm">{{ $item->title }}</a></li>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
</nav>

<script>
let prevScrollpos = window.pageYOffset;
const navbar = document.getElementById("navbar");
let scrollTimeout;

function debounce(func, wait) {
    return function() {
        const context = this;
        const args = arguments;
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => func.apply(context, args), wait);
    };
}

function handleScroll() {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        navbar.style.top = "0";
    } else {
        navbar.style.top = "-64px"; // Adjust this value to match your navbar's height
    }
    prevScrollpos = currentScrollPos;
}

function showNavbar() {
    navbar.style.top = "0";
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('scroll', debounce(showNavbar, 500)); // Navbar will reappear 0.5 seconds after scrolling stops
</script>