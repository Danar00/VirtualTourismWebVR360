<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <title>Edit Kampung</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron-fluid">
        <div class="card">
          <h5 class="card-header">Edit Kampung</h5>
          <div class="card-body">

              <form action="{{ url('/editkampungput/'.$key_id->id) }}" method="post">
                <div class="form-group">
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Key Kampung</label><br>
                    <h6 style="color:red">*Tidak dapat dirubah</h6>
                    <input readonly type="text" class="form-control" id="formGroupExampleInput2" value="{{$key_id->key_id}}">
                  </div>
                  <label for="formGroupExampleInput">Nama Tempat</label>
                  <input type="text" name="nama_tempat" class="form-control" id="formGroupExampleInput" value="{{$key_id->nama_tempat}}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Link Gambar Kampung</label>
                  <input type="text" name="link_kampung" class="form-control" id="formGroupExampleInput2" value="{{$key_id->link_gambar}}">
                </div>
                <input type="hidden" name="key_parent" class="form-control" id="formGroupExampleInput2" value="HOME1">
                <h6 style="color:red">*Hanya dapat sekali</h6>
                <label for="formGroupExampleInput">Target Panorama</label>
                <select id="key_target" name="key_target" value="{{old('key_target')}}" class="form-control form-control-sm">
                  @foreach ($panoramas as $pans)
                    @if ($pans->kampung_id == $key_id->key_id)
                      <option>{{$pans->nama_panorama}}</option>
                    @endif
                  @endforeach
                </select>
                <br>
                <button type="submit" name="name" class="btn btn-primary" value="edit">Submit</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
              </form>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
