<div class="grid grid-cols-3 gap-6">
    <label for="fuelType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Car brand</label>
    <select name="brand_id" id="carBrand"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('brand_id') border-red-500 @endif">
        <option selected>Choose brand</option>
        @foreach($brands as $brand)
            <option
                value="{{ $brand->id }}"
                @isset($model)
                    @selected(old("brand_id", $model->brand_id) == $brand->id)
                @else
                    @selected(old("brand_id") == $brand->id)
                @endisset
            >
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label for="company-website"
               class="block text-sm font-medium text-gray-700">Model Image (url)</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text" name="imageUrl"
                   class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('imageUrl') border-red-500 @endif"
                   placeholder="i.imgur.com/DoTdgvs.png"
                   value="{{ old("imageUrl") ?? $model->imageUrl ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Model Name</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text"
                   name="name"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @endif"
                   placeholder="Fabia"
                   value="{{ old("name") ?? $model->name ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Engine Power</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text"
                   name="enginePower"
                   placeholder="75"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('enginePower') border-red-500 @endif"
                   value="{{ old("enginePower") ?? $model->enginePower ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Engine capacity</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="text"
                   name="engineCapacity"
                   placeholder="1 390"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('engineCapacity') border-red-500 @endif"
                   value="{{ old("engineCapacity") ?? $model->engineCapacity ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Number Doors</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="number"
                   name="numberDoors"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('numberDoors') border-red-500 @endif"
                   placeholder="3"
                   min="3"
                   max="8"
                   value="{{ old("numberDoors") ?? $model->numberDoors ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Number Airbags</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="number"
                   name="airbags"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('airbags') border-red-500 @endif"
                   placeholder="4"
                   value="{{ old("airbags") ?? $model->airbags ?? "" }}">
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Year of production</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <input type="number"
                   name="yearOfProduction"
                   class="block w-full flex-1 rounded-none  rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('yearOfProduction') border-red-500 @endif"
                   placeholder="2010"
                   min="1900" max="2099"
                   value="{{ old("yearOfProduction") ?? $model->yearOfProduction ?? "" }}">
        </div>
    </div>
</div>

<div class="grid grid-cols-3 gap-6">
    <label for="fuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Fuel Type</label>
    <select name="fuel" id="fuel"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('fuel') border-red-500 @endif">
        <option selected>Choose fuel type</option>
        @foreach(\App\Enums\FuelType::getTypesToArray() as $fuelType)
            <option
                value="{{ $fuelType }}"
                @isset($model)
                    @selected(old("fuel", $model->fuel) == $fuelType)
                @else
                    @selected(old("fuel") == $fuelType)
                @endisset
            >
                {{ ucfirst($fuelType) }}
            </option>
        @endforeach
    </select>
</div>

<div class="grid grid-cols-3 gap-6">
    <label for="gearbox" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Gearbox
        Type</label>
    <select name="gearbox" id="gearboxType"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('gearbox') border-red-500 @endif">
        <option selected>Choose gearbox type</option>
        @foreach(\App\Enums\GearboxType::getTypesToArray() as $gearboxType)
            <option
                value="{{ $gearboxType }}"
                @isset($model)
                    @selected(old("gearbox", $model->gearbox) == $gearboxType)
                @else
                    @selected(old("gearbox") == $gearboxType)
                @endisset
            >
                {{ ucfirst($gearboxType) }}
            </option>
        @endforeach
    </select>
</div>

<div class="flex">
    <div>
        <div class="form-check">
            <input
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                type="checkbox"
                id="abs"
                value="1"
                name="abs"
                @isset($model)
                    @checked(old('abs', $model->abs))
                @else
                    @checked(old('abs'))
                @endisset
            >
            <label class="form-check-label inline-block text-gray-800" for="abs">
                ABS
            </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                type="checkbox"
                value="1"
                id="electricWindows"
                name="electricWindows"
                @isset($model)
                    @checked(old('electricWindows', $model->electricWindows))
                @else
                    @checked(old('electricWindows'))
                @endisset
            >
            <label class="form-check-label inline-block text-gray-800" for="electricWindows">
                Electric Windows
            </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                type="checkbox"
                value="1"
                id="electricMirrors"
                name="electricMirrors"
                @isset($model)
                    @checked(old('electricMirrors', $model->electricMirrors))
                @else
                    @checked(old('electricMirrors'))
                @endisset
            >
            <label class="form-check-label inline-block text-gray-800" for="electricMirrors">
                Electric Mirrors
            </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                type="checkbox"
                value="1"
                id="heatedMirrors"
                name="heatedMirrors"
                @isset($model)
                    @checked(old('heatedMirrors', $model->heatedMirrors))
                @else
                    @checked(old('heatedMirrors'))
                @endisset
            >
            <label class="form-check-label inline-block text-gray-800" for="heatedMirrors">
                Heated Mirrors
            </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                type="checkbox"
                value="1"
                id="centralLocking"
                name="centralLocking"
                @isset($model)
                    @checked(old('centralLocking', $model->centralLocking))
                @else
                    @checked(old('centralLocking'))
                @endisset
            >
            <label class="form-check-label inline-block text-gray-800" for="centralLocking">
                Central Locking
            </label>
        </div>
    </div>
</div>
