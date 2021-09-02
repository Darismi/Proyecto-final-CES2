<?php
    include ('../fpdf/fpdf.php');
    include ('../modelo/batido.php');

    class Reporte extends fpdf {
        function Header(){
            $this->SetFont('Times', 'B', 30);
            $this->SetTextColor(255, 221, 145);
            $this->SetFillColor(92, 26, 181);
            $this->Cell(0, 15, utf8_decode('Factura Batidos'), 0, 0, 'C',true);
            $this->Image('../assets/img/smoothie.png',160, 0, 40, 40, 'PNG');
            $this->Ln(50);
        }

        function Tabla($datos){
            $this->SetFillColor(255, 221, 145);
            $this->SetTextColor(255, 80, 0);
            $this->SetFont('Times', 'B', 30);
            $ancho = $this->GetPageWidth();
            $pos_x = ($ancho-140-20)/2;
            $this->Cell($pos_x);
            $this->Cell(140, 15, utf8_decode('Aquí esta tu orden'), 0, 1, 'C', true);
            $this->SetFillColor(255, 80, 0);
            $this->SetTextColor(255, 221, 145);
            $this->Cell($pos_x);
            $this->Cell(70, 10, utf8_decode('Batido'), 0, 0, 'C', true);
            $this->Cell(70, 10, utf8_decode('Precio'), 0, 1, 'C', true);
            $this->SetDrawColor(255, 80, 0);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('Times', '', 15);
            $lleno = false;
            $total = 0;
            $iva = 0;

            /*
            for ($i=0; $i < 9; $i++) { 
                if ($lleno) {
                    $this->SetFillColor(255, 250, 205);
                } else {
                    $this->SetFillColor(255, 255, 255);
                }
                $this->Cell($pos_x);
                $this->Cell(70, 10, utf8_decode('Batido Melocoton'), 'TB', 0, 'C', true);
                $this->Cell(70, 10, utf8_decode('15000'), 'TB', 1, 'C', true);
                $lleno = !$lleno;
            }
            */

            foreach ($datos as $batido) {
                $total += $batido->getPrecio();
                if ($lleno) {
                    $this->SetFillColor(255, 250, 205);
                } else {
                    $this->SetFillColor(255, 255, 255);
                }
                $this->Cell($pos_x);
                $this->Cell(70, 10, utf8_decode($batido->getBatido()), 'TB', 0, 'C', true);
                $this->Cell(70, 10, utf8_decode($batido->getPrecio()), 'TB', 1, 'C', true);
                $lleno = !$lleno;
            }

            $this->SetFillColor(255, 80, 0);
            $this->SetTextColor(255, 221, 145);
            $this->SetDrawColor(255, 221, 145);
            $iva = $total * 0.12;
            $total += $iva;

            $this->Cell($pos_x);
            $this->Cell(70, 10, utf8_decode('IVA'), 'TB', 0, 'C', true);
            $this->Cell(70, 10, utf8_decode($iva), 'TB', 1, 'C', true);
            $this->Cell($pos_x);
            $this->Cell(70, 10, utf8_decode('TOTAL'), 'TB', 0, 'C', true);
            $this->Cell(70, 10, utf8_decode($total), 'TB', 0, 'C', true);

        }

        function Footer(){
            $this->SetY(-15);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(0, 15, utf8_decode('¡Que Regreses!'), 0, 0, 'C');
        }

    }

    session_start();

    if(isset($_SESSION["id_session"]) 
    and isset($_SESSION["nombre_usuario"])
    and $_SESSION["mascota"]) {

        $reporte = new Reporte();
        $reporte->AddPage();
        $reporte->Tabla($_SESSION["carrito_de_compras"]);
        $reporte->Output();

    } else {
        header("Location:pirata.php");
    }

?>