<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class userresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
              'api_token'=>$this->api_token


        ];
    }

    public function with($request){
        return [
            'version'=>'1.0.0',
            'author_url'=>url('http://www.google.com')
        ];
    }
}
