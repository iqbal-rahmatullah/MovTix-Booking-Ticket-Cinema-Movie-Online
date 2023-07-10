
# Project Title

MovTix | Application Booking Ticket Cinema Movie Online 

## About This Project

![App Screenshot](https://i.ibb.co/x74GgCc/Jepretan-Layar-2023-07-10-pukul-19-47-33.png)

The MovTix website is an online website that is used to book cinema tickets that was built using the PHP and MySQl (CRUD) programming languages. I use this programming language because I have previous experience making projects with methods like this.



#### Member Features

- Everyone can view all films on landing page without logging in.
- Users can register through the register page.
- Users can make a deposit via the deposit page and need admin confirmation for the deposit to be successful.
- Users can withdraw the balance they have.
- Users can order tickets from 64 seats, as long as those seats have not been booked.
- Users can cancel ticket orders, and the user's balance will be returned according to the ticket price.
- Users who order tickets, will fill out the form. If the age entered by the user does not match the age requirements of the film, the booking process will fail.
- The maximum number of tickets that can be booked in one transaction is 6 tickets.
- In the payment page, the payment is deducted from the balance. The transaction is successful if the balance is sufficient. Otherwise, the user can cancel the order or top up their balance first.
- Only logged in users can book tickets, view ticket transactions history, and cancel the ticket transactions.
- Users can change the password through the settings page.

#### Admin Features

- Admin can manage users, namely add balance and delete users.
- Admin can manage all transactions that occur, namely view transaction details and cancel transactions.
- Admin can manage top up, which is to confirm the top up done by the user.
- Admin can manage withdraw, which is to confirm the withdraw done by the user.

## Installation

```bash
- First, you have to create a mysql database.
- Then, upload the database.sql file to your database.
- Finally, configure the php/koneksi.php file, adjust it to your database.
```
    
## Usage

- Enter yoururl/admin to access the admin page, make sure you are not logged in as a user when logging in as admin.
- User deposits are made manually, where the user is asked to make a transfer to a given bank. Then the admin confirms the topup.
- User withdrawals are done manually, where the user inputs the amount and the destination bank. Then the admin confirms the withdrawal.
- Users who are deleted by the admin will permanently delete all data from that user.


## Demo

https://movtix.balzz.my.id/


## Authors

- [@iqbal-rahmatullah](https://github.com/iqbal-rahmatullah)


## 🔗 Contact
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/m-iqbal-rahmatullah-685890216/)
[![instagram](https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white)](https://www.instagram.com/iqbal.rahmatullah/)


## Acknowledgements

 - [PHP Tutorial](https://www.w3schools.com/php/)
 - [MySql Tutorial](https://www.w3schools.com/sql/default.asp)
 - [PHP Connect to MySQL](https://www.w3schools.com/php/php_mysql_connect.asp)
 - [SQL syntax](https://www.w3schools.com/sql/sql_syntax.asp)

