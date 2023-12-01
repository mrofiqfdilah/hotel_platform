<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <p>nama kamar : {{ $kamar->namakamar }}</p>
    <p>nama hotel : {{ $hotel->namahotel }}</p>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Form Checkin</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('reservasi.store') }}" method="post" >
                <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">
    <input type="hidden" name="hotel_id" value="{{ $kamar->hotel_id }}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="namapeminjam" class="form-label">Nama Pemesan</label>
                      <input type="text" class="form-control" name="namapemesan"  value="{{ Auth::user()->name }}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="checkin" class="form-label">checkin</label>
                      <input type="date" name="checkin" class="form-control" placeholder="Masukan Nama Anda">
                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="checkout" class="form-label">checkout</label>
                        <input type="date" name="checkout" class="form-control" placeholder="Masukan Nama Anda">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="notelpon" class="form-label">No telpon</label>
                      <input type="number" name="notelpon" style="width: 510px;" class="form-control" placeholder="Masukan no telpon ">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <button type="submit" style="margin-left:20px; margin-top:-10px;" class="btn btn-primary">Pinjam Buku</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
