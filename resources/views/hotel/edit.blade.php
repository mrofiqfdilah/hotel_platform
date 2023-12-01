<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('hotel.update', $hotel->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-4">
                    <input type="text" value="{{ $hotel->namahotel }}" class="form-control" name="namahotel" placeholder="masukan nama hotel">
                </div>
                <div class="mb-4">
                    <input type="text" value="{{ $hotel->lokasi }}" class="form-control" name="lokasi" placeholder="masukan lokasi hotel">
                </div>
                <div class="mb-4">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" accept="image/" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" name="gambar" class="form-control" id="gambar">
                </div>
                <div class="mt-3">
                    <img src="{{ asset($hotel->gambar) }}" id="output" width="100">
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
