<?php
// filepath: /c:/Users/John Christian/Documents/GitHub/pupqcgradesphere/app/Imports/CurriculumImport.php
namespace App\Imports;

use App\Models\Curriculum;
use App\Models\SubjectCurriculum;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CurriculumImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Create the Curriculum record
        $curriculum = Curriculum::firstOrCreate([
            'curriculum_name' => $row[0],
            'curriculum_year' => $row[0],
        ]);

        // Create the SubjectCurriculum record
        SubjectCurriculum::create([
            'cur_subject_code' => $row['subject_code'],
            'cur_subject_year' => $row['subject_year'],
            'cur_subject_semester' => $row['subject_semester'],
            'cur_subject_description' => $row['subject_description'],
            'cur_subject_units' => $row['subject_units'],
            'curriculum_id' => $curriculum->id,
        ]);
    }
}
