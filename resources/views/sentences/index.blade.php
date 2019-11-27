@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Sentences
                </div>
                <div class="card-body">
                    <a href="{{ route('sentences.create') }}" class="btn btn-primary btn-block mb-2">Créer une sentence</a>
                    @foreach($sentences as $sentence)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="card-text">
                                    {{ $sentence->content }}<br/>
                                    <span class="text-muted">Le {{ $sentence->exposed_at->format('d/m/Y') }} par {{ $sentence->author }}</span>
                                </div>
                                <a href="{{ route('sentences.edit', $sentence) }}" class="card-link">
                                    @lang('Modifier')
                                </a>

                                <a href="{{ route('sentences.destroy', $sentence) }}"
                                   class="card-link text-danger"
                                   onclick="event.preventDefault();
                                                     document.getElementById('destroy-sentence-{{ $sentence->id }}').submit();">
                                    @lang('Supprimer')
                                </a>

                                <form id="destroy-sentence-{{ $sentence->id }}" action="{{ route('sentences.destroy', $sentence) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
