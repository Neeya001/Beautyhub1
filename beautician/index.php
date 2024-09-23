<?php 
 session_start();
 if(!isset($_SESSION['username_beautician' ])){
  header('location: login_beautician.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>landing page</title>
    <link rel="stylesheet" href="css/index.css" />
  </head>

  <body>
    <nav class="navbar">
      <div class="navdiv">
        <div>
          <h2 class="nav-heading">Beauty Hub</h2>
        </div>
        <ul class="nav-list">
          <li class="nav-content"><a class="nav-link" href="#" style="text-decoration: underline;">Home</a></li>
          <li class="nav-content"><a class="nav-link" href="appointment/dashboard.html">Dashboard</a></li>
          <li class="nav-content">
            <a class="nav-link" href="./appointment/appointment.php">Appointments</a>
          </li>
          <li class="nav-content">
            <a class="nav-link" href="earnwithus.php">Earn With Us</a>
          </li>
          <li class="nav-content"><a class="nav-link" href="./profile/profile1.php"><?php echo $_SESSION['username_beautician']; ?></a></li>
          <li class="nav-content"><a class="nav-link" href="logout_beautician.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <main>
      <div class="hero-section">
        <img class="hero-image" src="./images/hero img.png" alt="picture" />
        <div class="text">
          <h1 class="heading">Let's Enhance Ourself</h1>
          <p>With BeautyHub</p>
          <p>Book Top-Quality Beauty Treatments</p>
          <p>In comfort of Your Home</p>

          <button type="button" class="hero-button"><a href="./appointment/appointment.php">
          Give Services </a><img src="./images/arrow.svg" alt="arrow" />
          </button>
        </div>
      </div>

      <div class="first-section">
        <div class="first-section-heading">
          <p class="section-first">Beauty Beyound Boundaries</p>
          <p class="section-second">
            Professional Beauty Services At Your DoorStep
          </p>
        </div>

        <div class="services-section">
          <div class="services-card">
            <div class="service-image">
              <img
                class="services-card-image"
                src="./images/Group 6.png"
                alt="picture"
              />
            </div>
            <div class="services-card-image">
              <p>Fast Home Service</p>
              <div class="sub-heading">
                <p>
                  This is a website and this is a service that the website
                  offers
                </p>
              </div>
            </div>
          </div>

          <div class="services-card">
            <div class="service-image">
              <img
                class="services-card-image"
                src="./images/location.jpg"
                alt="picture"
              />
            </div>
            <div class="services-card-image">
              <p> Location Tracking</p>
              <div class="sub-heading">
                <p>
                  This is a website and this is a service that the website
                  offers
                </p>
              </div>
            </div>
          </div>

          <div class="services-card">
            <div class="service-image">
              <img
                class="services-card-image"
                src="./images/Group 3.png"
                alt="picture"
              />
            </div>
            <div class="services-card-image">
              <p>Service3</p>
              <div class="sub-heading">
                <p>
                  This is a website and this is a service that the website
                  offers
                </p>
              </div>
            </div>
          </div>

          <div class="services-card">
            <div class="service-image">
              <img
                class="services-card-image"
                src="./images/Group 4.png"
                alt="picture"
              />
            </div>
            <div class="services-card-image">
              <p>Service4</p>
              <p class="sub-heading">
                This is a website and this is a service that the website offers
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="second-section" id="second-section">
        <div class="second-heading">
          <p>Our Services</p>
        </div>

        <div class="second-section-booking">
          <div class="salon-services">
            <img class="salon-image" src="./images/Group 6.png" alt="picture" />
            <div class="salon-card">
              <p>Hair Care</p>
              <button type="button" class="salon-button">Click To Book</button>
            </div>
          </div>

          <div class="salon-services">
            <img class="salon-image" src="./images/Group 7.png" alt="picture" />
            <div class="salon-card">
              <p>Nail Services</p>
              <button type="button" class="salon-button">Click To Book</button>
            </div>
          </div>

          <div class="salon-services">
            <img class="salon-image" src="./images/Group 8.png" alt="picture" />
            <div class="salon-card">
              <p>Makeup</p>
              <button type="button" class="salon-button">Click To Book</button>
            </div>
          </div>
        </div>
        <button type="button" class="explore-button">
          <a class="explore-button-link" href="appointment/appointment.php"
            >Give Services <img src="./images/arrow.svg" alt="arrow"
          /></a>
        </button>
      </div>

      <div class="third-section">
        <div class="third-section-content">
          <h1>Earn with Your Professional Skills</h1>
          <p>Become Beautician and Earn In Beauty Hub</p>
        </div>

        <div class="third-section-heading">
          <div class="third-section-text">
            <ul class="third-section-title">
              <li class="third-section-list">
                <img src="./images/tick.svg" alt="tick" /> Provide Services to
                clients any time of your day.
              </li>
              <li class="third-section-list">
                <img src="./images/tick.svg" alt="tick" />Expand your clients
                reach with beauty hub.
              </li>
              <li class="third-section-list">
                <img src="./images/tick.svg" alt="tick" />Increase your scope
                and experience in market.
              </li>
            </ul>

            <button type="button" class="register-button"><a href="../profile/earnwithus.html">
              Register Now </a><img src="./images/arrow.svg" alt="arrow" />
            </button>
          </div>
          <!-- Regarding this be worried -->
          <div class="third-section-image">
            <img
              class="third-section-picture"
              src="./images/group2.png"
              alt="picture"
            />
          </div>
        </div>
      </div>

      <div class="fourth-section">
        <div class="fourth-section-left">
          <div class="fourth-section-faq">
            <p class="faq">FAQs</p>
            <p class="faq-full">Frequently Asked Question</p>
          </div>

          <div class="fourth-section-askus">
            <p class="question-contactus">
              Don’t See Your Question? Contact Us
            </p>
            <button class="contactus-button"><a href="../profile/contactus.html">Contact Us</a>
               <img src="./images/cross.svg" alt="cross" />
            </button>
          </div>
        </div>
        <div class="fourth-section-right">
          <div class="fourth-section-question-list">
            <div class="question-container">
              <div class="question-list">
                <p>This is a question text?</p>
                <img class="plus" src="./images/plus.svg" alt="tick" />
              </div>
              <div class="hidden-content">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. This is a text msg. This is a question.
                  This is a figma frame and it works.
                </p>
              </div>
            </div>

            <div class="question-container">
              <div class="question-list">
                <p>This is a question text?</p>
                <img class="plus" src="./images/plus.svg" alt="tick" />
              </div>
              <div class="hidden-content">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. This is a text msg. This is a question.
                  This is a figma frame and it works.
                </p>
              </div>
            </div>

            <div class="question-container">
              <div class="question-list">
                <p>This is a question text?</p>
                <img class="plus" src="./images/plus.svg" alt="tick" />
              </div>
              <div class="hidden-content">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. This is a text msg. This is a question.
                  This is a figma frame and it works.
                </p>
              </div>
            </div>

            <div class="question-container">
              <div class="question-list">
                <p>This is a question text?</p>
                <img class="plus" src="./images/plus.svg" alt="tick" />
              </div>
              <div class="hidden-content">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. This is a text msg. This is a question.
                  This is a figma frame and it works.
                </p>
              </div>
            </div>

            <div class="question-container">
              <div class="question-list">
                <p>This is a question text?</p>
                <img class="plus" src="./images/plus.svg" alt="tick" />
              </div>
              <div class="hidden-content">
                <p>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. This is a text msg. This is a question.
                  This is a figma frame and it works.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="fifth-section">
        <div class="fifth-section-left">
          <input type="text" class="name-heading" placeholder="Name" name />
          <input type="text" class="name-heading" placeholder="Email" Email />
          <input
            type="text"
            class="message-input"
            placeholder="Message"
            Message
          />
          <button class="submit-button">Submit Now</button>
        </div>

        <div class="fifth-section-right">
          <p class="fifth-contact">Contact Us</p>
          <p class="fifth-para">
            For further queries & feedback contact us and fill the form
          </p>
          <div class="fifth-bottom">
            <p class="fifth-section-mail">
              <img src="./images/mail1.svg" alt="images" />
              <span class="fifth-section-company">Beautyhub.com</span>
            </p>
            <p class="fifth-section-phone">
              <img src="./images/phone.svg" alt="images" />(+977-987653211)
            </p>
          </div>
        </div>
      </div>

      <!-- Footer section -->
      <footer>
        <div class="footer-section">
          <p class="footer-paragraph">Our Parterns & Collaborators</p>
          <div class="footer-images">
            <img src="./images/Rectangle 13.svg" alt="images" />
            <img src="./images/Rectangle 13.svg" alt="images" />
            <img src="./images/Rectangle 13.svg" alt="images" />
            <img src="./images/Rectangle 13.svg" alt="images" />
            <img src="./images/Rectangle 13.svg" alt="images" />
            <img src="./images/Rectangle 13.svg" alt="images" />
          </div>

          <div class="container">
            <div class="footer-content">
              <h1>Beauty Hub</h1>

              <div class="footer-heading-detail">
                <div class="footer-email">
                  <img
                    src="./images/Email.svg"
                    alt="images"
                  />beautyhub@gmail.com
                </div>

                <div class="footer-contact">
                  <img src="./images/Vector.svg" alt="images" />+977 986873098
                </div>

                <div class="footer-logo">
                  <img src="./images/facebook.svg" alt="images" />
                  <img src="./images/tiktok.svg" alt="images" />
                  <img src="./images/youtube.svg" alt="images" />
                  <img src="./images/insta.svg" alt="images" />
                </div>
              </div>
            </div>

            <div class="footer-content">
              <h1>About</h1>
              <ul class="footer-list">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Become Beautician</a></li>
                <li><a href="#">FAQs</a></li>
              </ul>
            </div>

            <div class="footer-content">
              <h1>Features</h1>
              <ul class="footer-list">
                <li><a href="#">Ease Service</a></li>
                <li><a href="#">Location Track</a></li>
                <li><a href="#">Rating and Feedback</a></li>
                <li><a href="#">Ease Communicate</a></li>
              </ul>
            </div>

            <div class="footer-content">
              <h1>Support</h1>
              <ul class="footer-list">
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Forum</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <div class="footer-line"></div>

          <div class="footer-bottom-info">
            <p>@2024 Beauty hub.All rights Reserved</p>
          </div>
        </div>
      </footer>
    </main>

    <script src="js/index.js"></script>
  </body>
</html>
