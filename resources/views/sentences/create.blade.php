@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Création d'une sentence</div>
                <div class="card-body">
                    <form action="{{ route('sentences.store') }}" method="post">
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Auteur</label>
                            <div class="col-sm-10">
                                <input type="text" name="author" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" id="author" value="{{ old('author') }}"/>
                                @if($errors->has('author'))
                                    <div class="invalid-feedback">{{ $errors->first('author') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exposed_at" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="exposed_at" class="form-control {{ $errors->has('exposed_at') ? 'is-invalid' : '' }}" id="exposed_at" value="{{ old('exposed_at') }}"/>
                                @if($errors->has('exposed_at'))
                                    <div class="invalid-feedback">{{ $errors->first('exposed_at') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Contenu</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('content'))
                                    <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-2">
                                <button class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
