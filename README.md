1.<p>Article cms test, including blades and JSON API response.</p>
2.Create a 'cms_article'mysql database before running, set user name: 'root', password: 'root'
3.Website now is using normal rest api to run.
4.In the ArticleController and route file, included 'list' to access JSON response of all results and 'show_articles/{article}' to show a specific record.
5.Please check the auth system of normal user/visitor and admin user, visitor and normal user could not see create, update and delete options, and will be redirected even if they entered the right urls.
6.By default, users can only register as 'user', and have to alter the user role to 'admin' from the database, which reflects the real environment.
7.Once admin users logged in, they can create, edit and records will be saved to the database, and when being shown, author(admin names) will be displayed under title. 
