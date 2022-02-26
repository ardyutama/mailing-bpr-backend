<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InboxMailResource extends ResourceCollection
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
            'tgl_surat_masuk' => $this->tgl_surat_masuk,
            'perihal' => $this->perihal,
            'tipe_surat_id' => TypeMailResource::collection($this->tipe_surat_id),  
            'sifat_surat', $this->sifat_surat,
            'isOpened' => $this->isOpened,
            'pengirim_surat' => UserResource::collection($this->pengirim_surat),
            'penerima_surat' => UserResource::collection($this->penerima_surat),
            'creator_id' => UserResource::collection($this->creator_id),
       ];
    }
}
