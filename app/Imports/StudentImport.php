<?php

namespace App\Imports;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Student;

class StudentImport implements ToModel, WithStartRow
{
    protected $worksheet;

    public function __construct($filePath)
    {
        // Load the uploaded file as a spreadsheet
        $spreadsheet = IOFactory::load($filePath);
        // Get the first worksheet
        $this->worksheet = $spreadsheet->getActiveSheet();
    }

    /**
     * Specify the row to start importing from
     */
    public function startRow(): int
    {
        return 2; // Skip the header row
    }

    /**
     * Check if a cell is blank and marked yellow
     */
    private function isYellowAndBlank(Cell $cell): bool
    {
        $fill = $cell->getStyle()->getFill();
        $color = $fill->getStartColor()->getARGB();

        // Yellow is typically represented as 'FFFF00' or 'FFFFFF00'
        $isYellow = $color === 'FFFF00' || $color === 'FFFFFF00';
        $isBlank = trim($cell->getValue()) === '';

        return $isYellow && $isBlank;
    }

    /**
     * Map each row to a Student model
     */
    public function model(array $row)
    {
        // Skip rows with empty Student Number (Column A)
        if (empty($row[0])) {
            return null;
        }

        // Get the current row index in the worksheet
        $rowNumber = $this->startRow();

        // Apply conditions for cells G to M
        $has_hscard = $this->isYellowAndBlank($this->worksheet->getCell("G$rowNumber")) ? 'Original' : $row[6];
        $has_goodmoral = $this->isYellowAndBlank($this->worksheet->getCell("H$rowNumber")) ? 'Complied' : $row[7];
        $has_birthcert = $this->isYellowAndBlank($this->worksheet->getCell("I$rowNumber")) ? 'Complied' : $row[8];
        $has_f137 = $this->isYellowAndBlank($this->worksheet->getCell("J$rowNumber")) ? 'Complied' : $row[9];
        $honorable_dismissal = $this->isYellowAndBlank($this->worksheet->getCell("K$rowNumber")) ? 'Complied' : $row[10];
        $with_tor = $this->isYellowAndBlank($this->worksheet->getCell("L$rowNumber")) ? 'Complied' : $row[11];
        $with_diploma = $this->isYellowAndBlank($this->worksheet->getCell("M$rowNumber")) || trim($row[12]) === '' ? 'Complied' : $row[12];

        // Save data to the model
        return new Student([
            'student_number' => $row[0],
            'student_fname' => $row[1],
            'student_mname' => $row[2],
            'student_lname' => $row[3],
            'student_suffix' => $row[4],
            'student_program' => $row[5],
            'student_curriculum' => $row[5], // Duplicate of program
            'has_hscard' => $has_hscard,
            'has_goodmoral' => $has_goodmoral,
            'has_birthcert' => $has_birthcert,
            'has_f137' => $has_f137,
            'honorable_dismissal' => $honorable_dismissal,
            'with_tor' => $with_tor,
            'with_diploma' => $with_diploma,
        ]);
    }
}
