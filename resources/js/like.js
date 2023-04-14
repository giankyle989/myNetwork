
    const likeBtn = document.querySelector('.like-btn');
    const likeForm = document.querySelector('.like-form');
    likeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        // Toggle the button text
        if (likeBtn.textContent === 'Like') {
            likeBtn.textContent = 'Unlike';
        } else {
            likeBtn.textContent = 'Like';
        }
        // Submit the form using AJAX
        const formData = new FormData(likeForm);
        fetch('/like', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error(error));
    });
