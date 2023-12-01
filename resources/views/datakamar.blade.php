<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav>
    <div class="nav__logo">Wella&Co</div>
    <ul class="nav__links">
        <li class="link"><a href="#">Home</a></li>
        <li class="link"><a href="#">Book</a></li>
        <li class="link"><a href="#">Blog</a></li>
        <li class="link"><a href="#">Contact</a></li>
    </ul>
</nav>
@if($kamars->isEmpty())
    <p>Tidak ada kamar ditemukan untuk hotel ini.</p>
@else
    <div class="room__grid">
        @foreach($kamars as $k)
            <div class="room__card">
                <img src="{{ $k->gambar }}" alt="{{ $k->namakamar }}" />
                <div class="room__content">
                    <div class="room__card__header">
                        <h4>{{ $k->namakamar }}</h4>
                    </div>
                    <p>Harga: {{ $k->harga }}</p>
                    <p>Kapasitas: {{ $k->kapasitas }}</p>
                    <p>Fasilitas: {{ $k->fasilitas }}</p>
                    @if ($hotel)
                    <a href="{{ route('pesan', ['namakamar' => $k->namakamar, 'namahotel' => $hotel->namahotel]) }}">Reservasi Sekarang!</a>
                @else
                    Hotel not found.
                @endif


                </div>
            </div>
        @endforeach
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<style>
   @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

:root {
    --primary-color: #2c3855;
    --primary-color-dark: #435681;
    --text-dark: #333333;
    --text-light: #767268;
    --extra-light: #f3f4f6;
    --white: #ffffff;
    --max-width: 1200px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.section__container {
    max-width: var(--max-width);
    margin: auto;
    padding: 5rem 1rem;
}

.section__header {
    font-size: 2rem;
    font-weight: 600;
    color: var(--text-dark);
    text-align: center;
}

.form__group:last-child {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.form__group:last-child .btn {
    margin-top: 1rem;
}

a {
    text-decoration: none;
}

body {
    font-family: "Poppins", sans-serif;
    overflow-x: hidden;
    background-color: #EDE7FE;
}

nav {
    max-width: var(--max-width);
    margin: auto;
    padding: 2rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav__logo {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-dark);
}

.nav__links {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 2rem;
}

.link a {
    font-weight: 500;
    color: var(--text-light);
    transition: 0.3s;
}

.link a:hover {
    color: var(--primary-color);
}
    .room__grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1rem;
        max-width: var(--max-width);
        margin: auto;
        padding: 2rem 1rem;
    }

    .room__card {
        background-color: var(--extra-light);
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        transition: box-shadow 0.3s;
    }

    .room__card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .room__card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .room__content {
        margin-top: 1rem;
    }

    .room__card__header h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
    }

    .room__content p {
        margin: 0.5rem 0;
        color: var(--text-light);
    }
     .room__content a {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.5rem 1rem;
        background-color: var(--primary-color);
        color: #fff;
        font-weight: 600;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
    }

    .room__content a:hover {
        background-color: var(--primary-color-dark);
    }
</style>
