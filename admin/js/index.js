document.addEventListener("DOMContentLoaded", function() {
    const questionContainers = document.querySelectorAll('.question-container');

    questionContainers.forEach(container => {
        const questionList = container.querySelector('.question-list');
        const hiddenContent = container.querySelector('.hidden-content');
        const plus = container.querySelector('.plus');

        questionList.addEventListener('click', function() {
            // Toggle the clicked container
            hiddenContent.classList.toggle('show');
            plus.classList.toggle('active');
        });
    });
});