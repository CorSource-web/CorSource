$(document).ready(function() {
    function toggleLeaderClass() {
        if (window.innerWidth <= 600) {
            $(".leader").addClass("active");
            console.log("Class 'active' added for mobile view.");
        } else {
            $(".leader").removeClass("active");
            console.log("Class 'active' removed for desktop view.");
        }
    }

    // Run on page load
    toggleLeaderClass();

    // Run on window resize
    $(window).on("resize", function() {
        toggleLeaderClass();
    });
});
