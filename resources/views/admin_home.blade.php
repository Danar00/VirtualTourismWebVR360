<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron-fluid">
        <div class="card">
          {{-- <h5 class="card-header">Home Admin</h5> --}}
          <div>
            <a href="{{ url('/admin') }}">
              <button type="button" class="btn btn-primary float-left">Home</button>
            </a>
            <a href="{{ url('/logout') }}">
              <button type="button" class="btn btn-danger float-right">Logout</button>
            </a>
          </div>
          <p></p>

          <div class="card-body">
            <div>
              <h5 class="card-title float-left">Daftar Kampung</h5>
              <a href="tambah-kampung">
                <button type="button" class="btn btn-primary float-right">Tambah</button>
              </a>
            </div><br>
            <p></p>
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Key Kampung</th>
                  <th scope="col">Nama Tempat</th>
                  <th scope="col">Gambar Kampung</th>
                  <th colspan="3" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1; //counter untuk No.
                @endphp
                @foreach($key_id as $row)

                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$row->key_id}}</td>
                  <td>{{$row->nama_tempat}}</td>
                  <td>{{$row->link_gambar}}</td>

                  <td>
                    <a href="panorama/{{$row->key_id}}">
                      <button type="button" class="btn btn-success">Detail</button>
                    </a>
                  </td>
                  <td>
                    <a href="edit-kampung/{{$row->key_id}}">
                      <button type="button" class="btn btn-secondary">Edit</button>
                    </a>
                  </td>
                  <td>
                    <form action="admin/{{$row->id}}" method="post">
                      <button type="submit" class="btn btn-danger" value="delete">Hapus</button>
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                    </form>
                  </td>
                  @php
                    $i++; //counter untuk No.
                  @endphp

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
