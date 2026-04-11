<?php
/**
 * Service Detail Content Registry
 *
 * Returns the full content array for a given service slug. Consumed
 * by page-templates/page-service-detail.php and the three new service
 * template parts (hero, before-after, pricing).
 *
 * Keeping all service copy in a single PHP array makes it trivial to
 * add Coatings / Accessories / Off-Road / Fleet later — just drop
 * another case into the switch.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'bmg_get_service_content' ) ) {
	/**
	 * Return the content array for a service detail page.
	 *
	 * @param string $slug The page slug (e.g. "spray-on-bedliners").
	 * @return array|null  The content array, or null when the slug is unknown.
	 */
	function bmg_get_service_content( $slug ) {

		switch ( $slug ) {

			// ==============================================================
			// Spray-On Bedliners
			// ==============================================================
			case 'spray-on-bedliners':
				return array(
					'hero' => array(
						'breadcrumb' => array(
							array( 'label' => __( 'Home', 'bmg-theme' ),     'url' => '/' ),
							array( 'label' => __( 'Services', 'bmg-theme' ), 'url' => '/services/' ),
							array( 'label' => __( 'Spray-On Bedliners', 'bmg-theme' ), 'url' => '' ),
						),
						'overline'       => __( 'SPRAY-ON BEDLINERS', 'bmg-theme' ),
						'headline'       => __( 'BONDED. PERMANENT. BACKED FOR LIFE.', 'bmg-theme' ),
						'subline'        => __( 'Professional-grade polyurethane coating sprayed directly to bare metal. No drop-ins. No cracks. No trapped moisture.', 'bmg-theme' ),
						'cta_primary'    => array( 'label' => __( 'Get a Quote', 'bmg-theme' ),     'url' => '/quote/' ),
						'cta_secondary'  => array( 'label' => __( 'Call Us', 'bmg-theme' ),          'url' => 'tel:' ), // filled in by template from bmg_phone
						'trust_strip'    => array(
							__( 'LIFETIME WARRANTY', 'bmg-theme' ),
							__( 'CERTIFIED INSTALLERS', 'bmg-theme' ),
							__( '1-DAY TURNAROUND', 'bmg-theme' ),
						),
					),

					'problem' => array(
						'overline' => __( 'WHY DROP-INS FAIL', 'bmg-theme' ),
						'headline' => __( 'PLASTIC LINERS HIDE DAMAGE. SPRAY-ON PREVENTS IT.', 'bmg-theme' ),
						'blocks'   => array(
							array(
								'overline' => __( '01 / TRAPPED MOISTURE', 'bmg-theme' ),
								'title'    => __( 'Drop-ins flex. Water gets underneath.', 'bmg-theme' ),
								'body'     => __( 'Bolt-in liners move every time you load the bed. Water works its way underneath and sits against bare steel. Rust spreads invisibly until the liner comes out and the damage is structural.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '02 / SLIPPING CARGO', 'bmg-theme' ),
								'title'    => __( 'Smooth plastic offers zero grip.', 'bmg-theme' ),
								'body'     => __( 'Your load shifts every corner. Straps dig into soft plastic. You spend the drive listening to your cargo slide around instead of focusing on the road.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '03 / CRACKED & FADED', 'bmg-theme' ),
								'title'    => __( 'UV and abrasion kill drop-ins.', 'bmg-theme' ),
								'body'     => __( 'Two or three summers in direct sun and the plastic brittles, cracks, and fades. A spray-on coating is UV-stable and formulated to hold its texture and color for the life of the truck.', 'bmg-theme' ),
							),
						),
					),

					'tiers' => array(
						'overline' => __( 'CHOOSE YOUR COATING', 'bmg-theme' ),
						'headline' => __( 'THREE TIERS. ONE STANDARD.', 'bmg-theme' ),
						'cards'    => array(
							array(
								'name'        => __( 'STANDARD', 'bmg-theme' ),
								'best_for'    => __( 'Daily drivers, light loads', 'bmg-theme' ),
								'highlights'  => array(
									__( 'UV-stable topcoat', 'bmg-theme' ),
									__( 'Textured grip surface', 'bmg-theme' ),
									__( '1-day install', 'bmg-theme' ),
									__( 'Lifetime warranty', 'bmg-theme' ),
								),
								'recommended' => false,
							),
							array(
								'name'        => __( 'PREMIUM', 'bmg-theme' ),
								'best_for'    => __( 'Work trucks, heavy use', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Thicker mil build', 'bmg-theme' ),
									__( 'High-impact resistant', 'bmg-theme' ),
									__( 'Chemical-resistant', 'bmg-theme' ),
									__( 'Lifetime warranty', 'bmg-theme' ),
								),
								'recommended' => true,
							),
							array(
								'name'        => __( 'OFF-ROAD GRADE', 'bmg-theme' ),
								'best_for'    => __( 'Overlanding, extreme use', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Maximum thickness', 'bmg-theme' ),
									__( 'Aggressive anti-slip', 'bmg-theme' ),
									__( 'Color-match options', 'bmg-theme' ),
									__( 'Lifetime warranty', 'bmg-theme' ),
								),
								'recommended' => false,
							),
						),
					),

					'before_after' => array(
						'overline' => __( 'SEE THE DIFFERENCE', 'bmg-theme' ),
						'headline' => __( 'BEFORE. AFTER. PERMANENT.', 'bmg-theme' ),
						'body'     => __( 'Drag the slider to reveal the finished coating.', 'bmg-theme' ),
						'images'   => array(
							array(
								'before'  => '',
								'after'   => '',
								'label'   => __( 'Ford F-250 Super Duty — 6.5\' Bed', 'bmg-theme' ),
								'tier'    => 'PREMIUM',
							),
						),
					),

					'process' => array(
						'overline' => __( 'OUR INSTALL PROCESS', 'bmg-theme' ),
						'headline' => __( 'ONE DAY. FOUR STEPS. DIALED.', 'bmg-theme' ),
						'steps'    => array(
							array(
								'title' => __( 'Prep & Mask', 'bmg-theme' ),
								'body'  => __( 'Bed cleaned, sanded, and degreased. Every edge masked with precision.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Surface Bond', 'bmg-theme' ),
								'body'  => __( 'Bare metal primed for a chemical bond. No shortcuts, no skipped panels.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Spray Application', 'bmg-theme' ),
								'body'  => __( 'Multi-pass spray in a controlled bay. Consistent thickness, consistent texture.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Cure & QC', 'bmg-theme' ),
								'body'  => __( 'Full cure, edge inspection, photo documentation, warranty registration.', 'bmg-theme' ),
							),
						),
					),

					'pricing' => array(
						'overline'  => __( 'STARTING AT', 'bmg-theme' ),
						'headline'  => __( 'STRAIGHTFORWARD PRICING.', 'bmg-theme' ),
						'columns'   => array(
							__( 'Bed Size', 'bmg-theme' ),
							__( 'Standard', 'bmg-theme' ),
							__( 'Premium', 'bmg-theme' ),
							__( 'Off-Road', 'bmg-theme' ),
						),
						'rows'      => array(
							array( "5.5' Short Bed",     '$[TBD]', '$[TBD]', '$[TBD]' ),
							array( "6.5' Standard",      '$[TBD]', '$[TBD]', '$[TBD]' ),
							array( "8' Long Bed",        '$[TBD]', '$[TBD]', '$[TBD]' ),
							array( 'Cargo Van / Custom', 'Quote',  'Quote',  'Quote'  ),
						),
						'recommended_col' => 2, // 1-indexed: "Premium" column highlighted
						'microcopy' => __( 'Final pricing depends on prep condition and coverage area. Free written quotes — no obligation.', 'bmg-theme' ),
					),

					'proof' => array(
						'stats'        => array(
							array( 'number' => '4,200+',   'label' => __( 'BEDLINERS INSTALLED', 'bmg-theme' ) ),
							array( 'number' => '12 YRS',   'label' => __( 'IN BUSINESS', 'bmg-theme' ) ),
							array( 'number' => 'LIFETIME', 'label' => __( 'WARRANTY', 'bmg-theme' ) ),
							array( 'number' => '1 DAY',    'label' => __( 'AVG TURNAROUND', 'bmg-theme' ) ),
						),
						'testimonials' => array(
							array(
								'quote'   => __( '[TESTIMONIAL TBD — source from existing bedliner customers.]', 'bmg-theme' ),
								'name'    => __( '[CUSTOMER NAME]', 'bmg-theme' ),
								'vehicle' => __( '[VEHICLE]', 'bmg-theme' ),
								'service' => __( 'BEDLINER', 'bmg-theme' ),
							),
							array(
								'quote'   => __( '[TESTIMONIAL TBD]', 'bmg-theme' ),
								'name'    => __( '[CUSTOMER NAME]', 'bmg-theme' ),
								'vehicle' => __( '[VEHICLE]', 'bmg-theme' ),
								'service' => __( 'PREMIUM TIER', 'bmg-theme' ),
							),
							array(
								'quote'   => __( '[TESTIMONIAL TBD]', 'bmg-theme' ),
								'name'    => __( '[CUSTOMER NAME]', 'bmg-theme' ),
								'vehicle' => __( '[VEHICLE]', 'bmg-theme' ),
								'service' => __( 'OFF-ROAD GRADE', 'bmg-theme' ),
							),
						),
					),

					'faq' => array(
						'overline' => __( 'COMMON QUESTIONS', 'bmg-theme' ),
						'headline' => __( 'BEDLINER FAQ.', 'bmg-theme' ),
						'items'    => array(
							array(
								'question' => __( 'How long does a spray-on bedliner take to install?', 'bmg-theme' ),
								'answer'   => __( 'Most installs are done in a single day. You drop off in the morning and pick up in the afternoon after full cure.', 'bmg-theme' ),
							),
							array(
								'question' => __( "What's the warranty?", 'bmg-theme' ),
								'answer'   => __( 'Lifetime. If it peels, cracks, or bubbles — ever — we re-coat it at no charge.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Can I drive my truck right after?', 'bmg-theme' ),
								'answer'   => __( 'Yes. Coatings are cured before you pick up. Load the bed the same day.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'How thick is the coating?', 'bmg-theme' ),
								'answer'   => __( 'Standard is ~1/8". Premium runs ~3/16". Off-Road Grade builds heavier with aggressive texture.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Can you color-match my truck?', 'bmg-theme' ),
								'answer'   => __( 'Yes — we offer custom color matching on Premium and Off-Road Grade tiers. Black is standard.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Will UV break down the finish?', 'bmg-theme' ),
								'answer'   => __( 'No. Our coatings are UV-stable and formulated to hold color and texture for the life of the vehicle.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'What if I trade in the truck later?', 'bmg-theme' ),
								'answer'   => __( 'A professional spray-on liner typically adds resale value. We provide documentation you can show the dealer.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do I need to do anything before I bring it in?', 'bmg-theme' ),
								'answer'   => __( 'Just clean out the bed. We handle every surface prep step ourselves.', 'bmg-theme' ),
							),
						),
					),

					'cta' => array(
						'overline'  => __( 'READY WHEN YOU ARE', 'bmg-theme' ),
						'headline'  => __( 'STOP PUTTING IT OFF.', 'bmg-theme' ),
						'subline'   => __( 'One day. Lifetime warranty. Done.', 'bmg-theme' ),
						'cta_label' => __( 'Get a Quote', 'bmg-theme' ),
						'cta_url'   => '/quote/',
					),
				);

			// Future cases: protective-coatings, truck-accessories,
			// off-road-overland, fleet — to be added later.
		}

		return null;
	}
}
