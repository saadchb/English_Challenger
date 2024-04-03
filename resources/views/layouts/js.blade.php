
    <!-- Main jQuery -->
    <script src="{{asset('build/assets/vendors/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{asset('build/assets/vendors/bootstrap/bootstrap.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('build/assets/vendors/counterup/waypoint.js')}}"></script>
    <script src="{{asset('build/assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('build/assets/vendors/jquery.isotope.js')}}"></script>
    <script src="{{asset('build/assets/vendors/imagesloaded.js')}}"></script>
    <!--  Owlk Carousel-->
    <script src="{{asset('build/assets/vendors/owl/owl.carousel.min.js')}}"></script>
    <script src="{{asset('build/assets/js/script.js')}}"></script>
    <!-- <script src="build/assets/js/index_English.js"></script> -->


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll(".star");
        const ratingText = document.querySelector(".gd-rating-text");

        // Add event listeners to each star icon
        stars.forEach(function(star) {
            star.addEventListener("mouseenter", function() {
                const value = parseInt(star.dataset.value);
                // Update color of stars based on the hovered star's value
                stars.forEach(function(s, index) {
                    s.style.color = index < value ? "gold" : "#afafaf";
                });
                // Update rating text based on the hovered star's value
                const ratings = ["Terrible", "Poor", "Average", "Very Good", "Excellent"];
                ratingText.textContent = ratings[value - 1];
            });

            star.addEventListener("click", function() {
                const value = parseInt(star.dataset.value);
                // Store selected rating in hidden input field
                document.getElementById("rating").value = value;
            });
        });
    });
</script>
