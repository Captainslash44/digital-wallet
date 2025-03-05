# digital-wallet
A simulation to a digital money transfer account, web-based application


Halim Njeim - Individual Project 1 - API Docs:
APIs:
- The login API:

```php

/server/user/v1/login.php:
this API includes the User Class from the models folder. (server/models/user.php)
this API takes a POST method, with values (email/ phone) and password.
based on these values, it returns a JSON with key ["id"] and a values of either the user's id or `false`

```

- Check Credentials API:
```php
/server/user/v1/checkCredentials.php

checks if a user is new or not, takes a POST method, with ("name","lastname","email","phone","password")
to check if a user if eligible for registration.
returns "message" :true or false;
```

- The Register API:

```php

/server/user/v1/signup.php:
this API includes the User Class from the models folder.
(server/models/user.php);

this API takes a POST method, with values (name, lastname, email, phone, password);
After calling the isNew() function from users,
it then either creates a user with the previous credentials, or not, in both cases returning
a JSON Object as such {"message": "User created!"} or {"message": "already exists"};

```

- The Load User API:
```php
/server/user/v1/loadUser.php;

this API also includes the User class.
it takes a POST method, checks for "id" and returns (name and lastname) of the user by calling User::getNameAndLastname

```

- The User Class:
```php

The User Class has many functions:

getNameAndLastname ($id) => where $id is the user id, returns (name and lastname);

getUserByEmail($email) and getUserByPhone($phone) => both return the "id" of the user if they exist, or return false instead.

isNew($email, $phone) => checks whether a user is new or not, called upon in registration API. returns boolean values.

addOrUpdateUser($name, $lastname, $email, $phone, $password) => creates or updates a user based on whether or not the user is new.
returns a confirmation message.

addUser ($name, $lastname, $email, $phone, $password) => adds a user, returning no values.

updateUser($name, $lastname, $email, $phone, $password) => updates user, returning no values.

verifyPassword ($user_id, $password) => checks if the password belongs to the user, returns boolean values.


```

- The Wallet Class:
```php 
/server/models/wallet.php
The wallet class has the following functions:

isNew($id) => check if a wallet is new or not.

getAllUserWallets($user_id) => returns all the wallets assigned to a certain user. returns array

addWallet($user_id, $card_number) => adds a wallet depending on the user

checkBalance($wallet_id) => check balance of a wallet, returns float.

addFunds and removeFunds ($wallet_id, $amount) => used in transactions, return success message.

```
-ER DIAGRAM
<img src="\assets\images and diagrams\erdiagram.jpg"><img>
