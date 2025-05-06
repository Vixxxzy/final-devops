<!-- Navbar -->
<nav class="bg-gradient-to-r from-purple-400 to-violet-500 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo Section -->
        <div class="flex items-center space-x-4">
            <img src="<?= APP_PATH;?>/img/logo.png" alt="Logo" class="h-18 w-18 rounded-full bg-white shadow-md">
            <a href="<?= APP_PATH; ?>/home/index" class="text-3xl font-extrabold text-white hover:text-indigo-200 transition duration-300">Appointment Dashboard</a>
        </div>

        <!-- Desktop Menu (hidden on mobile) -->
        <div class="hidden md:flex space-x-8">
            <a href="<?= APP_PATH; ?>/home/index" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300 hover:text-white">Dashboard</a>
            <a href="<?= APP_PATH; ?>/home/appointment" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300 hover:text-white">Schedule</a>
            <a href="<?= APP_PATH; ?>/home/doctor" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300 hover:text-white">Doctors</a>
            <a href="<?= APP_PATH; ?>/home/profile" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300 hover:text-white">Profile</a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuButton" class="md:hidden text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden bg-gradient-to-r from-indigo-500 to-purple-600 text-white space-y-6 px-6 py-4 hidden">
        <a href="<?= APP_PATH; ?>/home/index" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300">Dashboard</a>
        <a href="<?= APP_PATH; ?>/home/appointment" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300">Appointment</a>
        <a href="<?= APP_PATH; ?>/home/doctors" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300">Doctors</a>
        <a href="<?= APP_PATH; ?>/home/profile" class="hover:bg-indigo-700 px-6 py-2 rounded-lg text-lg font-medium transition duration-300">Profile</a>
    </div>
</nav>

<!-- JavaScript for Mobile Menu Toggle -->
<script>
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>


