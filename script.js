var message = document.querySelector('textarea[name="message"]');

message.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();
    }
});