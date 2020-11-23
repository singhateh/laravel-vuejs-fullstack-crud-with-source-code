<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return 
        // [
        //     // 'id' => $this->id,
        //     'first_name' => $this->first_name,
        //     'last_name' => $this->last_name,
        //     'gender' => $this->gender,
        //     'phone' => $this->phone,
        //     'class' => $this->class,
        //     'image' => $this->image
        // ];
        
        parent::toArray($request);
    }
}
