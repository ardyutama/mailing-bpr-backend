<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OutwardResource extends ResourceCollection
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
            'tgl_surat_keluar' => $this->tgl_surat_keluar,
            'perihal' => $this->perihal,
            'tipe_surat_id' => TypeMailResource::collection($this->tipe_surat_id), 
            'sifat_surat', $this->sifat_surat,
            'pengirim_surat' => UserResource::collection($this->pengirim_surat),
            'penerima_surat' => UserResource::collection($this->penerima_surat),
            'creator_id' => UserResource::collection($this->creator_id),
        ];
    }
}
