<?php require('views/partials/head.php'); ?>

<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register</h2>
        </div>
        <form class="mt-8 space-y-6" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="space-y-3  rounded-md shadow-sm">
                <div>
                    <label for="name" class="">Name</label>
                    <input id="name" value="<?= escape($_POST['name'] ?? '') ?>" name="name" type="name" autocomplete="name" class="relative block w-full appearance-none rounded-none border px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Name">
                    <span class="text-sm text-red-600"><?= isset($errors['name']) ? '*' . $errors['name'] : ''; ?></span>
                </div>
                <div>
                    <label for="email-address" class="">Email address</label>
                    <input id="email-address" value="<?= escape($_POST['email'] ?? '') ?>" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email address">
                    <span class="text-sm text-red-600"><?= isset($errors['email']) ? '*' . $errors['email'] : ''; ?></span>
                </div>
                <div>
                    <label for="address" class="">Address</label>
                    <input id="address" value="<?= escape($_POST['address'] ?? '') ?>" name="address" type="name" autocomplete="address" class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Address">
                    <span class="text-sm text-red-600"><?= isset($errors['address']) ? '*' . $errors['address'] : ''; ?></span>
                </div>
                <div>
                    <label for="contact" class="">Contact No</label>
                    <input id="contact" value="<?= escape($_POST['contact'] ?? '') ?>" name="contact" type="tel" autocomplete="contact" class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Contact Number">
                    <span class="text-sm text-red-600"><?= isset($errors['contact']) ? '*' . $errors['contact'] : ''; ?></span>
                </div>
                <div>
                    <label for="password" class="">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
                    <span class="text-sm text-red-600"><?= isset($errors['password']) ? '*' . $errors['password'] : ''; ?></span>
                </div>
            </div>


            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Heroicon name: mini/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Sign in
                </button>
            </div>
            <div class="text-sm">
                <p>Already Have an Account? <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">Login Here</a></p>
            </div>
        </form>
    </div>
</div>

<?php require('views/partials/footer.php') ?>