    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full">
                <div class="flex items-center justify-between">
                    <div class="relative md:w-1/3">
                        <input type="text" wire:model="searchTerm" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Search...">
                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <circle cx="10" cy="10" r="7"></circle>
                                <line x1="21" y1="21" x2="15" y2="15"></line>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <select wire:model="selectedShow" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($categories as $category)
                                @if($category == 'Breaking Bad')
                                    <option selected value="{{ $category }}">{{ $category }}</option>
                                @else
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select wire:model="selectedSeason" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="0">Season</option>
                            @foreach($seasons as $season)
                                <option value="{{ $season }}">{{ $season }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="flex flex-col mt-6">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Image
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Category
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Nickname
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Appearance
                                            </th>
                                            <th scope="col" class="relative py-3 px-6">
                                                <span class="sr-only">View</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($characters as $character)

                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <a href="{{ route('characters.show', $character->id) }}" class="flex items-center">
                                                        <img src="{{ $character->img }}"
                                                        alt="{{ $character->name }}" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                                     </a>
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $character->name }}
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $character->category }}
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $character->nickname }}
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ implode(",", $character->appearance ) }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                    <a href="{{ route('characters.show', $character->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:underline">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="flex">
                        {{ $characters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
