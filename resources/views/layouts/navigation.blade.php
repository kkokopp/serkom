<nav class=" fixed w-full text-slate-700 bg-gradient-to-br border-b shadow-sm bg-white z-50">
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 gap-0 md:gap-4 justify-between">
        <div class="flex flex-row w-full md:w-auto justify-between pt-5 md:py-0">
            <div class="flex px-5 font-extrabold uppercase justify-center items-center sm:py-0">
                <a class="uppercase font-bold text-2xl bg-gradient-to-br from-cyan-500 to-blue-400 text-transparent bg-clip-text" href="/">Beasiswa</a>
            </div>
            <div class="flex md:hidden items-center">
                <button class="block humberger items-center active:bg-blue-200 rounded-full" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 open-menu">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 close-menu hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>                      
                </button>
            </div>
        </div>
        <ul class="menu md:flex transition-all duration-500 flex-col md:flex-row justify-center items-center text-slate-700 md:justify-between gap-4 font-medium py-2 md:py-0 hilang md:ada">
            <li class="relative group py-5 px-3 hover:text-gray-500 md:hover:bg-gradient-to-t md:hover:from-blue-400/25 md:hover:to-white md:hover:bg-opacity-10">
                <a href="{{ route('beranda') }}" class="{{ request()->is('/') ? 'text-blue-500' : '' }}">Beranda</a>
                <div class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-cyan-500 origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full"></div>
            </li>
            <li class="relative group py-5 px-3 hover:bg-gradient-to-t hover:from-blue-400/25 hover:to-white hover:bg-opacity-10">
                <a href="{{ route('daftar') }}" class="{{ request()->is('daftar') ? 'text-blue-500' : '' }}">Daftar</a>
                <div class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-cyan-500 origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full"></div>
            </li>
            <li class="relative group py-5 px-3 hover:bg-gradient-to-t hover:from-blue-400/25 hover:to-white hover:bg-opacity-10">
                <a href="{{ route('hasil') }}" class="{{ request()->is('hasil') ? 'text-blue-500' : '' }}">Hasil</a>
                <div class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-cyan-500 origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full"></div>
            </li>
            <li class="relative group py-5 px-3 hover:bg-gradient-to-t hover:from-blue-400/25 hover:to-white hover:bg-opacity-10">
                <a href="{{ route('grafik') }}" class="{{ request()->is('grafik') ? 'text-blue-500' : '' }}">Grafik</a>
                <div class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-cyan-500 origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full"></div>
            </li>
        </ul>
    </div>
</nav>