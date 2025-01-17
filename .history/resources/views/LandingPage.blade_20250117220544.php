<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Website</title>
    <link rel="stylesheet" href="{{ asset('LandingPage/Libraries/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('LandingPage/Css/style.css')}}" />
  </head>
  <body>
    <!-- header  -->
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav-logo">I'm Irfan</a>

        <div class="nav-menu" id="nav-menu">
          <ul class="nav-list grid">
            <li class="nav-item">
              <a href="#home" class="nav-link"
                ><i class="fa-solid fa-house nav-icon"></i> Home</a
              >
            </li>
            <li class="nav-item">
              <a href="#about" class="nav-link"
                ><i class="fa-solid fa-user nav-icon"></i> About</a
              >
            </li>
            <li class="nav-item">
              <a href="#skills" class="nav-link"
                ><i class="fa-solid fa-file nav-icon"></i> Skills</a
              >
            </li>
            <li class="nav-item">
              <a href="#projects" class="nav-link"
                ><i class="fa-solid fa-image nav-icon"></i> Projects</a
              >
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link"
                ><i class="fa-solid fa-message nav-icon"></i> Contact</a
              >
            </li>
          </ul>
          <i class="fa-solid fa-xmark nav-close" id="nav-close"></i>
        </div>

        <div class="nav-btns">
          <!-- theme btn  -->
          <i class="fa-regular fa-moon change-theme" id="theme-button"></i>

          <div class="nav-toggle" id="nav-toggle">
            <i class="fa-solid fa-bars"></i>
          </div>
        </div>
      </nav>
    </header>

    <main class="main">
      <!-- home -->
      <section class="home section" id="home">
        <div class="home-container container grid">
          <div class="home-content grid">
            <div class="home-social">
              <a
                href="https://www.linkedin.com/in/harisahmad59/"
                target="_blank"
                class="home-social-icon"
              >
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
              <a
                href="https://www.instagram.com/codehype_/"
                target="_blank"
                class="home-social-icon"
              >
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a
                href="https://github.com/harisahmad59"
                target="_blank"
                class="home-social-icon"
              >
                <i class="fa-brands fa-github"></i>
              </a>
            </div>

            <div class="home-img">
              <svg
                class="home-blob"
                viewBox="0 0 200 187"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <mask id="mask0" mask-type="alpha">
                  <path
                    d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 165.547 
        130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 129.362C2.45775 
        97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 -0.149132 97.9666 
        0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"
                  />
                </mask>
                <g mask="url(#mask0)">
                  <path
                    d="M190.312 36.4879C206.582 62.1187 201.309 102.826 182.328 134.186C163.346 
        165.547 130.807 187.559 100.226 186.353C69.6454 185.297 41.0228 161.023 21.7403 
        129.362C2.45775 97.8511 -7.48481 59.1033 6.67581 34.5279C20.9871 10.1032 59.7028 
        -0.149132 97.9666 0.00163737C136.23 0.303176 174.193 10.857 190.312 36.4879Z"
                  />
                  <image
                    class="home-blob-img"
                    x="-15"
                    y="-5"
                    href="{{ asset('LandingPage/Assets/Icons/logo1.png')}}"
                  />
                </g>
              </svg>
            </div>

            <div class="home-data">
              <h1 class="home-title">Hi, I am Irfan</h1>
              <h3 class="home-subtitle">Frontend Developer</h3>
              <p class="home-description">
                Passionate frontend developer specializing in pixel-perfect web
                design.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- about -->
      <section class="about section" id="about">
        <h2 class="section-title">About Me</h2>
        <span class="section-subtitle">My Introduction</span>

        <div class="about-container container grid">
          <img src="{{ asset('LandingPage/Assets/Icons/aboutimg.png')}}" alt="" class="about-img" />

          <div class="about-data">
            <p class="about-description">
              An accomplished Frontend Developer with a passion for creating
              seamless user experiences. With a solid foundation in HTML, CSS,
              and JavaScript, I specialize in crafting visually captivating and
              intuitively navigable websites.
            </p>

            <div class="about-buttons">
              <a
                download=""
                href="{{ asset('LandingPage/Assets/Resume.pdf')}}"
                class="button button-flex"
              >
                Download Resume<i
                  class="fa-solid fa-file-arrow-down button-icon"
                ></i>
              </a>
            </div>
          </div>
        </div>
      </section>

      {{-- skill --}}
      <section class="skills section" id="skills">
        <h2 class="section-title">Skills</h2>
        <span class="section-subtitle">My Technical Skills</span>
        <div class="skills-content container">
          @foreach($skills as $skill)
            <div class="skills-name">{{ $skill->skill_name }}</div>
          @endforeach
        </div>
      </section>

      <!-- qualification -->
      <section class="qualification section">
        <h2 class="section-title">Qualification</h2>
        <span class="section-subtitle">My journey</span>

        <div class="qualification-container container">
          <div class="qualification-tabs">
            <div
              class="qualification-button button-flex qualification-active"
              data-target="#education"
            >
              <i class="fa-solid fa-graduation-cap qualification-icon"></i>
              Education
            </div>
            <div class="qualification-button button-flex" data-target="#work">
              <i class="fa-solid fa-briefcase qualification-icon"></i>
              Work
            </div>
          </div>

          <div class="qualification-section">
            <div
              class="qualification-content qualification-active"
              data-content
              id="education"
            >
              <!-- qualifi 1 -->
              <div class="qualification-data">
                <div>
                  <h3 class="qualification-title">
                    Computer Science Engineering
                  </h3>
                  <span class="qualification-subtitle">GCET Kashmir</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2022 - 2026
                  </div>
                </div>
                <div>
                  <span class="qualification-round"></span>
                  <span class="qualification-line"></span>
                </div>
              </div>

              <!-- qualifi 2 -->

              <div class="qualification-data">
                <div></div>

                <div>
                  <span class="qualification-round"></span>
                  <span class="qualification-line"></span>
                </div>

                <div>
                  <h3 class="qualification-title">
                    Full Stack Web Development
                  </h3>
                  <span class="qualification-subtitle">Udemy</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2021 - 2022
                  </div>
                </div>
              </div>

              <!-- qualifi 3 -->

              <div class="qualification-data">
                <div>
                  <h3 class="qualification-title">Frontend Development</h3>
                  <span class="qualification-subtitle">Coursera</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2021 - 2022
                  </div>
                </div>
                <div>
                  <span class="qualification-round"></span>
                  <span class="qualification-line"></span>
                </div>
              </div>

              <!-- qualifi 4 -->

              <div class="qualification-data">
                <div></div>
                <div>
                  <span class="qualification-round"></span>
                  <!-- <span class="qualification-line"></span> -->
                </div>
                <div>
                  <h3 class="qualification-title">Digital Marketing</h3>
                  <span class="qualification-subtitle">Google</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2019 - 2020
                  </div>
                </div>
              </div>
            </div>

            <!-- qualific content 2  -->
            <div class="qualification-content" data-content id="work">
              <!-- qualifi 1 -->
              <div class="qualification-data">
                <div>
                  <h3 class="qualification-title">Full Stack Developer</h3>
                  <span class="qualification-subtitle">Fiverr</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2022 - Present
                  </div>
                </div>
                <div>
                  <span class="qualification-round"></span>
                  <span class="qualification-line"></span>
                </div>
              </div>

              <!-- qualifi 2 -->

              <div class="qualification-data">
                <div></div>

                <div>
                  <span class="qualification-round"></span>
                  <span class="qualification-line"></span>
                </div>

                <div>
                  <h3 class="qualification-title">Ui/Ux Designer</h3>
                  <span class="qualification-subtitle">Freelancer</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2022 - Present
                  </div>
                </div>
              </div>

              <!-- qualifi 3 -->

              <div class="qualification-data">
                <div>
                  <h3 class="qualification-title">Content Creator</h3>
                  <span class="qualification-subtitle">YouTube</span>
                  <div class="qualification-date">
                    <i class="fa-solid fa-calendar-days"></i>
                    2019 - Present
                  </div>
                </div>
                <div>
                  <span class="qualification-round"></span>
                  <!-- <span class="qualification-line"></span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

     <!-- Project's Section -->
      <section class="services section" id="projects">
        <h2 class="section-title">Project's</h2>
        <span class="section-subtitle">My Recent Project's</span>
        <div class="services-container container grid">
          {{-- Loop untuk menampilkan semua data service --}}
          @foreach($services as $service)
            {{-- Periksa jika layanan memiliki proyek terkait --}}
            @if($service->projects->isNotEmpty())
              <div class="services-content">
                <div>
                  <i class="fa-solid fa-code services-icon"></i>
                  <h3 class="services-title">
                    {{ $service->service_name }} <br />
                  </h3>
                </div>
                <span class="button button-flex button-small button-link services-button">
                  View more
                  <i class="fa-solid fa-arrow-right button-icon"></i>
                </span>

                <div class="services-box">
                  <div class="services-box-content">
                    <h4 class="services-box-title">
                      Projects for {{ $service->service_name }}
                    </h4>
                    <i class="fa-solid fa-xmark services-box-close"></i>
                    <ul class="services-box-services grid">
                      <div class="swiper-wrapper">
                        {{-- Loop untuk menampilkan semua proyek terkait dengan layanan --}}
                        @foreach($service->projects as $project)
                          <div class="portfolio-content grid swiper-slide">
                            @if($project->project_photo)
                              <img src="{{ asset($project->project_photo) }}" alt="{{ $project->project_name }}" class="portfolio-img" />
                            @else
                              <img src="{{ asset('LandingPage/Assets/not_found.png') }}" alt="Default" class="portfolio-img" style="width: 100px; height: auto; border-radius: 5px;">
                            @endif
                            <div class="portfolio-data">
                              <h3 class="portfolio-title">{{ $project->project_name }}</h3>
                              <p class="portfolio-description">
                                {{ $project->project_description }}
                              </p>
                              <a href="{{ $project->project_link }}" target="_blank" class="button button-flex button-small portfolio-button">
                                Project Link
                                <i class="fa-solid fa-arrow-right button-icon"></i>
                              </a>
                            </div>
                          </div>
                        @endforeach
                      </div>

                      <div class="swiper-angles">
                        <div class="swiper-button-next">
                          <i class="fa-solid fa-angle-right swiper-icon"></i>
                        </div>
                        <div class="swiper-button-prev">
                          <i class="fa-solid fa-angle-left swiper-icon"></i>
                        </div>
                      </div>
                    </ul>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </section>


      <!-- contact me  -->
      <section class="contact section" id="contact">
        <h2 class="section-title">Contact me</h2>
        <span class="section-subtitle">Get in touch</span>

        <div class="contact-container container grid">
          <div>
            <div class="contact-info">
              <i class="fa-regular fa-envelope contact-icon"></i>
              <div>
                <h3 class="contact-title">Email</h3>
                <a
                  href="mailto:business.codehype@gmail.com"
                  target="_blank"
                  class="contact-subtitle"
                  >business.codehype@gmail.com</a
                >
              </div>
            </div>
            <div class="contact-info">
              <i class="fa-brands fa-linkedin-in contact-icon"></i>
              <div>
                <h3 class="contact-title">Linkedin</h3>
                <a
                  class="contact-subtitle"
                  href="https://www.linkedin.com/in/harisahmad59/"
                  target="_blank"
                  >@harisahmad59</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer Start -->
      <div class="footer wow fadeIn" data-wow-delay="0.3s">
        <div class="container-fluid">
          <div class="container">
            <div class="footer-info">
              <h2>Kate Winslet</h2>
              <h3>123 Street, New York, USA</h3>
              <div class="footer-menu">
                <p>+012 345 67890</p>
                <p>info@example.com</p>
              </div>
              <!-- Icon Social Media -->
              <div class="footer-social">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
          <div class="container copyright">
            <p>
              &copy; <a href="#">Your Site Name</a>, All Right Reserved |
              Designed By <a href="https://htmlcodex.com">HTML Codex</a>
            </p>
          </div>
        </div>
      </div>
      <!-- Footer End -->
    </main>

    <a href="#home" class="scrollup" id="scroll-up">
      <i class="fa-solid fa-arrow-up scroll-up-icon"></i>
    </a>
    <script src="{{ asset('LandingPage/Libraries/swiper-bundle.min.js')}}"></script>
    <script
      src="https://kit.fontawesome.com/9b634c15bd.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('LandingPage/script.js')}}"></script>
  </body>
</html>
