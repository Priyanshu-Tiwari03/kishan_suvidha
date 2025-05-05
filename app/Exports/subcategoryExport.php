<?php

namespace App\Exports;

use App\Models\subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class subcategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return subcategory::all();
    }

    public function map($subcategory): array
    {
        return [
            $subcategory->id,
            $subcategory->category_id,
            $subcategory->name,
            $subcategory->description,
            $user->created_at->format('Y-m-d H:i:s'),
        ];
    }

  
    public function headings(): array
    {
        return [
            'ID',
            'Category_id',
            'Name',
            'Description',
            'Created At',
        ];
    }

}
