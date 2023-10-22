@extends('layouts.admin')
@section('content')
    <!-- ======= 1st Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up" class="mb-3">
              We offer modern solutions for growing your business.
            </h1>
            <p data-aos="fade-up" data-aos-delay="400" class="mt-2 fs-5">
              Aycent offers a comprehensive suite of business management
              services to start-ups and established businesses.
            </p>
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a
                  href="contactus.html"
                  class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center"
                >
                  <span>Get Started</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 hero-img"
            data-aos="zoom-out"
            data-aos-delay="200"
          >
            <img src="assets/img/first-img2.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- End 1st Section -->

    <main id="main">
      <!-- ======= 2nd Value Section ======= -->
      <section id="values" class="values">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <p class="mb-2">Aycent is easy for everyone</p>
            <span style="font-size: 20px"
              >Aycent ensures simple and efficient business management for
              industries of all sectors and sizes.</span
            >
          </header>

          <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="box" style="padding: 0 !important">
                <img src="assets/img/Freelancer.png" class="img-fluid" alt="" />
                <h3>Freelancer</h3>
                <p></p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="box" style="padding: 0 !important">
                <img
                  src="assets/img/Interior-Fashion-Designers.png"
                  class="img-fluid"
                  alt=""
                />
                <h3>Interior & Fashion Designers</h3>
                <p></p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="box" style="padding: 0 !important">
                <img
                  src="assets/img/Private-Tutors.png"
                  class="img-fluid"
                  alt=""
                />
                <h3>Private Tutors</h3>
                <p></p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="box" style="padding: 0 !important">
                <img src="assets/img/retail.png" class="img-fluid" alt="" />
                <h3>Retail Stores</h3>
                <p></p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="box" style="padding: 0 !important">
                <img
                  src="assets/img/Real-Estate-Agents.png"
                  class="img-fluid"
                  alt=""
                />
                <h3>Real Estate Agents</h3>
                <p></p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="box" style="padding: 0 !important">
                <img
                  src="assets/img/Travel-Agents.png"
                  class="img-fluid"
                  alt=""
                />
                <h3>Travel-Agents</h3>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End 2nd Value Section -->

      <!-- ======= 3rd Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <p style="margin-bottom: 20px">
              Run your business from one platform.
            </p>
            <h2 style="font-size: 18px; text-transform: inherit">
              Manage every aspect of your growing business with the help of
              Aycent.
            </h2>
          </header>

          <div class="row gy-4">
            <div
              class="col-lg-3 col-md-6"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="service-box blue">
                <img src="assets/img/voice.png" alt="" />
                <h3 style="margin-top: 15px; font-weight: 500; color: #042552">
                  Voice
                </h3>
                <p style="color: #365175">
                  Track, manage, and build call flows while creating a
                  personalised calling experience for your customers.
                </p>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="service-box blue">
                <img src="assets/img/email.png" alt="" />
                <h3 style="margin-top: 15px; font-weight: 500; color: #042552">
                  Mail
                </h3>
                <p style="color: #365175">
                  Integrate your email accounts with the system, so you won’t
                  lose any emails.
                </p>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="service-box blue">
                <img src="assets/img/Ticket.png" alt="" />
                <h3 style="margin-top: 15px; font-weight: 500; color: #042552">
                  Ticketing <br />
                  System
                </h3>
                <p style="color: #365175">
                  Categorize, assign and track customer issues quickly to
                  delight your customers with speedy resolutions.
                </p>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="service-box blue">
                <img src="assets/img/crm.png" alt="" />
                <h3 style="margin-top: 15px; font-weight: 500; color: #042552">
                  CRM
                </h3>
                <p style="color: #365175">
                  Track and manage work to get a unified view of the customer
                  data.With the help of crm we can manage all details easily.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End 3rd Services Section -->

      <!-- ======= 4th Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
          <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="230"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Happy Clients</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-journal-richtext" style="color: #ee6c20"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="100"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Projects</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-headset" style="color: #15be56"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="247"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Hours Of Support</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-people" style="color: #bb0852"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="150"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Employees</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Counts Section -->

      <!-- ======= 5th Features Section ======= -->
      <section id="features" class="features" style="padding: 80px 0">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-6">
              <video
                width="100%"
                height="100%"
                src="assets/img/control_manage.mp4"
                autoplay
                loop
                muted
                style="visibility: visible"
              ></video>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
              <div class="row align-self-center gy-4 px-2">
                <div class="col-lg-12" data-aos="zoom-out" data-aos-delay="200">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>
                      Control and manage your business from anywhere, with all
                      your data synced to the cloud
                    </h3>
                  </div>
                </div>

                <div class="col-lg-12" data-aos="zoom-out" data-aos-delay="300">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>
                      With Aycent, sync all customer data and activity in a
                      single location to control your business with ease.
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / row -->
          <!-- End 5th Feature Tabs -->

          <!-- 5th-II Feature Tabs -->
          <div class="row feture-tabs" data-aos="fade-up">
            <div class="col-lg-6 mt-ml-0 d-flex">
              <div class="row align-self-center gy-4 px-2">
                <div class="col-lg-12">
                  <h3>
                    Get 360° view of your customers with sales, marketing and
                    engagement unified
                  </h3>
                  <p>
                    Aycent provides an end-to-end view of all your customers
                    through marketing, sales, operations, and customer service.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <video
                width="100%"
                height="100%"
                src="assets/img/aycent_view.mp4"
                autoplay
                loop
                muted
                style="visibility: visible"
              ></video>
            </div>
          </div>
          <!-- End 5th-II Feature Tabs -->

          <!-- 6th Feature Section  -->
          <div class="row feature-icons pt-4" data-aos="fade-up">
            <div class="row">
              <div
                class="col-xl-6 text-center"
                data-aos="fade-right"
                data-aos-delay="100"
              >
                <video
                  width="100%"
                  height="100%"
                  autoplay
                  loop
                  muted
                  style="visibility: visible"
                >
                  <source src="assets/img/segment.mp4" />
                </video>
              </div>

              <div class="col-xl-6 d-flex content" style="padding-left: 50px">
                <div class="row align-self-center gy-2">
                  <div class="col-md-12 icon-box" data-aos="fade-up">
                    <!-- <i class="ri-line-chart-line"></i> -->
                    <div>
                      <h2
                        style="
                          color: #012970;
                          font-weight: 700;
                          font-size: 32px;
                        "
                      >
                        Segment audience and target with email, voice and chat
                      </h2>
                      <p>
                        With Aycent, identify your target audience to drive
                        growth through unified communication.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Feature Icons -->
        </div>
      </section>
      <!-- End 6th Features Section -->

      <!-- 7th Section  -->
      <div class="container pt-4" data-aos="fade-up">
        <div class="row">
          <div class="col-xl-6 d-flex content" style="padding-left: 50px">
            <div class="row align-self-center gy-2">
              <div class="col-md-12 icon-box" data-aos="fade-up">
                <div>
                  <h2 style="color: #012970; font-weight: 700; font-size: 32px">
                    Grow your business with Aycent
                  </h2>
                  <p>
                    With Aycent, sync all customer data and activity in a single
                    location to control your business with ease.
                  </p>
                  <div class="book_demo text-center text-lg-start">
                    <a
                      href="#about"
                      class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center"
                    >
                      <span id="demo">Book A Demo</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            class="col-xl-6 text-center"
            data-aos="fade-right"
            data-aos-delay="100"
          >
            <img src="assets/img/Frame.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
      <!-- End 7th Section -->

      <!-- ======= Clients Section ======= -->
      <!-- <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <p>Our Clients</p>
          </header>

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-1.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-2.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-3.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-4.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-5.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-6.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-7.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-8.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section> -->
      <!-- End Clients Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </header>

          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>02033840914<br /></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@dbsl-online.com<br /></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>220 Burrow Road, Chigwell, IG74NQ</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Open Hours</h3>
                    <p>Monday - Friday<br />9:00AM - 05:00PM</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <form
                action="forms/contact.php"
                method="post"
                class="php-email-form"
              >
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      placeholder="Your Name"
                      required
                    />
                  </div>

                  <div class="col-md-6">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>

                  <div class="col-md-12">
                    <input
                      type="text"
                      class="form-control"
                      name="subject"
                      placeholder="Subject"
                      required
                    />
                  </div>

                  <div class="col-md-12">
                    <textarea
                      class="form-control"
                      name="message"
                      rows="6"
                      placeholder="Message"
                      required
                    ></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">
                      Your message has been sent. Thank you!
                    </div>

                    <button type="submit">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->
    @endsection
    @section('scripts')