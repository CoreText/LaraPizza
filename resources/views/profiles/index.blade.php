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
                            and <strong>{{ $user->ingredients->count() }}</strong> ingredients
                        </div>

                        <a class="btn btn-lg btn-primary" href="/pizzas/create">Add New Pizza</a>
                        <a class="btn btn-lg btn-secondary" href="/ingredients/create">Add New Ingredient</a>
                    </div>
                </div>
            @endcan
        </div>
    </div>

    <h2 class="pt-4">Pizzas</h2>
    <div class="row pt-4 card-list">
        @if($user->pizzas->count())
            @foreach($user->pizzas as $pizza)
                <article class="col col-sm-4 p-0 mt-4">
                    <div class="card card-item">
                        <a href="/pizzas/{{ $pizza->id }}">
                            <img class="card-img-top" alt=""
                                 src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg">
                        </a>
                        <div class="card-body">
                            <h3 class="card-title">{{ $pizza->name }}</h3>

                            <p class="card-text">
                                <strong>
                                @if($pizza->total_price === "0.00")
                                    No ingredient found. <a class="btn-link" href="/ingredients/create">Create some</a>
                                @else
                                    Price: <span class="special-price">{{ $pizza->total_price }}</span> (EUR)
                                @endif
                                </strong>


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

                            <div class="card-footer special-card-footer">
                                <a class="btn btn-sm btn-primary mr-auto" href="#">Bake The Pizza!</a>

                                @can('update', $user->profile)
                                    <a class="btn btn-sm btn-secondary" href="/pizzas/{{ $pizza->id }}/edit">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="/pizzas/{{ $pizza->id }}/delete">Delete</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        @else
            <h3>No Pizzas Found.</h3>
        @endif
    </div>

    <hr class="mt-5 mb-3">
    <h2 class="pt-4">Ingredients</h2>
    <div class="row pt-4">

        @if($user->ingredients->count())
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        @can('update', $user->profile)
                            <th scope="col">Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->name }}</td>
                        <td>{{ $ingredient->price }}</td>
                        @can('update', $user->profile)
                            <td>
                                <a class="btn btn-sm btn-secondary" href="/ingredients/{{ $ingredient->id }}/edit">Edit</a>
                                <a class="btn btn-sm btn-danger" href="/ingredients/{{ $ingredient->id }}/delete">Delete</a>
                            </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3>No Custom Ingredients Found.</h3>
        @endif
    </div>

    <hr class="mt-5 mb-3">
    <h2 class="pt-4">Users</h2>
    <div class="row pt-4">
        <ul class="list-group">
            @foreach($users as $u)
                <li class="list-group-item @if($u->id === $user->id) disabled current-user @endif" @if($u->id === $user->id)  aria-disabled="true" @endif >
                    <a href="/profiles/{{ $u->id }}">{{ $u->profile->username ?? $u->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
@endsection
