<div x-data="{ currentIndex: 0, images: ['https://via.placeholder.com/500x250?text=Image%201', 'https://via.placeholder.com/500x250?text=Image%202', 'https://via.placeholder.com/500x250?text=Image%203', 'https://via.placeholder.com/500x250?text=Image%204', 'https://via.placeholder.com/500x250?text=Image%205', 'https://via.placeholder.com/500x250?text=Image%206', 'https://via.placeholder.com/500x250?text=Image%207', 'https://via.placeholder.com/500x250?text=Image%208', 'https://via.placeholder.com/500x250?text=Image%209', 'https://via.placeholder.com/500x250?text=Image%2010'] }">
    <div class="carousel">
        <div class="carousel-inner lg:flex lg:flex-wrap lg:justify-center">
            <template x-for="(image, index) in images.slice(0, 4)" :key="index">
                <div x-show="currentIndex === index" class="carousel-item lg:w-1/4 md:w-1/2 sm:w-full">
                    <img :src="image" :alt="'Image ' + (index + 1)" class="w-full">
                </div>
            </template>
        </div>
        <div class="flex justify-center mt-4">
            <button class="mx-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-700" x-on:click="currentIndex = (currentIndex - 1 + images.length) % images.length">Prev</button>
            <button class="mx-2 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-700" x-on:click="currentIndex = (currentIndex + 1) % images.length">Next</button>
        </div>
    </div>
</div>
