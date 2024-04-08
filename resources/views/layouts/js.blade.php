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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<script>
    $(document).ready(function() {
        var minPrice = parseInt($('#min_price').val());
        var maxPrice = parseInt($('#max_price').val());

        if (isNaN(minPrice) || isNaN(maxPrice)) {
            minPrice = 0;
            maxPrice = 1000; // Set default values if parsing fails
        }

        $('#price_slider').slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $('#min_price_label').text('$' + ui.values[0]);
                $('#max_price_label').text('$' + ui.values[1]);

                // Update hidden input fields with slider values
                $('#min_price').val(ui.values[0]);
                $('#max_price').val(ui.values[1]);
            }
        });

        $('#min_price_label').text('$' + minPrice);
        $('#max_price_label').text('$' + maxPrice);
    });
</script>
<script>
    // Attach event listener to the dropdown menu
    document.querySelector(".submitButton").addEventListener("change", function() {
        // Submit the form when an option is selected
        this.parentElement.submit();
    });
</script>
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