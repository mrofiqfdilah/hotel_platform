<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>WDM&Co</title>
</head>
<body style="overflow-y: hidden; background-color: #f4f5f8;">
  <nav>
    <div class="nav__logo">Wella&Co</div>
    <ul class="nav__links">
      <li class="link"><a href="#">Home</a></li>
      <li class="link"><a href="#">Book</a></li>
      <li class="link"><a href="#">Blog</a></li>
      <li class="link"><a href="#">Contact</a></li>
    </ul>
  </nav>

  <header class="section__container header__container">
    <div class="header__image__container">
      <div class="header__content">
        <h1>Enjoy Your Dream Vacation, {{ Auth()->user()->name }}</h1>
        <p>Book Hotels, Flights and stay packages at lowest price.</p>
      </div>

      <div class="booking__container">
        <form action="{{ route('search') }}" method="GET">
          @csrf
          <div class="form__group">
            <div class="input__group">
              <input type="text" name="lokasi" value="{{ request('lokasi') }}" placeholder="Add Location" />
            </div>
            <p>Where are you going?</p>
          </div>

          <div class="form__group">
            <div class="input__group">
              <input type="date" name="checkin" />
            </div>
            <p>Check-in date</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="date" name="checkout" />
            </div>
            <p>Check-out Date</p>
          </div>
          <div class="form__group">
            <div class="input__group">
              <input type="number" name="guests" value="{{ request('guests') }}" placeholder="Add Guest" />
            </div>
            <p>Add guests</p>
          </div>
          <div class="form__group">
            <button class="btn" type="submit"><i class="ri-search-line"></i></button>
          
          </div>
        </form>
      </div>
    </div>
  </header>

  <section class="section__container popular__container">
    <h2 class="section__header">Popular Hotels</h2>
    <div class="popular__grid">
      <div class="popular__card">
        <img src="img/hotel-1.jpg" alt="popular hotel" />
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>The Plaza Hotel</h4>
            <h4>$499</h4>
          </div>
          <p>New York City, USA</p>
        </div>
      </div>
      <div class="popular__card">
        <img src="img/hotel-2.jpg" alt="popular hotel" />
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Ritz Paris</h4>
            <h4>$549</h4>
          </div>
          <p>Paris, France</p>
        </div>
      </div>
      <div class="popular__card">
        <img src="img/hotel-3.jpg" alt="popular hotel" />
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>The Peninsula</h4>
            <h4>$599</h4>
          </div>
          <p>Hong Kong</p>
        </div>
      </div>
      <div class="popular__card">
        <img src="img/hotel-4.jpg" alt="popular hotel" />
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Atlantis The Palm</h4>
            <h4>$449</h4>
          </div>
          <p>Dubai, United Arab Emirates</p>
        </div>
      </div>
      <div class="popular__card">
        <img src="img/hotel-5.jpg" alt="popular hotel" />
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>The Ritz-Carlton</h4>
            <h4>$649</h4>
          </div>
          <p>Tokyo, Japan</p>
        </div>
      </div>
      <div class="popular__card">
        <img src="img/hotel-6.jpg" alt="popular hotel" />
        <div class="popular__content">
          <div class="popular__card__header">
            <h4>Marina Bay Sands</h4>
            <h4>$549</h4>
          </div>
          <p>Singapore</p>
        </div>
      </div>
    </div>
  </section>

  <section class="client">
    <div class="section__container client__container">
      <h2 class="section__header">What our client say</h2>
      <div class="client__grid">
        <div class="client__card">
          <img src="img/client-1.jpg" alt="client" />
          <p>
            The booking process was seamless, and the confirmation was
            instant. I highly recommend WDM&Co for hassle-free hotel bookings.
          </p>
        </div>
        <div class="client__card">
          <img src="img/client-2.jpg" alt="client" />
          <p>
            The website provided detailed information about hotel, including
            amenities, photos, which helped me make an informed decision.
          </p>
        </div>
        <div class="client__card">
          <img src="img/client-3.jpg" alt="client" />
          <p>
            I was able to book a room within minutes, and the hotel exceeded
            my expectations. I appreciate WDM&Co's efficiency and reliability.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section__container">
    <div class="reward__container">
      <p>100+ discount codes</p>
      <h4>Join rewards and discover amazing discounts on your booking</h4>
      <button class="reward__btn">Join Rewards</button>
    </div>
  </section>

  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <h3>WDM&Co</h3>
        <p>
          WDM&Co is a premier hotel booking website that offers a seamless and
          convenient way to find and book accommodations worldwide.
        </p>
        <p>
          With a user-friendly interface and a vast selection of hotels,
          WDM&Co aims to provide a stress-free experience for travelers
          seeking the perfect stay.
        </p>
      </div>
      <div class="footer__col">
        <h4>Company</h4>
        <p>About Us</p>
        <p>Our Team</p>
        <p>Blog</p>
        <p>Book</p>
        <p>Contact Us</p>
      </div>
      <div class="footer__col">
        <h4>Legal</h4>
        <p>FAQs</p>
        <p>Terms & Conditions</p>
        <p>Privacy Policy</p>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </div>
      <div class="footer__col">
        <h4>Resources</h4>
        <p>Social Media</p>
        <p>Help Center</p>
        <p>Partnerships</p>
      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2023 Web Design Mastery. All rights reserved.
    </div>
  </footer>
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

img {
  width: 100%;
  display: flex;
}

