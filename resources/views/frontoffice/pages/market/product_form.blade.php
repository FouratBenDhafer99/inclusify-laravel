@extends('frontoffice.base')
@section('page_title', $product->name ?? 'Product')
@section('content')
    <div>
        <div className="middle-sidebar-bottom">
            <div className="middle-sidebar-left pe-0">
                <div className="row">
                    <div className="col-xl-12 cart-wrapper mb-4">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="page-title">
                                    <h4 class="mont-font fw-600 font-md mb-lg-5 mb-4">
                                        @if ($product)
                                            Update
                                        @else
                                            Add
                                        @endif
                                        Product
                                    </h4>
                                    <form method="post"
                                        @if ($product) action="{{ route('product.update', $product->id) }}"
                    @else
                        action="{{ url('/products/add') }}" @endif>
                                        <div class="row">
                                            @csrf
                                            @if ($product)
                                                @method('put')
                                            @else
                                                @method('post')
                                            @endif
                                            @include('backoffice.alerts.success')
                                            <div class="col-lg-12 mb-3">
                                                <div class="form-gorup{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <label class="mont-font fw-600 font-xssss">
                                                        {{ __('Name') }}
                                                    </label>
                                                    <input type="text" name="name"
                                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ __('Name') }}"
                                                        value="{{ old('name', $product?->name) }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <div
                                                    class="form-gorup{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                    <label class="mont-font fw-600 font-xssss">
                                                        {{ __('Description') }}</label>
                                                    <textarea type="text" name="description" placeholder="{{ __('Description') }}"
                                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />{{ old('description', $product?->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup{{ $errors->has('price') ? ' has-danger' : '' }}">
                                                    <label class="mont-font fw-600 font-xssss">{{ __('Price') }}</label>
                                                    <input type="number" name="price" placeholder="{{ __('Price') }}"
                                                        min=0.01
                                                        class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                        value="{{ old('price', $product?->price) }}" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup{{ $errors->has('quantity') ? ' has-danger' : '' }}">
                                                    <label class="mont-font fw-600 font-xssss">{{ __('Quantity') }}</label>
                                                    <input type="number" name="quantity"
                                                        placeholder="{{ __('Quantity') }}" min=1
                                                        class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                                        value="{{ old('quantity', $product?->quantity) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <div
                                                    class="form-gorup{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                                    <label class="mont-font fw-600 font-xssss">{{ __('Category') }}</label>
                                                    <select name="category_id"
                                                        class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                                        {{-- <option value="" disabled selected>Select a category</option> --}}
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div class="form-gorup{{ $errors->has('image') ? ' has-danger' : '' }}">
                                                    <label class="mont-font fw-600 font-xssss">{{ __('Image') }}</label>
                                                    <input type="file" accept="image/*"" name="image"
                                                        class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" />
                                                </div>
                                            </div>
                                            <div class="card shadow-none border-0">
                                                <button type="submit"
                                                    class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-3 text-uppercase fw-600 ls-3">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
