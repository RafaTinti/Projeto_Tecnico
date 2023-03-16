<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-3xl text-gray-700">
                Novo cadastro pessoa
            </h1>
            <hr class="border border-1 border-gray-300 mt-10">
        </div>
    </div>
    <div class=" w-2/3  mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route("Pessoas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nome" placeholder="Nome Completo..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               
            <div class="flex  my-1 justify-between">
                    <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="tipo">Pessoa física ou jurídica</label>
                    <select name="fis_ou_jur" id="tipo" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="fisica">Física</option>
                        <option value="juridica">Jurídica</option>
                    </select>
            </div>
            
            <input type="text" name="cpf" id="cpf" placeholder="CPF no formato 000.000.000-00..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">

            <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ no formato 00.000.000/0000-00..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline hidden">

            <input type="text" name="cidade" id="cidade" placeholder="Cidade..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <input type="text" name="estado" id="estado" placeholder="UF..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <input type="tel" name="contato" id="contato" placeholder="Telefone no formato (00) 00000-0000..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ">

            <input type="email" name="email" id="email" placeholder="email..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
    option.addEventListener("change", () => {
        cpfBar.classList.toggle("hidden");
        cnpjBar.classList.toggle("hidden");
    });
</script>
