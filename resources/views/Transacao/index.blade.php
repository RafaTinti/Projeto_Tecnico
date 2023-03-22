<x-app-layout>

    @if (session()->has("message"))
        <div class=" mx-auto w-4/5 pb-10 ">
            <div class=" bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Atenção
            </div>
            <div class="boreder border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                {{ session()->get("message") }}
            </div>
        </div>        
    @endif
    
    <div class="mx-auto p-4 sm:p-6 lg:p-8 flex justify-between">
        <div>
            <p class=" text-lg pt-10 sm:pt-5">Saldo atual R&#36 <span class="{{($saldo<0)? "text-red-500" : "text-green-500"}}">{{$saldo/100}}</span></p>
        </div>

        

        <div class="pt-10 sm:pt-5">
            <a class="primary-btn inline text-base sm:text-xl  bg-blue-800 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-blue-700  text-white" 
               href="{{ route("Transacao.create") }}">
                Novo cadastro
            </a>
        </div> 
    </div>
    
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
        <div class="relative overflow-x-auto">
            <div class="mx-auto pb-10 w-full">
                {{ $transacoes->links() }}
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Descrição
                        </th>
                        <th scope="col" class="px-6 py-3">
                            valor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pessoa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                @forelse ($transacoes as $transacao)
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white">
                            <a href="{{ route("Transacao.show", $transacao) }}">{{ $transacao->descricao }}</a>
                        </th>
                        <td class="px-6 py-4  {{ ($transacao->categoria->tipo === "debito") ? "text-red-500" : "text-green-500"}} ">
                            R&#36 {{ $transacao->valor/100 }}
                        </td>                       
                        <td class="px-6 py-4">
                            {{ $transacao->categoria->categoria }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transacao->categoria->tipo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transacao->pessoa->nome }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transacao->status }}
                        </td>
                        <td>
                            <a href="{{ route("Transacao.show", $transacao) }}">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Icon description</span>
                                </button>
                            </a>
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