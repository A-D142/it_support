<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Custom fonts for this template-->
    <link href={{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
    <link
        href={{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href={{ asset('frontend/css/sb-admin-2.min.css') }} rel="stylesheet">
</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ticket</h6>
        </div>
        <div class="card-body">
          <form  method="POST" action="/user_test/{{$ticket->id}}/edit">
              @csrf
              @method('PATCH')
                <div class="form-group">
                  <label for="exampleFomControlInput1">Title</label>
                  <input type="title" class="form-control" placeholder={{$ticket->title}} name="title">
                </div>
                <div class="form-group">
                  {{-- <label for="exampleFormControlSelect1">Select Department</label> --}}
                  {{-- <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select> --}}
                </div>

                <div class="form-group">
                <label for="exampleFormControlTextarea1">Descreptions</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder={{$ticket->description}} name = 'description'></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Ticket</button>
              </form>

        </div>
    </div>
</body>
</html>