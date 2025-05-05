<?php

namespace App\Exports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoriesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categories::select('id','parent_id','image','name','description','created_at')->get();
    }

     public function headings(): array
    {
        return ['ID', 'Parent_id','Image', 'Name', 'Description', 'Created At'];
    }

}
