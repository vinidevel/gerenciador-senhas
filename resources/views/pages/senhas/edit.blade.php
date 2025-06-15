<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar Senha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <form action="{{ route('senhas.update', $senha->id) }}" method="POST" id="multi-form"
                class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
                @csrf
                @method('PUT')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="inputs-wrapper" class="p-6 text-gray-900">
                        <div class="service-block mb-6  pb-4 ">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Serviço</label>
                                <input type="text" name="nome" value="{{ $senha->nome }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Senha</label>
                                <div class="flex items-center gap-4 ">
                                    <input type="password" name="senha"
                                        value="{{ Crypt::decryptString($senha->senha) }}"
                                        class="senha-input  mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <button type="button" class="toggle-senha focus:outline-none ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mb-6">
                        <x-primary-button  class="ms-3" >

                            <a href="{{ route('senhas.index') }}">Voltar</a>
                        </x-primary-button>
                        <x-primary-button class="ms-3" type="submit">Atualizar Senha</x-primary-button>
                    </div>
                </div>
            </form>



        </div>
    </div>

</x-app-layout>
