<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Informasi</title>
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
            <h1>{{$panorama->nama_panorama}}</h1>
          </div>

          <div class="card-body">
            <div>
              <h5 class="card-title float-left">Deskripsi</h5>
              <a href="{{$panorama->key_panorama}}/tambah-deskripsi">
                <button type="button" class="btn btn-primary float-right">Tambah</button>
              </a>
            </div><br>
            <p></p>
            <table class="table table-condensed table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Deskripsi ID</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Pos X</th>
                  <th scope="col">Pos Y</th>
                  <th scope="col">Pos Z</th>
                  <th scope="col">Rot X</th>
                  <th scope="col">Rot Y</th>
                  <th scope="col">Rot Z</th>
                  <th colspan="2" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1; //counter untuk No.
                @endphp
                @foreach ($deskripsi as $des)
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$des->informasi_id}}</td>
                  <td>{{$des->informasi_panorama}}</td>
                  <td>{{$des->pos_x}}</td>
                  <td>{{$des->pos_y}}</td>
                  <td>{{$des->pos_z}}</td>
                  <td>{{$des->rot_x}}</td>
                  <td>{{$des->rot_y}}</td>
                  <td>{{$des->rot_z}}</td>
                  <td>
                    <a href="{{ url('/deskripsi-edit/'.$des->informasi_id) }}">
                      <button type="button" class="btn btn-secondary">Edit</button>
                    </a>
                  </td>
                  <td>
                    <form action="{{ url('/deskripsidestroy/'.$des->id) }}" method="post">
                      <button type="submit" name="submit" class="btn btn-danger" value="delete">Hapus</button>
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
            <p></p><br>

            <div>
              <h5 class="card-title float-left">Pindah Spot</h5>
              <a href="{{$panorama->key_panorama}}/pindah-spot">
                <button type="button" class="btn btn-primary float-right">Tambah</button>
              </a>
            </div><br>
            <p></p>
            <table class="table table-condensed table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Key Parent</th>
                  <th scope="col">Key Target</th>
                  <th scope="col">Nama Spot Lainnya</th>
                  <th scope="col">Pos X</th>
                  <th scope="col">Pos Y</th>
                  <th scope="col">Pos Z</th>
                  <th scope="col">Rot X</th>
                  <th scope="col">Rot Y</th>
                  <th scope="col">Rot Z</th>
                  <th colspan="2" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i=1; //counter untuk No.
                @endphp
                @foreach ($pindah as $pin)
                  @foreach ($panoramas as $pans)
                    @if ($pin->key_target == $pans->key_panorama)
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$pin->key_parent}}</td>
                        <td>{{$pin->key_target}}</td>
                        <td>{{$pans->nama_panorama}}</td>
                        <td>{{$pin->pos_x}}</td>
                        <td>{{$pin->pos_y}}</td>
                        <td>{{$pin->pos_z}}</td>
                        <td>{{$pin->rot_x}}</td>
                        <td>{{$pin->rot_y}}</td>
                        <td>{{$pin->rot_z}}</td>
                        <td>
                          <a href="{{ url('/pindahSpot-edit/'.$pin->id) }}">
                            <button type="button" class="btn btn-secondary">Edit</button>
                          </a>
                        </td>
                        <td>
                          <form action="{{ url('/pindahspotdestroy/'.$pin->id) }}" method="post">
                            <button type="submit" name="submit" class="btn btn-danger" value="delete">Hapus</button>
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                          </form>
                        </td>
                      </tr>
                      @php
                        $i++; //counter untuk No.
                      @endphp
                    @endif
                  @endforeach
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
