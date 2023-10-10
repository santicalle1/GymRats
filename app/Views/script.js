document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        var messageElements = document.querySelectorAll('.message');
        
        for (var i = 0; i < messageElements.length; i++) {
            messageElements[i].style.opacity = '0';
        }

        setTimeout(function() {
            for (var i = 0; i < messageElements.length; i++) {
                messageElements[i].remove();
            }
        }, 1000); // 1 segundo después, que es el tiempo que dura la transición.
    }, 5000); // Después de 5 segundos.
});
