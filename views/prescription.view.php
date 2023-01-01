<?php require('partials/head.php') ?>

<?php require('partials/nav.php') ?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Prescription</h1>
    </div>
</header>
<main class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
    <div class="md:gap-6">

        <div class="mt-5 md:mt-0">
            <form action="#" method="POST">
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6 grid grid-cols-6 gap-6">

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Prescription</label>
                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="fileUpload[]" type="file" class="sr-only" multiple>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    <div class="flex w-40 h-40 justify-center space-x-4" id="imgGallery">
                                        <!-- image preview -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                            <div class="mt-1">
                                <textarea id="note" name="note" rows="3" class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500"></p>
                        </div>

                        <div class="col-span-6">
                            <label for="street-address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 block w-full border-2 border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="time" class="block text-sm font-medium text-gray-700">Delivery time</label>
                            <input type="datetime-local" name="time" id="time" autocomplete="street-address" value="<?= $time ?>" class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#file-upload').on('change', function() {
                multiImgPreview(this, '#imgGallery');
            });
        });
    })
</script>

<?php require('partials/footer.php') ?>