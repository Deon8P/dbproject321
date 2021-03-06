<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'products';

	protected $fillable = [
		'prod_id', 'prod_name', 'prod_price', 'prod_url', 'prod_imgurl'
    ];

    public function __construct()
    {
        $this->setConnection('mongodb');
    }
}
