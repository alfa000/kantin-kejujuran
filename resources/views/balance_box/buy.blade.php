@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Buy Item</h2>


    <div class="card">
        <img src="{{ asset('storage/'.$item->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">{{ $item->name }}</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title">{{ $item->price }}</h5>
                </div>
            </div>
          <p class="card-text">{{ $item->created_at }}</p>
          <p class="card-text">{{ $item->desc }}</p>
        </div>
    </div>

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
@endsection
