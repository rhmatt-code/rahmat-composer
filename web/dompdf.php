<?php
require_once './../vendor/autoload.php';

$faker = Faker\Factory::create();

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$html = "<table border='1'>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
    </tr>";
for ($i = 0; $i < 100; $i++) {
    $html .= "<tr>";
    $html .= "<td>" . $i . "</td>";
    $html .= "<td>" . $faker->name() . "</td>";
    $html .= "<td>" . $faker->email() . "</td>";
    $html .= "<td>" . $faker->address() . "</td>";
    $html .= "</tr>";
};
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream();
