<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function insertCustomer($data)
    {
        $insert = new $this;

        $insert->name = $data->name;
        $insert->surname = $data->surname;
        $insert->email = $data->email;
        $insert->address = $data->address;
        $insert->city = $data->city;
        $insert->state = $data->state;
        $insert->phone_number = $data->phone_number;
        $insert->gender = $data->gender;
        $insert->save();

        return $insert;
    }

    public function listCustomer()
    {
        $customers = self::select();

        return $customers;
    }

    public function updateCustomer($data)
    {
        $customers = self::select()
        ->where('id', '=', $data->id)
        ->update([
            'name' => $data->name,
            'surname' => $data->surname,
            'email' => $data->email,
            'address' => $data->address,
            'city' => $data->city,
            'state' => $data->state,
            'phone_number' => $data->phone_number,
            'gender' => $data->gender
        ]);

        return $customers;
    }

    public function deleteCustomer($data)
    {
        $delete_customer = self::where('id', '=', $data->id)
        ->delete();
    }


}
