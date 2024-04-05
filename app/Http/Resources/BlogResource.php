<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $created_at = Carbon::parse($this->created_at)->format('y-F-d H:i');
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'text' => $this->text,
            'category_id' => $this->category_id,
            'created_at'=> $created_at,
            'user_id'=>$this->user_id
        ];
    }
}
