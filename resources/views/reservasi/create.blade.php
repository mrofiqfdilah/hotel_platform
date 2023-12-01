<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('reservasi.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <input type="text" name="namapemesan" class="form-control" placeholder="masukan nama pemesan">
                </div>
                <div class="mb-4">
                    <input type="date" name="checkin" class="form-control" placeholder="masukan tanggal checkin">
                </div>
                <div class="mb-4">
                    <input type="date" name="checkout" class="form-control" placeholder="masukan tanggal checkout">
                </div>
                <div class="mb-4">
                    <input type="text" name="notelpon" class="form-control" placeholder="masukan no telpons">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>