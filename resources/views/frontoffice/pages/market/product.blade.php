@extends('frontoffice.base')
@section('page_title', $product->name ?? 'Product')
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-lg-5 mb-4 shop-slider">
                    <div key={index} class="pt-lg--10 pb-lg--10 bg-white rounded-3">
                        {{-- <img src="{{ asset('frontoffice') }}/images/product.png" alt="avater" class="rounded-3 img-fluid"/> --}}
                        <img src="{{ $product->image }}" alt="avater" class="rounded-3 img-fluid" />
                    </div>
                </div>

                <div class="col-lg-6  col-md-12 pad-top-lg-200 pad-bottom-lg-100 pad-top-100 pad-bottom-75 ps-md--5">
                    <h4 class="text-danger font-xssss fw-700 ls-2">{{ $product->category->name }}</h4>
                    <h2 class="fw-700 text-grey-900 display1-size lh-3 porduct-title display2-md-size"> {{ $product->name }}
                    </h2>
                    <div class="clearfix"></div>
                    <p class="font-xsss fw-400 text-grey-500 lh-30 pe-5 mt-3 me-5">{{ $product->description }}
                        </p>

                    <h6 class="display2-size fw-700 text-current ls-2 mb-2">{{ $product->price }}<span class="font-xl">
                            DT</span>
                    </h6>
                    <div class="clearfix"></div>
                    @if (auth()->user()->id != $product->created_by)
                        <div class="product-action flex-row align-items-center">
                            <a href="{{ route('product.form', $product->id) }}"
                                class="add-to-cart bg-dark text-white fw-700 ps-lg-5 pe-lg-5 text-uppercase font-xssss float-left border-dark border rounded-3 border-size-md d-inline-block mt-0 p-3 text-center ls-3">Buy</a>
                        </div>
                    @else
                        <div class="product-action flex-row align-items-center">
                            <a href="{{ route('product.form', $product->id) }}"
                                class="add-to-cart bg-dark text-white fw-700 ps-lg-5 pe-lg-5 text-uppercase font-xssss float-left border-dark border rounded-3 border-size-md d-inline-block mt-0 p-3 text-center ls-3">
                                Edit</a>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                    <ul class="product-feature-list mt-5">
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left"><b class="text-grey-900">
                                Category
                                : </b>{{ $product->category->name }}
                        </li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left"><b class="text-grey-900">SKU :
                            </b>
                            REF. {{ $product->id }}
                        </li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left"><b class="text-grey-900">Tags :
                            </b>{{ $product->category->name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
