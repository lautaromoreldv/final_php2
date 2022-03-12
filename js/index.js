let cards = document.querySelectorAll('.card');
cards.forEach(card => {
    card.onmouseover = () => {
        card.style.border = '1px solid #000';
    }
    card.onmouseout = () => {
        card.style.border = '1px solid rgba(0, 0, 0, 0.125)';
    }
});




