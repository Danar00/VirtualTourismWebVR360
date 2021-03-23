<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron-fluid">
        <div class="card">
          <h5 class="card-header">Register</h5>
          <div class="card-body">
              <form action="registerPost" method="post">
                <div class="form-group">
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Username</label>
                    <input type="text" name="username" class="form-control" id="formGroupExampleInput2" placeholder="Username">
                  </div>
                  <label for="formGroupExampleInput">Password</label>
                  <input type="password" name="password" class="form-control" id="formGroupExampleInput" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Re-type Password</label>
                  <input type="password" name="re-typePassword" class="form-control" id="formGroupExampleInput2" placeholder="Re-type Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" value="Create">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
                {{ csrf_field() }}
              </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
