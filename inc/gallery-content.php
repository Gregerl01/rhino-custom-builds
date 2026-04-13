<?php
/**
 * Gallery Content Registry — Rhino Custom Builds
 *
 * Returns an array of project showcase items for the /gallery/ page.
 * V1 uses content arrays — future versions may pull from a
 * rhino_project CPT with taxonomy filters.
 *
 * HOW TO ADD IMAGES:
 *   Upload to Media Library → paste URL into the 'image' field below.
 *   Photos render at 4:3 via object-fit: cover. Min 800×600px recommended.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'bmg_get_gallery_projects' ) ) {
	/**
	 * Return the gallery projects array.
	 *
	 * @return array
	 */
	function bmg_get_gallery_projects() {
		return array(

			// ---- Bedliners ----
			array(
				'title'       => __( '2022 Ford F-150 — Premium Bedliner', 'bmg-theme' ),
				'vehicle'     => '2022 Ford F-150 Lariat',
				'category'    => 'bedliners',
				'description' => __( 'Premium-tier spray-on bedliner on a 6.5\' bed. UV-stable, chemical-resistant, lifetime warranty.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2022FordF-150Lariat.webp',
			),
			array(
				'title'       => __( '2023 RAM 1500 — Off-Road Grade Bedliner', 'bmg-theme' ),
				'vehicle'     => '2023 RAM 1500 TRX',
				'category'    => 'bedliners',
				'description' => __( 'Off-Road Grade coating with aggressive anti-slip texture and color-matched finish.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2023RAM1500TRX.webp',
			),

			// ---- Coatings ----
			array(
				'title'       => __( '2019 Chevy Silverado — Full Undercoating', 'bmg-theme' ),
				'vehicle'     => '2019 Chevrolet Silverado 2500HD',
				'category'    => 'coatings',
				'description' => __( 'Frame rails, floor pans, inner fenders, and rocker panels sealed against salt and road chemicals.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2019ChevroletSilverado2500HD.webp',
			),
			array(
				'title'       => __( '2021 Toyota Tacoma — Rocker & Wheel Wells', 'bmg-theme' ),
				'vehicle'     => '2021 Toyota Tacoma TRD Off-Road',
				'category'    => 'coatings',
				'description' => __( 'High-impact zones sealed — rocker panels and wheel wells sprayed inside and out.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2021ToyotaTacomaTRD.webp',
			),

			// ---- Accessories ----
			array(
				'title'       => __( '2023 Ford F-250 — Work Truck Upfit', 'bmg-theme' ),
				'vehicle'     => '2023 Ford F-250 XLT',
				'category'    => 'accessories',
				'description' => __( 'Tonneau cover, headache rack, crossover toolbox, and running boards. Clean install, satin black matched.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2023FordF-250XLT.webp',
			),
			array(
				'title'       => __( '2022 RAM 1500 — Tow Package', 'bmg-theme' ),
				'vehicle'     => '2022 RAM 1500 Laramie',
				'category'    => 'accessories',
				'description' => __( 'Class V hitch, 7-pin wiring, integrated brake controller, and air bag suspension assist.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2022RAM1500Laramie.webp',
			),

			// ---- Off-Road ----
			array(
				'title'       => __( '2023 Jeep Gladiator — Overland Build', 'bmg-theme' ),
				'vehicle'     => '2023 Jeep Gladiator Rubicon',
				'category'    => 'off-road',
				'description' => __( 'ARB bumper, Warn winch, Rigid lighting, Rhino-Rack Pioneer platform, and rooftop tent. 3,000-mile expedition tested.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2023JeepGladiatorRubicon.webp',
			),
			array(
				'title'       => __( '2022 Ford Bronco — Trail Build', 'bmg-theme' ),
				'vehicle'     => '2022 Ford Bronco Badlands',
				'category'    => 'off-road',
				'description' => __( '3" lift, 35" BFGoodrich KO3s, Method 703 wheels, rock sliders, and Baja Designs light pods.', 'bmg-theme' ),
				'image'       => '/wp-content/uploads/2026/04/galleryt-img-2022FordBroncoBadlands.webp',
			),

			// ---- Fleet ----
			array(
				'title'       => __( 'Fleet Rotation — 14 Service Trucks', 'bmg-theme' ),
				'vehicle'     => 'Mixed Fleet — Ford, RAM, Chevy',
				'category'    => 'fleet',
				'description' => __( 'Bedliner + undercoating rotation program. One PM, one invoice per cycle, consistent fleet appearance.', 'bmg-theme' ),
				'image'       => '',
			),
			array(
				'title'       => __( '2024 Ford Transit — Commercial Upfit', 'bmg-theme' ),
				'vehicle'     => '2024 Ford Transit 250',
				'category'    => 'fleet',
				'description' => __( 'Interior shelving, spray-on cargo liner, ladder rack, and commercial lighting. Fleet-qualified install.', 'bmg-theme' ),
				'image'       => '',
			),

			// ---- Wheels & Tires ----
			array(
				'title'       => __( '2021 Toyota 4Runner — Wheel & Tire Package', 'bmg-theme' ),
				'vehicle'     => '2021 Toyota 4Runner TRD Pro',
				'category'    => 'wheels-tires',
				'description' => __( 'Method 305 NV wheels with BFGoodrich KO3 all-terrain tires. Mounted, balanced, and aligned in-house.', 'bmg-theme' ),
				'image'       => '',
			),
			array(
				'title'       => __( '2023 Jeep Wrangler — Beadlock Upgrade', 'bmg-theme' ),
				'vehicle'     => '2023 Jeep Wrangler Rubicon 392',
				'category'    => 'wheels-tires',
				'description' => __( 'Method 703 beadlock wheels with BFGoodrich KM3 mud-terrain tires. Trail-ready.', 'bmg-theme' ),
				'image'       => '',
			),
		);
	}
}
