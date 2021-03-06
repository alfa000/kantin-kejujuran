@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1 class="display-5 font-weight-bold">Welcome to Kantin Kejujuran</h1>
    <p class="lead">SD SEA Sentosa</p>
</div>

<div class="container mb-5">
    <h2>Items</h2>

    <div class="row mb-2">
        <div class="col-md-5">
            Order By:
            <select name="sort" id="sort" class="form-control">
                <option value="dca" {{ request()->sort == 'dca' ? 'selected' : '' }}>Date Created (Ascending)</option>
                <option value="dcd" {{ request()->sort == 'dcd' ? 'selected' : '' }}>Date Created (Descending)</option>
                <option value="pna" {{ request()->sort == 'pna' ? 'selected' : '' }}>Product Name (Ascending)</option>
                <option value="pnd" {{ request()->sort == 'pnd' ? 'selected' : '' }}>Product Name (Descending)</option>
            </select>
        </div>
    </div>

    <div class="row align-items-center" style="min-height: calc(100vh - 533px)">
        @forelse ($items as $item)
        <div class="col-md-4">

            <div class="card">
                <img src="{{ asset('storage/'.$item->img) }}" class="card-img-top" onerror="this.onerror=null;this.src='{{ asset('assets/img/food.png') }}';">
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
        <div class="col-md-12">
            <p class="text-center">No items</p>
        </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#sort').change(function () {
            location = '{{ route('home') }}?'+'sort='+$(this).val()
        });
    });

</script>
@endpush
