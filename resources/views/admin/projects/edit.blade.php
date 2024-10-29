@extends('layouts.app')

@section('page-title', 'Modifica' .$project->name)

@section('main-content')
<h1>
    Modifica {{ $project->name }}
</h1>

<form onsubmit="return confirm('Sei sicuro di voler modificare il progetto?')" action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
    @csrf
    @method ('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required maxlength="64" placeholder="Inserisci il nome del progetto..." value="{{ old('name', $project->name) }}">

        @if($errors->has('name'))
            <div class="alert alert-danger mt-1">

                <ul class="mb-0">
                    @foreach($errors->get('name') as $key => $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="creation_date" class="form-label">Data creazione <span class="text-danger">*</span></label>
        <input type="date" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date" name="creation_date" required  placeholder="Inserisci data creazione..." value="{{ old('sale_date',$project->creation_date) }}">

        @if($errors->has('creation_date'))
            <div class="alert alert-danger mt-1">

                <ul class="mb-0">
                    @foreach($errors->get('creation_date') as $key => $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control  @error('content') is-invalid @enderror" id="content" name="content" rows="3" required maxlength="4096" placeholder="Inserisci il contenuto..." >{{ old('content',$project->content) }}</textarea>

        @if($errors->has('content'))
            <div class="alert alert-danger mt-1">

                <ul class="mb-0">
                    @foreach($errors->get('content') as $key => $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>



    <div class="mb-3">
        <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" rows="3" required maxlength="4096" placeholder="Inserisci una descrizione..." >{{ old('description',$project->description) }}</textarea>

        @if($errors->has('description'))
        <div class="alert alert-danger mt-1">

            <ul class="mb-0">
                @foreach($errors->get('description') as $key => $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>


    <div class="mb-3">
        <label for="type_id" class="form-label">Tipo</label>
        <select id="type_id" name="type_id" class="form-select">
            <option
                @if (old('type_id', $project->type_id) == null)
                    selected
                @endif
                value="">Seleziona un tipo...</option>
            @foreach ($types as $type)
                <option
                    @if (old('type_id', $project->type_id) == $type->id)
                        selected
                    @endif
                    value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">

        <div class="form-check">

            <input class="form-check-input" type="checkbox" value="1" id="published" name="published"

                @if (old('published',$project->published) !== null)

                    checked

                @endif
            >

            <label for="type" class="form-label">Pubblicato</label>


        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-warning w-100">
            + Modifica
        </button>
    </div>

</form>
@endsection
