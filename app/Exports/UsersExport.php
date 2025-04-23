<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            asset('storage/' . $user->profile_image),  // assuming 'profile_image' is the filename
            $user->name,
            $user->email,
            $user->phone,
            $user->address,
            $user->role,
            $user->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Profile Image',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Role',
            'Created At',
        ];
    }
}
