<x-layout title="Home">
    <div class="container mx-auto p-4 mt-[100px]">
        <div class="max-w-screen-xl w-full mx-auto">
            <div class="text-center mt-4">
                <h5 class="text-3xl text-gray-700 font-medium block">URL Shorten</h5>
                <p class="text-sm block font-light">A simple laravel url shortener</p>
            </div>

            <div class="max-w-lg mx-auto w-full mt-4 p-4 md:p-6">
                @error('url')
                    <div class="bg-red-500 text-sm text-white rounded-lg p-4 mb-4" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('shorten')}}" method="POST">
                    <div>
                        <div class="flex rounded-lg shadow-sm">
                            <input type="text" id="url" name="url" placeholder="Paste your long url here" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                            <button type="submit" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg class="flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            </button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
            @if (session('success'))
            {{-- Success Alert --}}
            <div class="max-w-xl w-full mx-auto">
                <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                    <div class="flex">
                        <div class="ms-2">
                        <div class="text-sm font-medium">
                            File has been successfully uploaded.
                        </div>
                        </div>
                        <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="#dismiss-alert">
                            <span class="sr-only">Dismiss</span>
                            <svg class="flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                            {{-- Input form --}}
                <div class="mt-4">
                    <div class="flex rounded-lg shadow-sm">
                        @if (session('shortenCode'))
                        <input id="result" type="text" value="{{ url(session('shortenCode')) }}" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" disabled>
                        @endif
                        <button id="copy" type="submit" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="flex-shrink-0 h-4 w-4" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    @if (session('success') || session('shortenCode'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const result = document.querySelector('#result');
                const button = document.querySelector('#copy');

                button.addEventListener('click', () => {
                    result.removeAttribute('disabled');
                    result.select();
                    document.execCommand("copy");
                    result.setAttribute('disabled', '');
                    alert('Copy!');
                })
            });
        </script>
    @endif
</x-layout>