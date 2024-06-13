<x-app-layout>
    <div align=center>
        <slot name="header">
            <br>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $hero->name }}<br>{{ $hero->race }}<br>{{ $hero->skill->name }}
            </h2>
        </slot>
    </div>

    <div align=center>
        <br>
        <div>
            <img src="/storage/uploads/{{ $hero->image }}" alt="">
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        {{ $hero->content }}
                    </div>
                    <br>
                    <a href="{{ route('heros.edit', $hero->id) }}"
                        class="p-3 bg-blue-500 text-white hover:bg-blue-400">Modifier mon
                        post</a>
                    @method('DELETE')
                    <a href="{{ route('heros.destroy', $hero->id) }}"
                        class="p-3 bg-blue-500 text-white hover:bg-blue-400">Supprimer mon
                        post</a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
