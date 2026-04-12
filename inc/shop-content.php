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

		// -----------------------------------------------------------------
		// Shared data: full brand list + all category metadata (used by
		// both the landing page and individual category pages).
		// -----------------------------------------------------------------
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
				'name'        => __( 'Bumpers & Armor', 'bmg-theme' ),
				'slug'        => 'bumpers-armor',
				'overline'    => __( 'BUMPERS & ARMOR', 'bmg-theme' ),
				'headline'    => __( 'HIT FIRST. HIT HARDER.', 'bmg-theme' ),
				'description' => __( 'Front bumpers, rear bumpers, skid plates, rock sliders, and grille guards — installed by certified builders.', 'bmg-theme' ),
				'brands'      => array( 'arb', 'warn', 'smittybilt', 'rough-country' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'    => array(
					array(
						'name'          => __( 'ARB Deluxe Front Bumper', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Bull-bar style bumper with winch mount and fog light provisions. Steel construction, black powder coat.', 'bmg-theme' ),
						'price'         => '$1,895',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Warn Elite Front Bumper', 'bmg-theme' ),
						'brand'         => 'warn',
						'description'   => __( 'One-piece steel bumper with integrated winch mount, D-ring shackle mounts, and grille guard.', 'bmg-theme' ),
						'price'         => '$1,695',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Smittybilt XRC Gen3 Rear Bumper', 'bmg-theme' ),
						'brand'         => 'smittybilt',
						'description'   => __( 'Full-width rear bumper with 2" receiver hitch, D-ring mounts, and optional tire carrier.', 'bmg-theme' ),
						'price'         => '$895',
						'vehicle_types' => array( 'jeep' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Rough Country Front Bumper', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Heavy-duty steel front bumper with winch plate and auxiliary light tabs. Textured black finish.', 'bmg-theme' ),
						'price'         => '$695',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'ARB Rear Bar', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Tubular rear bumper with integrated tow hitch, rated for recovery pulls. Matches ARB front bumper styling.', 'bmg-theme' ),
						'price'         => '$1,495',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 2. Lighting
			// ==============================================================
			array(
				'name'        => __( 'Lighting', 'bmg-theme' ),
				'slug'        => 'lighting',
				'overline'    => __( 'LIGHTING', 'bmg-theme' ),
				'headline'    => __( 'SEE EVERYTHING. BE SEEN.', 'bmg-theme' ),
				'description' => __( 'Light bars, pods, fog lights, rock lights, and auxiliary headlights — wired clean with OEM-style connectors.', 'bmg-theme' ),
				'brands'      => array( 'rigid-industries', 'baja-designs' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
				'products'    => array(
					array(
						'name'          => __( 'Rigid 40" Adapt Light Bar', 'bmg-theme' ),
						'brand'         => 'rigid-industries',
						'description'   => __( 'GPS-enabled adaptive beam pattern. 8 selectable lighting zones with active dimming.', 'bmg-theme' ),
						'price'         => '$1,299',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Baja Designs Squadron Sport', 'bmg-theme' ),
						'brand'         => 'baja-designs',
						'description'   => __( 'Compact LED driving pod. 3,150 lumens. Spot, driving, or combo beam patterns.', 'bmg-theme' ),
						'price'         => '$349',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Rigid D-Series Pod Pair', 'bmg-theme' ),
						'brand'         => 'rigid-industries',
						'description'   => __( 'Two-pod flush-mount set. Die-cast aluminum housing. IP69K rated.', 'bmg-theme' ),
						'price'         => '$299',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Baja Designs LP6 Pro', 'bmg-theme' ),
						'brand'         => 'baja-designs',
						'description'   => __( 'High-output 6" LED. 10,700 lumens. Spot or driving pattern. Baja-proven durability.', 'bmg-theme' ),
						'price'         => '$899',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 3. Suspension & Lifts
			// ==============================================================
			array(
				'name'        => __( 'Suspension & Lifts', 'bmg-theme' ),
				'slug'        => 'suspension-lifts',
				'overline'    => __( 'SUSPENSION & LIFTS', 'bmg-theme' ),
				'headline'    => __( 'RISE ABOVE STOCK.', 'bmg-theme' ),
				'description' => __( 'Lift kits, leveling kits, shocks, struts, and control arms — geometry and alignment dialed on every install.', 'bmg-theme' ),
				'brands'      => array( 'fox', 'rough-country', 'arb' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'    => array(
					array(
						'name'          => __( 'Fox 2.5 Factory Race Series', 'bmg-theme' ),
						'brand'         => 'fox',
						'description'   => __( 'Remote reservoir coilover. 12-position compression adjustment. Designed for lifted trucks.', 'bmg-theme' ),
						'price'         => '$2,495',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Rough Country 6" Lift Kit', 'bmg-theme' ),
						'brand'         => 'rough-country',
						'description'   => __( 'Complete suspension lift with knuckles, crossmember, and N3 shocks. Runs 35" tires with no rub.', 'bmg-theme' ),
						'price'         => '$1,295',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Fox 2.0 Performance IFP', 'bmg-theme' ),
						'brand'         => 'fox',
						'description'   => __( 'Internal floating piston shock. Improved ride quality over stock. Direct bolt-on for most trucks and SUVs.', 'bmg-theme' ),
						'price'         => '$895',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'ARB Old Man Emu Kit', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Progressive-rate coil springs + Nitrocharger Sport shocks. 2-3" lift with improved load carrying.', 'bmg-theme' ),
						'price'         => '$1,895',
						'vehicle_types' => array( 'suv', 'jeep' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 4. Wheels & Tires
			// ==============================================================
			array(
				'name'        => __( 'Wheels & Tires', 'bmg-theme' ),
				'slug'        => 'wheels-tires',
				'overline'    => __( 'WHEELS & TIRES', 'bmg-theme' ),
				'headline'    => __( 'RUBBER MEETS DIRT.', 'bmg-theme' ),
				'description' => __( 'Off-road wheels, all-terrain tires, mud tires, and beadlocks — mounted, balanced, and aligned in-house.', 'bmg-theme' ),
				'brands'      => array( 'method-race-wheels', 'bfgoodrich' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv' ),
				'products'    => array(
					array(
						'name'          => __( 'Method 305 NV', 'bmg-theme' ),
						'brand'         => 'method-race-wheels',
						'description'   => __( 'Street/trail crossover wheel. 6-lug. Machined lip with matte black center.', 'bmg-theme' ),
						'price'         => '$295 each',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'BFGoodrich KO2 All-Terrain', 'bmg-theme' ),
						'brand'         => 'bfgoodrich',
						'description'   => __( '3-ply sidewall. CoreGard technology. Aggressive tread. The standard for truck all-terrain tires.', 'bmg-theme' ),
						'price'         => '$245 each',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Method 701 Trail', 'bmg-theme' ),
						'brand'         => 'method-race-wheels',
						'description'   => __( 'Lightweight forged monoblock. Designed for Jeep JL/JT and Ford Bronco. 17x8.5.', 'bmg-theme' ),
						'price'         => '$275 each',
						'vehicle_types' => array( 'jeep', 'suv' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 5. Recovery & Winches
			// ==============================================================
			array(
				'name'        => __( 'Recovery & Winches', 'bmg-theme' ),
				'slug'        => 'recovery-winches',
				'overline'    => __( 'RECOVERY & WINCHES', 'bmg-theme' ),
				'headline'    => __( 'GET UNSTUCK. STAY MOVING.', 'bmg-theme' ),
				'description' => __( 'Winches, straps, shackles, recovery boards, and D-rings — tested gear for when the trail fights back.', 'bmg-theme' ),
				'brands'      => array( 'warn', 'smittybilt', 'arb' ),
				'vehicle_types' => array( 'truck', 'jeep', 'suv', 'universal' ),
				'products'    => array(
					array(
						'name'          => __( 'Warn Zeon 12-S Platinum', 'bmg-theme' ),
						'brand'         => 'warn',
						'description'   => __( '12,000 lb synthetic rope winch. Convertible control pack. Wireless remote included.', 'bmg-theme' ),
						'price'         => '$1,895',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Smittybilt X2O 12K Comp', 'bmg-theme' ),
						'brand'         => 'smittybilt',
						'description'   => __( '12,000 lb waterproof winch with synthetic rope. Wireless and wired remote. Lifetime warranty.', 'bmg-theme' ),
						'price'         => '$595',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'ARB Essentials Recovery Kit', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( 'Snatch strap, tree trunk protector, bow shackles, winch extension, and gloves in a heavy-duty bag.', 'bmg-theme' ),
						'price'         => '$395',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 6. Bed & Cargo
			// ==============================================================
			array(
				'name'        => __( 'Bed & Cargo', 'bmg-theme' ),
				'slug'        => 'bed-cargo',
				'overline'    => __( 'BED & CARGO', 'bmg-theme' ),
				'headline'    => __( 'LOAD IT. LOCK IT. HAUL IT.', 'bmg-theme' ),
				'description' => __( 'Tonneau covers, bed racks, toolboxes, cargo management, and tie-downs — installed right the first time.', 'bmg-theme' ),
				'brands'      => array( 'arb', 'rhino-rack' ),
				'vehicle_types' => array( 'truck' ),
				'products'    => array(
					array(
						'name'          => __( 'BAKFlip MX4 Tonneau', 'bmg-theme' ),
						'brand'         => 'arb', // using arb as proxy — BAKFlip isn't in the core brand list
						'description'   => __( 'Hard-folding matte-finish tonneau cover. Flush-mount design. Rated to 400 lbs distributed.', 'bmg-theme' ),
						'price'         => '$1,095',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'DECKED Drawer System', 'bmg-theme' ),
						'brand'         => 'arb', // proxy
						'description'   => __( 'Two full-length drawer bins under a weather-sealed deck. Supports 2,000 lbs on top.', 'bmg-theme' ),
						'price'         => '$1,395',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'UWS 69" Crossover Toolbox', 'bmg-theme' ),
						'brand'         => 'arb', // proxy
						'description'   => __( 'Aluminum crossover toolbox. Low-profile lid. Push-button paddle latch. Foam-filled lid for rigidity.', 'bmg-theme' ),
						'price'         => '$495',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 7. Overland Gear
			// ==============================================================
			array(
				'name'        => __( 'Overland Gear', 'bmg-theme' ),
				'slug'        => 'overland-gear',
				'overline'    => __( 'OVERLAND GEAR', 'bmg-theme' ),
				'headline'    => __( 'CAMP ANYWHERE. CARRY EVERYTHING.', 'bmg-theme' ),
				'description' => __( 'Roof tents, awnings, roof racks, fridges, and water storage — outfitted for expeditions.', 'bmg-theme' ),
				'brands'      => array( 'rhino-rack', 'arb' ),
				'vehicle_types' => array( 'truck', 'suv', 'universal' ),
				'products'    => array(
					array(
						'name'          => __( 'iKamper Skycamp 3.0', 'bmg-theme' ),
						'brand'         => 'rhino-rack', // proxy — iKamper not in brand list
						'description'   => __( 'Hard-shell rooftop tent. Sleeps 4. King-size mattress. 60-second setup with hydraulic struts.', 'bmg-theme' ),
						'price'         => '$4,299',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Rhino-Rack Pioneer Platform', 'bmg-theme' ),
						'brand'         => 'rhino-rack',
						'description'   => __( 'Modular aluminium roof platform. T-slot accessory mounting. Available in 5 sizes.', 'bmg-theme' ),
						'price'         => '$895',
						'vehicle_types' => array( 'truck', 'suv' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'ARB Touring Awning', 'bmg-theme' ),
						'brand'         => 'arb',
						'description'   => __( '2500mm awning with anodized aluminium arms. 15-second deploy. Mounts to Pioneer platform or roof bars.', 'bmg-theme' ),
						'price'         => '$495',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 8. Interior & Electrical
			// ==============================================================
			array(
				'name'        => __( 'Interior & Electrical', 'bmg-theme' ),
				'slug'        => 'interior-electrical',
				'overline'    => __( 'INTERIOR & ELECTRICAL', 'bmg-theme' ),
				'headline'    => __( 'WIRED RIGHT. MOUNTED CLEAN.', 'bmg-theme' ),
				'description' => __( 'Switch panels, dash mounts, USB kits, and radio mounts — installed with OEM-style connectors.', 'bmg-theme' ),
				'brands'      => array( 'rigid-industries', 'arb' ),
				'vehicle_types' => array( 'jeep', 'truck', 'universal' ),
				'products'    => array(
					array(
						'name'          => __( 'sPOD BantamX Switch Panel', 'bmg-theme' ),
						'brand'         => 'rigid-industries', // proxy
						'description'   => __( 'Bluetooth-controlled switch panel. 8 circuits. App-based dimming and strobe modes.', 'bmg-theme' ),
						'price'         => '$595',
						'vehicle_types' => array( 'jeep', 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'RAM X-Grip Phone Mount', 'bmg-theme' ),
						'brand'         => 'arb', // proxy
						'description'   => __( 'Spring-loaded cradle with rubber grip. B-size ball. Fits any RAM mounting arm.', 'bmg-theme' ),
						'price'         => '$49',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Blue Sea USB + 12V Panel', 'bmg-theme' ),
						'brand'         => 'arb', // proxy
						'description'   => __( 'Dual USB + 12V socket panel. Marine-grade. Weather-sealed cap. Flush-mounts in dash or console.', 'bmg-theme' ),
						'price'         => '$89',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
				),
			),

			// ==============================================================
			// 9. Exterior Accessories
			// ==============================================================
			array(
				'name'        => __( 'Exterior Accessories', 'bmg-theme' ),
				'slug'        => 'exterior-accessories',
				'overline'    => __( 'EXTERIOR ACCESSORIES', 'bmg-theme' ),
				'headline'    => __( 'FINISH THE LOOK. FIT THE FUNCTION.', 'bmg-theme' ),
				'description' => __( 'Running boards, fender flares, mud flaps, and grilles — installed clean, torqued to spec.', 'bmg-theme' ),
				'brands'      => array( 'rough-country', 'arb' ),
				'vehicle_types' => array( 'truck', 'suv', 'universal' ),
				'products'    => array(
					array(
						'name'          => __( 'AMP Research PowerStep', 'bmg-theme' ),
						'brand'         => 'rough-country', // proxy
						'description'   => __( 'Automatic electric running boards. Deploy on door open, retract on close. Integrated LED lighting.', 'bmg-theme' ),
						'price'         => '$1,495',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'Bushwacker Pocket Fender Flares', 'bmg-theme' ),
						'brand'         => 'rough-country', // proxy
						'description'   => __( 'OE-style pocket flares. UV-resistant matte black. No-drill installation with factory hardware.', 'bmg-theme' ),
						'price'         => '$595',
						'vehicle_types' => array( 'truck' ),
						'image'         => '',
					),
					array(
						'name'          => __( 'WeatherTech No-Drill Mud Flaps', 'bmg-theme' ),
						'brand'         => 'arb', // proxy
						'description'   => __( 'Custom-fit mud flaps. No drilling — mounts to existing hardware. Available for most trucks and SUVs.', 'bmg-theme' ),
						'price'         => '$95',
						'vehicle_types' => array( 'universal' ),
						'image'         => '',
					),
				),
			),
		);

		return $categories;
	}
}
