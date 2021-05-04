<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::get(['id_user','name','email','no_telp','role','is_active']);
    }

    public function headings(): array
    {
        return ["ID User", "Nama", "Email","Nomor Telepon","Role","Status"];
    }
}
