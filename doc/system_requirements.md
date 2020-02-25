# Overview

## About this document

<TEXT>


## Project overview

<TEXT>



# Technologies used

## Content management system (CMS) – Laravel

<TEXT>


## Web framework – Bootstap

<TEXT>


## Web server – Apache

<TEXT>


## Programming language – PHP

<TEXT>


## Communication – Discord, GitHub

<TEXT>


## Data structure store – MySQL

<TEXT>


## JavaScript frameworks – jQuery, etc...

<TEXT>



# Business Requirements

## Scope – A breakdown of the project, from development to release, to support.

<TEXT>


## Team – Roles and responsibilities for each member of the project.

<TEXT>


## Task workflow – Who creates tasks? Where do they create them? Who decides if a task is completed?

<TEXT>


## Deploy workflow – How many deploy environments are you going to have? Who has access to them? Who decides when and where to deploy?

<TEXT>


# Functional Requirements

## UX requirements 
**Browsing:** The customer should be able to look around between the products at the Shop Page.


**Search:** The customer should be able to filter and search products. The user could search a book by its name, author, publisher or category.


**Detailed information:** The customer should be able to get detailed informations about the product of his/her choice. 


**Shopping cart:** The customer should be able to add products to his/her cart. 


**Wish list:** The customer should be able to add products to his/her wish list.


**Purchase:** The customer should be able to buy products. They could buy the products in their shopping cart. They can finalize their order by giving their shipping information. They should select the mode of delivery (the delivery company, the place of receipt). Moreover, they should choose the payment method. They should be able to use coupons.


**Register:** The users should be able to sign up. This is also required for shopping and to use the shopping cart and the wish list. After registration they will have a Profile Page.


**Data modification:** The customer should be able to modify his/her personal informations at the Pofile Page. (after some sort of verification)


<TEXT>


## Management requirements – What should staff and management be able to do? Examples: access admin panel, check order history, create invoices, etc.

<TEXT>


## Marketing requirements – What type of marketing activities should your website support? Examples: launch email marketing campaigns, create discounts and promo codes/gift cards, change cart price rules, etc.

<TEXT>


## Sales requirements – What should your sales/management team be able to do? Examples: add payment and shipping methods, change prices, manage categories, etc.

<TEXT>

# Features

<TEXT>


# Permission Scheme  
  

As the webshop will implement a user authentication system, we must determine who can access the resources, what is allowed for them and what is not. These permissions are the following:  
  

## Guest  
  

Registration is recommended but not necessary. Every unregistered or logged out visitor is in this category.  
Guests are allowed to:  

- See informational pages (about us, policies, etc.)  
- List every item in the shop inventory, if it is not deleted or hidden.  
- Use the item filters.  
- Show the details of a specific item.  
- Purchase items  
- Registrate a new account  
- Log In to an existing account  
- Ask for password reset on an existing account  
  

## Customer  
  

A customer is a user who registered through the registration form of the webshop.  
They are allowed to:  

- See informational pages (about us, policies, etc.)  
- See their own profile  
- Edit the following fields on their own account:  
- Full name  
- Email  
- Password  
- Date of birth  
- Default UI language (in a later version)  
- Saved billing address  
- Saved shipping address  
- List every item in the shop inventory, if it is not deleted or hidden.  
- Use the item filters.  
- Show the details of a specific item.  
- Purchase items  
- Log Out to an existing account  
  

## Secretary  
  

This role can only be given by an Administrator. This role is responsible for managing stock items. Secretaries have every permission as a customer, furthermore, they can:  

- Add new items  
- Remove items  
- Edit every field on items except the ID field.  
  

## Support  
  

This role can only be given by an Administrator. This role is responsible for the user helpdesk. Supports have every permission as a customer, furthermore, they can:  

- See every detail on customers  
- Modify every field on customers except ID  
- See every detail on orders  
- Modify every field on orders except ID

# Database

## Objects

