<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label for="brand-image"
               class="block text-sm font-medium text-gray-700">Brand Image (url)</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text" name="brandImageUrl"
                   class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('brandImageUrl') border-red-500 @endif"
                   placeholder="i.imgur.com/DoTdgvs.png"
                   value="{{ old("brandImageUrl") ?? $brand->imageUrl ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Brand Name</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text"
                   name="brandName"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('brandName') border-red-500 @endif"
                   placeholder="BMW"
                   value="{{ old("brandName") ?? $brand->name ?? "" }}"
            >
        </div>
    </div>
</div>



