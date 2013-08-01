<?php

	get_header();

		$paso = isset( $_GET['paso'] ) ? $_GET['paso'] : false;

		switch ( $paso ) {
			case '1':
				get_template_part( 'templates/momentos-gold/momentos', 'paso1' );
				break;
			case '2':
				get_template_part( 'templates/momentos-gold/momentos', 'paso2' );
				break;
			case '3':
				get_template_part( 'templates/momentos-gold/momentos', 'paso3' );
				break;
			case '4':
				get_template_part( 'templates/momentos-gold/momentos', 'paso4' );
				break;
			case '5':
				get_template_part( 'templates/momentos-gold/momentos', 'paso5' );
				break;
			default:
				get_template_part( 'templates/momentos-gold/momentos', 'inicio' );
		}

	get_footer();