- **User**: Every account registered on the site. 
	- **ID**: Identification number, **unique** for every user. To avoid index vulnerabilities this field is NOT automaticaly incremented, but a randomly generated hexadecimal number (ex. 5e52c36ecd40a). The business layer is responsible for the uniquenes of the generated number. Can not be changed later!
	- **Full name**: Full name of the user as filled in registration form.
	- **Email**: Email address, must be valid.
	- **Gender**: Choosable on registration.
	- **Date of birth**: Optional. Birth date of user. In later versions might be used to automaticaly generate special offers or to recommend featured products
	- **Language**: UI language for later version compatibility.
	- **Password**:  One-way hashed password.
	- **Billing address**: Default billing address for this user (if any).
	- **Shipping address**: Default shipping address for this user (if any). If this is empty, but the Billing address is filled use that as shipping address.
	- **Authority**: Authority of the user. As later versions will come out, new permissions might be implemented. Value can be:
		- 0 = Account is deactivated.
		- 1 = Email is not confirmed.
		- 2 = Customer.
		- 3 = Secretary.
		- 4 = Support.
		- 9 = Admin.
	- **Created at**: This field will contain the date and time when the user registered.
- **Book**: The products in the webshop inventory
	- **ID**: Unique Identifier. Can be automatically incremented.
	- **ISBN**: However this field should be unique it is possible that some book will not  have an ISBN.
	- **Title**: Special UTF-8 characters are possible.
	- **Author**: Multiple authors are possible.
	- **Publisher**: Only one publisher per book.
	- **Year of publishing**: Only the year is sufficient.
	- **Genre**: Most books will be associated with more than one genre.
	- **Page Count**: Page count of the book
	- **Language**: Language of the book
	- **Description**: Short, brief description of the book, mostly used in promotional materials. In a later version the website will operate in multiple languages, but description will be writen in the same language as the book it self. 
	- **Price**: Current price of the book in Hungarian Forints. Decimals are not neccessary.
	- **Discount**: The current discount (if any) in percentage. Can be empty, and 0% should be considered as empty.
	- **In Stock**: Number of books on storage.
	- **Can be Ordered**: Marks if this book can be ordered or not.
	- **Can be Preordered**: Marks if users can order this book even if the invenoty does not have the neccessary amount.
- **Order**: Note that order data DOES NOT contain the actualy ordered items. Those will be in a separate helper object, called "[package](#helper-tables)" which will have a referance to the order it self.
	- **ID**: Identification number, **unique** for every order. To avoid index vulnerabilities this field is NOT automaticaly incremented, but a randomly generated hexadecimal number (ex. 5e52c36ecd40a). The business layer is responsible for the uniquenes of the generated number. Can not be changed later!
	- **User**: To determine which user put the order. Can be empty if the customer was not logged in.
	- **Billing**: Billing Address. If the user have a default billing address, copy the id here.
	- **Shipping**: Shipping Address. If the user have a default shippingaddress, copy the id here.
	- **Coupon**: Used coupon for this order (one coupon per order). Can be empty.
- **Address**: To enable non-registered purchases adresses are stored separately from user data.
	-  **TIN**: Tax Identification number. If the user is registered as a business, this field is neccessary, otherwise it is empty. For this reason logic layer can use this field to determine if the ordering customer is a natural person or a company.
	- **Country**: Only real countries should be allowed
	- **Post code**: Keep in mind that different countries have different postal code format. For now this field is not validated.
	- **City**: In a later version this should be determined from post code.
	- **Street**: Street name
	- **House**: House number with all neccessary other information (floor, door, building, etc.)
	- **Note**: Additional information about the shipping or the order.

- **Author**:
	- **ID**: Unique Identifier. Can be automatically incremented.
	- **Name**: Name of the author
- **Publsiher**:
	- **ID**: Unique Identifier. Can be automatically incremented.
	- **Name**: Name of the publisher 
- **Genre**:
	- **ID**: Unique Identifier. Can be automatically incremented.
	- **Name**: Name of the genre
- **Country**:
	- **ID**: Unique Identifier. Can be automatically incremented.
	- **Name**: Name of the country
- **Coupon**:
	- **ID**: Identification number, **unique** for every coupon. To avoid index vulnerabilities this field is NOT automaticaly incremented, but a randomly generated hexadecimal number (ex. 5e52c36ecd40a). The business layer is responsible for the uniquenes of the generated number. Can not be changed later!
	- **Action**: ID of the discount this coupon should give
	- **Used**: True if this coupon is used, empty or false otherwise
