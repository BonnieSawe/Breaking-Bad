<div>
    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full">
                <section class="relative pt-12">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                            <img alt="..." class="max-w-full rounded-lg shadow-lg" src="{{ $character->img }}">
                        </div>
                        <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                            <div class="md:pr-12">
                                <h3 class="text-3xl font-semibold">
                                    {{ $character->name }}
                                    @if($character->nickname)
                                        <span class="text-2xl"> alias </span>
                                        <span> {{$character->nickname}}</span>
                                    @endif
                                </h3>
                                <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                                    {{ $character->name }} works as {{ $character->occupation }}
                                </p>

                                <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                                    {{ $character->name }} is {{ $character->status }}
                                </p>

                                @isset($character->death)
                                    <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                                        {{ $character->death->responsible }} is responsible for the death of {{ $character->name }}, caused by {{ $character->death->cause }}
                                        <br> <br>
                                        Last words were; {{ $character->death->last_words }}
                                        <br> <br>
                                        The death happened in season {{ $character->death->season }}, episode {{ $character->death->episode }}
                                        with a death caused count of {{ $character->death->number_of_deaths }}
                                    </p>
                                @endisset

                                @if($character->quotes->count() > 0)
                                    <h3 class="mt-4 text-1xl font-semibold">
                                        {{ $character->name }}'s favorite quote{{ $character->quotes->count() > 1 ? ' among many' : '' }} is;
                                    </h3>
                                    <p class="mt-2 text-lg italic leading-relaxed text-blueGray-500">
                                        "{{ $character->quotes[0]->body }}"
                                    </p>
                                @endif

                                <div class="mt-5">
                                    <a href="{{ route('characters.edit', $character->id) }}" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit Details
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</div>
