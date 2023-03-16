<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8 flex justify-between">
        <div></div>
        <div class="pt-10 sm:pt-5">
            <a class="primary-btn inline text-base sm:text-xl  bg-blue-800 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-blue-700  text-white" 
               href="{{ route("Pessoas.create") }}">
                Novo cadastro
            </a>
        </div> 
    </div>
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
                @forelse ($pessoas as $pessoa)
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white">
                            <a href="{{ route("Pessoas.show", $pessoa->id) }}">{{ $pessoa->nome }}</a>
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
                @empty
                    <h1 class=" text-center text-3xl ">Não existem pessoas cadastradas</h1>
                @endforelse
            </table>
        </div>
    </div>
</x-app-layout>