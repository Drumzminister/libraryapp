@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book to ') }} {{$librarySection->name}} Section</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <img src="{{asset('img/book.jpg')}}" alt="selected Image" id="target" class="img-fluid add-book border border-primary{{ $errors->has('book_avatar') ? ' is-invalid' : '' }} form-control">
                            @if ($errors->has('book_avatar'))
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $errors->first('book_avatar') }}</strong>
                            </span> @endif
                            <a href="" class="img-select bg-primary text-white" id="img-select">
                                <i class="fa fa-camera"></i>
                            </a>

                        </div>
                        <div class="col-md-8 col-12">
                            <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mt-4">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                            required autofocus placeholder="Book Name"> @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"
                                            value="{{ old('description') }}" required placeholder="Book Description"> </textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <p>Tags</p>
                                        @foreach($tags as $key => $tag)
                                            <div class="form-check form-check-inline border border-secondary text-secondary rounded px-3 py-2">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$key}}" name="tags[]" value="{{$tag->id}}">
                                                <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$tag->name}}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="book_avatar" id="book_avatar">
                                </div>
                                <div class="form-group">
                                    <input type="hidden"  name="library_section_id" value="{{$librarySection->id}}">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mx-auto">
                                        <button type="submit" class="btn btn-primary form-control">
                                            {{ __('Add Book') }}
                                        </button>
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
@endsection
