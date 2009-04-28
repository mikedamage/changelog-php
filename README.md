Changelog PHP
================

by Mike Green

[mike.is.green@gmail.com](mailto:mike.is.green@gmail.com)

About
-------
Changelog PHP arose from the need to collaborate with another agency (who doesn't understand the concept of revision control...) on a client's website.
We decided to implement a changelog to document the modifications, additions, deletions, etc. we made to the website. After deciding to use Markdown to format the log, I started thinking about cool ways to interpret and visualize the data.

Wouldn't it be cool if there were a drop-in script (PHP or a Sinatra app) that would publish the changelog as an RSS feed so the collaborators could keep track of one another's work? Bam. Changelog PHP and its sister project, Changelog RB (a Sinatra app) were born.

This project, __Changelog PHP__, is meant to be placed in a subfolder of the site's document root (i.e. /changelog). It follows the MVC (Model View Controller) design pattern and it's my first attempt at using this design pattern with PHP.