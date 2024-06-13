<x-app-layout>
    <div align=center>
        <slot name="header">
            <br>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('CRÉER UN POST') }}
            </h2>
        </slot>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('heros.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Nom
                                <span class="text-red-500">*</span>
                            </label>
                            </br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name"
                                id="name" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Race
                                <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="race"
                                id="race">
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Genre
                                <span class="text-red-500">*</span></label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="gender"
                                id="gender">
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Attributs
                                <span class="text-red-500">*</span></label></br>
                            <select name="skill_id" class="form-select">
                                <option value=""> --Attributs-- </option>
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Image
                                <span class="text-red-500">*</span></label></br>
                            <input type="file" class="border-2 border-gray-300 p-2 w-full" name="image"
                                id="image">
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Description
                                <span class="text-red-500">*</span></label></br>
                            <textarea class="border-2 border-gray-300 p-2 w-full" name="content"></textarea>
                        </div>

                        <input type="submit" value="Créer mon post"
                            class="p-3 bg-blue-500 text-white hover:bg-blue-400"></input>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
