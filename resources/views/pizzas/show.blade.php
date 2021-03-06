@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1 class="mt-4 mb-2">
                    {{ $pizza->name }}
                    <small>({{ $pizza->updated_at->format('d/m/Y H:i:s') }})</small>
                </h1>

                <div class="card mt-4">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-4 alert alert-success" role="alert">
                            {{ __('You are logged in!') }} as
                            <a class="btn-link" href="/profiles/{{ $user->id }}">
                                <strong>{{ $user->profile->username ?? $user->name }}</strong>
                            </a>
                        </div>
                        <div class="mb-4">
                            You have <strong>{{ $user->pizzas->count() }}</strong> pizzas created
                            and <strong>{{ $user->ingredients->count() }}</strong> ingredients
                        </div>

                        <a class="btn btn-lg btn-primary" href="/pizzas/create">Add New Pizza</a>
                        <a class="btn btn-lg btn-secondary" href="/ingredients/create">Add New Ingredient</a>
                    </div>
                </div>

            </div>
        </div>

        <article class="mt-4">
            <header>
                <h1>{{ $pizza->name }}</h1>
            </header>

            <p>
            <strong>
                @if($pizza->total_price === "0.00")
                    No ingredient found. <a class="btn-link" href="/ingredients/create">Create some</a>
                @else
                    Price: <span class="special-price">{{ $pizza->total_price }}</span> (EUR)
                @endif
            </strong>

            <p>Ingredients:</p>
            @if(is_null($pizza->name))
                <div>Without ingredients.</div>
            @else
                <ol class="list-group special-list">
                    @foreach(json_decode($pizza->ingredients) as $ingredient)
                        <li class="">{{ $ingredient->name }}</li>
                    @endforeach
                </ol>
            @endif
            </p>

            <footer class="special-card-footer">
                <a class="btn btn-lg btn-primary mr-auto" href="#">Bake The Pizza!</a>
                {{--
                @can('update', $user->profile)
                    <a class="btn btn-lg btn-secondary" href="/pizzas/{{ $pizza->id }}/edit">Edit</a>
                    <a class="btn btn-lg btn-danger" href="/pizzas/{{ $pizza->id }}/delete">Delete</a>
                @endcan
                --}}
            </footer>
        </article>
    </div>
@endsection
