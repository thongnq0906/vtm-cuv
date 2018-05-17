<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Admin</h2>
  <br>
  <br>
  @if(Session::has('message'))
    <p class="alert alert-danger">{{ Session::get('message') }}</p>
  @endif
  <form action="{{ route('post-login') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? 'is-invalid' : '' }}">
      <label for="email">Email:</label>
      @if($errors->has('email'))
        <span class="required">{{ $errors->first('email') }}</span>
      @endif
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group{{ $errors->has('password') ? 'is-invalid' : '' }}">
      <label for="password">Password:</label>
      @if($errors->has('password'))
        <span class="required">{{ $errors->first('password') }}</span>
      @endif
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
