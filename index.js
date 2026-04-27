document.addEventListener('DOMContentLoaded', () => {
    getData();
})

async function getData() {
    
    const container = document.getElementById('movie-container');
    const response = await fetch('/controller/MovieController.php');
    const data = await response.json();

    data.forEach(film => {
        
        const movieCard = document.createElement('div');
            movieCard.className = 'movie-card';

            movieCard.innerHTML = `
                <h3>${film.title}</h3>
                <p><strong>Director:</strong> ${film.director}</p>
                <p><strong>Released:</strong> ${film.release_date}</p>
                <p><strong>Duration:</strong> ${film.duration}h</p>
                <hr>
            `;

            container.appendChild(movieCard);
    });
}