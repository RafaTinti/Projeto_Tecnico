<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Documento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cidade
                        </th>
                        <th scope="col" class="px-6 py-3">
                            UF
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ativo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contato
                        </th>
                        <th scope="col" class="px-6 py-3">
                            e-mail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cadastrado em
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ultima Atualização
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $pessoa->nome }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pessoa->fis_ou_jur }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ($pessoa->fis_ou_jur) === "fisica" ? $pessoa->cpf : $pessoa->cnpj }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->cidade }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->estado }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->ativo? "sim" : "não"}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->contato }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pessoa->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=" flex justify-between">
            <p class="px-6 py-4 font-medium text-gray-700 dark:text-white">Criado ou modificado por último por <a class=" text-green-400 font-bold text-lg" href="">{{ Auth::user()->name }}.</a></p>
            {{-- colocar usuario que criou ou modificou--}}
            <div class="flex">
                <div class=" px-6 py-4">
                    <a href="{{ route("Pessoas.edit", $pessoa->id) }}"><button type="button" class=" px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button></a>
                </div>
                <div class=" px-6 py-4">
                    <form action="{{ route("Pessoas.destroy", $pessoa->id) }}" method="POST">
                        @csrf
                        @method("delete")

                        <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">Excluir</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>