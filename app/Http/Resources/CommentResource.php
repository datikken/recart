<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource;

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
            'body' => $this->body,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'replies' => count($this->children),
            'likes' => $this->likes,
            'post' => new PostResource($this->post),
            'user' => new PublicUserResource($this->user),
        ];
    }
}
