document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categorySelect = document.getElementById('categorySelect');
    const cards = document.querySelectorAll('.card');

    function filterBooks() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categorySelect.value.toLowerCase();

        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            const genre = card.querySelector('.card-text').textContent.toLowerCase();

            const matchesSearch = title.includes(searchTerm);
            const matchesCategory = selectedCategory === '' || genre.includes(selectedCategory);

            if (matchesSearch && matchesCategory) {
                card.style.display = '';
                card.classList.add('card-adjusted'); // Apply the adjusted card style
            } else {
                card.style.display = 'none';
                card.classList.remove('card-adjusted'); // Remove the adjusted card style
            }
        });
    }

    searchInput.addEventListener('input', filterBooks);
    categorySelect.addEventListener('change', filterBooks);

    // Apply styles initially
    cards.forEach(card => {
        card.classList.add('card-adjusted');
    });
});
