@extends('layouts.app')
@section('content')
<div class="jumbotron text-center my-4">
    <h1>Edit {{ $librarySection->name }}'s Section</h1>
    <p><b>Library:</b> {{$librarySection->library->name}}</p>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $librarySection->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ $librarySection->name }}"
                                    required autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="library_id" class="col-md-4 col-form-label text-md-right">{{ __('Choose Library') }}</label>
                            <div class="col-md-6">
                                <select name="library_id" id="library_id" class="form-control">
                                    <option value="NULL">Select Library</option>
                                    @foreach($libraries as $library)
                                        {{-- @if($library->id == )
                                        @endif --}}
                                        <option value="{{$library->id}}" {{$library->id == $librarySection->library->id ? 'selected' : ''}}> {{$library->name}} </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('library_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('library_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary px-5">
                                    {{ __('Update') }}
                                </button>
                                <button type="submit" class="btn btn-danger px-5" id="delete_library">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{route('categories.destroy', $librarySection->id)}}" id="delete_library_form">
                        @csrf @method('DELETE')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
