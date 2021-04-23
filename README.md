# Support Ticket Management System


## Implementation

* Clone this ```repo```
* Implement it on Local Server (WAMP or XAMPP)
* Update project using `composer update`
* Email functionality setup using ```MailTrap```


## Configuration - env.xml
* you should have to configuered```Mail Trap``` Settings
https://mailtrap.io/
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=f57fd7c4ed1b95
MAIL_PASSWORD=dced5f1723d258
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=support@dev.com
MAIL_FROM_NAME="${APP_NAME}"
```
* Setup Queue Jobs - Added this code to env.xml
```QUEUE_CONNECTION=database```

* DB Configuration 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=supportdesk
DB_USERNAME=root
DB_PASSWORD=
```
* Generate ```APP_KEY``` using this command ```php artisan key:generate ```

### Run DB Migration
* run `php artisan migrate fresh --seed`

###  How to Test Email Functionality?
Once you create ticket and Make Reply to the ticket.
You shoud have to run que jobs using this command
```php artisan queue:work ```


## Routes (Links)
* ``Support Agent`` Login - http://localhost/supportdesk/public/login
* Submit Support Ticket By ``Customer`` - http://localhost/supportdesk/public/ticket/create
* Check Support Ticket Status By ``Customer`` - http://localhost/supportdesk/public/ticket/check
* ``Suport Agent`` View All Support Tickets - http://localhost/supportdesk/public/ticket
* ``Support Agent`` Make a reply to the support ticket - http://localhost/supportdesk/public/reply/ticketid/34


### Demo System Login
```
email : sameera@test.com
password : 19901126
```
