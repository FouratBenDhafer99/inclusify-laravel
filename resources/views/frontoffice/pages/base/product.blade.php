@extends('frontoffice.base')
@section('page_title', $product->name??"Product")
@section('content')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left pe-0">
            <div class="row">
                <div class="col-lg-1 p-0 d-none d-lg-block">
                    <img src="{{ asset('frontoffice') }}/images/product.png" alt="product"
                         class="mb-2 w-100 bg-white p-3"/>
                    <img src="{{ asset('frontoffice') }}/images/product.png" alt="product"
                         class="mb-2 w-100 bg-white p-3"/>
                    <img src="{{ asset('frontoffice') }}/images/product.png" alt="product"
                         class="mb-2 w-100 bg-white p-3"/>
                    <img src="{{ asset('frontoffice') }}/images/product.png" alt="product"
                         class="mb-2 w-100 bg-white p-3"/>
                </div>
                <div class="col-lg-5 mb-4 shop-slider">
                        <div key={index} class="pt-lg--10 pb-lg--10 bg-white rounded-3">
                            <img src="{{ asset('frontoffice') }}/images/product.png" alt="avater"
                                 class="rounded-3 img-fluid"/>
                        </div>
                </div>

                <div
                    class="col-lg-6  col-md-12 pad-top-lg-200 pad-bottom-lg-100 pad-top-100 pad-bottom-75 ps-md--5">
                    <h4 class="text-danger font-xssss fw-700 ls-2">DNMX</h4>
                    <h2 class="fw-700 text-grey-900 display1-size lh-3 porduct-title display2-md-size"> Camisole
                        with Adjustable Straps</h2>
                    <div class="star d-block w-100 text-left">
                        <img src="{{ asset('frontoffice') }}/images/star.png" alt="star" class="w15 float-left"/>
                        <img src="{{ asset('frontoffice') }}/images/star.png" alt="star" class="w15 float-left"/>
                        <img src="{{ asset('frontoffice') }}/images/star.png" alt="star" class="w15 float-left"/>
                        <img src="{{ asset('frontoffice') }}/images/star.png" alt="star" class="w15 float-left"/>
                        <img src="{{ asset('frontoffice') }}/images/star-disable.png" alt="star"
                             class="w15 float-left me-2"/>
                    </div>
                    <p class="review-link font-xssss fw-500 text-grey-500 lh-3"> 2 customer review</p>
                    <div class="clearfix"></div>
                    <p class="font-xsss fw-400 text-grey-500 lh-30 pe-5 mt-3 me-5">ultrices justo eget,
                        sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus
                        scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit arcu.</p>

                    <h6 class="display2-size fw-700 text-current ls-2 mb-2"><span
                            class="font-xl">$</span>449
                    </h6>
                    <div class="timer bg-white mt-2 mb-0 w350 rounded-3">
                        <div class="time-count"><span class="text-time">03</span> <span
                                class="text-day">Day</span></div>
                        <div class="time-count"><span class="text-time">03</span> <span
                                class="text-day">Hours</span></div>
                        <div class="time-count"><span class="text-time">55</span> <span
                                class="text-day">Min</span></div>
                        <div class="time-count"><span class="text-time">48</span> <span
                                class="text-day">Sec</span></div>
                    </div>
                    <div class="clearfix"></div>
                    <form action="#" class="form--action mt-4 mb-3">
                        <div class="product-action flex-row align-items-center">
                            <div class="quantity me-3">
                                <input type="number" class="quantity-input" name="qty" id="qty"
                                       min="1"/>
                                <div class="dec qtybutton">-</div>
                                <div class="inc qtybutton">+</div>
                            </div>

                            <a href="/defaulthoteldetails"
                               class="add-to-cart bg-dark text-white fw-700 ps-lg-5 pe-lg-5 text-uppercase font-xssss float-left border-dark border rounded-3 border-size-md d-inline-block mt-0 p-3 text-center ls-3">Add
                                to cart</a>
                            <a href="/defaulthoteldetails"
                               class="btn-round-xl alert-dark text-white d-inline-block mt-0 ms-4 float-left"><i
                                    class="ti-heart font-sm"></i></a>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <ul class="product-feature-list mt-5">
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left"><b
                                class="text-grey-900"> Category : </b>Furniture
                        </li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left">Straight fit
                        </li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left"><b
                                class="text-grey-900">SKU : </b> REF. LA-107
                        </li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left">Dry clean</li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left"><b
                                class="text-grey-900">Tags : </b>Design, Toys
                        </li>
                        <li class="w-50 lh-32 font-xsss text-grey-500 fw-500 float-left">Cutton shirt
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
