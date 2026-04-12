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
								'before'  => home_url( '/wp-content/uploads/2026/04/bed-liner-before_v01.webp' ),
								'after'   => home_url( '/wp-content/uploads/2026/04/bed-liner-after_v01.webp' ),
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
						// Placeholder prices — replace with final pricing before launch.
						'rows'      => array(
							array( "5.5' Short Bed",     '$595',  '$795',   '$995'   ),
							array( "6.5' Standard",      '$645',  '$845',   '$1,045' ),
							array( "8' Long Bed",        '$745',  '$945',   '$1,145' ),
							array( 'Cargo Van / Custom', 'Quote', 'Quote',  'Quote'  ),
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
						// Placeholder testimonials — replace with real customer quotes
						// before launch. Written in the Rhino brand voice so the page
						// reads right while real content is sourced.
						'testimonials' => array(
							array(
								'quote'   => __( "Dropped off my F-150 Monday, picked it up Wednesday. Two winters of hauling firewood later, the liner looks the day it went on. You can tell it's bonded — no flex, no cracks, no trapped water underneath.", 'bmg-theme' ),
								'name'    => __( 'MIKE R.', 'bmg-theme' ),
								'vehicle' => __( '2022 F-150', 'bmg-theme' ),
								'service' => __( 'STANDARD TIER', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Work truck, daily. Thirty thousand miles of tools, gravel, and pallets later the Premium coating is still dialed. Chemical spills wipe clean. Nothing has eaten through it.", 'bmg-theme' ),
								'name'    => __( 'DANA L.', 'bmg-theme' ),
								'vehicle' => __( '2021 RAM 2500', 'bmg-theme' ),
								'service' => __( 'PREMIUM TIER', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Off-Road Grade on the Gladiator before a 3,000-mile overland trip. Rock chips didn't leave a mark. Color match came out better than I expected — looks like it came off the factory floor.", 'bmg-theme' ),
								'name'    => __( 'JEN K.', 'bmg-theme' ),
								'vehicle' => __( '2023 GLADIATOR RUBICON', 'bmg-theme' ),
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

			// ==============================================================
			// Protective Coatings
			// ==============================================================
			case 'protective-coatings':
				return array(
					'hero' => array(
						'breadcrumb' => array(
							array( 'label' => __( 'Home', 'bmg-theme' ),     'url' => '/' ),
							array( 'label' => __( 'Services', 'bmg-theme' ), 'url' => '/services/' ),
							array( 'label' => __( 'Protective Coatings', 'bmg-theme' ), 'url' => '' ),
						),
						'overline'      => __( 'PROTECTIVE COATINGS', 'bmg-theme' ),
						'headline'      => __( 'STOP RUST BEFORE IT STARTS.', 'bmg-theme' ),
						'subline'       => __( 'Undercoating, rocker panels, frames, and wheel wells sealed with the same professional-grade polyurea we spray on beds.', 'bmg-theme' ),
						'cta_primary'   => array( 'label' => __( 'Get a Quote', 'bmg-theme' ), 'url' => '/quote/' ),
						'cta_secondary' => array( 'label' => __( 'Call Us', 'bmg-theme' ), 'url' => 'tel:' ),
						'trust_strip'   => array(
							__( 'LIFETIME WARRANTY', 'bmg-theme' ),
							__( 'SALT-TESTED', 'bmg-theme' ),
							__( 'FLEET-QUALIFIED', 'bmg-theme' ),
						),
					),

					'problem' => array(
						'overline' => __( 'WHY FACTORY COATINGS FAIL', 'bmg-theme' ),
						'headline' => __( 'EVERY SALTED ROAD IS A TAX ON YOUR TRUCK.', 'bmg-theme' ),
						'blocks'   => array(
							array(
								'overline' => __( '01 / SALT & BRINE', 'bmg-theme' ),
								'title'    => __( 'Winter deicers eat steel.', 'bmg-theme' ),
								'body'     => __( 'Road salt and brine chemicals accelerate corrosion faster than any factory undercoating was built to handle. Every winter strips another layer.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '02 / FACTORY COATINGS WEAR OUT', 'bmg-theme' ),
								'title'    => __( 'OEM protection is a minimum, not a maximum.', 'bmg-theme' ),
								'body'     => __( 'Factory undercoating is thin, uneven, and wears through in two to four years. What was built to pass a spec sheet isn\'t built to survive a decade on salted roads.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '03 / HIDDEN DAMAGE', 'bmg-theme' ),
								'title'    => __( 'Rust spreads where you can\'t see it.', 'bmg-theme' ),
								'body'     => __( 'Inside frame rails, behind rocker panels, up in wheel wells — corrosion compounds invisibly until the first thing you notice is a structural failure.', 'bmg-theme' ),
							),
						),
					),

					'tiers' => array(
						'overline' => __( 'FULL COVERAGE', 'bmg-theme' ),
						'headline' => __( 'NO SHORTCUTS. NO SKIPPED PANELS.', 'bmg-theme' ),
						'cards'    => array(
							array(
								'name'        => __( 'UNDERCOATING', 'bmg-theme' ),
								'best_for'    => __( 'Daily drivers, winter use', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Frame rails sealed', 'bmg-theme' ),
									__( 'Floor pans protected', 'bmg-theme' ),
									__( 'Inner fenders coated', 'bmg-theme' ),
									__( 'Lifetime warranty', 'bmg-theme' ),
								),
								'recommended' => false,
							),
							array(
								'name'        => __( 'ROCKER & WELLS', 'bmg-theme' ),
								'best_for'    => __( 'High-impact zones', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Rocker panels sealed', 'bmg-theme' ),
									__( 'Wheel wells inside + out', 'bmg-theme' ),
									__( 'Stone-chip resistant', 'bmg-theme' ),
									__( 'Lifetime warranty', 'bmg-theme' ),
								),
								'recommended' => true,
							),
							array(
								'name'        => __( 'FRAME + FLEET', 'bmg-theme' ),
								'best_for'    => __( 'New builds, multi-truck programs', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Bare-metal bond', 'bmg-theme' ),
									__( 'Rotation programs available', 'bmg-theme' ),
									__( 'Net-30 billing (fleet)', 'bmg-theme' ),
									__( 'Lifetime warranty', 'bmg-theme' ),
								),
								'recommended' => false,
							),
						),
					),

					'before_after' => array(
						'overline' => __( 'SEE THE DIFFERENCE', 'bmg-theme' ),
						'headline' => __( 'BEFORE. AFTER. SEALED.', 'bmg-theme' ),
						'body'     => __( 'Drag the slider to reveal the finished coating.', 'bmg-theme' ),
						'images'   => array(
							array(
								'before' => home_url( '/wp-content/uploads/2026/04/protective-liner-before_v01.webp' ),
								'after'  => home_url( '/wp-content/uploads/2026/04/protective-liner-after_v01.webp' ),
								'label'  => __( '2019 Chevy Silverado — Frame Rail', 'bmg-theme' ),
								'tier'   => 'UNDERCOATING',
							),
						),
					),

					'process' => array(
						'overline' => __( 'OUR APPLICATION PROCESS', 'bmg-theme' ),
						'headline' => __( 'FOUR STEPS. ONE STANDARD.', 'bmg-theme' ),
						'steps'    => array(
							array(
								'title' => __( 'Strip & Clean', 'bmg-theme' ),
								'body'  => __( 'Existing coating stripped back. Every surface degreased and washed. No shortcuts on prep.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Inspect & Treat', 'bmg-theme' ),
								'body'  => __( 'Frame and rocker panels inspected for existing corrosion. Active rust converted before coating goes on.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Spray Application', 'bmg-theme' ),
								'body'  => __( 'Multi-pass spray, consistent mil thickness, every seam and cavity covered. No missed panels.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Cure & Document', 'bmg-theme' ),
								'body'  => __( 'Full cure, photo documentation per panel, warranty registration filed the same day.', 'bmg-theme' ),
							),
						),
					),

					'proof' => array(
						'stats'        => array(
							array( 'number' => '47',       'label' => __( 'FLEET ACCOUNTS', 'bmg-theme' ) ),
							array( 'number' => '12 YRS',   'label' => __( 'IN BUSINESS', 'bmg-theme' ) ),
							array( 'number' => 'LIFETIME', 'label' => __( 'WARRANTY', 'bmg-theme' ) ),
							array( 'number' => '1-2 DAYS', 'label' => __( 'AVG TURNAROUND', 'bmg-theme' ) ),
						),
						// Placeholder testimonials — replace with real quotes before launch.
						'testimonials' => array(
							array(
								'quote'   => __( "Five winters of salt runs and the frame on my F-250 looks factory-new underneath. Worth every dollar the first time I crawled under to check it.", 'bmg-theme' ),
								'name'    => __( 'TOM B.', 'bmg-theme' ),
								'vehicle' => __( '2019 FORD F-250', 'bmg-theme' ),
								'service' => __( 'UNDERCOATING', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Sealed the rockers and wheel wells on our Tacoma before a road trip through the Dakotas. Gravel and mud bounced off. No stone chips, no rust creeping in.", 'bmg-theme' ),
								'name'    => __( 'SARAH M.', 'bmg-theme' ),
								'vehicle' => __( '2021 TOYOTA TACOMA', 'bmg-theme' ),
								'service' => __( 'ROCKER & WELLS', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Run 14 service trucks. Rhino coats the new ones on intake and rotates the old fleet through refresh every two years. One invoice, one PM, zero rust problems.", 'bmg-theme' ),
								'name'    => __( 'CARLOS D.', 'bmg-theme' ),
								'vehicle' => __( 'FLEET MANAGER', 'bmg-theme' ),
								'service' => __( '14 TRUCKS', 'bmg-theme' ),
							),
						),
					),

					'faq' => array(
						'overline' => __( 'COMMON QUESTIONS', 'bmg-theme' ),
						'headline' => __( 'COATINGS FAQ.', 'bmg-theme' ),
						'items'    => array(
							array(
								'question' => __( 'How long does protective coating last?', 'bmg-theme' ),
								'answer'   => __( 'Our polyurea coatings are warrantied for the life of the vehicle against peeling, cracking, and bubbling. On fleet rotation programs we recommend a refresh every three to five years on heavy-use panels.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Can you coat over existing rust?', 'bmg-theme' ),
								'answer'   => __( 'Surface rust we can treat and coat over after conversion. Structural rust or rot needs to be cut out and patched before coating — we\'ll tell you up front what we find.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Does this affect my factory warranty?', 'bmg-theme' ),
								'answer'   => __( 'No. Aftermarket undercoating is applied over the factory finish without modification. We provide documentation you can keep with your service records.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'How long will my truck be in the shop?', 'bmg-theme' ),
								'answer'   => __( 'Most undercoating jobs are one to two days depending on prep. Fleet rotation programs run on scheduled windows so your trucks are never out of service unexpectedly.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Can I wash my truck normally after?', 'bmg-theme' ),
								'answer'   => __( 'Yes. Pressure wash, drive-through, hand wash — all fine. The coating is chemical-resistant and sealed against water penetration.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you offer fleet pricing?', 'bmg-theme' ),
								'answer'   => __( 'Yes. Volume pricing kicks in at five vehicles. Net-30 billing, dedicated project manager, and scheduled install windows on fleet programs.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'What if I lift or modify the truck later?', 'bmg-theme' ),
								'answer'   => __( 'The coating flexes and stays bonded through suspension work. If a bracket needs to be mounted through a coated panel we can touch up the spot.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Is it noisy inside the cab?', 'bmg-theme' ),
								'answer'   => __( 'Quieter. The coating adds a layer of sound deadening on the floor pans and inner fenders. You notice less road noise, not more.', 'bmg-theme' ),
							),
						),
					),

					'cta' => array(
						'overline'  => __( 'READY WHEN YOU ARE', 'bmg-theme' ),
						'headline'  => __( 'PROTECT IT ONCE. DRIVE IT FOR YEARS.', 'bmg-theme' ),
						'subline'   => __( 'One to two days in the shop. Lifetime warranty. Done.', 'bmg-theme' ),
						'cta_label' => __( 'Get a Quote', 'bmg-theme' ),
						'cta_url'   => '/quote/',
					),
				);

			// ==============================================================
			// Truck Accessories & Upfitting
			// ==============================================================
			case 'truck-accessories':
				return array(
					'hero' => array(
						'breadcrumb' => array(
							array( 'label' => __( 'Home', 'bmg-theme' ),     'url' => '/' ),
							array( 'label' => __( 'Services', 'bmg-theme' ), 'url' => '/services/' ),
							array( 'label' => __( 'Truck Accessories', 'bmg-theme' ), 'url' => '' ),
						),
						'overline'      => __( 'TRUCK ACCESSORIES & UPFITTING', 'bmg-theme' ),
						'headline'      => __( 'OUTFIT YOUR WORK TRUCK.', 'bmg-theme' ),
						'subline'       => __( 'Tonneau covers, running boards, toolboxes, headache racks, tow packages — installed clean, wired right, torqued to spec.', 'bmg-theme' ),
						'cta_primary'   => array( 'label' => __( 'Get a Quote', 'bmg-theme' ), 'url' => '/quote/' ),
						'cta_secondary' => array( 'label' => __( 'Shop Parts', 'bmg-theme' ),  'url' => '/shop/' ),
						'trust_strip'   => array(
							__( 'OEM-GRADE PARTS', 'bmg-theme' ),
							__( 'CERTIFIED INSTALLERS', 'bmg-theme' ),
							__( '1-YEAR LABOR WARRANTY', 'bmg-theme' ),
						),
					),

					'problem' => array(
						'overline' => __( 'WHY PROFESSIONAL INSTALL MATTERS', 'bmg-theme' ),
						'headline' => __( 'BAD INSTALLS COST MORE THAN THE PART.', 'bmg-theme' ),
						'blocks'   => array(
							array(
								'overline' => __( '01 / WRONG HOLES', 'bmg-theme' ),
								'title'    => __( 'Drilled mounts ruin panels.', 'bmg-theme' ),
								'body'     => __( 'A 1/4" hole in the wrong spot turns a $900 truck bed repair into a $3,500 panel replacement. Templates, measurements, and mockup matter.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '02 / CUT HARNESSES', 'bmg-theme' ),
								'title'    => __( 'Hacked wiring voids coverage.', 'bmg-theme' ),
								'body'     => __( 'Splicing into factory harnesses without a T-tap or a proper junction is a warranty void on paper. We wire every accessory with OEM-style connectors that pull apart clean.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '03 / OVER-TORQUED BOLTS', 'bmg-theme' ),
								'title'    => __( 'Aluminum cracks under stress.', 'bmg-theme' ),
								'body'     => __( 'Running boards, bed rails, and tonneau frames are aluminum. Torque specs are published. Eyeballing it with a impact gun is how brackets crack at mile 5,000.', 'bmg-theme' ),
							),
						),
					),

					'tiers' => array(
						'overline' => __( 'POPULAR UPFITS', 'bmg-theme' ),
						'headline' => __( 'THREE PACKAGES. ONE STANDARD.', 'bmg-theme' ),
						'cards'    => array(
							array(
								'name'        => __( 'DAILY DRIVER', 'bmg-theme' ),
								'best_for'    => __( 'Commuter trucks + light use', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Tonneau cover', 'bmg-theme' ),
									__( 'Running boards', 'bmg-theme' ),
									__( 'Splash guards', 'bmg-theme' ),
									__( 'Interior upgrades', 'bmg-theme' ),
								),
								'recommended' => false,
							),
							array(
								'name'        => __( 'WORK TRUCK', 'bmg-theme' ),
								'best_for'    => __( 'Contractors + tradespeople', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Heavy-duty tonneau', 'bmg-theme' ),
									__( 'Crossover toolbox', 'bmg-theme' ),
									__( 'Headache rack', 'bmg-theme' ),
									__( 'Ladder racks + tie-downs', 'bmg-theme' ),
								),
								'recommended' => true,
							),
							array(
								'name'        => __( 'TOW PACKAGE', 'bmg-theme' ),
								'best_for'    => __( 'RVs, trailers, heavy haul', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Class IV/V hitch', 'bmg-theme' ),
									__( '7-pin wiring + brake controller', 'bmg-theme' ),
									__( 'Air bag suspension assist', 'bmg-theme' ),
									__( 'Tow mirrors + sway control', 'bmg-theme' ),
								),
								'recommended' => false,
							),
						),
					),

					'process' => array(
						'overline' => __( 'OUR INSTALL PROCESS', 'bmg-theme' ),
						'headline' => __( 'CONSULT. FIT. INSTALL. TEST.', 'bmg-theme' ),
						'steps'    => array(
							array(
								'title' => __( 'Consult', 'bmg-theme' ),
								'body'  => __( 'Tell us how you use the truck. We spec parts that actually fit your vehicle, your load, and your budget.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Parts Fit', 'bmg-theme' ),
								'body'  => __( 'Every part verified against your year, make, model, and trim before we place the order. No wrong-fit returns on your time.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Install', 'bmg-theme' ),
								'body'  => __( 'Certified installers. OEM-style wiring. Torque specs checked. Panels masked. Interior covered.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Test + Walkthrough', 'bmg-theme' ),
								'body'  => __( 'We test every accessory before pickup and walk you through how it works. Lifetime warranty on parts, one year on labor.', 'bmg-theme' ),
							),
						),
					),

					'proof' => array(
						'stats'        => array(
							array( 'number' => '4,200+', 'label' => __( 'INSTALLS COMPLETED', 'bmg-theme' ) ),
							array( 'number' => '12 YRS', 'label' => __( 'IN BUSINESS', 'bmg-theme' ) ),
							array( 'number' => '9 BRANDS', 'label' => __( 'AUTHORIZED DEALER', 'bmg-theme' ) ),
							array( 'number' => '1 YEAR', 'label' => __( 'LABOR WARRANTY', 'bmg-theme' ) ),
						),
						// Placeholder testimonials — replace with real quotes before launch.
						'testimonials' => array(
							array(
								'quote'   => __( "Rhino upfit my RAM with a BakFlip, Westin running boards, and a UWS toolbox. Clean install, zero squeaks, everything wired into the factory harness like it came from the factory.", 'bmg-theme' ),
								'name'    => __( 'CHRIS P.', 'bmg-theme' ),
								'vehicle' => __( '2022 RAM 1500', 'bmg-theme' ),
								'service' => __( 'DAILY DRIVER', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Work truck package on a new F-250. Tonneau, headache rack, toolbox, ladder rack. They matched everything to the same satin black and it looks like one system, not a pile of accessories.", 'bmg-theme' ),
								'name'    => __( 'DEREK W.', 'bmg-theme' ),
								'vehicle' => __( '2023 FORD F-250', 'bmg-theme' ),
								'service' => __( 'WORK TRUCK', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Pulling a 34-foot fifth wheel. Brake controller, air bags, and tow mirrors dialed on the first try. I\'ve had other shops get this wrong twice.", 'bmg-theme' ),
								'name'    => __( 'GREG S.', 'bmg-theme' ),
								'vehicle' => __( '2021 CHEVY 2500HD', 'bmg-theme' ),
								'service' => __( 'TOW PACKAGE', 'bmg-theme' ),
							),
						),
					),

					'faq' => array(
						'overline' => __( 'COMMON QUESTIONS', 'bmg-theme' ),
						'headline' => __( 'ACCESSORIES FAQ.', 'bmg-theme' ),
						'items'    => array(
							array(
								'question' => __( 'Can I bring my own parts to install?', 'bmg-theme' ),
								'answer'   => __( 'Yes, within reason. We install customer-supplied parts we can verify fit and quality. Labor warranty still applies. If a part turns out to be defective or wrong-fit, we\'ll tell you before it goes on.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'What brands do you carry?', 'bmg-theme' ),
								'answer'   => __( 'We\'re an authorized dealer for ARB, Fox, Warn, Rigid Industries, Method Race Wheels, BFGoodrich, Rough Country, Baja Designs, Smittybilt, Rhino-Rack, and more. Every part OEM-grade, sourced direct.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you install stuff I bought online?', 'bmg-theme' ),
								'answer'   => __( 'Yes. Drop off the parts and we\'ll quote the install. We\'ll flag anything we think is wrong-fit or questionable before we start.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'How long does a typical accessory install take?', 'bmg-theme' ),
								'answer'   => __( 'One to three days depending on scope. Tonneau cover + running boards + toolbox on a bare truck is usually a single day. Full work-truck upfits can take two or three.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you wire brake controllers and trailer plugs?', 'bmg-theme' ),
								'answer'   => __( 'Yes. Class IV and V hitches, 4-pin / 7-pin trailer wiring, integrated brake controllers, and air bag suspension assist are all daily work for us.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'What\'s the warranty on parts?', 'bmg-theme' ),
								'answer'   => __( 'Manufacturer warranty on every part, which we handle on your behalf if there\'s ever a claim. One year labor warranty on the install itself.', 'bmg-theme' ),
							),
						),
					),

					'cta' => array(
						'overline'  => __( 'READY WHEN YOU ARE', 'bmg-theme' ),
						'headline'  => __( 'BUILD THE TRUCK YOU ACTUALLY USE.', 'bmg-theme' ),
						'subline'   => __( 'Free quotes. OEM-grade parts. Installed right the first time.', 'bmg-theme' ),
						'cta_label' => __( 'Get a Quote', 'bmg-theme' ),
						'cta_url'   => '/quote/',
					),
				);

			// ==============================================================
			// Off-Road & Overland
			// ==============================================================
			case 'off-road-overland':
				return array(
					'hero' => array(
						'breadcrumb' => array(
							array( 'label' => __( 'Home', 'bmg-theme' ),     'url' => '/' ),
							array( 'label' => __( 'Services', 'bmg-theme' ), 'url' => '/services/' ),
							array( 'label' => __( 'Off-Road & Overland', 'bmg-theme' ), 'url' => '' ),
						),
						'overline'      => __( 'OFF-ROAD & OVERLAND', 'bmg-theme' ),
						'headline'      => __( 'BUILT FOR WHERE THE ROAD ENDS.', 'bmg-theme' ),
						'subline'       => __( 'Lifts, bumpers, winches, armor, recovery gear, and full overland kits. Assembled by builders who run the same gear.', 'bmg-theme' ),
						'cta_primary'   => array( 'label' => __( 'Get a Quote', 'bmg-theme' ),   'url' => '/quote/' ),
						'cta_secondary' => array( 'label' => __( 'View Builds', 'bmg-theme' ),   'url' => '/gallery/' ),
						'trust_strip'   => array(
							__( 'AUTHORIZED DEALER', 'bmg-theme' ),
							__( 'MFR-CERTIFIED INSTALL', 'bmg-theme' ),
							__( 'TRAIL-TESTED BUILDS', 'bmg-theme' ),
						),
					),

					'problem' => array(
						'overline' => __( 'WHY BACKYARD BUILDS BREAK', 'bmg-theme' ),
						'headline' => __( 'CHEAP PARTS. CHEAP INSTALLS. EXPENSIVE FAILURES.', 'bmg-theme' ),
						'blocks'   => array(
							array(
								'overline' => __( '01 / KNOCK-OFF PARTS', 'bmg-theme' ),
								'title'    => __( 'Gray-market gear fails on the trail.', 'bmg-theme' ),
								'body'     => __( 'A winch that won\'t pull, a bumper that bends at 10 mph, a lift kit that bottoms out on the first washboard — you only find out when you\'re 40 miles from a paved road.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '02 / WRONG GEOMETRY', 'bmg-theme' ),
								'title'    => __( 'Bad lifts destroy CV joints.', 'bmg-theme' ),
								'body'     => __( 'Every lift changes suspension geometry. Skip the alignment, skip the control arms, skip the diff drop — and you\'re replacing CV joints at 8,000 miles.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '03 / NO WEIGHT MATH', 'bmg-theme' ),
								'title'    => __( 'Overloaded rigs wear out fast.', 'bmg-theme' ),
								'body'     => __( 'Roof tents, armor, winches, fridges, fuel cans — everything has a weight. Builders who don\'t track it end up over GVWR with sagging suspension and blown shocks.', 'bmg-theme' ),
							),
						),
					),

					'tiers' => array(
						'overline' => __( 'PICK YOUR CAPABILITY', 'bmg-theme' ),
						'headline' => __( 'BUILDS FOR EVERY TYPE OF TRAIL.', 'bmg-theme' ),
						'cards'    => array(
							array(
								'name'        => __( 'MILD', 'bmg-theme' ),
								'best_for'    => __( 'Daily driver + weekend trails', 'bmg-theme' ),
								'highlights'  => array(
									__( '2" leveling kit', 'bmg-theme' ),
									__( 'All-terrain tires', 'bmg-theme' ),
									__( 'Rock rails', 'bmg-theme' ),
									__( 'Skid plates', 'bmg-theme' ),
								),
								'recommended' => false,
							),
							array(
								'name'        => __( 'MODERATE', 'bmg-theme' ),
								'best_for'    => __( 'Overlanding + forest roads', 'bmg-theme' ),
								'highlights'  => array(
									__( '3-4" lift + tuned shocks', 'bmg-theme' ),
									__( 'Front bumper + winch', 'bmg-theme' ),
									__( 'Recovery gear kit', 'bmg-theme' ),
									__( 'LED light bar + pods', 'bmg-theme' ),
								),
								'recommended' => true,
							),
							array(
								'name'        => __( 'EXTREME', 'bmg-theme' ),
								'best_for'    => __( 'Rock crawling + expedition', 'bmg-theme' ),
								'highlights'  => array(
									__( '6"+ long-arm lift', 'bmg-theme' ),
									__( 'Full armor + sliders', 'bmg-theme' ),
									__( 'Beadlock wheels', 'bmg-theme' ),
									__( 'Roof tent + overland kit', 'bmg-theme' ),
								),
								'recommended' => false,
							),
						),
					),

					'process' => array(
						'overline' => __( 'OUR BUILD PROCESS', 'bmg-theme' ),
						'headline' => __( 'SPEC. SOURCE. BUILD. TEST.', 'bmg-theme' ),
						'steps'    => array(
							array(
								'title' => __( 'Spec', 'bmg-theme' ),
								'body'  => __( 'We sit down with you and spec the build — how you use the truck, where you take it, what you haul. Weight math, geometry, budget.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Source', 'bmg-theme' ),
								'body'  => __( 'Every part sourced direct from authorized dealers. No gray market. No knock-offs. You get what you paid for.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Build', 'bmg-theme' ),
								'body'  => __( 'Certified installers. Torque specs checked. Wiring done clean. Alignment and control arms on every lift. Progress photos along the way.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Test', 'bmg-theme' ),
								'body'  => __( 'Every build gets a trail test before pickup. We check geometry, check clearance, check function — then you get the keys.', 'bmg-theme' ),
							),
						),
					),

					'proof' => array(
						'stats'        => array(
							array( 'number' => '850+',    'label' => __( 'OFF-ROAD BUILDS', 'bmg-theme' ) ),
							array( 'number' => '12 YRS',  'label' => __( 'IN BUSINESS', 'bmg-theme' ) ),
							array( 'number' => '4.9★',    'label' => __( 'GOOGLE RATING', 'bmg-theme' ) ),
							array( 'number' => '10 BRANDS','label' => __( 'AUTHORIZED', 'bmg-theme' ) ),
						),
						// Placeholder testimonials — replace with real quotes before launch.
						'testimonials' => array(
							array(
								'quote'   => __( "Leveling kit, 33s, and rock sliders on the 4Runner. Daily commute still comfortable, and I actually take it on trails now. Installed in a day, dialed the first time.", 'bmg-theme' ),
								'name'    => __( 'ERIK T.', 'bmg-theme' ),
								'vehicle' => __( '2020 TOYOTA 4RUNNER', 'bmg-theme' ),
								'service' => __( 'MILD', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "3,000 miles of overland across Utah and Colorado. Bumper, winch, lights, recovery gear — everything held. Clean wiring, no rattles, every bolt still torqued.", 'bmg-theme' ),
								'name'    => __( 'JEN K.', 'bmg-theme' ),
								'vehicle' => __( '2023 GLADIATOR RUBICON', 'bmg-theme' ),
								'service' => __( 'MODERATE', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Long-arm lift, full armor, beadlocks, and a roof tent on the Bronco. It\'s an expedition rig now. Rhino built it right — I trust it on black diamond trails.", 'bmg-theme' ),
								'name'    => __( 'MARCUS H.', 'bmg-theme' ),
								'vehicle' => __( '2022 FORD BRONCO', 'bmg-theme' ),
								'service' => __( 'EXTREME', 'bmg-theme' ),
							),
						),
					),

					'faq' => array(
						'overline' => __( 'COMMON QUESTIONS', 'bmg-theme' ),
						'headline' => __( 'OFF-ROAD FAQ.', 'bmg-theme' ),
						'items'    => array(
							array(
								'question' => __( 'Will a lift kit void my factory warranty?', 'bmg-theme' ),
								'answer'   => __( 'Only for related components. A lift can\'t void your whole drivetrain warranty, but it may affect suspension and alignment-related claims. We\'ll tell you exactly what\'s covered and what isn\'t before we start.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'What tire size can I run?', 'bmg-theme' ),
								'answer'   => __( 'Depends on lift height, wheel offset, and trim. We\'ll spec a setup that clears at full lock and full droop without rubbing. No "close enough" — it either clears or it doesn\'t.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Is my truck still drivable daily?', 'bmg-theme' ),
								'answer'   => __( 'Depends on the build. Mild and moderate builds drive like stock or better. Extreme builds trade daily comfort for capability — and we\'ll be straight with you about the tradeoff.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you handle weight distribution and GVWR?', 'bmg-theme' ),
								'answer'   => __( 'Yes. We track every accessory\'s weight against your GVWR and suspension capacity. If the math says you need upgraded shocks or springs, we\'ll tell you before we install.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Can you ship in parts for me to pick up?', 'bmg-theme' ),
								'answer'   => __( 'Yes. We\'ll order any authorized-dealer part and ship it to the shop or to you. Most parts ship in 3-10 business days.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'How long does a full off-road build take?', 'bmg-theme' ),
								'answer'   => __( 'Mild builds: one to three days. Moderate: three to seven days. Full extreme builds with custom fab: one to two weeks. We\'ll give you a firm timeline with the quote.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you offer financing?', 'bmg-theme' ),
								'answer'   => __( 'Yes. We partner with a national provider for builds over $1,500. Five-minute application, instant approvals in most cases. See our financing page for details.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Will insurance cover the build?', 'bmg-theme' ),
								'answer'   => __( 'You need a modified-vehicle rider on your insurance policy to cover aftermarket parts. We provide an itemized installation invoice you can submit to your insurer.', 'bmg-theme' ),
							),
						),
					),

					'cta' => array(
						'overline'  => __( 'READY WHEN YOU ARE', 'bmg-theme' ),
						'headline'  => __( 'BUILD IT FOR THE TRAIL. BUILD IT TO LAST.', 'bmg-theme' ),
						'subline'   => __( 'Free spec consultation. OEM-grade parts. Trail-tested before pickup.', 'bmg-theme' ),
						'cta_label' => __( 'Get a Quote', 'bmg-theme' ),
						'cta_url'   => '/quote/',
					),
				);

			// ==============================================================
			// Fleet Services
			// ==============================================================
			case 'fleet':
				return array(
					'hero' => array(
						'breadcrumb' => array(
							array( 'label' => __( 'Home', 'bmg-theme' ),     'url' => '/' ),
							array( 'label' => __( 'Services', 'bmg-theme' ), 'url' => '/services/' ),
							array( 'label' => __( 'Fleet Services', 'bmg-theme' ), 'url' => '' ),
						),
						'overline'      => __( 'FLEET SERVICES', 'bmg-theme' ),
						'headline'      => __( 'BUILT FOR THE JOB. BACKED BY WARRANTY.', 'bmg-theme' ),
						'subline'       => __( 'Volume pricing. Dedicated project management. Scheduled install windows. Net-30 billing. One shop for every truck in your fleet.', 'bmg-theme' ),
						'cta_primary'   => array( 'label' => __( 'Request Fleet Quote', 'bmg-theme' ), 'url' => '/quote/' ),
						'cta_secondary' => array( 'label' => __( 'Call Us', 'bmg-theme' ),    'url' => 'tel:' ),
						'trust_strip'   => array(
							__( '1,800+ TRUCKS SERVICED', 'bmg-theme' ),
							__( '47 ACTIVE ACCOUNTS', 'bmg-theme' ),
							__( 'NET-30 BILLING', 'bmg-theme' ),
							__( 'INSURED & BONDED', 'bmg-theme' ),
						),
					),

					'problem' => array(
						'overline' => __( 'WHY FLEETS SWITCH TO RHINO', 'bmg-theme' ),
						'headline' => __( 'DOWNTIME IS THE REAL COST.', 'bmg-theme' ),
						'blocks'   => array(
							array(
								'overline' => __( '01 / INCONSISTENT QUALITY', 'bmg-theme' ),
								'title'    => __( 'Different shops, different standards.', 'bmg-theme' ),
								'body'     => __( 'Your fleet shouldn\'t look like ten different trucks. When every install is a coin flip, your brand suffers and your drivers lose confidence in the equipment.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '02 / UNPREDICTABLE SCHEDULING', 'bmg-theme' ),
								'title'    => __( 'Every day a truck is out is a day it isn\'t billing.', 'bmg-theme' ),
								'body'     => __( 'Walk-in shops can\'t guarantee slots. Your operations team ends up juggling trucks around a schedule nobody controls. Downtime compounds fast.', 'bmg-theme' ),
							),
							array(
								'overline' => __( '03 / BURIED INVOICING', 'bmg-theme' ),
								'title'    => __( 'Separate invoices. Different terms. No accountability.', 'bmg-theme' ),
								'body'     => __( 'Accounts payable chasing twenty vendors is a line-item on your overhead. One shop, one invoice, one point of accountability changes the math.', 'bmg-theme' ),
							),
						),
					),

					'tiers' => array(
						'overline' => __( 'FLEET PROGRAMS', 'bmg-theme' ),
						'headline' => __( 'BUILT FOR FLEETS FROM 5 TO 500.', 'bmg-theme' ),
						'cards'    => array(
							array(
								'name'        => __( 'STARTER', 'bmg-theme' ),
								'best_for'    => __( '5–14 vehicles', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Volume pricing', 'bmg-theme' ),
									__( 'Scheduled install windows', 'bmg-theme' ),
									__( 'Net-30 billing', 'bmg-theme' ),
									__( 'Lifetime coating warranty', 'bmg-theme' ),
								),
								'recommended' => false,
							),
							array(
								'name'        => __( 'GROWTH', 'bmg-theme' ),
								'best_for'    => __( '15–49 vehicles', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Dedicated project manager', 'bmg-theme' ),
									__( 'Consolidated invoicing', 'bmg-theme' ),
									__( 'Rotation refresh programs', 'bmg-theme' ),
									__( 'Onsite pickup (regional)', 'bmg-theme' ),
								),
								'recommended' => true,
							),
							array(
								'name'        => __( 'ENTERPRISE', 'bmg-theme' ),
								'best_for'    => __( '50+ vehicles', 'bmg-theme' ),
								'highlights'  => array(
									__( 'Custom SLA + reporting', 'bmg-theme' ),
									__( 'Multi-site coordination', 'bmg-theme' ),
									__( 'COI on file', 'bmg-theme' ),
									__( 'Quarterly business reviews', 'bmg-theme' ),
								),
								'recommended' => false,
							),
						),
					),

					'process' => array(
						'overline' => __( 'OUR FLEET PROCESS', 'bmg-theme' ),
						'headline' => __( 'EVALUATE. SCHEDULE. INSTALL. REPORT.', 'bmg-theme' ),
						'steps'    => array(
							array(
								'title' => __( 'Evaluate', 'bmg-theme' ),
								'body'  => __( 'A dedicated PM walks your fleet, audits what\'s there, and builds a scope. You get a line-item quote with volume pricing applied.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Schedule', 'bmg-theme' ),
								'body'  => __( 'We build an install calendar around your operations. Install windows are locked two weeks in advance so dispatch can plan around them.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Install', 'bmg-theme' ),
								'body'  => __( 'Trucks rotate through our bays on schedule. OEM-compliant installs. Same process every time so every truck in the fleet looks and performs identical.', 'bmg-theme' ),
							),
							array(
								'title' => __( 'Report', 'bmg-theme' ),
								'body'  => __( 'Photo documentation per truck, consolidated monthly invoice, quarterly business reviews for enterprise accounts. No surprises.', 'bmg-theme' ),
							),
						),
					),

					'proof' => array(
						'stats'        => array(
							array( 'number' => '1,800+', 'label' => __( 'TRUCKS SERVICED', 'bmg-theme' ) ),
							array( 'number' => '47',     'label' => __( 'ACTIVE ACCOUNTS', 'bmg-theme' ) ),
							array( 'number' => '24 HRS', 'label' => __( 'AVG TURNAROUND', 'bmg-theme' ) ),
							array( 'number' => 'NET 30', 'label' => __( 'BILLING TERMS', 'bmg-theme' ) ),
						),
						// Placeholder testimonials — replace with real quotes before launch.
						'testimonials' => array(
							array(
								'quote'   => __( "Fourteen service trucks. Rhino coats every new one on intake and rotates the old fleet through refresh every two years. Net-30 billing, one PM, zero downtime surprises. Our accounts payable team sends us thank-you notes.", 'bmg-theme' ),
								'name'    => __( 'CARLOS D.', 'bmg-theme' ),
								'vehicle' => __( 'FLEET MANAGER', 'bmg-theme' ),
								'service' => __( '14 TRUCKS', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Switched from three different vendors to one. Consistency across the fleet is finally there — every truck comes back looking the same, wired the same, torqued the same.", 'bmg-theme' ),
								'name'    => __( 'LINDA R.', 'bmg-theme' ),
								'vehicle' => __( 'OPERATIONS DIRECTOR', 'bmg-theme' ),
								'service' => __( '32 TRUCKS', 'bmg-theme' ),
							),
							array(
								'quote'   => __( "Scheduled install windows saved our asses on a compliance deadline. They locked in slots six weeks out and hit every single one. Dispatch actually got to plan for once.", 'bmg-theme' ),
								'name'    => __( 'TOM B.', 'bmg-theme' ),
								'vehicle' => __( 'FLEET COORDINATOR', 'bmg-theme' ),
								'service' => __( '68 TRUCKS', 'bmg-theme' ),
							),
						),
					),

					'faq' => array(
						'overline' => __( 'COMMON QUESTIONS', 'bmg-theme' ),
						'headline' => __( 'FLEET FAQ.', 'bmg-theme' ),
						'items'    => array(
							array(
								'question' => __( 'What\'s the minimum fleet size for volume pricing?', 'bmg-theme' ),
								'answer'   => __( 'Volume pricing starts at 5 vehicles. Dedicated project management kicks in at 15. Enterprise SLA programs start at 50.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you handle insurance and bonding?', 'bmg-theme' ),
								'answer'   => __( 'Yes. We\'re fully insured and bonded. Certificates of insurance are available on request and we keep COIs on file for enterprise accounts.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'What are your payment terms?', 'bmg-theme' ),
								'answer'   => __( 'Net-30 on all fleet accounts. Net-15 and custom terms available on enterprise programs. We accept ACH, check, and credit card (with a 3% processing fee on cards over $5K).', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Can you pick up our trucks onsite?', 'bmg-theme' ),
								'answer'   => __( 'Regional onsite pickup available for fleets of 15+ within a 50-mile radius. Multi-site coordination available on enterprise programs.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'How much notice do you need on scheduling?', 'bmg-theme' ),
								'answer'   => __( 'Install windows are typically locked two weeks in advance. Rush work (under one week) is handled case by case depending on bay availability.', 'bmg-theme' ),
							),
							array(
								'question' => __( 'Do you handle W-9s and vendor onboarding?', 'bmg-theme' ),
								'answer'   => __( 'Yes. We\'re set up for vendor onboarding with major corporate AP systems. W-9 on file, COI available, fleet-qualified across all major industries.', 'bmg-theme' ),
							),
						),
					),

					'cta' => array(
						'overline'  => __( 'READY WHEN YOU ARE', 'bmg-theme' ),
						'headline'  => __( 'STOP JUGGLING VENDORS.', 'bmg-theme' ),
						'subline'   => __( 'One shop. Every truck. Net-30 terms. Lifetime warranty.', 'bmg-theme' ),
						'cta_label' => __( 'Request Fleet Quote', 'bmg-theme' ),
						'cta_url'   => '/quote/',
					),
				);
		}

		return null;
	}
}
