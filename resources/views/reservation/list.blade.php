<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservations
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-x-auto relative py-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Reservation from
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Reservation to
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Car
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $reservation->date_from }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $reservation->date_to }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('reservation_index', ['car_id' => $reservation->car->id]) }}" target="_blank">
                            {{ $reservation->car->brand->name }} <small>{{ $reservation->car->name }}</small>
                        </a>
                    </td>
                    <td class="py-4 px-6">
                        {{ ucfirst($reservation->status) }}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
