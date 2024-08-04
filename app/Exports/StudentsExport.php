<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = Student::with(['mobileRelation', 'love'])->get()->map(function ($student) {
            return [
                'name' => $student->name,
                'mobile' => $student->mobileRelation->mobile ?? '',
                'loves' => $student->love->pluck('love')->implode(', '),
            ];
        });
        return collect($students);
    }

    public function headings(): array
    {
        return [
            '姓名',      // Name
            '手機號碼',  // Mobile
            '愛好',      // Loves
        ];
    }
}
