function change_theme(dark_mode) {
    if (dark_mode) {
        // for contrast with child segments
        $("#body_container").css("background-color", "#121212");
        // most Semantic UI elements have the "ui" class
        // useful to skip over elements with some class, such as "ignore_dark_mode"
        $(".ui").not(".ignore_dark_mode").addClass("inverted");
        // change the state of all dark mode toggle buttons
        $(".dark_mode_toggle:checkbox").prop("checked", true);
    } else {
        $("#body_container").css("background-color", "");
        $(".inverted").not(".ignore_dark_mode").removeClass("inverted");
        $(".dark_mode_toggle:checkbox").prop("checked", false);
    }
}