</main>

 <footer class="footer">
        <div class="container-fluid p-0">
            <div class="row text-left">
                <div class="col-md-5 col-sm-5">
                    <h4 class="text-light">About us</h4>
                    <p class="text-muted"> Lifey has several possible meanings - As an adjective, it means to be full of life, spirited (Merriam-Webster Dictionary).</p>
                    <p class="pt-6 text-muted">Copyright ©2019 All rights reserved | This template is made with by
                        <span>Joy-Jahin production</span>
                    </p>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h4 class="text-light">Message</h4>
                    <p class="text-muted">Stay connected</p>
                    <form class="form-inline">
                        <div class="col pl-0">
                            <div class="input-group pr-5">
                                <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12">
                    <h4 class="text-light">Follow Us</h4>
                    <p class="text-muted">At any service</p>
                    <div class="column text-light">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="../js/custom/register_login.js"></script>


    <script>


        let navbar = $(".navbar");

        $(window).scroll(function() {

            let oTop = $(".footer").offset().top - window.innerHeight;
            if ($(window).scrollTop() > oTop) {
                navbar.addClass("sticky");
            } else {
                navbar.removeClass("sticky");
            }
        });


        let nCount = selector => {
            $(selector).each(function() {
                $(this)
                    .animate({
                        Counter: $(this).text()
                    }, {

                        duration: 4000,

                        easing: "swing",

                        step: function(value) {
                            $(this).text(Math.ceil(value));
                        }
                    });
            });
        };

        let a = 0;
        $(window).scroll(function() {

            let oTop = $(" ").offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() >= oTop) {
                a++;
                nCount(" ");
            }
        });

    </script>

</body>
</html>
