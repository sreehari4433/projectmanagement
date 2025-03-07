#Installation
1.Install dependencies:

   composer install
npm install && npm run dev

2.Configure the environment file:

   .env.example .env
 
3.Run migrations and seed database: 

   php artisan migrate --seed 



4.sql dump is add in the project file(projectmanagement.sql)


Register or login as an employee

Manage leads, proposals, estimates, and invoices

Routes
------------------------------------------------------------------
URL          |      Method         |             Description       |
------------------------------------------------------------------

   /                    GET                welcome page
    
  /dashboard            GET               User Dashboard           

  /leads                GET               Leads List

  /proposals            GET               Proposals List


  /estimates            GET               Estimates List

  /invoices             GET               Invoices List

  /logout               POST              Logout User

























