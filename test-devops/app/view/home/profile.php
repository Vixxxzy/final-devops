<div class="flex justify-center mt-5">
    <div class="bg-white shadow-lg rounded-2xl p-6 relative w-full max-w-7xl">

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- Header -->
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-semibold text-gray-800">User Profile</h2>
            <p class="text-sm text-gray-500">Update your account information</p>
        </div>

        <!-- Form Start -->
        <form action="<?= APP_PATH ?>/home/update_user" method="post" class="space-y-6">
            <input type="hidden" name="id" value="<?= $_SESSION['user-id'] ?>">

            <!-- Grid Input Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="name" placeholder="Full Name" value="<?= $_SESSION['user-name'] ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" placeholder="Username" value="<?= $_SESSION['user-username'] ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" placeholder="you@example.com"
                        value="<?= $_SESSION['user-email'] ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" placeholder="••••••••"
                        value="<?= $_SESSION['user-password'] ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>

                <!-- Phone Number -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" name="phone" placeholder="+62..." value="<?= $_SESSION['user-phone'] ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
            </div>

            <!-- Save Button -->
            <div class="pt-4 flex justify-end space-x-4">
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Save Changes
                </button>
                <!-- Delete Button -->
                <!-- Remove Account -->
                <a href="<?= APP_PATH ?>/login/delete_user/<?= $_SESSION['user-id'] ?>"
                    onclick="return confirm('Are you sure you want to delete your account?');"
                    class="w-full md:w-auto px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200 block text-center">
                    Remove Account
                </a>

                <!-- Logout -->
                <a href="<?= APP_PATH ?>/login/logout"
                    class="w-full md:w-auto px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 transition duration-200 block text-center">
                    Logout
                </a>

            </div>
        </form>



    </div>
</div>