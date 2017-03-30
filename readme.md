# ZIP Agents

+ ## Architecture

    This app was made using Laravel, it means its layers adhere to Laravel's 
    standards.

    The development process can be seen in this repo commit history.

    The first architectural decision was to add a Docker boilerplate to the 
    project. The motivation behind this is the necessity of running it in 
    different environments (AWS and Local). Docker is really easy to spin up
    so you can have a near production environment really fast. It assures
    your environments are the same and is more lightweight than vagrant/vbox.
    Currently, all services run in the same container (A Docker copy of
    homestead is used), but in a real world scenario they could be
    separated to make them more modular. The boilerplate is used for
    security reasons too, as the app will be exposed to internet.
    
    MySQL was chosen as the DB engine. It is because our Docker boilerplate
    lets us to implement it easily and MySQL is a robust and production used
    engine. Database has not been made persistent as it is not needed in
    this case (it will reset each time you restart Docker containers).
    
    Only one Model was created (Contact) as it is the data that the app will
    use and we have a set of predefined records. A model and Laravel seeding
    were chosen because they're faster to implement and as we will operate
    with the data, Laravel models will be really helpful. For agents, as
    they're introduced by user (and only zip code) a model was not created.
    
    Two routes are used to make the root url (/) respond to two HTTP methods:
    GET and POST.
        
    About controllers, the default controller was kept and used. App is
    really simple and there's no need for a new or different controller.
    
    For ZIP code distances a collection of services to query google APIs
    for Laravel is used (https://alexpechkarev.github.io/google-maps/).
    The decision was done because Google's database is Huge and it assures
    compatibility with almost any ZIP code. Additionally, Google's data is
    reliable and its free tier has higher limits than other services. Other
    reasons to not use a local database is they're sold at high prices and
    that kind of solution would require more development that is out of the
    scope. Of course, the chosen solution is not fast (nearly 80 requests
    are made with the current contact list). The solution for that is to
    buy a database or find a way to batch process the queries to the
    service so they're reduced. Some ZIP codes in the contact list look
    to be wrong, codes that not match won't be included in the final
    result.
    
    One class is custom created (ZipMatcher). A service provider was created
    for it to handle dependency injection. Agent's ZIP codes are attributes
    of the class as we have a fixed quantity of them and they come from
    user input. Of course, it works for this specific case; if this would be
    part of a bigger app, the architecture could be different.
    
    Front end for this app is really, really basic. No css/js
    minification/compilation as the idea was to share it. Bootstrap was
    chosen to give some styles and basic grid responsive system. The HTML
    is basic and compliant.

+ ## Requirements

	* Docker (Latest available version)
	* PHP >= 5.6.4

+ ## How to run

	### Online

	Available at 

	### Local
    	
    Download the repo and rename .env.example to .env
    	
    Go to project folder in terminal and type:

    	make run
    	php artisan migrate --seed

    Then visit http://127.0.0.1
    
    To stop the server type:
    
    	make stop

+ ## Github project

	https://github.com/angelpipe/agents
