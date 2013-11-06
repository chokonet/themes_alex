
	<div id="menu_select">

		<form id="filter" action="" class="inBlock">

			<div class="iphoneCol">
				<label class="nomargin"><?php _e('Region', 'bemygirl'); ?></label>
				<select name="region" class="select-filter">
					<option value="All" <?php is_selected('region', 'All'); ?>>All</option>
					<option value="Geneve" <?php is_selected('region', 'Geneve'); ?>>Geneve</option>
					<option value="Vaud" <?php is_selected('region', 'Vaud'); ?>>Vaud</option>
				</select>
			</div>

			<div class="iphoneCol center_iphone">
				<label><?php _e('Area', 'bemygirl'); ?></label>
				<select name="area" class="select-filter" id="select-area">
					<option value="All"><?php _e('Choose a region', 'bemygirl'); ?></option>
				</select>
			</div>

			<div class="noiPad noiPhone">

				<label class="type noiPhone"><?php _e('Type', 'bemygirl'); ?></label>
				<select name="type" class="select-filter">
					<option value="All" <?php is_selected('type', 'All'); ?>>
						All
					</option>
					<option value="Private Apartment" <?php is_selected('type', 'Private Apartment'); ?>>
						<?php _e('Private Apartment', 'bemygirl'); ?>
					</option>
					<option value="Massage Parlour" <?php is_selected('type', 'Massage Parlour'); ?>>
						<?php _e('Massage Parlour', 'bemygirl'); ?>
					</option>
				</select>

				<label class="noiPad noiPhone"><?php _e('Tags', 'bemygirl'); ?></label>
				<select name="tags" class="select-filter noiPad noiPhone">
					<option value="All" <?php is_selected('tags', 'All'); ?>>
						All
					</option>
					<option value="Asian" <?php is_selected('tags', 'Asian'); ?>>
						<?php _e('Asian', 'bemygirl'); ?>
					</option>
					<option value="Black" <?php is_selected('tags', 'Black'); ?>>
						<?php _e('Black', 'bemygirl'); ?>
					</option>
					<option value="Latin" <?php is_selected('tags', 'Latin'); ?>>
						<?php _e('Latin', 'bemygirl'); ?>
					</option>
					<option value="Blonde" <?php is_selected('tags', 'Blonde'); ?>>
						<?php _e('Blonde', 'bemygirl'); ?>
					</option>
					<option value="Brunette" <?php is_selected('tags', 'Brunette'); ?>>
						<?php _e('Brunette', 'bemygirl'); ?>
					</option>
					<option value="Big boobs" <?php is_selected('tags', 'Big boobs'); ?>>
						<?php _e('Big boobs', 'bemygirl'); ?>
					</option>
					<option value="Natural breast" <?php is_selected('tags', 'Natural breast'); ?>>
						<?php _e('Natural breast', 'bemygirl'); ?>
					</option>
					<option value="Lesbo show" <?php is_selected('tags', 'Lesbo show'); ?>>
						<?php _e('Lesbo show', 'bemygirl'); ?>
					</option>
					<option value="Massage pro" <?php is_selected('tags', 'Massage pro'); ?>>
						<?php _e('Massage pro', 'bemygirl'); ?>
					</option>
					<option value="Student" <?php is_selected('tags', 'Student'); ?>>
						<?php _e('Student', 'bemygirl'); ?>
					</option>
					<option value="Teens 18+" <?php is_selected('tags', 'Teens 18+'); ?>>
						<?php _e('Teens 18+', 'bemygirl'); ?>
					</option>
					<option value="GFE" <?php is_selected('tags', 'GFE'); ?>>
						<?php _e('GFE', 'bemygirl'); ?>
					</option>
					<option value="English speaking" <?php is_selected('tags', 'English speaking'); ?>>
						<?php _e('English speaking', 'bemygirl'); ?>
					</option>
					<option value="French speaking" <?php is_selected('tags', 'French speaking'); ?>>
						<?php _e('French speaking', 'bemygirl'); ?>
					</option>
					<option value="Video" <?php is_selected('tags', 'Video'); ?>>
						<?php _e('Video', 'bemygirl'); ?>
					</option>
				</select>

			</div><!-- noiPad -->

		</form><!-- filter -->

		<div class="iphoneCol2">
			<form action="acomodarpor.php" id="sort">
				<label><?php _e('Sort by', 'bemygirl'); ?></label>
				<select>
					<option>Random</option>
					<option>Name</option>
					<option>Updated date</option>
				</select>
			</form>
		</div><!-- iphoneCol2 -->

	</div><!-- menu_select -->

	<div class="iphoneLine soloiPhone"></div>

	<div id="bread_display" class="noiPad noiPhone">

		<div id="breadcrumb">
			<a href="<?php bloginfo('url') ?>/home"><?php _e('Escorts in Switzerland', 'bemygirl'); ?></a>
			<?php get_breadcrumbs(); ?>
		</div>

		<ul id="display">
			<li id="big"><a href=""></a></li>
			<li id="small"><a href=""></a></li>
			<li id="refresh"><a href=""></a></li>
		</ul>

	</div><!-- bread_display -->