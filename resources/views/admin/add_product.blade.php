@include('admin.header')
<div class="page-header bg-dark shadow-lg">
    <div class="container-fluid ">
        <h2 class="no-margin-bottom text-center ">Add Product</h2>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-5">
        <form action="{{url('upload_product')}}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control mt-2" placeholder="Product Title">
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control mt-2" placeholder="price">
            </div>
            <div class="form-group">
                <input type="number" name="quantity" class="form-control mt-2" placeholder="quantity">
            </div>
            <div class="form-group">
                {{-- <input type="number" name="category" class="form-control mt-2" placeholder="category"> --}}
                <select class="form-control form-control-sm" name="category" required>
                    <option selected disabled>Category Name</option>
                    @foreach ($category as $c)
                    <option value="{{($c->category_name)}}">{{($c->category_name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <textarea type="text" name="description" class="form-control mt-2" placeholder="Description"
                    row="3"></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control mt-2">
            </div>
            <button type="submit" class="btn btn-success q mt-2 text-bold">Add Product</button>
        </form>
    </div>
</div>
</div>
@include('admin.footer')