- **Action**: This will be the discount a coupon can provide. Please note that some coupons does not give the customer cheeper product price, but for example gifts. These should be handled by logic layer.
	- **ID**:  Identification number, **unique** for every coupon. To avoid index vulnerabilities this field is NOT automaticaly incremented, but a randomly generated hexadecimal number (ex. 5e52c36ecd40a). The business layer is responsible for the uniquenes of the generated number. Can not be changed later!
	- **Description**: Text description for the action
	- **Discount**: The amount of discount this action provides. If this coupon provides gifts, this field can be used as a parameter field.
	- **Is percentage**:  If true, the "Discount" field is used as multiplicative ("0.2" is "-20%" because the price will be multiplied with the discount). If false the "Discount" field will be subtracted from the price.
	- **From sum**: 
		- If true, the Discount should be applied to the sum of the order. 
		- If false it should be applied on the most expensive item only. 
		- If empty, this action provides something other then discount.

## Helper tables

For some table connections additional "helper" tables are required.

- **Multiple author of a single book**:
	- Book ID
	- Author ID
- **Multiple genre of a single book**:
	- Book ID
	- Genre ID
- **Multiple books in a single order (PACKAGE)**:
	- Order ID
	- Book ID
	- Quantity
## Database Plan
Database plan is also available [here](https://dbdiagram.io/d/5e52ac1b07a7395d994e032c)
### DSL
```
//== DATABASE PLANNING IN PRACTICE ==//
//// ENUMS ////

//user_auth {
//  (guest = null)
//  deactivated = 0
//  email_not_confirmed = 1
//  customer  = 2
//  secretary = 3
//  support   = 4
//  admin     = 9
//}

//order_status {
//  processing = 0
//  preparing  = 1
//  shipping   = 2
//  completed  = 3
//  cancelled  = 4
//}

// ------------------- //

//// CREATING TABLES ////

Table user {
  id char(8) [pk]
  username varchar
  name varchar
  created_at timestamp [default: "CURRENT_TIMESTAMP"]
  date_of_birth timestamp [default: null]
  email varchar
  gender tinyint(1)
  password varchar
  user_auth tinyint(1) [default: 0]
  language int [default: 1]
  billing int [null, default: null]
  shipping int [null, default: null]
}

Table author {
  id int [pk, increment]
  name varchar
}

Table country {
  id int [pk]
  name varchar
 }
 
Table language {
   id int [pk, increment]
   name_int varchar // This is the english name like "Hungarian"
   name_nat varchar // This is the native name like "Magyar"
}

Table publisher {
  id int [pk, increment]
  name varchar
}

Table genre {
  id int [pk, increment]
  name_en varchar
}

Table book {
  id int [pk, increment]
  ISBN varchar
  title varchar
  thumbnail varchar
  sample varchar
  author int
  publish_year year
  publisher int
  genre int
  language int
  page_count int
  description varchar
  can_order tinyint(1) [default: 1]
  can_preorder tinyint(1) [default: 1]
  in_stock int
  price int
  discount int [null, default: null]
}

Table address {
  id int [pk, increment]
  country int
  tin varchar [default: null]
  post_code varchar
  city varchar
  street varchar
  house varchar
  note varchar
}

Table order {
  id char(16) [pk]
  user char(8) [null]
  billing int
  shipping int
  status tinyint(1)
  created_at timestamp [default: "CURRENT_TIMESTAMP"]
  coupon char(16) [default: null]
}

Table coupon {
  id char(16)
  action int
  used tinyint(1) [default: 0]
}

Table coupon_action {
  id int [pk, increment]
  description_en varchar
  discount float [null]
  is_percentage tinyint(1) [null, default: 1]
  from_sum tinyint(1) [null, default: 1]
}

// ------------------- //

//// CREATING HELPER TABLES ////

Table book_author {
  author_id int
  book_id int
}

Table book_genre {
  genre_id int
  book_id int
}

Table package {
  order_id char(16)
  book_id int
  quantity int
}

// ------------------- //

//// CREATING REFERENCES ////

Ref: user.language > language.id
Ref: user.billing > address.id
Ref: user.shipping > address.id

Ref: book.publisher > publisher.id
Ref: book.language > language.id
Ref: book_author.book_id > book.author
Ref: book_author.author_id > author.id
Ref: book_genre.book_id > book.genre
Ref: book_genre.genre_id > genre.id

Ref: order.user > user.id
Ref: order.billing > address.id
Ref: order.shipping > address.id
Ref: order.coupon > coupon.id
Ref: package.order_id > order.id
Ref: package.book_id > book.id


Ref: coupon.action > coupon_action.id

Ref: address.country > country.id
```

### UML
![Database plan in UML](https://github.com/dombidav/afp2_web/raw/master/doc/xyz-books_database_uml.png)


# Standards and Laws

<TEXT>

# Appendices

<TEXT>
