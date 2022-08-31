<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'voucher_code' => $this->voucher_code,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'type_voucher' => $this->type_voucher,
            'value' => $this->value,
        ];
    }
}
