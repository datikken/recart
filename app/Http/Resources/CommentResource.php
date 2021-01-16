<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'post_id' => 1,
            'body' => $this->body,
            'user' => new PublicUserResource($this->user),
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at
        ];
    }
}
