@extends('frontoffice.base')
@section('page_title', 'Shop')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                <div class="bg-pattern-div"></div>
                                <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Shop<span
                                        class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">
                                        @if (count($productList) > 0)
                                            {{ count($productList) }} Products Found
                                        @endif
                                    </span>
                                </h2>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <h4 class="float-left font-xssss fw-700 text-grey-500 text-uppercase ls-3 mt-2 pt-1"><a
                                    href="{{ route('product.form') }}"> + Publish your product ! </a></h4>
                            <select class="searchCat float-right sort">
                                <option value="0">Default Sorting</option>
                                @foreach ($categoryList as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach ($productList as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="card w-100 border-0 mt-4">
                                    <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                        <a href="{{ route('product.show', $product->id) }}"><img src="{{ $product->image }}"
                                                alt="product" class="w-100 mt-0 mb-0 p-5" /></a>

                                    </div>
                                    <div class="card-body w-100 p-0 text-center">
                                        <h2 class="mt-2 mb-1">
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="text-black fw-700 font-xsss lh-26">{{ $product->name }}
                                                ({{ $product->quantity }})
                                            </a>
                                        </h2>
                                        <h6 class="font-xsss fw-600 text-grey-500 ls-2">{{ $product->price }} DT</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