body {
  font-family: "Poppins", sans-serif;
  overflow-x: hidden;
  
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

.header__container {
  padding: 1rem 1rem 5rem 1rem;
}

.header__image__container {
  position: relative;
  min-height: 500px;
  background-image: linear-gradient(
      to right,
      rgba(44, 56, 85, 0.9),
      rgba(100, 125, 187, 0.1)
    ),
    url("img/header.jpg");
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
  border-radius: 2rem;
}

.header__content {
  max-width: 600px;
  padding: 5rem 2rem;
}

.header__content h1 {
  margin-bottom: 1rem;
  font-size: 3.5rem;
  line-height: 4rem;
  font-weight: 600;
  color: var(--white);
}

.header__content p {
  color: var(--extra-light);
}

.booking__container {
  position: absolute;
  bottom: -5rem;
  left: 50%;
  transform: translateX(-50%);
  width: calc(100% - 6rem);
  display: flex;
  height: 150px;
  align-items: center;
  gap: 1rem;
  padding: 2rem 2rem;
  border-radius: 2rem;
  background-color: rgba(255, 255, 255, 0.7);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
}

.booking__container form {
  width: 100%;
  flex: 1;
  display: grid;
  grid-template-columns: repeat(5, 1fr);

gap: 1rem;
  
}

.booking__container .input__group {
  width: 200px;
  position: relative;
}

.booking__container label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 1.2rem;
  font-weight: 500;
  color: var(--text-dark);
  pointer-events: none;
  transition: 0.3s;
}

.booking__container input {
  width: 100%;
  padding: 10px 0;
  font-size: 1rem;
  outline: none;
  border: none;
  background-color: transparent;
  border-bottom: 1px solid var(--primary-color);
  color: var(--text-dark);
}

.booking__container input:focus ~ label {
  font-size: 0.8rem;
  top: 0;
}

.booking__container .form__group p {
  margin-top: 0.5rem;
  font-size: 0.8rem;
  color: var(--text-light);
}

.booking__container .btn {
  padding: 1rem;
  outline: none;
  border: none;
  font-size: 1.5rem;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 100%;
  cursor: pointer;
  transition: 0.3s;
}

.booking__container .btn:hover {
  background-color: var(--primary-color-dark);
}
.btn{
  position: relative;
  top:-20px;
  height: 65px;
  left: -10px;
  width: 65px;
  
}

.popular__grid {
  margin-top: 4rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}

.popular__card {
  overflow: hidden;
  border-radius: 1rem;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
}

.popular__content {
  padding: 1rem;
}

.popular__card__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  margin-bottom: 0.5rem;
}

.popular__card__header h4 {
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.popular__content p {
  color: var(--text-light);
}

.client {
  background-color: var(--extra-light);
}

.client__grid {
  margin-top: 4rem;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}

.client__card {
  padding: 2rem;
  background-color: var(--white);
  border-radius: 1rem;
  box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
}

.client__card img {
  max-width: 80px;
  margin: auto;
  margin-bottom: 1rem;
  border-radius: 100%;
}

.client__card p {
  text-align: center;
  color: var(--text-dark);
}

.reward__container {
  padding: 2rem;
  text-align: center;
  border-radius: 2rem;
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
}

.reward__container p {
  margin-bottom: 1rem;
  font-weight: 600;
  color: var(--text-light);
}

.reward__container h4 {
  max-width: 500px;
  margin: auto;
  margin-bottom: 1rem;
  font-size: 2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.reward__btn {
  padding: 1rem 3rem;
  outline: none;
  border: none;
  font-size: 1rem;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 1rem;
  cursor: pointer;
  transition: 0.3s;
}

.reward__btn:hover {
  background-color: var(--primary-color-dark);
}

.footer {
  background-color: var(--extra-light);
}

.footer__container {
  display: grid;
  grid-template-columns: 2fr repeat(3, 1fr);
  gap: 5rem;
}

.footer__col h3 {
  margin-bottom: 1rem;
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--text-dark);
}

.footer__col h4 {
  margin-bottom: 1rem;
  font-size: 1.2rem;
  font-weight: 600;
  color: var(--text-dark);
}

.footer__col p {
  margin-bottom: 1rem;
  color: var(--text-light);
  cursor: pointer;
  transition: 0.3s;
}

.footer__col p:hover {
  color: var(--text-dark);
}

.footer__bar {
  position: relative;
  max-width: var(--max-width);
  margin: auto;
  padding: 1rem;
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--text-light);
  text-align: right;
  overflow: hidden;
}

.footer__bar::before {
  position: absolute;
  content: "";
  top: 50%;
  right: 28rem;
  transform: translateY(-50%);
  width: 20rem;
  height: 2px;
  background-color: var(--text-light);
}

@media (width < 900px) {
  .booking__container form {
    grid-template-columns: repeat(2, 1fr);
  }

  .popular__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .client__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }

  .footer__container {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (width < 600px) {
  .nav__links {
    display: none;
  }

  .header__container {
    padding-bottom: 25rem;
  }

  .booking__container {
    flex-direction: column;
    bottom: -25rem;
  }

  .booking__container form {
    grid-template-columns: repeat(1, 1fr);
  }

  .popular__grid {
    grid-template-columns: repeat(1, 1fr);
  }

  .client__grid {
    grid-template-columns: repeat(1, 1fr);
  }

  .footer__container {
    gap: 2rem;
  }
}
</style>