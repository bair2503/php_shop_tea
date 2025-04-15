
$(document).ready(function() {
    // Поиск при вводе текста
    $('#header_search_input').on('input', function() {
        const query = $(this).val().trim();
        const resultsDiv = $('#header_search_results');
        
        if(query.length < 2) {
            resultsDiv.hide().html('');
            return;
        }

        // AJAX-запрос
        $.ajax({
            url: '/search_ajax.php',
            method: 'POST',
            data: { query: query },
            dataType: 'html',
            success: function(response) {
                resultsDiv.html(response).show();
            },
            error: function(xhr) {
                console.error('Ошибка:', xhr.statusText);
            }
        });
    });

    // Скрытие результатов при клике вне блока
    $(document).on('click', function(e) {
        if(!$(e.target).closest('#header_search_form').length) {
            $('#header_search_results').hide();
        }
    });
});
