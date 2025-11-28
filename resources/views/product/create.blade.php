@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-back"></i> Back
                </a>
            </div>
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Image</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="file"
                                            name="image"
                                            class="form-control @error('image') is-invalid @enderror"
                                            id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04"
                                            aria-label="Upload"
                                            accept="image/*"
                                        />
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-package"></i></span>
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="basic-icon-default-fullname"
                                            placeholder="Please enter product name"
                                            aria-label="Please enter product name"
                                            aria-describedby="basic-icon-default-fullname2"
                                            value="{{ old('name') }}"
                                        />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"
                                       for="basic-icon-default-fullname">Category</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-package"></i></span>
                                        <select name="category_id" id="category_id" class="form-select" required>
                                            <option value="">-- Choose Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-message">Description</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-message2" class="input-group-text"><i
                                                class="bx bx-comment-detail"></i></span>
                                        <textarea
                                            name="description"
                                            id="basic-icon-default-message"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Please enter product description"
                                            aria-label="Please enter product description"
                                            aria-describedby="basic-icon-default-message2"
                                        >{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Price</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-dollar-circle"></i></span>
                                        <input
                                            type="text"
                                            name="price"
                                            id="basic-icon-default-phone"
                                            class="form-control phone-mask @error('price') is-invalid @enderror"
                                            placeholder="Rp 0"
                                            aria-label="Price"
                                            aria-describedby="basic-icon-default-phone2"
                                            value="{{ old('price') }}"
                                        />
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Quantity</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                class="bx bx-package"></i></span>
                                        <input
                                            type="text"
                                            name="quantity"
                                            id="basic-icon-default-phone"
                                            class="form-control phone-mask @error('quantity') is-invalid @enderror"
                                            placeholder="10"
                                            aria-label="10"
                                            aria-describedby="basic-icon-default-phone2"
                                            value="{{ old('quantity') }}"
                                        />
                                        @error('quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
