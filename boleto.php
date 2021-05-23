<?php 
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $l = 5;
	$this->SetXY(10,10);
    $this->Rect(10,10,190,15);
    $this->Rect(10,10,190,280);
    $this->Image('img/logo.png',11,11,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,15,utf8_decode('Relatório de Compra'),0,0,'C');
    // Line break
    $this->Ln(15);
    $l = 5;
    $hoje = date('d/m/Y');
    global $pdo;
    $sql = $pdo-> prepare('SELECT id from venda where id = (SELECT MAX(id) FROM venda)');
    $sql-> execute();
    $id = $sql -> fetch();
    $id = utf8_decode($id[0]);
		$this->SetFillColor(232,233,232);
		$this->SetTextColor(0,0,0);
		$this->SetFont('Arial','B',9);
        $this->Cell(60,7,utf8_decode('Empresa: Jhumaz Concessionária '),1,0,'C');
        $this->Cell(65,7,utf8_decode('Data da emissão da compra:').$hoje,1,0,'C');
        $this->Cell(65,7,utf8_decode('Codigo da compra:').$id,1,0,'C');
        $this->Ln(7);
        $g=38;
		$this->Cell($g,$l,'Cliente',1,0,'C');
		$this->Cell($g,$l,utf8_decode('Endereço'),1,0,'C');
		$this->Cell($g,$l,'Telefone',1,0,'C');
		$this->Cell($g,$l,utf8_decode('CPF'),1,0,'C');
        $this->Cell($g,$l,utf8_decode('Email'),1,0,'C');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
include 'conexao/conexao.php';
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$y = 37;
global $pdo;
$id_cliente = $_SESSION['cliente'];
$sql = $pdo->prepare('SELECT Nome, CPF, Endereco, Telefone, E_mail FROM cliente WHERE id_cliente = :id_cliente');
$sql-> bindValue('id_cliente', $id_cliente);
$sql-> execute();
$array = $sql-> fetch();
$nome = utf8_decode($array[0]);
$cpf = utf8_decode($array[1]);
$endereco = utf8_decode($array[2]);
$telefone = utf8_decode($array[3]);
$email = utf8_decode($array[4]);
$l = 5;
    $pdf->SetY($y);
	$pdf->SetX(10);
	$pdf->Rect(10,$y,38,$l);
	$pdf->MultiCell(61,6,$nome,0,10);
	$pdf->SetY($y);
	$pdf->SetX(48);
	$pdf->Rect(48,$y,38,$l);
	$pdf->MultiCell(61,6,$endereco,0,10);
    $pdf->SetY($y);
	$pdf->SetX(88);
	$pdf->Rect(86,$y,38,$l);
	$pdf->MultiCell(61,6,$telefone,0,2);
	$pdf->SetY($y);
	$pdf->SetX(124);
	$pdf->Rect(124,$y,38,$l);
	$pdf->MultiCell(61,6,$cpf,0,2);
    $pdf->SetY($y);
	$pdf->SetX(162);
	$pdf->Rect(162,$y,38,$l);
	$pdf->MultiCell(61,6,$email,0,2);
    $g=63;
    $pdf->SetY(42);
    $pdf->SetFillColor(232,233,232);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','B',9);
    $pdf->Cell($g,$l,'Vendedor',1,0,'C');
	$pdf->Cell($g,$l,utf8_decode('Email'),1,0,'C');
	$pdf->Cell(64,$l,'Numpis',1,0,'C');
    $id_usuario = $_SESSION['id_usuario'];
    $sql = $pdo->prepare('SELECT nome, numpis, email FROM usuario WHERE id_usuario = :id_usuario');
    $sql-> bindValue('id_usuario', $id_usuario);
    $sql-> execute();
    $array = $sql-> fetch();
    $usu = utf8_decode($array[0]);
    $num = utf8_decode($array[1]);
    $end = utf8_decode($array[2]);
    $y= 47;
    $pdf->SetFont('Times','',10);
    $pdf->SetY($y);
	$pdf->SetX(10);
	$pdf->Rect(10,$y,63,$l);
	$pdf->MultiCell(61,6,$usu,0,10);
    $pdf->SetY($y);
	$pdf->SetX(73);
	$pdf->Rect(73,$y,63,$l);
	$pdf->MultiCell(180,6,$end,0,10);
    $pdf->SetY($y);
	$pdf->SetX(136);
	$pdf->Rect(136,$y,64,$l);
	$pdf->MultiCell(136,6,$num,0,10);
    $g=63;
    $pdf->SetY(52);
    $pdf->SetFillColor(232,233,232);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell($g,$l,'Chassi',1,0,'C');
	$pdf->Cell($g,$l,utf8_decode('Cor'),1,0,'C');
	$pdf->Cell(64,$l,'Fabricante',1,0,'C');

    $id_veiculos = $_SESSION['veiculo'];
    $sql = $pdo->prepare('SELECT chassi, cor, preco, fabricante, ano, modelo FROM veiculos WHERE id_veiculos = :id_veiculos');
    $sql-> bindValue('id_veiculos', $id_veiculos);
    $sql-> execute();
    $array = $sql-> fetch();
    $chassi = utf8_decode($array[0]);
    $cor = utf8_decode($array[1]);
    $preco = utf8_decode($array[2]);
    $fabricante = utf8_decode($array[3]);
    $ano = utf8_decode($array[4]);
    $modelo = utf8_decode($array[5]);
    $y= 57;
    $pdf->SetFont('Times','',10);
    $pdf->SetY($y);
	$pdf->SetX(10);
	$pdf->Rect(10,$y,63,$l);
	$pdf->MultiCell(61,6,$chassi,0,10);
    $pdf->SetY($y);
	$pdf->SetX(73);
	$pdf->Rect(73,$y,63,$l);
	$pdf->MultiCell(180,6,$cor,0,10);
    $pdf->SetY($y);
	$pdf->SetX(136);
	$pdf->Rect(136,$y,64,$l);
	$pdf->MultiCell(136,6,$fabricante,0,10);
    $g=63;
    $pdf->SetY(62);
    $pdf->SetFillColor(232,233,232);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell($g,$l,'Ano',1,0,'C');
	$pdf->Cell($g,$l,utf8_decode('Modelo'),1,0,'C');
	$pdf->Cell(64,$l,utf8_decode('Preço'),1,0,'C');
    $y= 67;
    $pdf->SetFont('Times','',10);
    $pdf->SetY($y);
	$pdf->SetX(10);
	$pdf->Rect(10,$y,63,$l);
	$pdf->MultiCell(61,6,$ano,0,10);
    $pdf->SetY($y);
	$pdf->SetX(73);
	$pdf->Rect(73,$y,63,$l);
	$pdf->MultiCell(180,6,$modelo,0,10);
    $pdf->SetY($y);
	$pdf->SetX(136);
	$pdf->Rect(136,$y,64,$l);
	$pdf->MultiCell(136,6,$preco,0,10);

$pdf->Output();

?>