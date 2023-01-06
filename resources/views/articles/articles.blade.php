<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 w-full">
            <div class="w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Str::upper($table) }}
                </h2>
            </div>
            <div class="text-right w-full">
            <x-action-button href="/new_article/{{ $table }}">
                {{ 'Dodaj' }}
            </x-action-button>            
            </div>
        </div>          
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- ====== Table Section Start -->
                                <section class="bg-white py-10 lg:py-[20px]">
                                <div class="container">
                                    <div class="flex flex-wrap -mx-4">
                                        <div class="w-full px-4">
                                            <div class="max-w-full overflow-x-auto ">
                                            <table class="table-auto w-full">
                                                <thead>
                                                    <tr class="bg-stone-800 text-center">
                                                        <th
                                                        class="
                                                        w-4/6
                                                        min-w-[160px]
                                                        font-semibold
                                                        text-base
                                                        text-white
                                                        py-3
                                                        lg:py-2
                                                        px-3
                                                        lg:px-4
                                                        text-left          
                                                        rounded-tl-lg                                                             
                                                        "
                                                        >
                                                        Tytuł
                                                        </th>
                                                        <th
                                                        class="
                                                        w-1/6
                                                        min-w-[160px]
                                                        font-semibold
                                                        text-base
                                                        text-white
                                                        py-3
                                                        lg:py-2
                                                        px-3
                                                        lg:px-4
                                                        "
                                                        >
                                                        Data
                                                        </th>
                                                        <th
                                                        class="
                                                        w-1/6
                                                        min-w-[200px]
                                                        text-lg
                                                        font-semibold
                                                        text-white
                                                        py-3
                                                        lg:py-2
                                                        px-3
                                                        lg:px-4
                                                        rounded-tr-lg 
                                                        "
                                                        >
                                                        Akcja
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($articles_list as $article)
                                                    <tr class="border-b">
                                                        <td
                                                        class="
                                                        text-left text-dark
                                                        font-medium
                                                        text-base
                                                        py-3
                                                        px-3
                                                        bg-gray-50
                                                        "
                                                        >
                                                        <a href="/article/{{ $table }}/edit/{{ $article->id }}" class="font-semibold hover:text-zinc-600">{!! $article->tytul !!}</a>
                                                        </td>
                                                        <td
                                                        class="
                                                        text-center text-dark
                                                        font-medium
                                                        text-sm
                                                        py-3
                                                        px-3
                                                        bg-gray-50
                                                        "
                                                        >
                                                        {{ $article->data }}
                                                        </td>
                                                        <td
                                                        class="
                                                        text-center text-dark
                                                        font-medium
                                                        text-base
                                                        py-3
                                                        px-3
                                                        bg-gray-50
                                                        "
                                                        >
                                                        @if ($article->akcept == 1)
                                                        <x-status-button type="bg-green-500" href="/article/{{ $table }}/0/{{ $article->id }}">
                                                            {{ 'Wy' }}
                                                        </x-list-button>
                                                        @else
                                                        <x-status-button type="bg-red-500" href="/article/{{ $table }}/1/{{ $article->id }}">
                                                            {{ 'Wł' }}
                                                        </x-list-button>                                                        
                                                        @endif
                                                        <x-list-button href="/article/{{ $table }}/edit/{{ $article->id }}">
                                                            {{ 'Edytuj' }}
                                                        </x-list-button>
                                                        <x-list-button href="/article/{{ $table }}/delete/{{ $article->id }}">
                                                            {{ 'Usuń' }}
                                                        </x-list-button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="mt-3">{{ $pagination }}</div>
                                        </div>
                                    </div>
                                </div>
                                </section>
                                <!-- ====== Table Section End -->
                    </div>
                </div>
            </div>                
        </div>
    </div>
</x-app-layout>