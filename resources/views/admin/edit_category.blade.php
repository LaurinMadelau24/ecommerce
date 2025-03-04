<div class="modal-body">
  <h2 class="h5 no-margin-bottom">Update Category</h2>
  <form action="{{url('update_category',$data->id)}}" method="POST" class="text-center">
    @csrf
    <input type="text" name="category_name" class="form-control mt-2" value="{{($data->category_name)}}"
      placeholder="Add Category">
    <div class="modal-footer">
      <button type="submit" class="btn btn-secondary q mt-2 text-bold">Update</button>
      <a href="{{url('view_category')}}" type="submit" class="btn btn-danger q mt-2 text-white">Back</a>
    </div>
  </form>
</div>