$(document).ready(function () {
    $('#search_input').on('input', function () {
        const query = $(this).val().trim();

        if (query.length < 3) {
            $('#search_results').html('');
            return;
        }

        $.get('blocks_header_footer/search_ajax.php?q=' + encodeURIComponent(query), function (data) {
            $('#search_results').html(data);
        });
    });
});