@extends('backoffice.pages.products.index')
@section('products')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title ">{{__('Products')}}</h2>
                                    <p class="card-category"></p>
                                </div>
                                <div class="col">
                                    @include('backoffice.alerts.danger')
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Date created
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                {{$product->name}}
                                            </td>
                                            <td>
                                                {{$product->created_at}}
                                            </td>
                                            <td>
                                                {{$product->price}}
                                            </td>
                                            <td>
                                                {{$product->quantity}}
                                            </td>
                                            <td>
                                                {{$product->category->name}}
                                            </td>
                                            <td class="text-primary">
                                                <a href="{{ route('admin.product.delete', $product->id) }}"
                                                   class="btn btn-sm btn-danger text-white">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
