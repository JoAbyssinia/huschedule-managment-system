<?php

namespace App\Imports;

use App\Models\classLoad;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class LoadImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new classLoad([
            'course_title' => $row['course_title'],
            'course_id' => $row['course_code'],
            'instructor_name' => $row['instructor_name'],
            'instructor_id' => $row['instructor_id'],
            'section' => $row['section'],
            'term' => $row['term'],
            'department' => $row['department'],
            'department_code' => $row['department_code'],
            'modality' => $row['modality'],
            'batch' => $row['batch'],
        ]);
    }
    // public function headingRow(): int
    // {
    //     return 2;
    // }
}
