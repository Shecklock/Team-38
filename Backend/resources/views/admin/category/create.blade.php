@section('content')

<!-- Creates the entry fields or the category name and number -->
<!-- Creates the entry fields of the category name and number -->

<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="Card-header">
                <h4>Add Category
                    <a href="{{ url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h4>
            </div>
            <div class = "card-body">
                <form action ="">
                <form action ="{{ url('admin/category')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="CatNameClass">
                    <label>Category Name</label>
                    <input type="text" name="CGNa" class="form-control"/></br></br>
                    <input type="text" name="CategoryName" class="form-control"/></br></br>
                </div>

                <div class="CatNuClass">
                    <label>Category Number</label>
                    <input type="text" name="CGNu" class="form-control"/>

                <div class="CatSubBTN">
                    <button type="submit" class="btn btn-primary float-end">Save</button>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection