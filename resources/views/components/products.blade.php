<div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome to Products!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
       You Can Create Add New Products
    </p>
    <div>
        <x-form-product/>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 p-6 lg:p-8">
    <div id="add_new_product_table">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <table class="table table-row" id="table">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">Category ID</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $k => $i)
                                <tr>
                                    <td>
                                        {{ $i->id }}
                                    </td>
                                    <td>
                                        {{ $i->name }}
                                    </td>
                                    <td>
                                        {{ $i->price }}
                                    </td>
                                    <td>
                                        {{ $i->quantity }}
                                    </td>
                                    <td>
                                        {{ $i->category_id }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 p-6 lg:p-8">
        <div>
            <div class="flex text-center">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>
