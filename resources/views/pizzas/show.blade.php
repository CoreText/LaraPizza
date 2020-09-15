@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mt-4 mb-2">pizza by
                    <a class="btn btn-lg btn-link special-link-lg" href="/profile/{{ $user->id }}">
                        {{ $user->profile->username ?? $user->name }}
                    </a>
                    <small>({{ $pizza->updated_at->format('d/m/Y H:i:s') }})</small>
                </h1>


                @can('update', $user->profile)
                    <div class="card mt-4">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="mb-4 alert alert-success" role="alert">
                                {{ __('You are logged in!') }}
                            </div>
                            <div class="mb-4">
                                You have <strong>{{ $user->pizzas->count() }}</strong> pizzas created
                                and ... ingredients
                            </div>

                            <a class="btn btn-lg btn-secondary btn-block" href="#">Add New Ingredient</a>
                            <a class="btn btn-lg btn-primary btn-block" href="/pizza/create">Add New Pizza</a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>

        <article class="mt-4">
            <header>
                <h1>{{ $pizza->name }}</h1>
            </header>

            <p>Lorem ipsum dolor sit: {{ $pizza->price }}</p>

            <footer class="special-card-footer">
                <a class="btn btn-lg btn-primary mr-auto" href="#">Bake The Pizza!</a>
                @can('update', $user->profile)
                    <a class="btn btn-lg btn-secondary" href="/pizza/{{ $pizza->id }}/edit">Update</a>
                    <a class="btn btn-lg btn-danger" href="/pizza/{{ $pizza->id }}/delete">Delete</a>
                @endcan
            </footer>
        </article>
    </div>
@endsection
