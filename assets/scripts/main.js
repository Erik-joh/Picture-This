"use strict";

const likeForms = document.querySelectorAll(".like-form");

likeForms.forEach(likeForm => {
    likeForm.addEventListener("submit", event => {
        event.preventDefault();
        let likeButton = likeForm.querySelector("button");
        let numberOfLikes = likeForm.lastElementChild;
        if (likeButton.classList.contains("unliked")) {
            likeButton.classList.replace("unliked", "liked");
        } else {
            likeButton.classList.replace("liked", "unliked");
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
