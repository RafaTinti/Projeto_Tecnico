<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-3xl text-gray-700">
                Novo cadastro Transação
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>
    </div>
    <div class=" max-w-fit mx-auto pb-8">
        @if ($errors->any())
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Informações inválidas
            </div>
            <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class=" w-2/3  mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route("Transacao.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="descricao" placeholder="Descrição..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               
            <div class="flex my-1 justify-between">
                <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="tipo">Transação de débito ou crédito?</label>
                <select name="tipo" id="tipo" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="debito">Débito</option>
                    <option value="credito">Crédito</option>
                </select>
            </div>

            {{-- dropdown menu para categorias de debito se o usuario selecionar credito sera escondida --}}
            <div class="flex  my-1 justify-between">
                <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="categoria">Escolha uma categoria cadastrada do tipo indicado</label>
                <select name="categoria_id" id="categoriaDebito" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($categorias as $categoria)
                        @if ($categoria->tipo === "debito")
                            <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
                        @endif
                    @endforeach
                </select>
                <select name="categoria_id" id="categoriaCredito" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden">
                    @foreach ($categorias as $categoria)
                        @if ($categoria->tipo === "credito")
                            <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="flex my-1 justify-between">
                <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="status">Status</label>
                <select name="status" id="status" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="pendente">Pendente</option>
                    <option value="liquidada">Liquidada</option>
                </select>
            </div>

            <input type="number" name="valor" min="1" step="any" placeholder="valor em R$" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
            
            <div class="flex my-1 justify-between">
                <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="pessoa_id">Realizado por:</label>
                <select name="pessoa_id" id="pessoa_id" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($pessoas as $pessoa)
                    <option value="{{$pessoa->id}}">{{ $pessoa->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex my-1 justify-between">
                <label for="vencimento" class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3">Data de vencimento</label>
                <label for="liquidada" class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3">Data de Liquidação</label>
            </div>
            <div class="flex my-1 justify-between">
                <input type="date" id="vencimento" name="vencimento" value="" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "/>
                <input type="date" id="liquidada" name="liquidada" value="" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline "/>
            </div>
            
            <div class="flex my-1 justify-between">
                <div></div>
                <button type="submit" class=" my-3 uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script defer>
    const cred = document.querySelector("#categoriaCredito");
    const deb = document.querySelector("#categoriaDebito");
    const option = document.querySelector("#tipo");
    const dataLiquidada = document.querySelector("#liquidada");
    const status = document.querySelector("#status");

    if(option.value === "credito"){
        toggleHidden();
    }

    if(status.value === "pendente"){
        toggleDisable();
    }

    option.addEventListener("change", () => {
        toggleHidden();
    });

    status.addEventListener("change", () => {
        toggleDisable();
    });

    function toggleHidden(){
        cred.classList.toggle("hidden");
        deb.classList.toggle("hidden");
    }

    function toggleDisable(){
        if (dataLiquidada.hasAttribute("disabled")){
            dataLiquidada.removeAttribute("disabled");
        }
        else {
            dataLiquidada.setAttribute("disabled", "");
            dataLiquidada.value = "";
        }
    }
</script>