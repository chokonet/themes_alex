	<div id="menu_select">
		<form id="filter" action="" class="inBlock">
			<div class="iphoneCol">
				<label class="nomargin"><?php _e('Region', 'bemygirl'); ?></label>
				<select name="region" class="select-filter">
					<option value="all" <?php is_selected('region', 'all'); ?>>All</option>
					<option value="geneve" <?php is_selected('region', 'geneve'); ?>>Geneve</option>
					<option value="vaud" <?php is_selected('region', 'vaud'); ?>>Vaud</option>
				</select>
			</div>
			<div class="iphoneCol center_iphone">
				<label><?php _e('Area', 'bemygirl'); ?></label>
				<select name="area" class="select-filter">
					<option value="all" <?php is_selected('area', 'all'); ?>>All</option>
					<option value="lausanne-center" <?php is_selected('area', 'lausanne-center'); ?>>Lausanne Center</option>
					<option value="vevey" <?php is_selected('area', 'vevey'); ?>>Vevey</option>
				</select>
			</div>
			<div class="noiPad noiPhone">
				<label class="type noiPhone"><?php _e('Type', 'bemygirl'); ?></label>
				<select>
					<option value="All">All</option>
					<option value="557" selected="selected"><?php _e('Private Apartment', 'bemygirl'); ?></option>
					<option value="556"><?php _e('Massage Parlour', 'bemygirl'); ?></option>
				</select>
				<label class="type noiPad noiPhone"><?php _e('Tags', 'bemygirl'); ?></label>
				<select class="noiPad noiPhone">
					<option value="All" selected="selected">All</option>
					<option value="557"><?php _e('Asian', 'bemygirl'); ?></option>
					<option value="556"><?php _e('Black', 'bemygirl'); ?></option>
					<option value="555"><?php _e('Latin', 'bemygirl'); ?></option>
					<option value="558"><?php _e('Blonde', 'bemygirl'); ?></option>
					<option value="559"><?php _e('Brunette', 'bemygirl'); ?></option>
					<option value="560"><?php _e('Big boobs', 'bemygirl'); ?></option>
					<option value="569"><?php _e('Natural breast', 'bemygirl'); ?></option>
					<option value="568"><?php _e('Lesbo show', 'bemygirl'); ?></option>
					<option value="567"><?php _e('Massage pro', 'bemygirl'); ?></option>
					<option value="562"><?php _e('Student', 'bemygirl'); ?></option>
					<option value="561"><?php _e('Teens 18+', 'bemygirl'); ?></option>
					<option value="563"><?php _e('GFE', 'bemygirl'); ?></option>
					<option value="565"><?php _e('English speaking', 'bemygirl'); ?></option>
					<option value="564"><?php _e('French speaking', 'bemygirl'); ?></option>
					<option value="570"><?php _e('Video', 'bemygirl'); ?></option>
				</select>
			</div><!-- noiPad -->
		</form>
		<div class="iphoneCol2">
			<form action="acomodarpor.php" id="sort">
				<label><?php _e('Sort by', 'bemygirl'); ?></label>
				<select>
					<option>Random</option>
					<option>Name</option>
					<option>Updated date</option>
				</select>
			</form>
		</div>
	</div><!-- menu_select -->

	<div class="iphoneLine soloiPhone"></div>
	<div id="bread_display" class="noiPad noiPhone">
		<div id="breadcrumb">
			<a href=""><?php _e('Escorts in Switzerland', 'bemygirl'); ?></a>
		</div>
		<ul id="display">
			<li id="big"><a href=""></a></li>
			<li id="small"><a href=""></a></li>
			<li id="refresh"><a href=""></a></li>
		</ul>
	</div>