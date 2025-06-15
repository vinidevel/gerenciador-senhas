<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Nova Senha') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <form action="{{ route('senhas.store') }}" method="post" id="multi-form"
                class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="inputs-wrapper" class="p-6 text-gray-900">
                        <div class="service-block mb-6  pb-4 ">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Serviço</label>
                                <input type="text" name="servico[]" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Senha</label>
                                    <div class="flex items-center gap-4 ">
                                    <input type="password" name="senha[]" required
                                        class="senha-input  mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <button type="button" class="toggle-senha focus:outline-none ">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <x-secondary-button type="button" class="remove-btn mt-5">Remover</x-secondary-button>
                        </div>
                    </div>
                    <div class="mb-6">
                        <x-primary-button id="add-btn" class="ms-3">Adicionar Serviço
                        </x-primary-button>
                        <x-primary-button type="submit">Criar Senha(s)</x-primary-button>
                    </div>
                </div>
            </form>



        </div>
    </div>

</x-app-layout>
