<h1>Sistema administrativo da aplicação Bilhete Único Digital</h1>

> ## Web application that complements the  Bilhete Único Digital project, aimed at monitoring user interactions with the  <a href="https://github.com/moiseshxs/Bilhete_Unico_Digital">mobile application</a>. Furthermore, the application includes database migration files, allowing the database to be generated at any time and inserting simulated information into it.

<details>
  <summary><h2>To better understand what Bilhete Único Digital is, click here.</h2></summary>
  
  ## Abstract

  > The "Digital Single Ticket" project proposes the implementation of an innovative application to replace the conventional single ticket system used in the city of São Paulo. Coupled with the application, a prototype of a low-cost electronic turnstile using Arduino has been developed, which will be capable of reading the QR code generated by the application, potentially replacing the conventional turnstiles used on buses in the city of São Paulo. This application aims to enhance the experience of public transportation users by offering a digitized and integrated solution for payment and access to transportation services. The Digital Single Ticket offers a mobile platform that allows users to conveniently load credits through secure online transactions, eliminating the dependence on physical recharge points. Additionally, the application provides an intuitive interface for credit management, trip history inquiries, and real-time notifications about available balance. Noteworthy is the integration of the Digital Single Ticket with various modes of transportation, including buses, subways, trains, and ride-hailing services, promoting a smoother and intermodal travel experience for users. In summary, the Digital Single Ticket represents an innovative and technologically advanced proposal to modernize the public transportation system in São Paulo, offering convenience, efficiency, and accessibility to users while driving the digitization and optimization of urban services offered by the city. 

Keywords: public transportation. Application. Arduino. single ticket. digitization.

  
</details>


> ## Some Implementations

- [X] Complete login system
- [X] Dashboard with relevant information for decision-making, such as: which bus lines are most used and how many tickets are being issued
- [X] Respond to user questions and support requests for the mobile application via emails.
- [X] Complete CRUD system with database
- [X] Create and populate the database with cohesive seed data
- [X] Dashboard with information about the application's finances, such as: how much money the application handles, and the ability to change the bus fare price.
- [X] Control over the buses on the bus lines and their turnstiles, allowing you to activate and deactivate them.

> ## Instalation and Use
 ### Requirements: You will need to have XAMPP and Composer installed on your computer.
1. Clone the repository
2. Open the project folder in a terminal and type: "composer install".
3. After installation, type: "php artisan migrate --seed" to create and populate the database.
4. Also, type "php artisan storage:link" to ensure photo uploads work correctly.
5. After that, type "php artisan serve" to run the project. It will be accessible by default at "localhost:8000".
6. To log in, the default administrator credentials will be: email -> adm@gmail.com and password -> 123.

> ## Technologies Used
+ [Laravel 9]("https://laravel.com/docs/9.x")
+ [JQuery]("https://laravel.com/docs/9.x")
> ## Other Parts of the System and Their Repositories

+ BackEnd API : (<a href="https://github.com/hucarvalho/bilhete-unico-digital-api">`https://github.com/hucarvalho/bilhete-unico-digital-api`</a>)
+ Mobile Aplication : (<a href="https://github.com/moiseshxs/Bilhete_Unico_Digital">`https://github.com/moiseshxs/Bilhete_Unico_Digital`</a>)

> ## Arduino and Python Code for Turnstile Prototype

- **Arduino and Python Code:** Repository link [here](https://github.com/hucarvalho/bilhete_unico_digital_catraca)



