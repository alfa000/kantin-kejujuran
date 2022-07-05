@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Add Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Dounat Vanila">
        </div>

        <div class="form-group">
          <label for="img">img</label>
          <input type="file" class="form-control" id="img" name="img" accept="image/*">
        </div>

        <div class="form-group">
          <label for="desc">Description</label>
          <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="5000">
        </div>

        <div class="form-group text-right">
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </div>
      </form>
</div>
@endsection
