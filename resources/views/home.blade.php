@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-5 font-weight-bold">Welcome to Kantin Kejujuran</h1>
    <p class="lead">SD SEA Sentosa</p>
</div>

<div class="container mb-5">
    <h2>Items</h2>
    <div class="row">
        @forelse ($items as $item)
        <div class="col-md-4">

            <div class="card">
                <img src="{{ asset('storage/'.$item->img) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">{{ $item->name }}</h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5 class="card-title">Rp. {{ number_format($item->price, '0', ',', '.') }}</h5>
                        </div>
                    </div>
                    <div class="row align-items-center mb-2">
                        <div class="col-md-6">
                            <p class="card-text">
                              <small>Created At</small> <br>
                              {{ date_format($item->created_at, 'd/M/Y') }}
                            </p>
                        </div>
                    </div>
                    <p class="card-text">{{ $item->desc }}</p>
                    @auth
                    <div class="text-right">
                      <a href="{{ route('buy', ['id' => $item->id]) }}" class="btn btn-primary">Buy</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        @empty
            <p>No items</p>
        @endforelse
    </div>
</div>
@endsection
