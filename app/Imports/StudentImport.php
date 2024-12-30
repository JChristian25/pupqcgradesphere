<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use App\Models\Student;

class StudentImport implements ToCollection, ToModel
{
    private $current = 0;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
{
    $this->current++;

    if ($this->current > 1) {
        if (empty($row[0])) {
            return;
        }

        $student = new Student;

        $student->student_number = $row[0]; // Column A
        $student->first_name = $row[1];     // Column B
        $student->middle_name = $row[2];    // Column C
        $student->last_name = $row[3];      // Column D
        $student->course = $row[5];        // Column F
        $student->curriculum = $row[5];

        // Save the record
        $student->save();
    }
}

}
