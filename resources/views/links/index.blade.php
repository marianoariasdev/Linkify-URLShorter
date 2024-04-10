<x-app-layout>
    <header class="flex justify-between items-center mb-4">
        <h1 class="text-3x1">Taks</h1>
        <a href="{{ route('links.create') }}">Nuevo</a>
    </header>
    @if($links->isEmpty())
        <p>No links created</p>
   @else
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-400 ">
            <thead class="text-xs text-gray-200 uppercase bg-gray-700 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Original URL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Short URL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Visit Counter
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                <tr class="bg-gray-800 hover:bg-gray-700 transition-all duration-300">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-200 whitespace-nowrap ">
                        {{ $link->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $link->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $link->original_url }}
                    </td>
                    <td class="px-6 py-4 flex gap-2 items-center">
                        {{ env('DOMAIN') }}/links/{{ $link->short_url }}
                        <button class="bg-gray-600 p-2 w-8 h-8 rounded hover:scale-110 hover:bg-gray-500 transition duration-300">
                            <img src="{{ asset('icons/Copy.svg') }}" alt="copy icon" title="Copy">
                        </button>
                    </td>
                    <td class="px-6 py-4">
                        {{ $link->visit_counter }}
                    </td>
                    <td class="flex gap-2 px-6 py-4">
                        <a href="{{ $link->original_url }}" target="_blank" class="bg-gray-600 p-2 w-8 h-8 rounded hover:scale-110 hover:bg-green-500 transition duration-300">
                            <img src="{{ asset('icons/ExternalLink.svg') }}" alt="external link icon" title="Go">
                        </a>
                        <a href="" class="bg-gray-600 p-2 w-8 h-8 rounded hover:scale-110 hover:bg-yellow-500 transition duration-300">
                            <img src="{{ asset('icons/Edit.svg') }}" alt="edit icon" title="Edit">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</x-app-layout>