<?php

use system\library\Router;

/* -----------------------------
 * This is router array, please don't change any key just add values
 * -----------------------------
 */

$routes = [

    // SITE API
    [
        'path' => '/api/v1',
        "children" => [
            [
                'path' => '/',
                'method' => 'GET',
                'folder' => 'api',
                'return' => 'UserController@index',
            ],
            [
                'path' => '/contactNow',
                'method' => 'POST',
                'folder' => 'site',
                'return' => 'PagesController@contactNow',
            ],


            // clients

            [
                'path' => '/clientLogin',
                'method' => 'POST',
                'folder' => 'site',
                'return' => 'clientsController@clientLogin',
            ],
            [
                'path' => '/getClients',
                'method' => 'GET',
                'folder' => 'site',
                'return' => 'clientsController@getClients',
            ],
            [
                'path' => '/addClient',
                'method' => 'POST',
                'folder' => 'site',
                'return' => 'clientsController@addClient',
            ],
            [
                'path' => '/updateClient',
                'method' => 'POST',
                'folder' => 'site',
                'return' => 'clientsController@updateClient',
            ],
            [
                'path' => '/deleteClient/{id}',
                'method' => 'POST',
                'folder' => 'site',
                'return' => 'clientsController@deleteClient',
            ],
        ],
    ],
    
    // ADMIN API
    [
        'path' => '/api/v1/admin',
        "children" => [
            // clubs
            [
                'path' => '/getClubs',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminClubsController@getClubs',
            ],
            [
                'path' => '/addClubs',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminClubsController@addItem',
            ],
            [
                'path' => '/updateClubs',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminClubsController@updateItem',
            ],
            [
                'path' => '/deleteClub/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminClubsController@deleteItem',
            ],
            [
                'path' => '/getTopClubs',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminClubsController@getTopClubs',
            ],
            [
                'path' => '/getSingleClub/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminClubsController@getSingleClub',
            ],

            // club products
            
            [
                'path' => '/getClubProducts/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminClubsController@getClubProducts',
            ],
            [
                'path' => '/addClubProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminClubsController@addClubProducts',
            ],
            [
                'path' => '/updateClubProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminClubsController@updateClubProducts',
            ],
            [
                'path' => '/deleteClubProduct/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminClubsController@deleteClubProduct',
            ],
 
            // Coffees
            [
                'path' => '/getCoffees',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@getCoffees',
            ],
            [
                'path' => '/addCoffees',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@addItem',
            ],
            [
                'path' => '/updateCoffees',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@updateItem',
            ],
            [
                'path' => '/deleteCoffee/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@deleteItem',
            ],

            // Coffee products


            
            [
                'path' => '/getCoffeeProducts/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@getCoffeeProducts',
            ],
            [
                'path' => '/addCoffeeProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@addCoffeeProducts',
            ],
            [
                'path' => '/updateCoffeeProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@updateCoffeeProducts',
            ],
            [
                'path' => '/deleteCoffeeProduct/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminCoffeeController@deleteCoffeeProduct',
            ],
            
            // Restaurant
            [
                'path' => '/getRestaurants',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@getRestaurants',
            ],
            [
                'path' => '/addRestaurants',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@addItem',
            ],
            [
                'path' => '/updateRestaurants',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@updateItem',
            ],
            [
                'path' => '/deleteRestaurant/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@deleteItem',
            ],

            // Restaurant products


            
            [
                'path' => '/getRestaurantProducts/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@getRestaurantProducts',
            ],
            [
                'path' => '/addRestaurantProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@addRestaurantProducts',
            ],
            [
                'path' => '/updateRestaurantProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@updateRestaurantProducts',
            ],
            [
                'path' => '/deleteRestaurantProduct/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminRestaurantsController@deleteRestaurantProduct',
            ],
            
            // Accomodations
            [
                'path' => '/getAccomodations',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@getAccomodations',
            ],
            [
                'path' => '/addAccomodations',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@addItem',
            ],
            [
                'path' => '/updateAccomodations',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@updateItem',
            ],
            [
                'path' => '/deleteAccomodation/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@deleteItem',
            ],
            [
                'path' => '/getTopAccomodations',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@getTopAccomodations',
            ],
            [
                'path' => '/getGroupedAccomodations',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@getGroupedAccomodations',
            ],
            [
                'path' => '/getSingleAccomodations/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@getSingleAccomodations',
            ],

            // Restaurant products


            
            [
                'path' => '/getHotelProducts/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@getHotelProducts',
            ],
            [
                'path' => '/getGroupedHotelProducts/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@getGroupedHotelProducts',
            ],
            [
                'path' => '/addHotelProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@addHotelProducts',
            ],
            [
                'path' => '/updateHotelProducts',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@updateHotelProducts',
            ],
            [
                'path' => '/deleteHotelProduct/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@deleteHotelProduct',
            ],
            
            // Rooms
            [
                'path' => '/getRooms/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminRoomsController@getRooms',
            ],
            [
                'path' => '/addRooms',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminRoomsController@addItem',
            ],
            [
                'path' => '/updateRooms',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminRoomsController@updateItem',
            ],
            [
                'path' => '/deleteRoom/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminRoomsController@deleteItem',
            ],

            // gym

            [
                'path' => '/updateGym',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@updateGym',
            ],

            // Pool

            [
                'path' => '/updatePool',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@updatePool',
            ],

            // Hall

            [
                'path' => '/updateHall',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@updateHall',
            ],

            // Restaurant

            [
                'path' => '/updateRestaurant',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminAccomodationsController@updateRestaurant',
            ],

            
            // Cars
            [
                'path' => '/cars/getCars',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminCarsController@getCars',
            ],
            [
                'path' => '/cars/addItem',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminCarsController@addItem',
            ],
            [
                'path' => '/cars/updateItem',
                'method' => 'POST',
                'folder' => 'admin',
                'return' => 'adminCarsController@updateItem',
            ],
            [
                'path' => '/cars/deleteItem/{id}',
                'method' => 'GET',
                'folder' => 'admin',
                'return' => 'adminCarsController@deleteItem',
            ],
        ],
    ],






    // UPLOAD HELPER API
    [
        'path' => "/upload",
        // 'middleware' => 'web',
        "children" => [
            [
                'path' => '/',
                'method' => 'POST',
                'folder' => 'helper',
                'return' => 'Uploader@uploadNow',
            ],
            [
                'path' => '/chunk',
                'method' => 'POST',
                'folder' => 'helper',
                'return' => 'Uploader@startUploadChunk',
            ],
            [
                'path' => '/all-files/{token}',
                'method' => 'GET',
                'folder' => 'helper',
                'return' => 'Uploader@allFiles',
            ],
            [
                'path' => '/delete/{id}',
                'method' => 'DELETE',
                'folder' => 'helper',
                'return' => 'Uploader@delete',
            ],
            [
                'path' => '/search/{token}',
                'method' => 'POST',
                'folder' => 'helper',
                'return' => 'Uploader@search',
            ],
            [
                'path' => '/search-by-type/{token}',
                'method' => 'POST',
                'folder' => 'helper',
                'return' => 'Uploader@searchByType',
            ],
            [
                'path' => 'upload/update-file/{id}',
                'method' => 'POST',
                'folder' => 'helper',
                'return' => 'Uploader@updateFileInfo',
            ],
        ],
    ],

    // NOT FOUND ROUTER
    [
        'path' => '*',
        'folder' => 'site',
        'return' => 'PagesController@index',
    ],
];

/* -----------------------------
 * This is condition array, please don't change any key just add values
 * This will be user if you want to redirect all route to the same controller function
 * -----
 * This condition will be good for Vue,Angular,React
 * -----
 * Let that framework to handle routes
 * ----
 * You can enable or disable this condition
 * ------------------------------
 */
$route_condition = [
    'ENABLED' => true,
    'ALL_TO' => [
        'folder' => 'site',
        'return' => 'HomeController@index',
    ],
    'EXCEPT' => ['/api/v1', '/api/v1/admin', '/api/v1/writer', '/upload'],
];

// Init routing
Router::init($routes, $route_condition);
