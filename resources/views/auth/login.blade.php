<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
  <body>

    <div class="container" style="width: 500px;">
      <h2>Admin Login</h2>
      <form method="POST" id="formvalidate" action="{{ url('admin/login') }}" >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script>
  $(function() {
  /*$("#formvalidate").validate({
    rules: {
      start: "required",
      end: {
        required: true,
        min: function(element){
                return $("#start").val() + 1; 
            }
      }
    },
    messages: {
      start: "Please enter your start",
      //end:"end must be greater than start"
      end: {
        required: "Please provide a end",
        min: "end must be greater than start"
      },
    },
    submitHandler: function(form) {
      form.submit();
    }
  });*/
});
</script>
</html>
