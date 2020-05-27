# Handover documentation

**We undertake the installation and one year of operation, thereafter we can discuss the prolongation.**


As we stated in the functional documentation the system serving the application must have  the following (or higher) technologies:

-   PHP 7.2
-   Apache 2.4.0
-   MySQL 8.0 
-  Recommended IDE:  NetBeans IDE 9.0
-  and cache functionality

## Functionality
|Expected by the functional specification|Current state|Remark|
|--|--|--|
| Browser standards: function properly in the expected browser versions (Mozilla Firefox, Microsoft Edge, Google Chrome)|Completed |A few display problem may occur during the usage of Firefox  |
|Home page|Completed||
|Register|Completed|As a registered user you have some privilege, but it is not required for using most of the functions.|
|Log in|Completed||
|Profile page|Completed|In the next version we may include the profile's data editing functions|
|Categories|Completed||
|Bestsellers|Completed||
|Shop page|Completed||
|Product page|Completed||
|Shopping cart|Completed| Works even when you are not logged in.|
|Order page|Completed|With checking the given data several times|
|Admin interface|Not Completed|	We may develope a user friendly interface for the admins as well in the next versions|


## Completed  functions in details

**Home page:**  The home page is the default page of the website, this is the first page the website visitors will see. People can easily navigate to other pages of the website in a self-evident way. The newest books and the bestsellers are displayed here. The design is clean and you can easily find what you are looking for.

**Register:**  On this page, the website visitor can register. Registration is optional, the users can surf through the products without it as well, and they don't need to be logged in if they want to buy something.  However being a registered user has it's benefits. Username, password, email address and gendre are required for registration. 

**Log in:**  Registered users can log in to their account using this page. They required to give their username and password to do so. After logging in they have access to their profile and every functionc connected to it.

**Profile page:**  In this page the registered and logged in user can see their personal informations. They can review their orders, and they can check their order's state.

**Categories:**  Each book falls into one or more categories. (for example Romantic, Krimi, Youth an Children) The customers can list the books by these categories using the search functions at the Shop page.

**Bestsellers:**  This is a special category which contains the top 5 book based on which they sold the most. It is displayed at the Home page.

**Shop page:**  On this page all of the available book will display. The customers can see the book's cover, title, author and price as well. To make it more manageable, they diplay on multiple pages and the users are able to switch between these. There is a Quick search option so the users can search by keyword. They can list the books by author genre (category) and price range as well using the right search field. There are other filters as well, users can search by language, publisher and even the number of the pages. They can add one or more book to their cart by clicking the 'Add to cart' button displayed on each and every book.

**Product page:**  This page can be reached by clicking the 'More' icon on one of the books on the shop page. This page should contain the informations about the selected book, such as the title, author, publisher, page number, description, language etc. There is a function to add the book to the cart from right here.

**Shopping cart:**  The products that had been added to the shopping cart are displayed here. During the shopping we can see a small icon at the top of the page to show us how many items are in the cart currently. Customers can delete a product and/or change quantity in this page. They can see the price for one book and the price they would have to pay in case of order.  This function also available if you are not a logged in user.

**Order page:**  Here customer can finalize their order by giving their shipping information. They should give they shipping and billing informations, which are checked multiple times before finalizing the order. After placeing an order, if you were logged in you can check your new order and it's state at your profile page.

**Due to the responsive design each and every page are displayed properly and in a clear way in every resolution.**


- The application is easily understandable and easy to use for the customers.
     
-  The application function in a logical manner for the users.
    
 -  The application uses styles that are consistent throughout the application.

## Next versions


In the next versions we may:

1.   *Develop a user friendly interface for the admins as with the following functions:*

- *Product management:*
 The admin would be able to add, remove and modify books in a user friendly and self-evident way.

-  *Order management:*
 The admin would be able to review and manage the incoming orders  in a user friendly and self-evident way.

2.  *Expand the list of supported browsers:*
- so it would function and display properly in more browsers

3.  *Add an inteface for the users/readers to give feedback or review on the books.*

4. *Add an interface for monthly/seasonal book reviews by professionals.*

5. *Create the base and the interface for a loyalty program.*
 
6.  *etc.*



