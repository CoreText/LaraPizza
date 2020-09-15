@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Hello, {{ $user->profile->username ?? $user->name }}!</h1>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4">{{ __('You are logged in!') }}</div>

                    <a class="btn btn-secondary btn-block" href="#">Create New Ingredient</a>
                    <a class="btn btn-lg btn-primary btn-block" href="#">Create New Pizza</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-4 card-list">
        <article class="col col-sm-4 p-0 mt-4">
            <div class="card card-item">
                <img class="card-img-top" src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title">MacDac Pizza</h3>
                    <p class="card-text">Lorem ipsum dolor.</p>
                    <a class="btn btn-primary" href="#">Bake The Pizza!</a>
                </div>
            </div>
        </article>

        <article class="col col-sm-4 p-0 mt-4">
            <div class="card card-item">
                <img class="card-img-top" src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title">Margaret</h3>
                    <p class="card-text">Lorem ipsum dolor.</p>
                    <a class="btn btn-primary" href="#">Bake The Pizza!</a>
                </div>
            </div>
        </article>

        <article class="col col-sm-4 p-0 mt-4">
            <div class="card card-item">
                <img class="card-img-top" src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title">4 Seasons</h3>
                    <p class="card-text">Lorem ipsum dolor.</p>
                    <a class="btn btn-primary" href="#">Bake The Pizza!</a>
                </div>
            </div>
        </article>

        <article class="col col-sm-4 p-0 mt-4">
            <div class="card card-item">
                <img class="card-img-top" src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title">Fantasy</h3>
                    <p class="card-text">Lorem ipsum dolor.</p>
                    <a class="btn btn-primary" href="#">Bake The Pizza!</a>
                </div>
            </div>
        </article>

        <article class="col col-sm-4 p-0 mt-4">
            <div class="card card-item">
                <img class="card-img-top" src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title">Pizza al Pesto</h3>
                    <p class="card-text">Lorem ipsum dolor.</p>
                    <a class="btn btn-primary" href="#">Bake The Pizza!</a>
                </div>
            </div>
        </article>

        <article class="col col-sm-4 p-0 mt-4">
            <div class="card card-item">
                <img class="card-img-top" src="https://doncarlone.com.br/site/wp-content/uploads/2017/06/dia-da-pizza.jpg" alt="">
                <div class="card-body">
                    <h3 class="card-title">Pepperoni</h3>
                    <p class="card-text">Lorem ipsum dolor.</p>
                    <a class="btn btn-primary" href="#">Bake The Pizza!</a>
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
