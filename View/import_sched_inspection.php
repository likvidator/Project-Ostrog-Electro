<?php
	require '../Controller/connection.php';
	include '../Model/save_in_excel.php';
	$connect = get_connect();
	mysqli_query ($connect,"set names cp1251");
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);
	$date=$_GET["date"];
	if( !defined( "ExcelExport" ) ) 
	{
 		define( "ExcelExport", 1 );
   		class ExportToExcel 
   		{
			var $xlsData = ""; 
			var $fileName = ""; 
			var $countRow = 1; 
			var $countCol = 1; 
			var $totalCol = 100;
			
			function __construct ()
			{
				$this->xlsData = pack( "ssssss", 0x809, 0x08, 0x00,0x10, 0x0, 0x0 );
			}
			
			function RecNumber( $row, $col, $value )
			{
				$this->xlsData .= pack( "sssss", 0x0203, 14, $row, $col, 0x00 );
				$this->xlsData .= pack( "d", $value );
				return;
			}
			
			function RecText( $row, $col, $value )
			{
				$len = strlen( $value );
				$this->xlsData .= pack( "s*", 0x0204, 8 + $len, $row, $col, 0x00, $len);
				$this->xlsData .= $value;
				return;
			}
			
			function InsertNumber( $value )
			{
				if ( $this->countCol == $this->totalCol )
				{
					$this->countCol = 0;
					$this->countRow++;
				}
				$this->RecNumber( $this->countRow, $this->countCol, $value );
				$this->countCol++;
				return;
			}
			
			function InsertText( $value )
			{
				if ( $this->countCol == $this->totalCol ) 
				{
					$this->countCol = 0;
					$this->countRow++;
				}
				$this->RecText( $this->countRow, $this->countCol, $value );
				$this->countCol++;
				return;
			}
			
			function GoNewLine()
			{
				$this->countCol = 0;
				$this->countRow++;
				return;
			}
			function GoNewCol()
			{
				$this->countCol++;
				$this->countRow = 0;
				return;
			}
			
			function EndData()
			{
				$this->xlsData .= pack( "ss", 0x0A, 0x00 );
				return;
			}
			
			function SaveFile( $fileName )
			{
				//$this->fileName = $fileName;
				$this->fileName = $fileName;
				$this->SendFile();
			}
			
			function SendFile()
			{
				$this->EndData();
				header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
				header ( "Cache-Control: no-store, no-cache, must-revalidate" );
				header ( "Pragma: no-cache" );
				header ( "Content-type: application/x-msexcel" );
				header ( "Content-Disposition: attachment; fileName=$this->fileName.xls" );
				print $this->xlsData;
		 	}
		 	function NewLineCol($a,$b)
			{
				for ($i=1;$i<=$a;$i++)
				{
					$this->countRow++;
				}
				for ($j=1;$j<=$b;$j++)
				{
					$this->countCol++;
				}				
				return;
			}
		} 
	}

		$filename = 'Ãðàôèê ïðîâåðêè ó÷åòîâ'; 
		$excel = new ExportToExcel(); 
		$row=sched_inspect2($date);
		$excel->InsertText('Ãðàôèê ïðîâåðêè ó÷åòîâ íà');
		$excel->InsertText($date);
		$excel->GoNewLine();
		$excel->InsertText('Íàèìåíîâàíèå ïîòðåáèòåëÿ');
		$excel->InsertText('Òåëåôîí');
		$excel->InsertText('Ëèöåâîé ñ÷åò');
		$excel->GoNewLine();
		While($row2=mysqli_fetch_assoc($row))
		{
			$excel->InsertText($row2['Name_consumer']);
			$excel->InsertText($row2['Phone_consumer']);
			$excel->InsertText($row2['Personal_account']);
			$excel->GoNewLine();
			
		}
	$excel->SaveFile($filename);

?>

