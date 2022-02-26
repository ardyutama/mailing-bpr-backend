<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DispositionMailResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tgl_isi' => $this->tgl_isi, 
            'pengirim_id' => UserResource::collection($this->pengirim_id),
            'penerima_id' => UserResource::collection($this->penerima_id),
            'isi_disposisi' => $this->isi_disposisi,
            'inbox_id' => InboxMailResource::collection($this->whenLoaded('inbox_mails')),
        ];
    }
}
