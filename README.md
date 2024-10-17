# COVID System Vaccine 

# Overview
The COVID-19 Vaccination Registration System is a web-based platform developed in Laravel, designed to streamline the process of vaccine registration and appointment scheduling. User can easily register using their National ID (NID), receive appointment scheduling details via email to be notified with a reminder the day before their vaccination. The system operates on a first-come first-served basis, ensuring vaccinations are only scheduled during weekdays (Sunday to Thursday).

# Prerequisite
* PHP 8.2 | 8.3
* MySQL Database
* Apache - Application Server
* Composer & Node
  - Nested Point

# Installation Steps
**Clone the Repository:** Open terminal and run the following command to clone the repository
```
git clone https://github.com/shahlalhossain/COVID-Vaccine.git
```
**Navigate to the Project Directory**
```
cd COVID-Vaccine
```

**Copy & Set Up Environment File**
```
cp .env.example .env
```

**Edit & Update Environment (.env) File**

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_gmail@gmail.com
MAIL_PASSWORD= your_gmail_app_password **
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your_gmail@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

LOG_CHANNEL=daily
LOG_STACK=daily
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
```
** [Create your Google App and Create Password Here](https://myaccount.google.com/apppasswords?rapt=AEjHL4PJwpGnexSE5BHbwf-m-oGoWtsJAD2of22BhQolmElWXntEfFrrmYvJd1WyffIpAIPOmBnl5JqfNn-xb-UeIdWK1GPRnIYY6Tk_uOX_ieh121wQnRg)

**Install Composer Dependencies**
```
composer install
```

**Generate & Set Application Key**
```
php artisan key:generate
```

**Database Table Create**
```
php artisan migrate
```

**Database Table Sample Data Populate/Insert**
```
php artisan db:seed
```

**Install Node Modules**
```
npm install
```

**Run or Build View Manifest**
```
npm run dev
```

**Run Laravel Application (in a separate terminal tab/window)**
```
php artisan serve
```

**Register and Check Vaccine Schedule Status.**

Here are some sample NIDs: 112233, 223344, 334455, 445566, 556677 (Status: Not Scheduled)


**Special Notes**

* Pre-populated the Appointment Schedule for all the Vaccine Centers along with service days limit (Every weekdays: From 2024-10-16 to 2024-11-30) 
* Every New Register User will be “Scheduled” to the Selected Vaccine Center based on the Limit and available day. (If a specific day’s limit reach, then the next available day will catch)


**To Send Email Notification at Every Day 09:00 PM and Update Today’s Vaccine Appointment/Schedule at 06:00 PM, Update/Create Cron Tab like as below**

crontab -e
```
* * * * * cd /path_of_the_project && php artisan schedule:run >> /dev/null 2>&1
```

Example
```
* * * * * cd /var/www/html/COVID-Vaccine && php artisan schedule:run >> /dev/null 2>&1
```

**Notes on SMS Notification**
- [ ] Integrate SMS Gateway
- [ ] Configure and Setup Event, Listener and Job for Sending SMS Process
- [ ] Configure Console Command or Invokable Class (Already Created)
- [ ] Register a Schedule in route/console (Call Console Command or Invokable Class)
