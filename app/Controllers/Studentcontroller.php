<?php

namespace App\Controllers;

use App\Models\StudentModel;
use Dompdf\Dompdf; // Import Dompdf
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentController extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        $students = $this->studentModel->findAll();
        return view('list-student', ['students' => $students]);
    }

    public function downloadExcelReport()
    {
        $students = $this->studentModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'Branch');

        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student['id']);
            $sheet->setCellValue('B' . $row, $student['name']);
            $sheet->setCellValue('C' . $row, $student['email']);
            $sheet->setCellValue('D' . $row, $student['mobile']);
            $sheet->setCellValue('E' . $row, $student['branch']);
            $row++;
        }

        $fileName = 'students.xlsx';
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function generatePdf()
    {
        $students = $this->studentModel->findAll();

        // Mulai membuat HTML untuk PDF
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                table, th, td {
                    border: 1px solid black;
                }
                th, td {
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
            </style>
        </head>
        <body>
            <h2 style="text-align: center;">Student Report</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Branch</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($students as $student) {
            $html .= '
                <tr>
                    <td>' . esc($student['id']) . '</td>
                    <td>' . esc($student['name']) . '</td>
                    <td>' . esc($student['email']) . '</td>
                    <td>' . esc($student['mobile']) . '</td>
                    <td>' . esc($student['branch']) . '</td>
                </tr>';
        }

        $html .= '
                </tbody>
            </table>
        </body>
        </html>';

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // Set ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream("student_report.pdf", ["Attachment" => true]);
        exit;
    }
}