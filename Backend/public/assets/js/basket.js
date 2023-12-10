document.addEventListener("DOMContentLoaded", function() {
    const removeButtons = document.querySelectorAll('.remove-item');

    if (removeButtons) {
        removeButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const itemId = this.getAttribute('data-item');
                const confirmation = confirm('Are you sure you want to remove this item?');

                if (confirmation) {
                    const url = `/remove-item/${itemId}`;

                    fetch(url, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if(response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Failed to remove item');
                        }
                    })
                    .then(data => {
                        console.log(data.message);
                        if(data.success) {
                            window.location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        });
    }
});