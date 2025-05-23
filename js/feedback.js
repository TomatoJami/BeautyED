let currentReview = 0;
const reviews = document.querySelectorAll('.review-item');

function showReview(index) {
    reviews.forEach((el, i) => {
        el.style.display = i === index ? '' : 'none';
    });
}

function nextReview() {
    currentReview = (currentReview + 1) % reviews.length;
    showReview(currentReview);
}

function prevReview() {
    currentReview = (currentReview - 1 + reviews.length) % reviews.length;
    showReview(currentReview);
}