@extends('backoffice.pages.questions.index')
@section('questions')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">
                        @if($question)
                            Update
                        @else
                            Add
                        @endif
                        Question
                        {{$question}}
                    </h5>
                </div>
                <form
                    method="post"
                    @if($question)
                        action="{{ route('admin.question.update', $question->id) }}"
                    @else
                        action="{{ route('admin.question.add') }}"
                    @endif
                >
                    <div class="card-body">
                        @csrf
                        @if(isset($question))
                            @method('put')
                        @else
                            @method('post')
                        @endif

                        @include('backoffice.alerts.success')

                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <textarea name="description"
                                      class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                      placeholder="{{ __('Description') }}"
                            >{{ old('description', $question?->description) }}</textarea>
                            @include('backoffice.alerts.feedback', ['field' => 'description'])
                        </div>

                        <div class="form-group">
                            <label>{{ __('Skill') }}</label>
                            <select name="skill"
                                    class="form-control{{ $errors->has('skill') ? ' is-invalid' : '' }}">
                                @foreach($skills as $skill)
                                    <option class="bg-dark"
                                            value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="answers">Answers</label>
                            <div class="my-form-group ml-3">
                            @for($i = 0; $i < 6; $i++)
                                <div class="row">
                                    <input type="text" class="col form-control mb-1 {{ $errors->has('answers') ? ' is-invalid' : '' }}
                                {{ $errors->has('answers.'.$i) ? ' is-invalid' : '' }}"
                                           name="answers[{{$i}}]"
                                           value="{{ old('answers.'.$i, $question->answers[$i]->text??'') }}"
                                           placeholder="Answer N° {{$i+1}}">
                                    <input type="checkbox" class="col-sm-2 form-control" title="Is a correct answer"
                                           name="isCorrect[{{$i}}]"
                                        @checked(old('isCorrect.'.$i, $question?->answers[$i]?->isCorrect??''))>
                                </div>
                            @endfor
                                @include('backoffice.alerts.feedback', ['field' => 'answers'])
                                @include('backoffice.alerts.feedback', ['field' => 'answers.*'])
                                @include('backoffice.alerts.feedback', ['field' => 'isCorrect'])
                            </div>
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
