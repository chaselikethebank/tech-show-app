sqlite3 database/database.sqlite
INSERT INTO tasks (description, created_at, updated_at) VALUES ('Task description', datetime('now'), datetime('now'));


// 


create a new menu item 
start w web.php route to see the /dashbaord 
blade file for nav 
add a div w a nav link
php artisan make:controller SomethingController --resource
build route in web.php
    import controller into web.php
build basic boiler plate crud for controller
php artisan make:model Part -m
build model 


// 

start w the model and migration 

 php artisan make:model Todo -m


   INFO  Model [app/Models/Todo.php] created successfully.  

   INFO  Migration [database/migrations/2024_07_05_143925_create_todos_table.php] created successfully. 

   // 

In todo Migration :: Associate every todo with an authenticated user 

  public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            //table for foreiegn Id for and then App\something something
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->text('task');
            $table->timestamps();
        });
    }

    //

run migrations with : 

php artisan migrate  

   INFO  Running migrations.  

  2024_06_27_211004_create_parts_table ........................................... 2.13ms DONE
  2024_07_05_143925_create_todos_table ........................................... 1.66ms DONE

//




// sqlite3

to check the migrations and what to roll back 
SELECT * FROM migrations ORDER BY id DESC;

checking enums from a migration 
SELECT * FROM sqlite_master WHERE type='table' AND name='works';
 
 customer is primary vehicle has a foreign key of customer 
 SELECT *
FROM left_table
LEFT JOIN right_table
ON left_table.id = right_table.foreign_key;

query for custumer and all their vehicle detials 
SELECT 
    c.id AS customer_id,
    c.name AS customer_name,
    v.id AS vehicle_id,
    v.make,
    v.model,
    v.year,
    v.color,
    v.vin,
    v.license_plate
FROM 
    customers c
LEFT JOIN 
    vehicles v ON c.id = v.customer_id;

1|Naval Ravikant|1|Porsche|911|1986|Red|WP0AB0912GS123456|ABC123
1|Naval Ravikant|2|Porsche|911 Carrera|1986|Silver|WP0AB0911GS654321|DEF456
1|Naval Ravikant|3|Porsche|911 Turbo|1991|Black|WP0ZZZ96ZMS123456|GHI789
2|Elon Musk|4|Bugatti|Veyron|2014|Blue|VF9SP2B0XGG000001|JKL012
3|Marie Forleo|5|Mercedes-Benz|280SL|1969|Black|108.040.12.021198|MNO345


to check the table columns
PRAGMA table_info(table_name_here);




php artisan make:component Name

create both the component controller 
and the view file 
