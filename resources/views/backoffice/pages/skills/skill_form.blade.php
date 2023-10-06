@extends('backoffice.pages.skills.index')
@section('skills')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">
                        @if($skill)
                            Update
                        @else
                            Add
                        @endif
                        Skill
                    </h5>
                </div>
                <form
                    method="post"
                    @if($skill)
                        action="{{ route('admin.skill.update', $skill->id) }}"
                    @else
                        action="{{ route('admin.skill.add') }}"
                    @endif
                >
                    <div class="card-body">
                        @csrf
                        @if(isset($skill))
                            @method('put')
                        @else
                            @method('post')
                        @endif

                        @include('backoffice.alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Name') }}"
                                   @if($skill)
                                       value="{{ old('name', $skill->name) }}"
                                   @else
                                       value="{{ old('name') }}"
                                   @endif

                            >
                            @include('backoffice.alerts.feedback', ['field' => 'name'])
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
