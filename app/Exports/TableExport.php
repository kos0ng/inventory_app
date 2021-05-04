<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Schema; 
use Maatwebsite\Excel\Concerns\WithHeadings;

class TableExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct($table_name) {
        $this->table_name = $table_name;
 	}

    public function collection()
    {
        return DB::table($this->table_name)->get();
    }

    public function headings(): array
    {
        return Schema::getColumnListing($this->table_name);
    }
}
