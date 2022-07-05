@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>My Item</h2>

    <a href="{{ route('item.create') }}" class="btn btn-primary">+ Add Item</a>

    <div class="row mt-4">
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
                        <div class="col-md-6">
                            <p class="card-text text-right">
                              {!! $item->sold ? '<span class="badge-warning px-2 rounded">Sold</span>' : '<span class="badge-success px-2 rounded">Available</span>' !!}
                            </p>
                        </div>
                    </div>
                    <p class="card-text">{{ $item->desc }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12 m-2">
            <p class="text-center">No items</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
