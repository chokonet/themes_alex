<?php get_header('admin'); ?>
	<div class="content_admin">
		<div class="next_prev">
			<ul class="menu-users">
				<li><a href="<?php bloginfo('url'); ?>/users/" class="active"><?php _e('List', 'bemygirl'); ?></a></li>
				<li><a href="<?php bloginfo('url'); ?>/create-users/"><?php _e('Add User', 'bemygirl'); ?></a></li>
			</ul>

		</div>

		<div class="views-field-name">Hello Master</div>

		<div class="alpha-pager">
			<span class="view-Glossary">

				<a href="#">A</a> /
				<a href="#">B</a> /
				<a href="#">C</a> /
				<a href="#">D</a> /
				<a href="#">E</a> /
				<a href="#">F</a> /
				<a href="#">G</a> /
				<a href="#">H</a> /
				<a href="#">I</a> /
				<a href="#">J</a> /
				<a href="#">K</a> /
				<a href="#">L</a> /
				<a href="#">M</a> /
				<a href="#">N</a> /
				<a href="#">O</a> /
				<a href="#">P</a> /
				<a href="#">Q</a> /
				<a href="#">R</a> /
				<a href="#">S</a> /
				<a href="#">T</a> /
				<a href="#">U</a> /
				<a href="#">V</a> /
				<a href="#">W</a> /
				<a href="#">X</a> /
				<a href="#">Y</a> /
				<a href="#">Z</a> /
				<a href="#">ALL</a> /

			</span>
		</div><!-- alpha-pager -->

		<div class="alpha-pager-pending">
			<a href="/users/pending">PENDING ACTIVATION</a></span>
		</div>

		<table class="views-table cols-11">
		<thead>
			<tr>
				<th class="views-edit">
					Edit
				</th>
				<th class="views-photo">
					Photo
				</th>
				<th class="views-title">
					showname
				</th>
				<th class="views-mail">
					Email
				</th>
				<th class="views-cellphone">
					Phone
				</th>
				<th class="views-created">
					<a href="#" title="sort by Registration date" class="active">Registration date</a>
				</th>
				<th class="views-profile-active">
					Active
				</th>
				<th class="views-available">
					Available
				</th>
				<th class="views-date">
					<a href="#" title="sort by Payment Due" class="active">Payment Due</a>
				</th>
				<th class="views-changed">
					<a href="#" title="sort by Last Modified" class="active">Last Modified</a>
				</th>
				<th class="views-cancel-node">
					Delete
				</th>
			</tr>
		</thead>
		<tbody>

			<?php get_template_part( 'templates/users', 'tablaEscorts' ) ?>


		</tbody>
		</table>

	</div><!-- end content_admin -->
<?php get_footer('admin'); ?>