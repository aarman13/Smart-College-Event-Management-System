document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('eventSearchInput');
    const searchBtn = document.getElementById('searchBtn');

    function performSearch() {
        const query = searchInput.value.trim();
        if (query !== "") {
            // Redirect to the new backend page we are about to create
            window.location.href = `search_results.php?query=${encodeURIComponent(query)}`;
        } else {
            alert("Please enter an event name to search.");
        }
    }

    searchBtn.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') performSearch();
    });
});