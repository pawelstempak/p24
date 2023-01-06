<x-app-layout>
    <x-slot name="header">
        <form method="post" enctype="multipart/form-data">        
        <div class="grid grid-cols-2 w-full">
            <div class="w-full">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {!! __($article->tytul) !!}
                </h2>
            </div>
            <div class="text-right w-full">
                <button type="submit" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Zapisz</button>
                <a href="/articles/{{ $table }}" class="px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Zamknij</a>           
            </div>
        </div>        
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- jgfdskkdsf -->

            <div class="mt-5 md:mt-0 md:col-span-2">
                @csrf
                    <div class="px-4 py-5 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md bg-gray-200">
                        <div class="grid grid-cols-6 gap-6">
                    
                    <!-- Title -->
                    <div class="col-span-full">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Tytuł artykułu
                        </label>
                        <input value="{!! $article->tytul !!}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="title" type="text" autocomplete="title" name="tytul">
                    </div>

                    <!-- Title -->
                    <div class="col-span-full">
                        <label class="block font-medium text-sm text-gray-700" for="klucz">
                            Przyjazny link
                        </label>
                        <input value="{{ $article->klucz }}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="klucz" type="text" autocomplete="klucz" name="klucz">
                    </div>                    

                    <!-- Keywords -->
                    <div class="col-span-full">
                        <label class="block font-medium text-sm text-gray-700" for="keywords">
                            Słowa kluczowe (wprowadź rozdzielone przecinkami)
                        </label>
                        <input value="{{ $article->keywords }}" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="keywords" type="text" autocomplete="keywords" name="keywords">
                    </div>
                    
                    <!-- Publication period -->
                    <div class="col-span-full">
                        <div class="grid grid-cols-2 w-full">
                        <div class="w-full pr-10">
                            <div class="datepicker" data-mdb-toggle-button="false">
                                <label class="block font-medium text-sm text-gray-700" for="publ_start">
                                    Rozpoczęcie publikacji
                                </label>
                                <input 
                                datepicker 
                                datepicker-autohide
                                datepicker-format="yyyy-mm-dd"
                                datepicker-orientation="bottom left"
                                placeholder="Wybierz datę"
                                data-mdb-toggle="datepicker" 
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" 
                                id="publ_start" 
                                type="text" 
                                autocomplete="publ_start" 
                                name="publ_start"
                                value="{{ $article->publ_start }}"
                                >
                                </div>                                     
                            </div>
                            <div class="relative text-left w-full" data-mdb-toggle-button="false">
                                <label class="block font-medium text-sm text-gray-700" for="publ_stop">
                                    Zakończenie publikacji
                                </label>
                                <input 
                                datepicker 
                                datepicker-autohide
                                datepicker-format="yyyy-mm-dd"
                                datepicker-orientation="bottom left"
                                placeholder="Wybierz datę"
                                data-mdb-toggle="datepicker" 
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" 
                                id="publ_koniec" 
                                type="text" 
                                autocomplete="publ_koniec" 
                                name="publ_koniec"
                                value="{{ $article->publ_koniec }}"
                                >
                            </div>    
                        </div>              
                    </div>                         
                    <!-- Short content -->
                    <div class="col-span-full">
                        <label class="block font-medium text-sm text-gray-700" for="short">
                            Skrót artykułu
                        </label>
                        <x-forms.ckeditor id="editor1" name="zajawka" type="h-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" :content="$article->zajawka" />
                    </div>
                    <!-- Content -->
                    <div class="col-span-full">
                        <input type="hidden" name="klucz" value="{{ $article->klucz }}">
                        <label class="block font-medium text-sm text-gray-700" for="content">
                            Treść artykułu
                        </label>
                        <x-forms.ckeditor id="editor2" name="tresc" type="h-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" :content="$article->tresc" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 w-full text-right px-4 py-3 bg-gray-300 sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <div class="w-full">
                    <h2 class="text-s text-gray-800 text-left py-1">
                    Utworzono <b>{{ $article->data }}</b> przez <b>{{ $article->autor }}</b>. Ostatnia edycja <b>   {{ $article->data_zmiany }}</b>
                    </h2>
                </div>
                <div class="text-right w-full">
                    <button type="submit" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Zapisz</button>
                    <a href="/articles/{{ $table }}" class="px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Zamknij</a>           
                </div>
            </div>   
            </form>
        </div>
    </div>

            <!-- fkdsfdskfd -->

        </div>
    </div>
</x-app-layout>
