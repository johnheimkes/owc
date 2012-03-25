<?php
/**
* The TEC template for a list of events. This includes the Past Events and Upcoming Events views 
* as well as those same views filtered to a specific category.
*
* You can customize this view by putting a replacement file of the same name (list.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

?>
<section class="events-listing">
	
	<div id="tribe-events-loop" class="tribe-events-events post-list clearfix">
	<?php query_posts(array('tribe_events_cat' => 'windmill'));?>
	<h3>The Windmill Project Events</h3>
    <?php if (have_posts()) : ?>
    <?php $hasPosts = true; $first = true; ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php global $more; $more = false; ?>
		<?php  if(time() < strtotime(tribe_get_end_date( null, false, 'm/d/Y h:i' ))):?>
		<div id="post-<?php the_ID() ?>" class="event" itemscope itemtype="http://schema.org/Event">
			<?php the_title('<h4 itemprop="name"><a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h4>'); ?>
			
			
			<div class="events-listing-photo">
	        <?php if ( has_post_thumbnail()) : ?>
	            <?php the_post_thumbnail('events-listing'); ?>
	        <?php endif; ?>
			</div>

			<div class="event-content" itemprop="description">
				<?php if ( tribe_is_new_event_day() && !tribe_is_day() ) : ?>
					<h5 class="event-day"><?php echo tribe_get_start_date( null, false, 'm/d/Y g:i' ); ?> to <?php echo tribe_get_end_date( null, false, 'g:i' ); ?></h5>
				<?php endif; ?>
				<?php if ( tribe_is_day() && $first ) : $first = false; ?>
					<h5 class="event-day"><?php echo tribe_event_format_date(strtotime(get_query_var('eventDate')), false); ?></h5>
					
				<?php endif; ?>
				<h5 class="event-city"><?php if(tribe_get_city()){ echo tribe_get_city() . ", " . tribe_get_state();} ?></h5>
				<p>
				<?php if (has_excerpt ()): ?>
					<?php the_excerpt(); ?>
				<?php else: ?>
					<?php 
					if (get_the_content()){
						$content = get_the_content();
						echo substr($content, 0, 365) . "...";
					} 
					?>
				<?php endif; ?>
				</p>
				<ul class="event-nav">
					<li><a class="button event-link" href="<?php echo tribe_get_event_link(); ?>">Learn more</a></li>
				</ul>
			</div> <!-- End tribe-events-event-entry -->


		</div><!-- End post -->
		<?php endif; ?>
	<?php endwhile;// posts ?>

	
	<?php else :?>
		<?php 
			$tribe_ecp = TribeEvents::instance();
			if ( is_tax( $tribe_ecp->get_event_taxonomy() ) ) {
				$cat = get_term_by( 'slug', get_query_var('term'), $tribe_ecp->get_event_taxonomy() );
				if( tribe_is_upcoming() ) {
					$is_cat_message = sprintf(__(' listed under %s. Check out past events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
				} else if( tribe_is_past() ) {
					$is_cat_message = sprintf(__(' listed under %s. Check out upcoming events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
				}
			}
		?>
		<?php if(tribe_is_day()): ?>
			<?php printf( __('No events scheduled for <strong>%s</strong>. Please try another day.', 'tribe-events-calendar'), date_i18n('F d, Y', strtotime(get_query_var('eventDate')))); ?>
		<?php endif; ?>

		<?php if(tribe_is_upcoming()){ ?>
			<?php _e('No upcoming events', 'tribe-events-calendar');
			echo !empty($is_cat_message) ? $is_cat_message : ".";?>

		<?php }elseif(tribe_is_past()){ ?>
			<?php _e('No previous events' , 'tribe-events-calendar');
			echo !empty($is_cat_message) ? $is_cat_message : ".";?>
		<?php } ?>
		
	<?php endif; ?>

	<?php rewind_posts(); ?>
	
	<?php query_posts(array('tribe_events_cat' => 'partner'));?>
	<h3>Partner Events</h3>
    <?php if (have_posts()) : ?>
    <?php $hasPosts = true; $first = true; ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php global $more; $more = false; ?>
		<?php  if(time() < strtotime(tribe_get_end_date( null, false, 'm/d/Y h:i' ))):?>
		<div id="post-<?php the_ID() ?>" class="event" itemscope itemtype="http://schema.org/Event">
			<?php the_title('<h4 itemprop="name"><a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h4>'); ?>
			
			<div class="events-listing-photo">
	        <?php if ( has_post_thumbnail()) : ?>
	            <?php the_post_thumbnail('events-listing'); ?>
	        <?php endif; ?>
			</div>


			<div class="event-content" itemprop="description">
				<?php if ( tribe_is_new_event_day() && !tribe_is_day() ) : ?>
					<h5 class="event-day"><?php echo tribe_get_start_date( null, false, 'm/d/Y g:i' ); ?> to <?php echo tribe_get_end_date( null, false, 'g:i' ); ?></h5>
				<?php endif; ?>
				<?php if ( tribe_is_day() && $first ) : $first = false; ?>
					<h5 class="event-day"><?php echo tribe_event_format_date(strtotime(get_query_var('eventDate')), false); ?></h5>
					
				<?php endif; ?>
				<h5 class="event-city"><?php if(tribe_get_city()){ echo tribe_get_city() . ", " . tribe_get_state();} ?></h5>
				<p>
				<?php if (has_excerpt ()): ?>
					<?php the_excerpt(); ?>
				<?php else: ?>
					<?php 
					if (get_the_content()){
						$content = get_the_content();
						echo substr($content, 0, 365) . "...";
					} 
					?>

				<?php endif; ?>
				</p>
				<ul class="event-nav">
					<li><a class="button event-link" href="<?php echo tribe_get_event_link(); ?>">Learn more</a></li>
				</ul>
			</div> <!-- End tribe-events-event-entry -->



		</div><!-- End post -->
		<?php endif;?>
	<?php endwhile;// posts ?>

	<?php else :?>
		<?php 
			$tribe_ecp = TribeEvents::instance();
			if ( is_tax( $tribe_ecp->get_event_taxonomy() ) ) {
				$cat = get_term_by( 'slug', get_query_var('term'), $tribe_ecp->get_event_taxonomy() );
				if( tribe_is_upcoming() ) {
					$is_cat_message = sprintf(__(' listed under %s. Check out past events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
				} else if( tribe_is_past() ) {
					$is_cat_message = sprintf(__(' listed under %s. Check out upcoming events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
				}
			}
		?>
		<?php if(tribe_is_day()): ?>
			<?php printf( __('No events scheduled for <strong>%s</strong>. Please try another day.', 'tribe-events-calendar'), date_i18n('F d, Y', strtotime(get_query_var('eventDate')))); ?>
		<?php endif; ?>

		<?php if(tribe_is_upcoming()){ ?>
			<?php _e('No upcoming events', 'tribe-events-calendar');
			echo !empty($is_cat_message) ? $is_cat_message : ".";?>

		<?php }elseif(tribe_is_past()){ ?>
			<?php _e('No previous events' , 'tribe-events-calendar');
			echo !empty($is_cat_message) ? $is_cat_message : ".";?>
		<?php } ?>
		
	<?php endif; ?>
	<?php rewind_posts();?>

	</div><!-- #tribe-events-loop -->
	<?php if ( !empty($hasPosts) && function_exists('tribe_get_ical_link') ): ?>
		<a title="<?php esc_attr_e('iCal Import', 'tribe-events-calendar') ?>" class="ical" href="<?php echo tribe_get_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar') ?></a>
	<?php endif; ?>
</section>
