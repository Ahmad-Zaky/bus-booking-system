<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ExtendedJsonResource extends JsonResource
{
    protected $provide;
    
    protected static $collectionProvide;
    
    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->resource = $resource;
    }

    public function provide($provide) {
        $this->provide = (object) $provide;
        
        return $this;
    }

    public static function collectionProvide($resource, $provide)
    {   
        self::$collectionProvide = (object) $provide;
        
        return parent::collection($resource);
    }
}