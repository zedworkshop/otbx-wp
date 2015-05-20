<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="[ mb4 center ] entry-header">
		<?php the_title( '<h1 class="[ caps ] entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="[ content ] entry-content">
		<?php the_content(); ?>
	</div>

	<div class="[ px2 ] beerlist">
		<h4 class="[ center gray mb3 regular caps mln1 ]">Currently on tap</h4>

		<ol class="[ p0 mb4 ] beerlist-list">

		<?php

		$api = 'https://server.digitalpour.com/DashboardServer/api/v3/MenuItems/5502506cb3b70304a8f2e0d2/1/Tap?apiKey=55071e14b3b6f60e9c675851';

		// $ch =  curl_init($api);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// $string = curl_exec($ch);

		$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);

		$string = file_get_contents($api, false, stream_context_create($arrContextOptions));
		$json_taps = json_decode($string, true);

		$t=1;

		foreach ($json_taps as $beverage) {

	        $item_name = $beverage['MenuItemDisplayDetail']['DisplayName'];
	        $producer_name = $beverage['MenuItemProductDetail']['FullProducerList'];
	        $beverage_name = $beverage['MenuItemProductDetail']['BeverageNameWithVintage'];
	        $beverage_style = $beverage['MenuItemProductDetail']['FulStyleName'];
	        $beverage_color = $beverage['MenuItemProductDetail']['Beverage']['StyleColor'];
	        $year = $beverage['MenuItemProductDetail']['Year'];
	        $beverage_abv = $beverage['MenuItemProductDetail']['Beverage']['Abv'];
	        $beverage_ibu = $beverage['MenuItemProductDetail']['Beverage']['Ibu'];
	        $beverage_type = $beverage['MenuItemProductDetail']['BeverageType'];

	        $producer_location = "";
	        $producer_url = "";
	        $producer_logo = '';
	        $days_on = 0;
	        $time_on = 0;

	        switch($beverage_type) {
	            case "Beer":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Brewery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Brewery']['BreweryUrl'];
	                $producer_logo = $beverage['MenuItemProductDetail']['Beverage']['Brewery']['LogoImageUrl'];
	        		$beverage_style = $beverage['MenuItemProductDetail']['Beverage']['BeerStyle']['StyleName'];
	        		$days_on = $beverage['MenuItemProductDetail']['DaysOn'];
	        		$time_on = $beverage['MenuItemProductDetail']['TimeOn'];
	                break;
	            case "Cider":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Cidery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Cidery']['CideryUrl'];
	                break;
	            case "Mead":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Meadery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Meadery']['MeaderyUrl'];
	                break;
	            case "Wine":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Winery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Winery']['WineryUrl'];
	                break;
	            case "Kombucha":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['KombuchaMaker']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['KombuchaMaker']['Url'];
	                break;
	            case "Soft Drink":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['SoftDrinkMaker']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['SoftDrinkMaker']['Url'];
	                break;
	        }

	        $date_put_on = $beverage['DatePutOn'];
	        $bottle_size = $beverage['MenuItemProductDetail']['Prices'][0]['Size'];
	        $bottle_price = $beverage['MenuItemProductDetail']['Prices'][0]['Price'];
	        $beverage_ps = $beverage['MenuItemProductDetail']['Prices'][0]['DisplayName'];
	        $in_bottles = $beverage['MenuItemProductDetail']['AvailableInBottles'];
	        $keg_size = $beverage['MenuItemProductDetail']['KegSize'];
	        $oz_remaining = $beverage['MenuItemProductDetail']['EstimatedOzLeft'];
	        $scale = 1.0; //


		    //calculating percentage of keg remaining
		    // Get Percentage out of 100
		    if ( !empty($keg_size) ) {
		    	$percent = $oz_remaining  / $keg_size;
		    } else {
		    	$percent = 0;
		    }

		    // Limit to 100 percent (if more than the max is allowed)
		    if ( $percent > 1 ) { $percent = 1; }
		    if ( $percent < 0 ) { $percent = .005; }
		    $percent_remaining = number_format($percent*100, 0);
		    if ( $percent_remaining < 1 ) {$percent_remaining = "< 1";}

		    //determine percent Left color
		    //                  |-----------Red ---------------------------|   |-------Green--------------------| |Blue|
		    // $percent_left_color = (max(0,min(255,511 * (1-$percent))) * 65536) + (max(0,min(255,511 * $percent)) * 256) + 40;

			if($percent_remaining < 20) {
				$color = '#cc3300';
			} else if($percent_remaining < 40) {
				$color = '#cc6600';
			} else if($percent_remaining < 60) {
				$color = '#999933';
			} else if($percent_remaining < 80) {
				$color = '#669933';
			} else {
				$color = '#00cc00';
			}

			$time = '';

			if($time_on > 0) {

				if($time_on < 30) {
					$time = 'Just now';
				} else {
					$time_on = round($time_on / 60, 1);
					$time = 'About ' . $time_on . ' hours ago';

					if($time_on > 24) {
						$time_on  = round($time_on / 24, 1);
						$time = 'About ' . $time_on . ' days ago';
					}
				}
			}

		    ?>

		    <li class="[ mb4 clearfix ] [ flex flex-center ] beeritem">

			    <figure class="[ col col-3 lg-col-2 p0 m0 ] beeritem__logo">
					<?php if(!empty($producer_logo)) : ?>
						<img alt="<?php echo $producer_name; ?> logo" title="<?php $producer_name; ?>" src="<?php echo $producer_logo; ?>" />
			    	<?php else: ?>
			    		&nbsp;
			    	<?php endif; ?>
			    </figure>

				<div class="[ col col-9 lg-col-10 px3 ] beeritem__content">

			        <h5 class="[ bold dark mb1 mt0 ] beeritem__producer" title="Tap: <?php echo $item_name; ?>">
				        <?php
				        if(!empty($producer_url)) {
				        	echo '<a href="http://' . $producer_url . '" target="_blank">' . $producer_name . '</a>';
				        } else {
							echo $producer_name;
				        }
				        ?> / <?php echo $producer_location; ?>
				    </h5>

			    	<?php if($days_on < 3) : ?>
					<span class="[ inline-block px1 right ] [ white bg-black rounded small bold ]" title="<?php echo $time; ?>">Just Tapped</span>
			    	<?php endif; ?>

				    <h3 class="[ h2 mt1 mb1 ] beeritem__name"><?php echo $beverage_name; ?></h3>

				    <p class="[ small gray ] mb1"><?php echo $beverage_style; ?><?php echo (!empty ($beverage_abv) ? ' &middot; ' . number_format($beverage_abv, 1, '.', '').'% ABV' : ''); ?><?php echo (!empty ($beverage_ibu) ? ' &middot; ' . $beverage_ibu . ' IBU' : ''); ?></p>

					<div class="beeritem__status" title="<?php echo $percent_remaining; ?>% remaining">
			        	<div class="[ inline-block ] percentbar" style="width: 80%;">
			        		<div style="width: <?php echo $percent_remaining; ?>%;background:<?php echo $color; ?>;"></div>
			        	</div>
						<span class="[ inline-block small ml1 ]"><?php echo $percent_remaining; ?>%</span>
			        </div>
			    </div>
			</li>

			<?php
			$t++;
		}

		?>

		</ol>

		<div class="[ center ]">
			<img alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-digitalpour.png" />
		</div>


	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
