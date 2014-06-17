<?php

global $pwSiteLanguage;
$pwSiteLanguage = array(

	'common'	=>	array(
		'next'	=>	array(
			'en'	=>	'Next',
			'es'	=>	'próximo',
			),
		'prev'	=>	array(
			'en'	=>	'Previous',
			'es'	=>	'anterior',
			),

		),

	'blocks'	=> array(
		'close_alert' => '',
		),

	'points'	=> array(
		'post'	=> array(
			'name'	=>					'Post Karma',
			),
		'comment'	=> array(
			'name'	=>					'Comment Karma',
			),
		'share'	=> array(
			'name'	=>					'Share Karma',
			'action'	=>				'Share',
			// Link
			'link_name'	=> 				'Share Link',
			'link_description'	=> 		'Use this link for email & social media, & receive 1 Share Karma point for each person who follows the link.',
			// Outgoing
			'outgoing_name' => 			'Outgoing Shares',
			'outgoing_description' => 	'Posts that you have shared',
			// Incoming
			'incoming_name'	=>			'Incoming Shares',
			'incoming_description'	=>	'Your posts that have been shared',
			// Descriptions
			'recent_description'	=>	'Most recent share',
			'total_description'		=>	'Total Share Karma',
			),
		),

	'community'	=>	array(
		'preface'	=>	'Be a Contributor to UNIFY by posting a blog, link or event. All posts appear here in the Community section. Some posts may be selected by an editor to appear on the Home Page or Section pages.',
		),

	'edit'	=>	array(

		'event'	=>	array(

			'movement'	=>	array(
				'en'	=>	"Movement",
				'es'	=>	"movimiento"
				),
			'movement_select'	=>	array(
				'en'	=>	'Select a Movement',
				'es'	=>	'Seleccionar un Movimiento'
				),

			'unification'	=>	array(
				'en'	=>	"Unification",
				'es'	=>	"Unificatio"
				),
			'unification_select'	=>	array(
				'en'	=>	'Select a Unification',
				'es'	=>	'Seleccionar un Unificatio'
				),

			'date_time'	=>	array(
				'en'	=>	"Date / Time",
				'es'	=>	"fecha y hora"
				),
			
			'register'	=>	array(
				'en'	=>	"Register Event",
				'es'	=>	"Registro de eventos"
				),

			'title'	=>	array(
				'en'	=>	"Title",
				'es'	=>	"título"
				),

			'title_select'	=>	array(
				'en'	=>	"Title of your Event",
				'es'	=>	"Título del evento"
				),

			'post_title_info'	=>	array(
				'en'	=>	'Example: "MedMob in Union Square" or "EarthDance Berlin"',
				'es'	=>	'Ejemplo: "MedMob en Union Square" o "EarthDance Berlin"',
				),

			'link_info'	=>	array(
				'en'	=>	'Link to your Facebook Event / Meetup / Website',
				'es'	=>	'Enlace a tu Facebook Evento / Meetup / Sitio Web',
				),

			'location' => array(
				'en'	=>	'Location',
				'es'	=>	'localización',
				),

			'location_select' => array(
				'en'	=>	'Enter a Location',
				'es'	=>	'Escriba un ubicación',
				),

			'street_address_info' => array(
				'en'	=>	'Please make sure to put the exact street address so that google maps can find the location',
				'es'	=>	'Por favor, asegúrese de poner la dirección exacta de modo que los mapas de Google pueden encontrar la ubicación',
				),

			'city' => array(
				'en'	=>	'City',
				'es'	=>	'ciudad',
				),

			'description' => array(
				'en'	=>	'Description',
				'es'	=>	'descripción',
				),


			),


		'thumbnail'		=>	"Images should be at least 480 pixels wide and less than 1MB.",
		'link_url'		=>	"Add URL here to embed video, audio, or webpage link at top of page. System recognizes links from YouTube, Vimeo, and Soundcloud, among other services.",
		'post_status'	=>	"Save as Draft to preview and revise. Save as Published to share with others.",
		
		'post_types'	=>	array(
			'feature'	=>	array(
				'overview'	=>	"Feature articles appear on the UNIFY home page, as well as on Section and Topic pages. All Feature articles are reviewed by editors, which may take several days. Authors retain all rights to their material. For more about posting on UNIFY, read the FAQ.",
				'post_status'	=>	"Save as Draft to preview and revise. Save as Pending when finished & to be reviewed by a UNIFY editor.",
				),
			'blog'	=>	array(
				'overview'	=>	"Blog posts by Authors appear on the UNIFY home page when published. Contributors (registered users) blogs appear in the Community area. Editors may select posts from the Community area to publish on the Home Page. Authors retain all rights to their material. For more about posting on UNIFY, read the FAQ."
				),
			'event'	=>	array(
				'overview'	=>	"Event posts by Authors appear on the UNIFY home page, as well as on the Community Calendar. Events posted by Contributors (registered users) appear in the Community area. Editors may select events from the Community area to present on the Home Page and on Section pages. Authors retain all rights to their material. For more about posting on UNIFY, read the FAQ."
				),
			'link'	=>	array(
				'overview'	=>	"Paste a webpage link into the Link URL field and it will automatically create a post for you. Videos from YouTube and Vimeo, and audio from Soundcloud, is automatically embedded. Links posted by Authors appear on the UNIFY home page. Links posted by Contributors (registered users) appear in the Community area. Editors may select events from the Community area to present on the Home Page and on Section pages. For more about posting on UNIFY, read How To Post."
				),
			),

		'taxonomy'	=>	array(
			'topic'	=>	"Choosing a topic and sub-topic is required."
			),

		),

	);

?>