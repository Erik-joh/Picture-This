"use strict";

const likeForms = document.querySelectorAll(".like-form");

likeForms.forEach(likeForm => {
    likeForm.addEventListener("submit", event => {
        event.preventDefault();
        let likeButton = likeForm.querySelector("button");
        let numberOfLikes = likeForm.lastElementChild;
        if (likeButton.classList.contains("Unlike")) {
            likeButton.classList.replace("Unlike", "Like");
            likeButton.textContent = "Unlike";
        } else {
            likeButton.classList.replace("Like", "Unlike");
            likeButton.textContent = "Like";
        }
        const likeFormData = new FormData(likeForm);

        fetch("app/posts/likes.php", {
            method: "POST",
            body: likeFormData
        })
            .then(response => response.json())
            .then(result => (numberOfLikes.textContent = result));
    });
});
