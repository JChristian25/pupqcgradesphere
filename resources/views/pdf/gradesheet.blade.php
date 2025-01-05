<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Sheet</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            border: 1px solid black;
            padding: 10px;
        }
        h1, h2 {
            font-family: 'Times New Roman', Times, serif;
            margin: 5px 0;
        }
        .header, .footer {
            text-align: center;
            margin: 10px 0;
        }
        .gradesheet-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .gradesheet-table th {
            border: 1px solid black;
        }
        .gradesheet-table td {
            border: 1px solid black;
            padding: 2px;
            text-align: center;
        }
        .note {
            font-size: 10px;
            margin-top: 10px;
        }
        .signature-table {
            width: 100%;
            margin-top: 20px;
        }
        .signature-table td {
            width: 50%;
            text-align: center;
            padding-top: 30px;
        }
        .small-note {
            font-size: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
        <div class="header" style="font-family: 'Times New Roman', Times, serif">
            <p style="text-align:left;">PUP Form No. 46<br>November, 1992</p>
            <h2 style="margin-bottom: 0;">POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</h2>
            <h3 style="margin-top: 0;"><i>MANILA</i></h3>
            <h1>GRADE SHEET</h1>
        </div>

        <table class="gradesheet-table">
            <thead>
                <tr style="font-weight: normal; font-size: 9pt;">
                    <th style="font-weight: normal;">STUDENT NO.</th>
                    <th></th>
                    <th style="font-weight: normal;">STUDENT'S NAME<br>(Alphabetical Order)</th>
                    <th style="font-weight: normal;">FIRST<br>GRADING</th>
                    <th style="font-weight: normal;">SECOND<br>GRADING</th>
                    <th style="font-weight: normal;">FINAL<br>RATING</th>
                    <th style="font-weight: normal;">STUDENT<br>PERMIT<br>NUMBER</th>
                    <th style="font-weight: normal;">REMARKS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                ?>
                @foreach ($studentGradesheet as $student)

                <?php
                    $first = $student->first_grading;
                    $second = $student->second_grading;
                    $final = $student->final_rating;

                    if ($first === 'INC') {
                        $second = $second === 'INC' ? 'INC' : $second;
                        $final = !empty($final) ? "$final/INC" : 'INC';
                    }

                    if ($first === 'D' || $second === 'D' || $final === 'D') {
                        $second = $second === 'D' ? 'D' : (empty($second) ? '' : 'D');
                        $final = 'D';
                    }

                    if ($first === 'W' || $second === 'W' || $final === 'W') {
                        $second = $second === 'W' ? 'W' : (empty($second) ? '' : 'W');
                        $final = 'W';
                    }
                ?>


                <tr style="font-size: 7pt;">
                    <td>{{ $student->student_number }}</td>
                    <td style="font-size: 9pt;"><strong>{{ $count++ }}</strong></td>
                    <td style="text-align: left;">{{ $student->student_lname}}, {{ $student->student_fname }} {{ $student->student_mname }}</td>
                    <td>{{ $first }}</td>
                    <td>{{ $second }}</td>
                    <td>{{ $final }}</td>
                    <td></td>
                    <td>{{ $student->remarks }}</td>
                </tr>

                @endforeach

                <tr>
                    <td colspan="7">(TO BE FILLED IN QUADRUPLICATE)</td>
                </tr>
            </tbody>
        </table>

        <p class="note">
            NOTE: After the last entry indicate "NOTHING FOLLOWS" and initial. Grades of students should be handwritten.<br>
            Any alteration in the entry must be initialed and dated by the Professor/Instructor.<br>
            Please copy on the upper right hand corner of every sheet the control number of the original.
        </p>

        <table class="small-note">
            <tr>
                <td>Code Number:{{$gradesheet->g_subject_code}}</td>
                <td>Course Description:{{$gradesheet->g_subject}}</td>
                <td>Number of Units:{{$gradesheet->g_subject_units}}</td>
            </tr>
            <tr>
                <td>Year & Section:{{$gradesheet->year_and_section}}</td>
                <td>Time:{{$gradesheet->block_time}}</td>
                <td>Room:{{$gradesheet->block_room}}</td>
                <td>Semester:{{$gradesheet->g_subject_semester}}</td>
                <td>School Year:{{$gradesheet->school_year}}</td>
            </tr>
        </table>

        <table class="signature-table">
            <tr>
                <td>(Signature of Department Head)</td>
                <td>(Signature Over Printed Name of Instructor)</td>
            </tr>
        </table>

        <p class="footer">DATE REC'D. OFFICE OF THE REGISTRAR _________________</p>
</body>
</html>
