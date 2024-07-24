{{-- resources/views/layouts/navbar.blade.php --}}
<style>
/* Navbar styles */
.group:hover .group-hover\:opacity-100 {
    pointer-events: auto;
}

.group .group-hover\:opacity-100 {
    pointer-events: none;
}

.navbar {
    height: 4rem;
    /* Adjust height based on your design */
}

.navbar-logo {
    max-height: 3rem;
    /* Ensure logo fits within the navbar */
}

.navbar-title {
    font-size: 1rem;
    /* Adjust title font size */
}

.navbar-title span {
    display: block;
    /* Make title responsive */
}

@media (max-width: 640px) {
    .navbar-logo {
        max-height: 2.5rem;
        /* Adjust logo size for mobile */
    }

    .navbar-title {
        font-size: 0.875rem;
        /* Adjust title font size for mobile */
    }
}
</style>

<nav id="navbar" x-data="{ open: false, activeDropdown: null }"
    class="fixed w-full bg-white shadow-md transition-all duration-300 ease-in-out z-50  navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('img/logopkl.png') }}" alt="Logo" class="h-10 mr-3">
                <div class="flex flex-col navbar-title">
                    <div class="text-sm">Pemerintah</div>
                    <div class="text-xl font-bold">Kota Pekalongan</div>
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
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" :class="{'hidden': open, 'block': !open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" :class="{'block': open, 'hidden': !open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            @foreach($navItems as $item)
            @if($item->parent_id === null)
            @if($item->children->isEmpty())
            <a href="{{ $item->url }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">{{ $item->title }}</a>
            @else
            <div x-data="{ subOpen: false }" class="relative">
                <button @click="subOpen = !subOpen"
                    class="w-full px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 flex justify-between items-center">
                    {{ $item->title }}
                    <svg class="h-4 w-4 transform transition-transform duration-200" :class="{'rotate-180': subOpen}"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="subOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" class="mt-2 space-y-1">
                    @foreach($item->children as $child)
                    <a href="{{ $child->url }}"
                        class="block pl-6 pr-3 py-2 text-base font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50">{{ $child->title }}</a>
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