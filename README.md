# Xiteb Lab - Test!

**Name :** E. Kaveeh Heshan
**Email :** kaveeshheshan95@gmail.com
**Position :** Software Engineer (PHP - Laravel)
**Time :** 8.5 Hours
**Technology Stack :** PHP(Laravel), HTML, CSS, Javascript, Ajax(Jquery).

## Project - Setup
1. Clone the project
2. Setup **.env** file with database credentials, Mail credentials etc.
3. Run **"composer update"**.
4. Then run **"npm install && npm run dev"**.
5. Run **"php artisan migrate"** or you can use the **backup SQL** file.
6. Run **"php artisan storage:link"** to create symlink.
7. Run **"Seeders"** respectively.
			I. RolesSeeder
			II. UserSeeder
8. Run **"php artisan serve"** to run the application.


## Process

- Firstly, Defined two user levels (staff member and user) and used Spatie/permission library to manage roles.
- Defined and developed alert system using Sweet - Alert library.
- Then added their layouts after design them.
- After that, I focused on the CRUD functionalities (Category and Subcategory).
- Then I developed products CRUD functionality and handled images functionality using image-uploader library.
- Category and Subcategory Show / hide functionality is developed and can be done using "Is Active" radio button.
- Then designed and developed list pages of categories, subcategories and products including the product view page. Each list pages linked and brings you filtered data.
- Inquery mail sending is handled using Laravel - Notification. 