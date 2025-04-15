function performSearch() {
    const searchTerm = document.getElementById('search_input').value;
    const resultsDiv = document.getElementById('search_results');
    
    if(searchTerm.length < 2) {
        resultsDiv.innerHTML = '';
        return;
    }

    // Задержка для уменьшения запросов (300 мс)
    setTimeout(() => {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'search.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function() {
            if(this.status == 200) {
                resultsDiv.innerHTML = this.responseText;
                resultsDiv.style.display = 'block';
            }
        };
        
        xhr.send('query=' + encodeURIComponent(searchTerm));
    }, 300);
}

// Скрытие результатов при клике вне блока
document.addEventListener('click', function(e) {
    if(!e.target.closest('.menu_search')) {
        document.getElementById('search_results').style.display = 'none';
    }
});
