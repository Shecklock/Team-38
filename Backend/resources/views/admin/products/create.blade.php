@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Products</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route("products.index") }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ProductName:</strong>
                <input type="text" name="ProductName" class="form-control" placeholder="ProductName">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="Description" class="form-control" placeholder="Description">
            </div>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="text" name="Price" class="form-control" placeholder="Price">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="CategoryID" class="form-control">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                    @endforeach
                </select>
            </div>
        </div>
                
        <div class="form-group">
                <strong>Product Type:</strong>
                <select id="productType" class="form-control">
                <option value="cloth">Cloth</option>
                <option value="shoes">Shoes</option>
                <option value="bag">Bag</option>
                </select>
        </div>
                
                <div class="form-group" id="sizeAndQuantityContainer"></div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const productTypeSelect = document.getElementById('productType');
    const sizeAndQuantityContainer = document.getElementById('sizeAndQuantityContainer');

    // Mapping of size IDs to size names
    const sizeNames = {
        1: 'XXS',
        2: 'XS',
        3: 'S',
        4: 'M',
        5: 'L',
        6: 'XL',
        7: 'XXL',
        8: '3',
        9: '3.5',
        10: '4',
        11: '4.5',
        12: '5',
        13: '5.5',
        14: '6',
        15: '6.5',
        16: '7',
        17: '7.5',
        18: '8',
        19: '8.5',
        20: '9',
        21: '9.5',
        22: '10',
        23: '10.5',
        24: '11',
        25: '11.5',
        26: '12',
        27: '12.5',
        28: '13',
        29: 'one sized',
    };

    function updateSizeOptions(productType) {
        sizeAndQuantityContainer.innerHTML = ''; // Clear previous options

        if (productType === 'cloth') {
            for (let i = 1; i <= 7; i++) {
                sizeAndQuantityContainer.innerHTML += getSizeQuantityHtml(sizeNames[i], i);
            }
        } else if (productType === 'shoes') {
            // Assuming you want to display numeric sizes for shoes
            for (let i = 8; i <= 28; i++) {
                sizeAndQuantityContainer.innerHTML += getSizeQuantityHtml(sizeNames[i], i)
            }
        } else if (productType === 'bag') {
            // 'one size' for bags
            sizeAndQuantityContainer.innerHTML += getSizeQuantityHtml('One Size', 29);
        }
    }

    function getSizeQuantityHtml(size, sizeId = size) {
        return `
            <div class="size-quantity">
                <label>${size}:</label>
                <input type="number" name="quantities[${sizeId}]" placeholder="Quantity" min="0" class="form-control">
            </div>
        `;
    }

    // Update size options when the product type changes
    productTypeSelect.addEventListener('change', function() {
        updateSizeOptions(this.value);
    });

    // Initialize with the default selected product type
    updateSizeOptions(productTypeSelect.value);
});
</script>