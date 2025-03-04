<div class="modal-body">
    <form action="{{url('update_product',$data->id)}}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control mt-2" value="{{($data->title)}}"
                placeholder="Add title">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control mt-2" value="{{($data->price)}}"
                placeholder="Price">
        </div>

        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control mt-2" value="{{($data->quantity)}}"
                placeholder="Quantity">
        </div>

        <div class="form-group">
            <label>category</label>
            <select class="form-control form-control-sm" name="category" required>
                <option value="{{($data->category)}}" >{{($data->category)}}</option>
                @foreach ($category as $c)
                <option value="{{($c->category_name)}}">{{($c->category_name)}}</option>
                @endforeach
            </select>
        </div>
      
        <div class="form-group">
            <label>description</label>
            <input type="text" name="description" class="form-control mt-2" value="{{($data->description)}}"
                placeholder="Description">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control mt-2">

        </div>
        <img src="{{('product/'. $data->image)}}" alt="..." class="img-thumbnail m-2 shadow-md" width="100px">
        <div class="modal-footer">
            <button type="submit" class="btn btn-secondary mt-2 text-bold">Update</button>
            <button type="button" class="btn btn-danger mt-2 text-bold" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>