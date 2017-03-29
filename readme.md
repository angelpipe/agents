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

+ ## Requirements

	* Docker (Latest available version)

+ ## How to run

	### Online

	Available at 

	### Local
    	
    Go to project folder in terminal and type:

    	make run

    Then visit http://127.0.0.1
    
    To stop the server type:
    
    	make stop

+ ## Github project

	https://github.com/angelpipe/agents
