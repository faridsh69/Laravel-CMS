<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'rule' => 'unique',
            'validation' => 'required|max:60|min:10|unique:blogs,title,',
            'help' => 'Title should be unique, minimum 10 and maximum 60 characters.',
            'table' => true,
        ],
    ];

        // Schema::create('addresses', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->tinyInteger('province');
        //     $table->string('city')->nullable();
        //     $table->text('address');
        //     $table->string('lable')->nullable();
        //     $table->string('postal_code')->nullable();
        //     $table->string('phone')->nullable();
        //     $table->string('sabet_phone')->nullable();
        //     $table->string('display_name')->nullable();
        //     $table->decimal('latitude', 10, 8)->nullable();
        //     $table->decimal('longitude', 11, 8)->nullable();
        //     $table->tinyInteger('status')->default(1);
        //     $table->integer('user_id')->unsigned();
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->timestamps();
        //     $table->softDeletes();
        // });


    protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        return $this->columns;
    }
	// Schema::create(config('rinvex.addresses.tables.addresses'), function (Blueprint $table) {
	// // Columns
	// $table->increments('id');
	// $table->morphs('addressable');
	// $table->string('given_name');
	// $table->string('family_name');
	// $table->string('label')->nullable();
	// $table->string('organization')->nullable();
	// $table->string('country_code', 2)->nullable();
	// $table->string('street')->nullable();
	// $table->string('state')->nullable();
	// $table->string('city')->nullable();
	// $table->string('postal_code')->nullable();
	// $table->decimal('latitude', 10, 7)->nullable();
	// $table->decimal('longitude', 10, 7)->nullable();
	// $table->boolean('is_primary')->default(false);
	// $table->boolean('is_billing')->default(false);
	// $table->boolean('is_shipping')->default(false);
	// $table->timestamps();
	// $table->softDeletes();
	// });
}
