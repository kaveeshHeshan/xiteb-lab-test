# Xiteb Lab - Test!

- **Name :** E. Kaveeh Heshan
- **Email :** kaveeshheshan95@gmail.com
- **Position :** Software Engineer (PHP - Laravel)
- **Time for Developments :** 10.5 Hours
- **Technology Stack :** PHP(Laravel), HTML, CSS, Javascript, Ajax(Jquery).

## Project - Setup
1. Clone the project or download it from Google drive as explained in the email (Links are provided in the email) or from follwing links.
    
	> [Google Drive](https://drive.google.com/file/d/1RzVuyck6uubdiCPTox-MUrCtLSLXIONV/view?usp=sharing)
	
	> [GITHUB](https://github.com/kaveeshHeshan/xiteb-lab-test)

2. Setup **.env** file **by coping and renaming .env.example file** with database credentials, Mail credentials etc.
3. Run **"composer update"**.
4. Then run **"npm install && npm run dev"**.
5. Run **"php artisan migrate"** or you can use to import the **backup DB SQL** file in **Backup folder** under **DB** folder.
6. I have added the images I have used for the system in **Backup folder** under **images** folder as well.
6. Run **"php artisan storage:link"** to create symlink.
7. Run **"Seeders"** according to the order given below.

		I. RolesSeeder - php artisan db:seed --class=RoleSeeder
		II. UserSeeder - php artisan db:seed --class=UserSeeder
		III. PermissionSeeder - php artisan db:seed --class=PermissionSeeder
		IV. PermissionSyncSeeder - php artisan db:seed --class=PermissionSyncSeeder

8. Run **"php artisan serve"** to run the application.


## Process

- I have used Laravel version 8 for this project.
- Firstly, I defined two user levels (staff member and user) and used Spatie/permission library to manage roles and handled the redirection part.
- Then I have implemented the access controling part for the users and staff members.
- I defined and developed alert system using Sweet Alert library.
- Then added layouts after design them.
- After that, I focused on the CRUD functionalities (Category and Subcategory).
- In subcategories, I have added foreign key fields to identify which category is this belongs to.
- Then I developed products CRUD functionality and handled images functionality using image-uploader library.
- In here also, I have added foreign key fields to products table in order to identify which subcategory is the product belongs to.
- Then I have created a pivot table to store product images information and retrieved relavent details through a relationship.
- Product Cover image will be the first image you added to the image array.
- Category and Subcategory Show / hide functionality is developed and can be done using "Is Active" radio button.
- Then designed and developed list pages of categories, subcategories and products including the product view page. Each list pages linked and brings you filtered data.
- Inquery mail sending is handled using Laravel - Notification and used mailtrp credentials to Test Email.