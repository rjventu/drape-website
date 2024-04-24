# Drape

> This project is a simple e-commerce website with the Drape branding, a local Philippine online clothing brand. It features an intuitive and user-friendly grid gallery layout to browse Drape's product listings, basic e-commerce functionalities such as cart management and checkout processes. The project also features an admin and customer panel, where website/business admins can manage product/order inventory and customers can view and check their current and previous orders.

**How to run Drape on your local machine**

1. Download/clone/whatever this repository. Either way, you should have a *drape-website* folder with all files from the repo.
2. Download and install [XAMPP](https://www.apachefriends.org/download.html)
3. Run XAMPP and select 'start' on Apache and MySQL (first two options on the XAMPP Control Panel).
4. Locate XAMPP's installation folder go to *htdocs*.
5. Move the *drape-website* folder into the *htdocs* folder.
6. Open your browser and go to [phpmyadmin](http://localhost/phpmyadmin/).
7. Select 'New' on the sidebar and in the 'Create New Database' field, type in a name for the Drape database.
8. Get the *drape.sql* file and drag it to the phpmyadmin page to upload the database.
9. Type *localhost/drape-website/src/main* into the browser.
10. The website should load and function correctly.
