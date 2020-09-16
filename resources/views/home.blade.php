@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mt-4 mb-2">catalog by {{ $user->profile->username ?? $user->name }}</h1>

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

                        <a class="btn btn-lg btn-primary" href="/pizza/create">Add New Pizza</a>
                        <a class="btn btn-lg btn-secondary " href="#">Add New Ingredient</a>
                    </div>
                </div>
            @endcan
        </div>
    </div>

    <div class="row pt-4 card-list">
        @foreach($user->pizzas as $pizza)
            <article class="col col-sm-4 p-0 mt-4">
                <div class="card card-item">
                    <a href="/pizza/{{ $pizza->id }}">
                        <img class="card-img-top" alt=""
                             src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg">
                    </a>
                    <div class="card-body">
                        <h3 class="card-title">{{ $pizza->name }}</h3>
                        <p class="card-text">Lorem ipsum dolor: {{ $pizza->price }}</p>
                        <div class="card-footer special-card-footer">
                            <a class="btn btn-sm btn-primary mr-auto" href="#">Bake The Pizza!</a>

                            @can('update', $user->profile)
                                <a class="btn btn-sm btn-secondary" href="/pizza/{{ $pizza->id }}/edit">Update</a>
                                <a class="btn btn-sm btn-danger" href="/pizza/{{ $pizza->id }}/delete">Delete</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>
@endsection
