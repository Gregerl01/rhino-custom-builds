<?php
/**
 * Shop Category Content Registry — Rhino Custom Builds
 *
 * Returns the category data array for a given shop category slug.
 * V1 uses content arrays (no WooCommerce). The data model (category
 * slugs, brand slugs, product fields, vehicle type labels) is kept
 * consistent with the WooCommerce taxonomy conventions defined in
 * CLAUDE.md so V2 migration is a clean 1:1 map.
 *
 * Product data sourced from: rhino-featured-products-shortlist.xlsx
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'bmg_get_shop_category_content' ) ) {
	/**
	 * Return the content array for a shop category page.
	 *
	 * @param string $slug Category slug (e.g. "bumpers-armor").
	 * @return array|null  The content array, or null for unknown slugs.
	 */
	function bmg_get_shop_category_content( $slug ) {
		$all_categories = bmg_get_shop_categories();

		foreach ( $all_categories as $cat ) {
			if ( $cat['slug'] === $slug ) {
				return $cat;
			}
		}

		return null;
	}
}

if ( ! function_exists( 'bmg_get_shop_categories' ) ) {
	/**
	 * Return the full list of shop categories with products.
	 *
	 * @return array
	 */
	function bmg_get_shop_categories() {

		static $categories = null;

		if ( null !== $categories ) {
			return $categories;
		}

		$categories = array(

			// ==============================================================
			// 1. Bumpers & Armor
			// ==============================================================
			array(
				'name'          => __( 'Bumpers & Armor', 'bmg-theme' ),
				'slug'          => 'bumpers-armor',
				'overline'      => __( 'BUMPERS & ARMOR', 'bmg-theme' ),
				'headline'      => __( 'HIT FIRST. HIT HARDER.', 'bmg-theme' ),
				'description'   => __( 'Front bumpers, rear bumpers, skid plates, rock sliders, and grille guards — installed by certified builders.', 'bmg-theme' ),
				'brands'        => array( 'arb', 'smittybilt', 'rough-country' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'      => array(
					array(
						'name'          => __( 'Deluxe Bumper', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Premium full-width steel bumper line customers pick for serious protection, winch compatibility, and proven off-road durability.', 'bmg-theme' ),
						'price'         => '$2,145.95+',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://store.arbusa.com/deluxe-bumper-3462030/',
					),
					array(
						'name'          => __( 'XRC Gen 2 Front Bumper — Textured Black', 'bmg-theme' ),
						'brand'         => 'smittybilt',
						'description'   => __( 'A popular value-minded off-road front bumper — winch-ready, trail styled, and widely recognized in Jeep builds.', 'bmg-theme' ),
						'price'         => '$639.99+',
						'vehicle_types' => array( 'jeep' ),
						'image'         => '',
						'source_url'    => 'https://www.smittybilt.com/shop/bumpers/front-bumpers-bumpers/xrc-gen-2-front-bumper-textured-black-07-18-jk-jku-76807/',
					),
					array(
						'name'          => __( 'High Clearance Front Bumper — LED Lights & Skid Plate', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'An aggressive one-shot bumper upgrade with integrated lighting and improved approach clearance.', 'bmg-theme' ),
						'price'         => '$999.95+',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/ford-f150-front-led-bumper-10809a',
					),
				),
			),

			// ==============================================================
			// 2. Lighting
			// ==============================================================
			array(
				'name'          => __( 'Lighting', 'bmg-theme' ),
				'slug'          => 'lighting',
				'overline'      => __( 'LIGHTING', 'bmg-theme' ),
				'headline'      => __( 'SEE EVERYTHING. BE SEEN.', 'bmg-theme' ),
				'description'   => __( 'Light bars, pods, fog lights, rock lights, and auxiliary headlights — wired clean with OEM-style connectors.', 'bmg-theme' ),
				'brands'        => array( 'baja-designs', 'rigid-industries' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'van', 'universal' ),
				'products'      => array(
					array(
						'name'          => __( 'LP6 Pro LED Auxiliary Light Pod', 'bmg-theme' ),
						'brand'         => 'baja-designs',
						'description'   => __( 'A flagship round off-road light — huge output, long throw, and premium Baja Designs credibility.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.bajadesigns.com/products/lp6-pro-led-auxiliary-light-pod/',
					),
					array(
						'name'          => __( 'S8 Straight LED Light Bar', 'bmg-theme' ),
						'brand'         => 'baja-designs',
						'description'   => __( 'A very common roof, bumper, and grille light-bar choice — slim, powerful, and easy to build around.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'van', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.bajadesigns.com/products/s8-straight-led-light-bar/',
					),
					array(
						'name'          => __( 'D-Series PRO Pods Pair', 'bmg-theme' ),
						'brand'         => 'rigid-industries',
						'description'   => __( 'One of the best-known compact pod light formats — fits ditch lights, bumper corners, racks, and reverse-light setups.', 'bmg-theme' ),
						'price'         => '$279.99+',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'van', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.rigidindustries.com/shop-products/series/pro/d-series-pro.html',
					),
				),
			),

			// ==============================================================
			// 3. Suspension & Lifts
			// ==============================================================
			array(
				'name'          => __( 'Suspension & Lifts', 'bmg-theme' ),
				'slug'          => 'suspension-lifts',
				'overline'      => __( 'SUSPENSION & LIFTS', 'bmg-theme' ),
				'headline'      => __( 'RISE ABOVE STOCK.', 'bmg-theme' ),
				'description'   => __( 'Lift kits, leveling kits, shocks, struts, and control arms — geometry and alignment dialed on every install.', 'bmg-theme' ),
				'brands'        => array( 'fox', 'rough-country' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'      => array(
					array(
						'name'          => __( '2.0 Performance Series IFP', 'bmg-theme' ),
						'brand'         => 'fox',
						'description'   => __( 'A meaningful ride-quality upgrade without jumping straight to race-level pricing. Direct bolt-on for most trucks and SUVs.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://ridefox.com/products/toyota-tacoma-2-0-performance-series-4276e18e',
					),
					array(
						'name'          => __( '2.5 Performance Elite Series Coil-Over Reservoir Shock (Pair)', 'bmg-theme' ),
						'brand'         => 'fox',
						'description'   => __( 'A premium upgrade for higher-speed control, adjustability, and top-tier suspension brand appeal.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://ridefox.com/products/performance-elite-series-2-5-coil-over-reservoir-shock-pair-adjustable-7075559d',
					),
					array(
						'name'          => __( '6 Inch Lift Kit — Ford F-150 4WD (2021–2026)', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'A big visual impact lift-kit choice — clears larger tires and hits a strong value point for full-size trucks.', 'bmg-theme' ),
						'price'         => '$1,399.95+',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/configurable/ford-suspension-lift-kit-587c',
					),
					array(
						'name'          => __( '2.5 Inch Lift Kit — Jeep Wrangler Unlimited JL 4WD', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'A popular Jeep lift — clears 35s, improves stance, and fits entry-to-mid-level builds.', 'bmg-theme' ),
						'price'         => '$519.95+',
						'vehicle_types' => array( 'jeep' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/configurable/jeep-suspension-lift-kit-67731c',
					),
				),
			),

			// ==============================================================
			// 4. Wheels & Tires
			// ==============================================================
			array(
				'name'          => __( 'Wheels & Tires', 'bmg-theme' ),
				'slug'          => 'wheels-tires',
				'overline'      => __( 'WHEELS & TIRES', 'bmg-theme' ),
				'headline'      => __( 'RUBBER MEETS DIRT.', 'bmg-theme' ),
				'description'   => __( 'Off-road wheels, all-terrain tires, mud tires, and beadlocks — mounted, balanced, and aligned in-house.', 'bmg-theme' ),
				'brands'        => array( 'method-race-wheels', 'bfgoodrich' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'      => array(
					array(
						'name'          => __( '305 NV', 'bmg-theme' ),
						'brand'         => 'method-race-wheels',
						'description'   => __( 'A staple Method wheel — classic off-road look and broad appeal on trucks, Jeeps, and overland builds.', 'bmg-theme' ),
						'price'         => '$335.00+',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://www.methodracewheels.com/products/305-nv-titanium',
					),
					array(
						'name'          => __( '703 Matte Black', 'bmg-theme' ),
						'brand'         => 'method-race-wheels',
						'description'   => __( 'A favorite for overland and trail builds — Bead Grip design sells performance and premium styling at the same time.', 'bmg-theme' ),
						'price'         => '$366.00+',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://www.methodracewheels.com/products/703-matte-black',
					),
					array(
						'name'          => __( 'All-Terrain T/A KO3', 'bmg-theme' ),
						'brand'         => 'bfgoodrich',
						'description'   => __( 'The easiest all-around tire recommendation — off-road credibility with daily-driver manners. The KO name sells itself.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'suv', 'jeep' ),
						'image'         => '',
						'source_url'    => 'https://www.bfgoodrichtires.com/auto/tires/bfgoodrich-all-terrain-t-a-ko3',
					),
					array(
						'name'          => __( 'Mud-Terrain T/A KM3', 'bmg-theme' ),
						'brand'         => 'bfgoodrich',
						'description'   => __( 'A go-to mud tire for aggressive traction, tougher sidewalls, and a serious off-road look.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'suv', 'jeep' ),
						'image'         => '',
						'source_url'    => 'https://www.bfgoodrichtires.com/auto/tires/bfgoodrich-mud-terrain-t-a-km3',
					),
				),
			),

			// ==============================================================
			// 5. Recovery & Winches
			// ==============================================================
			array(
				'name'          => __( 'Recovery & Winches', 'bmg-theme' ),
				'slug'          => 'recovery-winches',
				'overline'      => __( 'RECOVERY & WINCHES', 'bmg-theme' ),
				'headline'      => __( 'GET UNSTUCK. STAY MOVING.', 'bmg-theme' ),
				'description'   => __( 'Winches, straps, shackles, recovery boards, and D-rings — tested gear for when the trail fights back.', 'bmg-theme' ),
				'brands'        => array( 'warn', 'smittybilt', 'arb' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
				'products'      => array(
					array(
						'name'          => __( 'ZEON XD 10-S Winch', 'bmg-theme' ),
						'brand'         => 'warn',
						'description'   => __( 'A premium winch choice — high-load recovery, synthetic rope, and the WARN brand reputation built over decades.', 'bmg-theme' ),
						'price'         => '$1,836.23',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.warn.com/zeon-110010',
					),
					array(
						'name'          => __( 'X2O GEN3 12K Winch with Synthetic Rope', 'bmg-theme' ),
						'brand'         => 'smittybilt',
						'description'   => __( 'A popular value alternative — strong specs, synthetic rope, and broad appeal for heavier builds.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.smittybilt.com/shop/winches-recovery/winches/x2o-gen3-12k-winch-with-synthetic-rope-98812/',
					),
					array(
						'name'          => __( 'Weekender Recovery Kit RK12A', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'An easy add-on — bundles the basic trail-recovery essentials in one recognizable ARB kit.', 'bmg-theme' ),
						'price'         => '$154.95',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
						'source_url'    => 'https://store.arbusa.com/recovery/off-road-recovery-kits/',
					),
					array(
						'name'          => __( 'Premium Recovery Kit RK9A', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'A more complete recovery setup instead of piecing gear together one item at a time.', 'bmg-theme' ),
						'price'         => '$499.95',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
						'source_url'    => 'https://store.arbusa.com/recovery/off-road-recovery-kits/',
					),
				),
			),

			// ==============================================================
			// 6. Bed & Cargo
			// ==============================================================
			array(
				'name'          => __( 'Bed & Cargo', 'bmg-theme' ),
				'slug'          => 'bed-cargo',
				'overline'      => __( 'BED & CARGO', 'bmg-theme' ),
				'headline'      => __( 'LOAD IT. LOCK IT. HAUL IT.', 'bmg-theme' ),
				'description'   => __( 'Tonneau covers, bed racks, toolboxes, cargo management, and tie-downs — installed right the first time.', 'bmg-theme' ),
				'brands'        => array( 'rough-country', 'arb' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'      => array(
					array(
						'name'          => __( 'Soft Tri-Fold Bed Cover', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Adds weather protection, security, and clean looks at an accessible price. A very easy truck-sale item.', 'bmg-theme' ),
						'price'         => '$219.95',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/configurable/gm-soft-tri-fold-bed-cover-gmrc141500c',
					),
					array(
						'name'          => __( 'Hard Tri-Fold Flip Up Bed Cover', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'A step-up bed-cover option — stronger security and a more premium feel over soft-fold alternatives.', 'bmg-theme' ),
						'price'         => '$849.95',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/toyota-flip-up-bed-cover-49414550c',
					),
					array(
						'name'          => __( 'Roller Drawer RD945', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Lockable, organized storage inside the cargo area — a strong upsell for overland and work-truck customers.', 'bmg-theme' ),
						'price'         => '$960.00',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://store.arbusa.com/interior/storage/drawer-systems/',
					),
					array(
						'name'          => __( 'Roller Drawer with Roller Floor RDRF1355', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Premium drawer storage plus a slide-out top for fridges, tools, or overland gear.', 'bmg-theme' ),
						'price'         => '$1,447.00',
						'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://store.arbusa.com/interior/storage/drawer-systems/',
					),
				),
			),

			// ==============================================================
			// 7. Overland Gear
			// ==============================================================
			array(
				'name'          => __( 'Overland Gear', 'bmg-theme' ),
				'slug'          => 'overland-gear',
				'overline'      => __( 'OVERLAND GEAR', 'bmg-theme' ),
				'headline'      => __( 'CAMP ANYWHERE. CARRY EVERYTHING.', 'bmg-theme' ),
				'description'   => __( 'Roof tents, awnings, roof racks, fridges, and water storage — outfitted for expeditions.', 'bmg-theme' ),
				'brands'        => array( 'rhino-rack' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'van', 'universal' ),
				'products'      => array(
					array(
						'name'          => __( 'Pioneer 6 Platform', 'bmg-theme' ),
						'brand'         => 'rhino-rack',
						'description'   => __( 'One of the easiest anchor products for overland builds — supports racks, awnings, boxes, and accessory mounting.', 'bmg-theme' ),
						'price'         => '$979.99+',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'van' ),
						'image'         => '',
						'source_url'    => 'https://www.rhinorack.com/en-us/products/roof-racks/platforms-and-baskets/pioneer-platforms',
					),
					array(
						'name'          => __( 'Reconn-Deck 2 Bar Truck Bed System', 'bmg-theme' ),
						'brand'         => 'rhino-rack',
						'description'   => __( 'A strong truck-bed overland option — mount bikes, gear, tents, and utility accessories above the bed.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.rhinorack.com/en-us/products/roof-racks/cross-bar-roof-racks/reconn-deck-with-reconn-deck-bars/reconn-deck-2-bar-truck-bed-system_jc-03546',
					),
					array(
						'name'          => __( 'Batwing 270 Freestanding Awning', 'bmg-theme' ),
						'brand'         => 'rhino-rack',
						'description'   => __( 'A premium overland add-on — campsite shade, fast deployment, and visual wow factor.', 'bmg-theme' ),
						'price'         => '$1,299.99',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.rhinorack.com/en-nz/products/sport-awnings/awnings/batwing',
					),
				),
			),

			// ==============================================================
			// 8. Interior & Electrical
			// ==============================================================
			array(
				'name'          => __( 'Interior & Electrical', 'bmg-theme' ),
				'slug'          => 'interior-electrical',
				'overline'      => __( 'INTERIOR & ELECTRICAL', 'bmg-theme' ),
				'headline'      => __( 'WIRED RIGHT. MOUNTED CLEAN.', 'bmg-theme' ),
				'description'   => __( 'Switch panels, dash mounts, USB kits, and radio mounts — installed with OEM-style connectors.', 'bmg-theme' ),
				'brands'        => array( 'rough-country', 'smittybilt' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
				'products'      => array(
					array(
						'name'          => __( 'Seat Covers', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Protect factory seats and immediately clean up the interior on trucks that see work or trail use.', 'bmg-theme' ),
						'price'         => '$149.95',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/configurable/chevy-neoprene-seat-cover-set-91035c',
					),
					array(
						'name'          => __( 'Flex-Fit Floor Mats', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Affordable, custom-fit, and practical for muddy boots, pets, and daily use.', 'bmg-theme' ),
						'price'         => '$69.95',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/configurable/gm-floor-mat-set-ff21413',
					),
					array(
						'name'          => __( '8 Gang Switch Panel — Bluetooth, RGB Backlit', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'A strong electrical add-on for builds with multiple lights or accessories — cleans up wiring and centralizes control.', 'bmg-theme' ),
						'price'         => '$219.95',
						'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/multiple-light-controller-70970',
					),
					array(
						'name'          => __( 'Premium Grab Handles (Pair)', 'bmg-theme' ),
						'brand'         => 'smittybilt',
						'description'   => __( 'A simple interior upgrade — easier entry and extra utility in open-top or trail-oriented rigs.', 'bmg-theme' ),
						'price'         => 'quote',
						'vehicle_types' => array( 'jeep', 'universal' ),
						'image'         => '',
						'source_url'    => 'https://www.smittybilt.com/wp-content/uploads/sites/3/2025/01/SB_2023_Catalog.pdf',
					),
				),
			),

			// ==============================================================
			// 9. Exterior Accessories
			// ==============================================================
			array(
				'name'          => __( 'Exterior Accessories', 'bmg-theme' ),
				'slug'          => 'exterior-accessories',
				'overline'      => __( 'EXTERIOR ACCESSORIES', 'bmg-theme' ),
				'headline'      => __( 'FINISH THE LOOK. FIT THE FUNCTION.', 'bmg-theme' ),
				'description'   => __( 'Running boards, fender flares, mud flaps, and grilles — installed clean, torqued to spec.', 'bmg-theme' ),
				'brands'        => array( 'rough-country', 'smittybilt' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
				'products'      => array(
					array(
						'name'          => __( 'RPT2 Running Boards', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Improve access on lifted trucks while adding a tougher side profile. A very sellable exterior upgrade.', 'bmg-theme' ),
						'price'         => '$449.95',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/gm-raptor-style-steps-44001',
					),
					array(
						'name'          => __( 'OV2 Running Boards — Side Step Bars', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'A strong truck step option with a more angular, off-road style.', 'bmg-theme' ),
						'price'         => '$449.95',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/gm-ov2-style-steps-14009',
					),
					array(
						'name'          => __( 'Sport Fender Flares', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Popular with leveled and lifted trucks — add tire coverage and make larger wheel-and-tire packages look finished.', 'bmg-theme' ),
						'price'         => '$379.95',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
						'source_url'    => 'https://www.roughcountry.com/product/configurable/ford-sport-fender-flares-s-f20911c',
					),
					array(
						'name'          => __( 'XRC Flat Fender Flare Kit — Set of 4, Textured Black', 'bmg-theme' ),
						'brand'         => 'smittybilt',
						'description'   => __( 'A recognizable Jeep-style upgrade — clearance, coverage, and a more aggressive trail look.', 'bmg-theme' ),
						'price'         => '$229.99+',
						'vehicle_types' => array( 'jeep' ),
						'image'         => '',
						'source_url'    => 'https://www.smittybilt.com/shop/side-steps-armor/fender-flares-fenders-side-steps-armor-2/xrc-flat-fender-flare-kit-set-of-4-textured-black-18-jlu-77837/',
					),
				),
			),
		);

		return $categories;
	}
}
