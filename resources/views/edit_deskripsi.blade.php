<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <title>Edit Deskripsi</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron-fluid">
        <div class="card">
          <h5 class="card-header">Edit Deskripsi</h5>
          <div class="card-body">
              <form action="{{ url('/deskripsi-editPut/'.$kDes->id) }}" method="post">
                <div class="form-group">
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Informasi ID</label><br>
                    <h6 style="color:red">*Tidak dapat dirubah</h6>
                    <input readonly type="text" name="id_informasi" class="form-control" id="formGroupExampleInput2" value="{{$kDes->informasi_id}}">
                  </div>
                  <label for="formGroupExampleInput">Deskripsi</label>
                  <input type="text" name="deskripsi" class="form-control" id="formGroupExampleInput" placeholder="Deskripsi" value="{{$kDes->informasi_panorama}}" required maxlength="550">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Pos X</label>
                  <input type="text" name="pos_x" class="form-control" id="formGroupExampleInput2" placeholder="Pos X" value="{{$kDes->pos_x}}" required maxlength="10">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Pos Y</label>
                  <input type="text" name="pos_y" class="form-control" id="formGroupExampleInput2" placeholder="Pos Y" value="{{$kDes->pos_y}}" required maxlength="10">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Pos Z</label>
                  <input type="text" name="pos_z" class="form-control" id="formGroupExampleInput2" placeholder="Pos Z" value="{{$kDes->pos_z}}" required maxlength="10">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Rot X</label>
                  <input type="text" name="rot_x" class="form-control" id="formGroupExampleInput2" placeholder="Rot X" value="{{$kDes->rot_x}}" required maxlength="10">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Rot Y</label>
                  <input type="text" name="rot_y" class="form-control" id="formGroupExampleInput2" placeholder="Rot Y" value="{{$kDes->rot_y}}" required maxlength="10">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Rot Z</label>
                  <input type="text" name="rot_z" class="form-control" id="formGroupExampleInput2" placeholder="Rot Z" value="{{$kDes->rot_z}}">
                  <input type="hidden" name="panorama_id" class="form-control" id="formGroupExampleInput2" value="{{$kDes->panorama_id}}">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" value="edit">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
              </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
