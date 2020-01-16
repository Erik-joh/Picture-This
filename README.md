# Picture-This
## About
This is an assignment were we built an Instagram clone with the help of PHP,Javascript,CSS,HTML and SQLite.

## Requirements

* As a user I should be able to create an account. 
* As a user I should be able to login.
* As a user I should be able to logout.
* As a user I should be able to edit my account email, password and biography.
* As a user I should be able to upload a profile avatar image.
* As a user I should be able to create new posts with image and description.
* As a user I should be able to edit my posts.
* As a user I should be able to delete my posts.
* As a user I should be able to like posts.
* As a user I should be able to remove likes from posts.

## Getting started

* First clone this repository to your computer 
* Start a php server in your terminal by writing php -s localhost:8000
* Then open your browser and type localhost:8000

## Testers

* Henric Björkvall
* Jesper Lundqvist
* Viktor Puke

## Code review
By <a href="https://github.com/emeliepetersson"> Emelie Petersson </a>

[.gitignore#1](https://github.com/Erik-joh/Picture-This/blob/master/.gitignore#L1) - You have ignored the images folder, which prevents me from seeing my uploaded posts and profile image. Try adding: "assets/images/*" AND "!assets/images/.gitkeep" and add a .gitkeep file in your images folder.

- On pages that only user's should have access to you could add a function to check if user is logged in, otherwise send it back to the front page or display an error message.

[post.php#14](https://github.com/Erik-joh/Picture-This/blob/master/post.php#L14) - It would be cool if you could upload more than only .png files, maybe .jpeg and .gif as well!

[register.php#14](https://github.com/Erik-joh/Picture-This/blob/master/register.php#L14) - A tip is to make the user confirm the password as well, to prevent misspelling.

[store.php#19](https://github.com/Erik-joh/Picture-This/blob/master/app/posts/store.php#L19) - Instead of using date('ymd') when giving uploaded files a new name you could use uniqid(), to reduce the risk that two images get the same name.

[register.php#](https://github.com/Erik-joh/Picture-This/blob/master/app/users/register.php) - Maybe you could have a limit on the length of the password, so it won't work to have a one letter password.

[main.js#](https://github.com/Erik-joh/Picture-This/blob/master/assets/scripts/main.js) - I really like how you solved the like function!

[post.php#18](https://github.com/Erik-joh/Picture-This/blob/master/post.php#L18) - Is it necessary to require a description? meybe sometimes the user would like to post a photo without a text, but that's just my opinion! :)

[functions.php#101](https://github.com/Erik-joh/Picture-This/blob/master/app/functions.php) - I like your functions, they make your html-code look really clean and easy to understand!

[post.php#](https://github.com/Erik-joh/Picture-This/blob/master/post.php) - Could be nice to get som kind of confirmation message when you have uploaded a post.

Really nice and clean code! Well done!

## Made by
* Erik Johannesson

## License
This project is licensed under MIT license
