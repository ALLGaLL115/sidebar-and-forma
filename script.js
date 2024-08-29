// script.js

function togglePopup() {
    $('#daysPopup').toggleClass("popup--active")
}

// Закрываем pop-up, если пользователь кликает вне его области
window.onclick = function(event) {
    const popupList = document.getElementById('daysPopup');
    if (!$(event.target).closest('#birthday')) {
        if (popupList.style.display === 'block') {
            popupList.style.display = 'none';
        }
    }

    
};
