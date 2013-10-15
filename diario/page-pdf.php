<?php

	define('FPDF_FONTPATH', get_template_directory().'/inc/fpdf16/font/');
	require_once('inc/fpdf16/fpdf.php');

	global $current_user;
	get_currentuserinfo();

	$query = new WP_Query(array(
		'author'         => $current_user->ID,
		'meta_key'       => '_thumbnail_id',
		'posts_per_page' => -1
	));

	$arrayImages = array();

	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		$attachment_id = get_post_thumbnail_id( get_the_ID() );
		$arrayImages[] = wp_get_attachment_metadata( $attachment_id );
		$arrayTitles[] = get_the_title();
	endwhile; endif; wp_reset_postdata();


	class PDF extends FPDF {


		public $pdfImagesm, $imagesPath, $imageheight;


		public function __construct($images, $titles)
		{
			parent::__construct($orientation='P', $unit='mm', $size='A4');
			$this->pdfImages   = $images;
			$this->pdfTitles   = $titles;
			$this->imagesPath  = $this->get_uploads_dir();
			$this->imageheight = 10;
		}


		public function get_uploads_dir()
		{
			$uploads = wp_upload_dir();
			return $uploads['basedir'] . '/';
		}


		public function get_image_path($filename)
		{
			return $this->imagesPath . $filename;
		}


		public function Header()
		{
			$this->SetFont('Arial','B',14);
		    $this->Cell(190,10,"Diario de mi bebe",0,0,'C'); // Título
		    $this->Ln(40);

			foreach ($this->pdfImages as $index => $image) {
				$imagen = $this->get_image_path($image['file']);
				$this->Cell( 40, 40, $this->Image($imagen, $this->GetX()+50, $this->GetY(), 33 ), 0, 0, 'L', false );
				$this->Ln(22);
				$this->Cell( 140, 36, $this->pdfTitles[$index], $this->GetX(), $this->GetY(), 'C');
			}
		}

	}

	// Creación del objeto de la clase heredada
	$pdf = new PDF($arrayImages, $arrayTitles);
	$pdf->AddPage();
	$pdf->Output();
