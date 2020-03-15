@extends('layouts.default')


@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Product</strong>
            <small>{{ $item->name }}</small>
        </div>

        <div class="card-body">
            <form action="{{ route('products.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Product</label>
                    <input type="text" name="name" value="{{old('name') ? old('name') : $item->name}}" class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-label">type Product</label>
                    <input type="text" name="type" value="{{old('type') ? old('type') : $item->type}}" class="form-control @error('type') is-invalid @enderror">
                    @error('type') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi Product</label>
                    <textarea name="description" class="ckeditor form-control @error('description') is-invalid @enderror" >{{old('description') ? old('description') : $item->description}}</textarea>
                    @error('description') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="form-control-label">price Product</label>
                    <input type="number" name="price" value="{{old('price') ? old('price') : $item->price}}" class="form-control @error('price') is-invalid @enderror">
                    @error('price') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="qty" class="form-control-label">qty Product</label>
                    <input type="number" name="qty" value="{{old('qty') ? old('qty') : $item->qty}}" class="form-control @error('qty') is-invalid @enderror">
                    @error('qty') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Edit Product</button>
                </div>
            
            </form>
        </div>

    </div>

@endsection