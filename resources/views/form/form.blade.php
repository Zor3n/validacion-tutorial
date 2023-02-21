<x-app-layout>
    <form method="POST" action="{{ route('form.store') }}">
        <div class="d-flex justify-content-center mb-3">
            <h3>Form Validation</h3>
        </div>
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-sm-5">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-sm-5">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category" class="form-select @error('category') is-invalid @enderror"
                    aria-label="Default select example">
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option selected>No categories</option>
                    @endforelse
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-sm-5">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-sm-5">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock"
                    name="stock" value="{{ old('stock') }}">
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-sm-5">
                <label for="expire" class="form-label">Expire</label>
                <input type="date" class="form-control @error('expire') is-invalid @enderror" id="expire"
                    name="expire" value="{{ old('expire') }}">
                @error('expire')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="row mb-3 d-flex justify-content-center">
            <div class="col-sm-5">
                <label for="details" class="form-label">Details</label>
                <textarea class="form-control @error('details') is-invalid @enderror" id="details" name="details" rows="3">{{ old('details') }}</textarea>
                @error('details')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-sm-5">
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            @csrf
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</x-app-layout>
