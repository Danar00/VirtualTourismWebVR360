<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Panorama</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron-fluid">
        <div class="card">
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
              <h5 class="card-title float-left">Daftar Panorama {{$kampung->nama_tempat}}</h5><br>
              <a href="{{$kampung->key_id}}/tambah-panorama">
                <button type="button" class="btn btn-primary float-right">Tambah</button>
              </a>
            </div><br>
            <p></p>
            <table class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Key Panorama</th>
                  <th scope="col">Nama Panorama</th>
                  <th scope="col">Link Panorama</th>
                  <th colspan="4" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1; //counter untuk No.
                @endphp
                @foreach ($pan as $row)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$row->key_panorama}}</td>
                  <td>{{$row->nama_panorama}}</td>
                  <td>{{$row->link_panorama}}</td>
                  <td>
                    <a href="{{ url('/user-panorama/'.$row->nama_panorama) }}" target="_blank">
                      <button type="button" class="btn btn-info">Preview</button>
                    </a>
                  </td>
                  <td>
                    <a href="{{ url('/informasi/'.$row->key_panorama) }}">
                      <button type="button" class="btn btn-success">Detail</button>
                    </a>
                  </td>
                  <td>
                    <a href="{{ url('/panorama-edit/'.$row->key_panorama) }}">
                      <button type="button" class="btn btn-secondary">Edit</button>
                    </a>
                  </td>
                  <td>
                    <form action="{{ url('/panoramadestroy/'.$row->id) }}" method="post">
                      <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">

                    </form>
                  </td>
                </tr>
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
