function showNotification(message) {
    var notification = document.getElementById('notification');
    notification.innerHTML = message;
    notification.style.display = 'block';

    // Hide notification after 3 seconds
    setTimeout(function() {
        notification.style.display = 'none';
    }, 3000);
}