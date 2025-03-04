@include('admin.header')

<div class="page-header bg-dark shadow-lg">
  <div class="container-fluid ">
    <h2 class="no-margin-bottom text-center ">Orders</h2>
  </div>
</div>
<div class="container p-2">
  <div class="row">
    <div class="col">
      <div class="mb-4 d-flex justify-content-end">
        <form action="{{url('product_search')}}" method="GET">
          @csrf
          <input class="rounded bg-light" style="width: 250px; height:35px" type="text" name="search" id="" placeholder="Search...">
          <button type="submit" class="btn btn-secondary text-bold btn-sm">Search</button>
        </form>
      </div>
      <div class="card bg-dark col">
        <!-- <div class="text-center"> -->
        {{-- <h2 class="h5 no-margin-bottom text-center p-4">Category</h2> --}}
        <table class="table">
          <thead>
            <tr>
              <th scope="col">no</th>
              <th scope="col">Nama Customer</th>
              <th scope="col">Alamat</th>
              <th scope="col">Nomor Telephone</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Image</th>
              <th scope="col">Status</th>
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
              <td>{{($d->name)}}</td>
              <td>{{($d->rec_address)}}</td>
              <td>{{($d->phone)}}</td>
              <td>{{($d->product->title)}}</td>
              <td>{{($d->product->price)}}</td>
              {{-- <td>{!!Str::limit($d->description,50)!!}</td> --}}
              <td><img src="{{('product/'. $d->product->image)}}" alt="..." class="img-thumbnail" width="70px"></td>
              <td>{{($d->status)}}</td>
              <td>
                <a class="btn btn-info btn-sm m-1" href="{{url('perjalanan',$d->id)}}">Perjalanan</a>
                <a class="btn btn-success btn-sm m-1" href="{{url('dikirim',$d->id)}}">Berhasil Dikirim</a>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div id="modal_edit_product">



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
          url: '{{url('edit_product')}}',
          type: 'get',
          data: {
            id: id,
          },
          success: function(getreturn) {
            $('#modal_edit_product').html(getreturn);

          },
        });

      }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </body>

  </html>