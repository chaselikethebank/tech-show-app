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

to check the table columns
PRAGMA table_info(table_name_here);


