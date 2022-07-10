@extends('layouts.app')

@section('content')
<div class="container my-5" style="min-height: calc(100vh - 203px)">
    <h2>Buy Item</h2>

    <div class="row">
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
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form action="{{ route('buy.store') }}" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf

                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <div class="form-group">
                    <label for="amount">Amount Pay</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="5000">
                </div>

                <div class="form-group text-right">
                    <button type="submit" name="save" class="btn btn-primary">Buy</button>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection
