<div>
    <x-alerts/>
    <form class="flex flex-col justify-center" wire:submit.prevent="submitReservation">
        <div class="grid gap-4 md:grid-cols-2">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                    Full Name
                </label>
                <input type="text" id="name" placeholder="Full name"
                       wire:model.lazy.lazy="name"
                       class="bg-white border {{ $errors->has('name')?'border-red-500':'border-gray-100' }}  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                <x-input-error for="name" :messages="$errors->first('name')"/>
            </div>
            <div class="mb-6">
                <label for="people" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                    Number of People
                </label>
                <select type="text" id="people"
                        wire:model.lazy="numberOfPeople"
                        class="bg-white border  {{ $errors->has('numberOfPeople')?'border-red-500':'border-gray-100' }}  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                    <option value="">Number of People</option>
                    @foreach(range(1, 10) as $i)
                        <option value="{{ $i }}">
                            {{ $i }}
                            {{ \Str::plural('person', $i) }}
                        </option>
                    @endforeach
                </select>
                <x-input-error for="numberOfPeople" :messages="$errors->first('numberOfPeople')"/>
            </div>

            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                    Phone Number
                </label>
                <input type="tel" id="name"
                       wire:model.lazy="phoneNumber"
                       placeholder="Phone  number"
                       class="bg-white border {{ $errors->has('phoneNumber')?'border-red-500':'border-gray-100' }}   text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                <x-input-error for="phoneNumber" :messages="$errors->first('phoneNumber')"/>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                    Email address
                </label>
                <input type="email" id="email" wire:model.lazy="email"
                       placeholder="Email address"
                       class="bg-white border {{ $errors->has('email')?'border-red-500':'border-gray-100' }}   text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                <x-input-error for="email" :messages="$errors->first('email')"/>
            </div>
            <div class="mb-6">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                    Date
                </label>
                <input type="date" id="date" placeholder="Date" wire:model.lazy="date"
                       min="{{ now()->format('Y-m-d') }}"
                       class="bg-white border {{ $errors->has('date')?'border-red-500':'border-gray-100' }}  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                <x-input-error for="date" :messages="$errors->first('date')"/>
            </div>

            <div class="mb-6">
                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                    Time
                </label>
                <input type="time" id="time" placeholder="Time" wire:model.lazy="time" min="{{ now()->format('H:i') }}"
                       class="bg-white border {{ $errors->has('time')?'border-red-500':'border-gray-100' }}  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                <x-input-error for="time" :messages="$errors->first('time')"/>
            </div>

        </div>
        <button type="submit"
                wire:loading.attr="disabled"
                class="self-center px-6 py-3 text-sm font-semibold text-white uppercase border border-primary bg-primary hover:text-gray-50 focus:ring focus:ring-offset-2 focus:ring-primary">
            Reserve a Table
        </button>
    </form>
</div>
