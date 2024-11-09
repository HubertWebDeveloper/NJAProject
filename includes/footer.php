<!-- FAQs -->


<footer class="footer" style="background:#3b5d50">
    <div class="container" style="padding:20px 0">
        <div class="footer__inner">
            <div class="footer__item">
            <!-- after make an action target="_blank" -->
                <form action="#" method="post">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div class="form-group">
                            <h5 class="mb-1 text-white">Learn More About NJA Church Activities</h5>
                            <div class="form-text mt-0 text-white">Explore tips on participating, volunteering, or supporting church events. Stay connected.</div>
                        </div>
                        <div class="d-flex align-items-start">
                            <a href="https://wa.me/+2547422413" target="_blank"><i class="fab fa-whatsapp" style="color:green;margin-right:20px;font-size:32px"></i></a>
                            <a href=""><i class="fab fa-instagram" style="color:orange;margin-right:20px;font-size:32px"></i></a>
                            <a href=""><i class="fab fa-facebook" style="color:blue;margin-right:20px;font-size:32px"></i></a>
                            <a href=""><i class="fab fa-youtube" style="color:red;margin-right:20px;font-size:32px"></i></a>
                        </div>
                    </div>
                </form>
            </div>
            <hr style="color:white">
            <div class="footer__item d-lg-flex justify-content-lg-between align-items-lg-center">
                <ul id="menu-seller-footer" class="nav sub-nav footer__sub-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="s.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="s.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="s.php">Prayer Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="s.php">Special ConsultationByPastor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="s.php">ContactUs</a>
                    </li>
                </ul>
                <p class="hidden-sm-down d-none d-lg-block text-white">Developed and Designed By <a href="#" class="text-light">Hubert Developer.</a></p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- --------- slick slide -------- -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    let videoBtn = document.querySelectorAll('.vid-btn');

    videoBtn.forEach(btn =>{
        btn.addEventListener('click', ()=>{
            document.querySelector('.controls .active').classList.remove('active');
            btn.classList.add('active');
            let src = btn.getAttribute('data-src');
            document.querySelector('#video-slider').src = src
        });
    });

</script>
<script>
    
    $(document).ready(function(){
        $('.slick-slider').slick({
            slidesToShow: 5, // Default number of slides
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: true,
            responsive: [
                {
                    breakpoint: 1200, // Below 1200px wide
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992, // Below 992px wide
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768, // Below 768px wide (tablet)
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576, // Below 576px wide (mobile)
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    var sliderNav = function(manual){
        btns.forEach((btn) => {
            btn.classList.remove("active");
        });

        slides.forEach((slide) => {
            slide.classList.remove("active");
        });

        btns[manual].classList.add("active");
        slides[manual].classList.add("active");
    }
    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            sliderNav(i);
        });
    });
    // --------------- slider images -----------
    $(document).ready(function() {
        $(".MyTextarea").summernote({
            height: 250,
            display: none
        });
        $(".MyText").summernote({
            height: 100
        });
        $(".largeText").summernote({
            height: 550
        });
        $('.dropdown-toggle').dropdown();
    });
    $(document).ready(function() {
    $('.mySelect2').select2();
    });
    $(document).ready( function () {
      $('#myTable').DataTable();
    });$(document).ready( function () {
      $('#myTable_customer').DataTable();
    });$(document).ready( function () {
      $('#myTable_categ').DataTable();
    });$(document).ready( function () {
      $('#myTable_prod').DataTable();
    });
    // =============== allow to use multiple input ===============
    
  </script>
</body>

</html>
