<x-app-layout>
    <div class="w-4/5 mx-auto">
        <div class="text-center pt-10">
            <h1 class="text-3xl text-gray-700">
                Novo cadastro Categoria
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
        <form action="{{ route("Categorias.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="categoria" placeholder="Nome da categoria..." class="shadow appearance-none border rounded w-full py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
               
            <div class="flex  my-1 justify-between">
                    <label class=" text-gray-700 text-sm font-bold mb-2 mt-2 mr-3" for="tipo">Débito ou Crédito</label>
                    <select name="tipo" id="tipo" class=" shadow appearance-none border rounded w-1/2 py-2 px-3 my-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="debito">Débito</option>
                        <option value="credito">Crédito</option>
                    </select>
            </div>

            <button type="submit" class=" float-right my-3 uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Salvar
            </button>
        </form>
    </div>
</x-app-layout>
