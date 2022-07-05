@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 203px)">
        <div class="col-md-12">
            <h2>Withdraw</h2>

            <form action="{{ route('withdraw.store') }}" method="post" enctype="multipart/form-data">
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

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="5000">
                </div>

                <div class="form-group text-right">
                    <button type="submit" name="save" class="btn btn-primary">Withdraw</button>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection
