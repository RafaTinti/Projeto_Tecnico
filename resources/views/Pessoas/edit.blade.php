<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-3xl text-gray-700">
                Editar {{$pessoa->nome}}
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
        <form action="{{ route("Pessoas.update", $pessoa->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <input type="text" name="nome" value="{{ $pessoa->nome }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               
            <div class="flex  my-1 justify-between">
                    <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="tipo">Pessoa física ou jurídica</label>
                    <select name="fis_ou_jur" id="tipo" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="fisica" {{($pessoa->fis_ou_jur==="fisica")? "selected" :"" }} >Física</option>
                        <option value="juridica" {{($pessoa->fis_ou_jur==="juridica")? "selected" :"" }}>Jurídica</option>
                    </select>
            </div>
            
            <input type="text" name="cpf" id="cpf" value="{{ $pessoa->cpf }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">

            <input type="text" name="cnpj" id="cnpj" value="{{ $pessoa->cnpj }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden">

            <input type="text" name="cidade" id="cidade" value="{{ $pessoa->cidade }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <input type="text" name="estado" id="estado" value="{{ $pessoa->estado }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <input type="tel" name="contato" id="contato" value="{{ $pessoa->contato }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">

            <input type="email" name="email" id="email" value="{{ $pessoa->email }}" class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <input type="checkbox" id="ativo" name="ativo" value="true" {{ $pessoa->ativo? "checked" : "" }}>
            <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="ativo">Cadastro ainda ativo?</label>
            
            <button type="submit" class=" float-right my-3 uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Salvar
            </button>
        </form>
    </div>
</x-app-layout>

{{-- nao sei se da pra fazer isso de outro jeito melhor--}}

<script defer>
    const option = document.querySelector("#tipo");
    const cpfBar = document.querySelector("#cpf");
    const cnpjBar = document.querySelector("#cnpj");
    if(option.value === "juridica"){
        toggle();
    }
    option.addEventListener("change", () => {
        toggle();
    });

    function toggle(){
        cpfBar.classList.toggle("hidden");
        cnpjBar.classList.toggle("hidden");
    }
</script>
