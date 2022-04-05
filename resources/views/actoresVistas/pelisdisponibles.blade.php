<!doctype html>
<html lang="en">
  <head>
    <title> Laravel 9 File Upload - Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12 m-auto">
                <form action="{{ route('file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-dismiss="alert">×</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-dismiss="alert">×</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif

                        <div class="card-header">
                            <h4 class="card-title fw-bold"> Laravel 9 File Upload </h4>
                        </div>

                        <div class="card-body">
                            <label for="file"> File <span class="text-danger">*</span> </label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Upload </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>