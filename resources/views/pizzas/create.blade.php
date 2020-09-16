@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Pizza</div>

                    <div class="card-body">
                        <form method="POST" action="/pizza">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Initial Price</label>
                                <div class="col-md-6">
                                    <input id="price" type="number" min="0" step="any"
                                           class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ old('price') ?? 0 }}" autocomplete="price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Ingredients to include</label>
                                @if($ingredients->count())
                                    <select class="selectpicker" multiple data-live-search="true" name="ingredients[]">
                                        @foreach($ingredients as $ingredient)
                                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }} ({{ $ingredient->price }} EUR)</option>
                                        @endforeach
                                    </select>

                                @else
                                    No ingredients to include.
                                    <a class="" href="/ingredient/create">&nbsp;Create new ingredient</a>
                                @endif

                                @error('ingredients')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mt-4 mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        Create New Pizza
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
