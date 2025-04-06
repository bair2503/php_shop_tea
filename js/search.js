document.getElementById('search_input').addEventListener('input', function () {
    const query = this.value.trim();

    if (query.length < 3) {
        document.getElementById('search_results').innerHTML = '';
        return;
    }

    fetch('blocks_header_footer/search_ajax.php?q=' + encodeURIComponent(query))
        .then(response => response.text())
        .then(data => {
            document.getElementById('search_results').innerHTML = data;
        })
        .catch(error => {
            console.error('Ошибка поиска:', error);
        });
});