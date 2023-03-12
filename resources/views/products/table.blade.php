<div class="flex items-center justify-between my-5">
    <div class="flex items-center justify-start gap-x-4">

        <a href="{{ route('product.create') }}"
            class="px-4 py-2 bg-yellow-400 rounded-xl text-gray-100 font-bold shadow-md hover:bg-yellow-600">
            Crear producto
        </a>
        <a href="{{ route('category.create') }}"
            class="px-4 py-2 bg-indigo-500 rounded-xl text-gray-100 font-bold shadow-md hover:bg-indigo-600">
            Crear categoria
        </a>
        <a href="{{ route('product.trash') }}"
            class="px-4 py-2 bg-red-800 rounded-xl text-gray-100 font-bold shadow-md hover:bg-red-900">Papelera</a>
    </div>
    <div class="flex items-center justify-start gap-x-4">
        <a href="#"
            class="px-4 py-2 bg-red-700 rounded-xl text-gray-100 font-bold shadow-md hover:bg-red-800">Exportar
            PDF</a>
        <a href="#"
            class="px-4 py-2 bg-green-700 rounded-xl text-gray-100 font-bold shadow-md hover:bg-green-800">Exportar
            EXCEL</a>
    </div>
</div>
<h1 class="text-xl font-bold">FILTROS</h1>
<div class="flex items-center w-full justify-between my-5">
    <div class="flex items-center w-full justify-start gap-x-4">
        <select
            class="bg-transparent border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/4 px-4 py-2">
            <option disabled selected>Selecciona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" placeholder="Busca un producto por su nombre"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-transparent sm:text-xs focus:ring-blue-500 focus:border-blue-500">
        <div class="flex w-1/5 items-center gap-x-2 justify-end">
            <button
                class="px-4 w-full py-2 text-gray-100 bg-gray-900 shadow-md hover:text-rose-500 rounded-xl font-bold">Buscar</button>
            <button
                class="px-4 w-full py-2 text-gray-100 bg-gray-900 shadow-md hover:text-rose-500 rounded-xl font-bold">Limpiar</button>
        </div>
    </div>
</div>
<div class="relative overflow-x-auto pb-10">
    <table class="w-full text-sm text-left text-gray-500 shadow">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">
                    CATEGORIA
                </th>
                <th scope="col" class="px-6 py-3">
                    NOMBRE
                </th>
                <th scope="col" class="px-6 py-3">
                    DESCRIPCION
                </th>
                <th scope="col" class="px-6 text-center py-3">
                    ACCIONES
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $product->category->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4 w-1/2">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form class="inline-block mx-auto" action="{{ route('product.destroy', $product->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                class="px-4 py-2 bg-rose-500 text-gray-100 rounded-xl font-bold hover:bg-rose-600">Enviar
                                a papelera</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-right"><span class="font-bold">Nota:</span> Las acciones no tienen confirmacion.</p>
</div>
