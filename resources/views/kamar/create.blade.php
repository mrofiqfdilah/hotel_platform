<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
   <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kamar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
            <div class="form-group">
                
                <select class="form-control" id="hotel_id" name="hotel_id">
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->namahotel }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="mb-4">
            <input type="text" class="form-control" name="namakamar" placeholder="masukan nama kamar">
        </div>
        <div class="mb-4">
            <input type="text" class="form-control" name="harga" placeholder="masukan harga kamar">
        </div>
        <div class="mb-4">
            <input type="number" class="form-control" name="kapasitas" placeholder="masukan kapasitas tamu">
        </div>
        <div class="mb-4">
            <input type="text" class="form-control" name="fasilitas" placeholder="tambahkan fasilitas kamar">
        </div>
        <div class="mb-4">
          <input type="file" accept="image/" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" name="gambar" class="form-control" id="gambar">
      </div>
     <div class="mt-3">
      <img src="" id="output" width="100">
     </div>
        <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>