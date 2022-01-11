<?php

use Illuminate\Database\Schema\Blueprint;

/**
 * --------------------------------------------
 * Setting up database
 * -------------------------------------------
 * Don't change this variable name
 */
$db_up_migration = [
    [
        'key' => 1,
        'table' => 'users',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('image')->nullable();
            $table->text('password')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating users table',
    ],
    [
        'key' => 2,
        'table' => 'files',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('unique_index')->unique()->nullable();
            $table->string('virtual_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_location')->nullable();
            $table->string('ext')->nullable();
            $table->string('size')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('keyword')->nullable();
            $table->timestamps();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating files table',
    ],
    [
        'key' => 3,
        'table' => 'clubs',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('entry')->nullable();
            $table->string('likes')->nullable();
            $table->text('token')->nullable();
            $table->text('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating clubs table',
    ],
    [
        'key' => 4,
        'table' => 'shops',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('token')->nullable();
            $table->text('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating shops table',
    ],
    [
        'key' => 5,
        'table' => 'restaurants',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('token')->nullable();
            $table->text('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating restaurants table',
    ],
    [
        'key' => 6,
        'table' => 'accomodations',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('stars')->nullable();
            $table->string('price')->nullable();
            $table->text('details')->nullable();
            $table->boolean('hall')->nullable();
            $table->boolean('gym')->nullable();
            $table->boolean('pool')->nullable();
            $table->boolean('restaurant')->nullable();
            $table->text('token')->nullable();
            $table->text('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating accomodations table',
    ],
    [
        'key' => 7,
        'table' => 'gym',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating gym table',
    ],
    [
        'key' => 8,
        'table' => 'hall',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating hall table',
    ],
    [
        'key' => 9,
        'table' => 'pool',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating pool table',
    ],
    [
        'key' => 10,
        'table' => 'restaurant',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating restaurant table',
    ],
    [
        'key' => 11,
        'table' => 'hotel_rooms',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->nullable();
            $table->string('name')->nullable();
            $table->string('images')->nullable();
            $table->string('description')->nullable();
            $table->string('features')->nullable();
            $table->string('media')->nullable();
            $table->string('amenities')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating hotel_rooms table',
    ],
    [
        'key' => 12,
        'table' => 'accomodations',
        "todo" => 'update',
        'run' => function (Blueprint $table) {
            $table->text('instagram')->after('phone')->nullable();
            $table->text('facebook')->after('instagram')->nullable();
            $table->text('twitter')->after('facebook')->nullable();
        },
        'reason' => 'adding instagram, facebook, twitter in accomodations table',
    ],
    [
        'key' => 13,
        'table' => 'cars',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('price')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating cars table',
    ],
    [
        'key' => 14,
        'table' => 'cars',
        "todo" => 'update',
        'run' => function (Blueprint $table) {
            $table->string('image')->after('phone')->nullable();
        },
        'reason' => 'adding image in cars table',
    ],
    [
        'key' => 15,
        'table' => 'club_items',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('club_id')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating club_items table',
    ],
    [
        'key' => 16,
        'table' => 'coffee_items',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('coffee_id')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating coffee_items table',
    ],
    [
        'key' => 17,
        'table' => 'restaurant_items',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('restaurant_id')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating restaurant_items table',
    ],
    [
        'key' => 18,
        'table' => 'hotel_items',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('restaurant_id')->nullable();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating hotel_items table',
    ],
    [
        'key' => 19,
        'table' => 'clients',
        "todo" => 'create',
        'run' => function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->text('password')->nullable();
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_deleted')->nullable();
        },
        'reason' => 'Creating clients table',
    ],
    [
        'key' => 20,
        'table' => 'hotel_rooms',
        "todo" => 'update',
        'run' => function (Blueprint $table) {
            $table->text('other_images')->after('images')->nullable();
        },
        'reason' => 'Add other_images to hotel_rooms table',
    ],
];

/**
 * --------------------------------------------
 * Rollback database
 * -------------------------------------------
 * Don't change this variable name
 */
$db_down_migration = [
    [
        'key' => 1,
        'table' => 'user',
        'todo' => 'delete',
        'run' => 'drop',
        'reason' => 'Removing user table',
    ],
    [
        'key' => 2,
        'table' => 'files',
        'todo' => 'delete',
        'run' => 'drop',
        'reason' => 'Removing files table',
    ],
];
