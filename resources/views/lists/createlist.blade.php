@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="col-md-8">
            <div class="card-body">
                <form method="POST" action="{{ route('create-list') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-white" for="listname">Nombre de la Lista</label>
                            <input type="text" class="form-control {{ $errors->has('listname') ? ' is-invalid' : '' }}" id="listname" name="listname" value="{{ old('listname') }}" required>
                            @if ($errors->has('listname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('listname') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="genero" class="text-white">{{ __('Genero') }}</label>
                            <select class="form-control {{ $errors->has('genre') ? ' is-invalid' : '' }}" id='genre' name="genre">
                                @foreach($generos as $genero)
                                <option>{{$genero->genre}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('genre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('genre') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            <div class="form-row ml-4">
                                <label class="text-white" for="visibility">Lista Pública</label>
                            </div>
                            <div class="form-row ml-4">
                                <label class="switch ">
                                    <input type="checkbox" class="primary" id="visibility" name="visibility">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-white" for="description">Descripcion (Opcional)</label>
                        <textarea class="form-control" rows="2" id="description" name="description{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="formgroup">
                        <div class="additemsdiv scrollbar-primary">
                            <div class="mr-2">
                                <div id="songscontainer">
                                    <div class="form-row {{ $errors->has('song0') ? ' is-danger' : '' }}">
                                        <div class="form-group col-md-4">
                                            <label class="text-white" for="songname">Nombre de Cancion</label>
                                            <input type="text" class="form-control" id="songname" value="{{ old('songs[song0][song]') }}" name="songs[song0][song]" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="text-white" for="artist">Artista</label>
                                            <input type="text" class="form-control" id="artist" value="{{ old('songs[song0][artist]') }}" name="songs[song0][artist]" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="text-white" for="album">Album</label>
                                            <input type="text" class="form-control" id="album" value="{{ old('songs[song0][album]') }}" name="songs[song0][album]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="button" onclick="agregarCancion()">Agregar Cancion</button>
                                </div>
                            </div>
                        </div>

                        @if ($errors->has('repeatsong'))
                        <div class="mb-4">
                            <span style="color: #dc3545;" role="alert">
                                <strong>{{ $errors->first('repeatsong') }}</strong>
                            </span>
                        </div>
                        @endif


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear Lista</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/crearlista.js') }}"></script>
</section>
@endsection