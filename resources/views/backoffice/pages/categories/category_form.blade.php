@extends('backoffice.pages.categories.index')
@section('categories')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">
                        @if ($category)
                            Update
                        @else
                            Add
                        @endif
                        Category
                    </h5>
                </div>
                <form method="post"
                    @if ($category) action="{{ route('admin.category.update', $category->id) }}"
                    @else
                        action="{{ route('admin.category.add') }}" @endif>
                    <div class="card-body">
                        @csrf
                        @if ($category)
                            @method('put')
                        @else
                            @method('post')
                        @endif

                        @include('backoffice.alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', $category?->name) }}">
                            @include('backoffice.alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <input type="text" name="description"
                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Description') }}"
                                value="{{ old('description', $category?->description) }}">
                            @include('backoffice.alerts.feedback', ['field' => 'description'])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
