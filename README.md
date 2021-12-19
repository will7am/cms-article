Article cms test, including blades and JSON API response.
Website now is using noraml rest api to run. 
In the ArticleController and route file, included 'list' to access JSON response of all results and 'show_articles/{article}' to show a specific record.
Please check auth system of normal user/visiter and admin user, visiter and normal user could not see create, update and delete options
By default, user can only register as 'user', have to alter user role to 'admin' from database, which reflects real environment.
Once admin users logged in, they can create, edit and records will be saved to database, and when being shown, author(admin names) will be displayed under title.
