@include('admin.header')

<div class="page-header bg-dark shadow-lg">
  <div class="container-fluid ">
    <h2 class="no-margin-bottom text-center ">Category</h2>
  </div>
</div>
<div class="container p-2">
  <div class="row">
    <div class="col bg-transparent">
      <form action="{{url('add_category')}}" method="POST" class="text-center">
        <!-- <label for="exampleInputEmail1">Email address</label> -->
        @csrf
        <input type="text" name="category_name" class="form-control mt-2" placeholder="Add Category">
        <button type="submit" class="btn btn-success btn-sm mt-2 text-bold">Submit</button>
      </form>
    </div>
    <div class="col">
      <div class="card bg-dark col">
        <!-- <div class="text-center"> -->
        {{-- <h2 class="h5 no-margin-bottom text-center p-4">Category</h2> --}}
        <table class="table">
          <thead>
            <tr>
              <th scope="col">no</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @php
              $a = 1;
              @endphp
              @foreach ($data as $d)
              <td scope="row">{{($a)}}</td>
              <td>{{($d->category_name)}}</td>
              <td>
                <a class="btn btn-danger btn-sm m-1" onclick="confirmation(event)"
                  href="{{url('delete_category',$d->id)}}">Delete</a>
                {{-- <a class="btn btn-success btn-sm m-1" href="{{url('edit_category',$d->id)}}">Edit</a> --}}
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaledit"
                  onclick="modaledit({{$d->id}})">
                  Edit
                </button>
              </td>
            </tr>
            @php
            $a++;
            @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampmodaledit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div id="modal_edit_category">



      </div>
    </div>
  </div>
  @include('admin.footer')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
    function confirmation(ev) {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect);

        swal({
            title: "Are You Sure to Delete This",
            text: "This delete will be parmanent",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })

          .then((willCancel) => {
            if (willCancel) {
              window.location.href = urlToRedirect;
            }
          })
      }
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  </script>
  <script>
    function modaledit(id) {
        $.ajax({
          url: '{{url('edit_category')}}',
          type: 'get',
          data: {
            id: id,
          },
          success: function(getreturn) {
            $('#modal_edit_category').html(getreturn);

          },
        });

      }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>

  </html>