# Project requirements to install

- git
- php
- composer


# Setup the project

1. fork from git@github.com:jbieneck/vacation-apartments-rest-api-sdk-php.git
2. ```git clone git@github.com:<your-github-username-goes-here>/vacation-apartments-rest-api-sdk-php.git```
3. ```cd holiday-home-elisabeth```
4. ```curl -sS https://getcomposer.org/installer | php```
5. ```php composer.phar install```
6. start apache in xampp manager

# Contribute a feature

1. setup the project
2. ```git checkout -b <your-feature-branch>```
3. do your changes
  - FOCUS on fulfilling one single task
  - test your changes
  - add an example for new API calls
  - adjust md files where necessary
4. ```git commit -am "adds <feature>"```
5. ```git push -u origin <your-feature-branch>```
6. send a pull request to the develop branch of git@github.com:jbieneck/vacation-apartments-rest-api-sdk-php.git


# Testing

## automated tests
not necessary since this is just a simple webpage


## manual tests
- test layout changes in browsers and mobile devices
  - IE, Firefox, Chrome - use the good old xampp
  - mobile test simulator (mobile, tablet, browser size)
    - browser's developer tools often offer a configurable mobile view
    - you can also use adt (android development toolkit) for mobile devices
    - don't forget: mobile devices have different screen sizes and screen rotation
      resulting in a variety of display width
