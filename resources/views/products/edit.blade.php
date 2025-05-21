@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Product
                    </div>
                    <div class="float-end">
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" onsubmit="return confirmEditProd()" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="mb-3 row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $product->code }}">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="image" class="col-md-4 col-form-label text-md-end text-start">Product Image</label>
                            <div class="col-md-6">
                                <div id="image-preview-wrapper" style="{{ $product->image ? '' : 'display: none;' }}">
                                    <div style="position: relative; display: inline-block;">
                                        <button type="button" id="remove-image-btn" style="position: absolute; top: -10px; left: -10px; background-color: red; color: white; border: none; border-radius: 50%; width: 25px; height: 25px;">&times;</button>
                                        <img src="{{ $product->image ? asset('storage/' . $product->image) : '' }}" id="image-preview" alt="Product Image" style="max-width: 150px;">
                                    </div>
                                </div>

                                <div id="image-input-wrapper" style="{{ $product->image ? 'display: none;' : '' }}">
                                    <input type="file" name="image" id="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const removeBtn = document.getElementById('remove-image-btn');
                const previewWrapper = document.getElementById('image-preview-wrapper');
                const inputWrapper = document.getElementById('image-input-wrapper');

                if (removeBtn) {
                    removeBtn.addEventListener('click', function () {
                        previewWrapper.style.display = 'none';
                        inputWrapper.style.display = 'block';
                    });
                }
            });

         function confirmEditProd() {
                 return confirm('Are you sure you want to edit this product?');
        }
        </script>
    @endpush
@endsection