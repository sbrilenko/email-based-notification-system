# email-based-notification-system
Laravel 5.4

Description:

# simple email-based notification system.
 Please be attentive to the architecture of the application.
 Architecture description: Instead of sending emails manually for some actions (like user
 registered, feedback sent etc) we want to make it event based:
 - There will be a set of special events in system.
 - Each event will have some defined properties (like user, feedback etc), some unique
 event id and some logic of building email.
 (for example, user registered event should be sent to registered user’s email, but
 feedback email should be sent to admins)
 - When event was triggered, the corresponding email should be sent. All params should
 be passed from event to email’s view
 
 #start proj
 - clone proj
 - composer install
 - npm install
 - bower install
 - npm run watch
 - copy .env.example and rename to .env (or just renamed)
 - configure config files
 - don't forget about email settings
 - don't forget about php artisan key:generate
 - php artisan migrate
 - php artisan serve
 
 #Events
 - on user registration
 - on template changed (to admin only - see env for admin email and name)