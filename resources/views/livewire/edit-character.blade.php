<div>
    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full">

                <h3 class="text-3xl font-semibold">
                    Edit {{ $character->name }}'s details
                </h3>

                <section class="relative pt-12">
                    <div class="items-center">
                        <form wire:submit.prevent="update">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                        Name
                                    </label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        wire:model="form.name" id="name" type="text" required placeholder="i.e White">
                                    @error('form.name')
                                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="nickname" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nick name</label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="nickname" wire:model="form.nickname" type="text" autocomplete="nickname" required>
                                    @error('form.nickname')
                                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label for="occupation" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Occupation</label>
                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="occupation" wire:model="form.occupation" type="text" autocomplete="date" required>
                                    @error('form.occupation')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                                        Status
                                    </label>
                                    <div class="relative">
                                        <select wire:model="form.status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                            @foreach ($statusOptions as $key => $option)
                                                @if($option == $character->status)
                                                    <option value="{{$key}}">{{$option}}</option>
                                                @else
                                                    <option value="{{$key}}">{{$option}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($form['status'] != 'Alive')
                                <div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                                            Cause
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            wire:model="form.cause" id="cause" type="text" required placeholder="i.e ...">
                                        @error('form.cause')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="responsible" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Responsible</label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="responsible" wire:model="form.responsible" type="text" autocomplete="responsible" required>
                                        @error('form.responsible')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last_words">
                                            Last words
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            wire:model="form.last_words" id="name" required type="text" placeholder="i.e ..">
                                        @error('form.last_words')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="season" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Season</label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="season" wire:model="form.season" type="number" autocomplete="season" required>
                                        @error('form.season')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="episode" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Episode</label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="episode" wire:model="form.episode" type="number" autocomplete="episode" required>
                                        @error('form.episode')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label for="number_of_deaths" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Number of deaths</label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="number_of_deaths" wire:model="form.number_of_deaths" type="number" autocomplete="number_of_deaths" required>
                                        @error('form.number_of_deaths')
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                            @endif

                            @foreach($form['quotes'] as $key => $quote)
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label for="episode" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Quote {{ $key + 1 }}</label>
                                        <textarea
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="episode" wire:model="form.quotes.{{ $key }}" type="number" autocomplete="episode" required></textarea>
                                        @error("form.quotes.{{ $key }}")
                                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-5">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full flex justify-center">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

</div>
