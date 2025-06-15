<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Senhas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Modal de Confirmação -->
        <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
                <h3 class="text-lg font-semibold mb-4">Confirmar exclusão</h3>
                <p class="mb-6">Tem certeza que deseja deletar este registro?</p>
                <div class="flex justify-end gap-3">
                    <button type="button" id="cancel-delete"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
                    <button type="button" id="confirm-delete"
                        class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600">Deletar</button>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="text-white shrink-0 inline w-4 h-4" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <span class="ml-3 font-medium text-white">{{ session('success') }}</span>
                </div>
            @endif

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="text-red-600 shrink-0 inline w-4 h-4 me-3 mr-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class= "ml-3 font-medium text-red-600">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <span class="text-gray-900 font-semibold">{{ __('Lista de serviços e senhas: ') }}</span>
                    <x-primary-button>
                        <a href="{{ route('senhas.create') }}" class="inline-block px-4 py-2 text-xs">Novo
                            registro</a>
                    </x-primary-button>
                </div>

                <form action="{{ route('senhas.index') }}" class="flex items-center max-w-lg mx-auto mb-6 gap-4">
                    @csrf
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full max-w-xs">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <!-- Seu SVG aqui -->
                        </div>
                        <input name="search_nome"
                            value="{{ isset($search['search_nome']) ? $search['search_nome'] : '' }}" type="text"
                             data-index-url="{{ route('senhas.index') }}"
                            id="search_nome"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 max-w-xs"
                            placeholder="Filtrar por nome do serviço ..." required />
                        <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3"></button>
                    </div>

                    <x-primary-button type="submit"
                        class="inline-flex items-center py-2.5 px-3 text-sm font-medium text-black bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>Filtrar
                    </x-primary-button>

                </form>
                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
                    @foreach ($senhas as $senha)
                        <div class="border rounded-lg p-4 flex flex-col gap-3 shadow-sm">
                            <div>
                                <span class="block text-xs text-gray-500">Serviço</span>
                                <span class="font-bold">{{ $senha->nome }}</span>
                            </div>
                            <div>
                                <span class="block text-xs text-gray-500">Senha</span>
                                <div class="flex items-center gap-4 ">
                                    <input type="password" value="{{ Crypt::decryptString($senha->senha) }}"
                                        class="senha-input border border-gray-300 rounded px-2 py-1 w-full min-w-0"
                                        readonly>
                                    <button type="button" class="toggle-senha focus:outline-none ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex gap-3 justify-end mt-4">
                                <a href="{{ route('senhas.edit', $senha->id) }}"
                                    class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 text-xs">Editar</a>
                                <form class="delete-form" data-id="{{ $senha->id }}"
                                    action="{{ route('senhas.destroy', $senha->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja deletar?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">Deletar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Paginação --}}
                <div class="flex items-center -space-x-px h-8 text-sm mb-3 w-full ">
                    <div class="flex items-center justify-center px-3 h-8 text-sm mt-3 w-full">

                        @if (isset($search))
                            {!! $senhas->appends($search)->links() !!}
                        @else
                            {!! $senhas->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
