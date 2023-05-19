$(document).ready(function() {
    $("#new").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "search.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2 // Minimum number of characters before search is performed
    });
});