$(document).ready(function () {
    $("#productToggle").click(function (e) {
        e.stopPropagation();
        $("#productDropdown").collapse("toggle");
    });

    $(document).click(function (e) {
        if (!$(e.target).closest("#productToggle, #productDropdown").length) {
            $("#productDropdown").collapse("hide");
        }
    });

    $("#logoutButton").click(function () {
        if (confirm("Are you sure you want to log out?")) {
            $("#logoutForm").submit();
        }
    });
});
