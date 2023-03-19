<x-app-layout>
    <div class="mx-auto w-3/4 p-4 sm:p-6 lg:p-8">
        <div class="  self-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 py-2 px-4 rounded-xl border">
            <div>
                <h1 class="text-center px-4 py-2 text-xl">Transação numero {{$transacao->id}}</h1>
            </div>
            <div class="px-4 py-2 font-bold">
                <h2>informações</h2>
            </div>
            <div class="px-4 py-2 ">
                <p>
                    {{ $transacao->descricao }}
                </p>
            </div>
            <div class=" flex justify-between px-4 py-2">
                <div class="">
                    <p class="font-bold">categoria</p>
                    <a href="{{ route("Categorias.show", $transacao->categoria->id) }} " class=" text-blue-600">{{ $transacao->categoria->categoria }}</a>
                </div>
                <div class="">
                    <p class="font-bold">tipo</p>
                    {{$transacao->categoria->tipo}}
                </div>
                <div >
                    <p class="font-bold">valor</p>
                    <p class="{{$transacao->categoria->tipo === "debito" ? "text-red-500" : "text-green-500"}}">R&#36 {{$transacao->valor/100}}</p>
                </div>
            </div>
            <div class="flex justify-between px-4 py-2">
                <div>
                    <p class="font-bold">status</p>
                    <p class="">{{ $transacao->status }}</p>
                </div>
                <div>
                    <p class="font-bold text-end">Realizado por:</p>
                    <p><a class=" text-blue-600" href="{{ route("Pessoas.show", $transacao->pessoa->id) }}">{{ $transacao->pessoa->nome }}</a></p>
                </div>
            </div>
            <div class="flex justify-between px-4 py-2">
                <div>
                    <p class="font-bold ">Data de vencimento</p>
                    <p>{{ $transacao->vencimento }}</p>
                </div>
                <div>
                    <p class="font-bold">Data de liquidação</p>
                    <p>{{ $transacao->liquidada }}</p>
                </div>
            </div>
            <div class="px-4 py-2">
                <p>Cadastrado ou atualizado por ultimo por <span class=" font-bold">{{$transacao->user->name}}</span></p>
            </div>
            <div class="flex justify-between px-4 py-2 pb-4">
                <div>
                    <p class="font-bold ">Cadastrado em</p>
                    <p>{{ $transacao->created_at }}</p>
                </div>
                <div>
                    <p class="font-bold">Ultima atualização</p>
                    <p>{{ $transacao->updated_at }}</p>
                </div>
            </div>
        </div>

        <div class=" flex justify-between flex-wrap">
            <div></div>
            <div class="flex">
                <div class=" px-6 py-4">
                    <a href="{{ route("Transacao.edit", $transacao->id) }}"><button type="button" class=" px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button></a>
                </div>
                <div class=" px-6 py-4">
                    <form action="{{ route("Transacao.destroy", $transacao->id) }}" method="POST">
                        @csrf
                        @method("delete")
    
                        <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">Excluir</button>
    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>