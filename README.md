# Laravel: Testing 101
This is the repository for the LinkedIn Learning course Laravel: Testing 101. The full course is available from [LinkedIn Learning][lil-course-url].

![course-name-alt-text][lil-thumbnail-url]

_See the readme file in the main branch for updated instructions and information._
## Instructions
This repository has branches for each of the videos in the course. You can use the branch pop up menu in github to switch to a specific branch and take a look at the course at that stage, or you can add `/tree/BRANCH_NAME` to the URL to go to the branch you want to access.

## Branches
The branches are structured to correspond to the videos in the course. The naming convention is `CHAPTER#_MOVIE#`. As an example, the branch named `02_03` corresponds to the second chapter and the third video in that chapter.
Some branches will have a beginning and an end state. These are marked with the letters `b` for "beginning" and `e` for "end". The `b` branch contains the code as it is at the beginning of the movie. The `e` branch contains the code as it is at the end of the movie. The `main` branch holds the final state of the code when in the course.

When switching from one exercise files branch to the next after making changes to the files, you may get a message like this:

    error: Your local changes to the following files would be overwritten by checkout:        [files]
    Please commit your changes or stash them before you switch branches.
    Aborting

To resolve this issue:

    Add changes to git using this command: git add .
	Commit changes using this command: git commit -m "some message"

## Installing
1. To use these exercise files, you must have the following installed:
    - php8 server
    - mysql
    - sqlite
    - code editor
    - git, when using the course git repository
2. Clone this repository into your local machine using the terminal (Mac), CMD (Windows), or a GUI tool like SourceTree.
3. Clone **.env.example** renaming to **.env** .
4. Edit .env with your db credentials and the project url.
5. Run **composer update**.
6. Run **php artisan key:generate**.
7. Run **php artisan migrate --seed**.
8. Run **php artisan storage:link**
   Login on /login with the email **me@linkedinlearner.com** and the password **me@linkedinlearner.com**


[0]: (Replace these placeholder URLs with actual course URLs)

[lil-course-url]: https://github.com/LinkedInLearning/laravel-testing-101-2515081
[lil-thumbnail-url]: http://
