<?php get_header('admin'); ?>
		<div class="content_admin">
			<div class="next_prev">
				<ul class="menu-users">
					<li><a href="<?php bloginfo('url'); ?>/dashboard/users/" class="active"><?php _e('List', 'bemygirl'); ?></a></li>
					<li><a href="<?php bloginfo('url'); ?>/dashboard/create-user/"><?php _e('Add User', 'bemygirl'); ?></a></li>
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
						<a href="#" title="sort by showname" class="active">Showname</a>
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
						<a href="#" title="sort by active" class="active">Active</a>
					</th>
					<th class="views-available">
						<a href="#" title="sort by Available" class="active">Available</a>
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

	</div><!-- page-container  -->

		<div class="clear"></div>

		<div class="external-links">
			<ul>
				<li><a href="https://twitter.com/#!/bemygirl_ch" target="_blank" class="twitter"></a></li>
				<li><a href="http://pinterest.com/bemygirl/" target="_blank" class="pinterest"></a></li>
				<li><a href="https://vimeo.com/bemygirl" target="_blank" class="vimeo"></a></li>
				<li><a href="http://news.bemygirl.ch/" class="tumblr" target="_blank"></a></li>
				<li><a href="https://www.facebook.com/BemyGirl.ch" class="facebook" target="_blank"></a></li>
			</ul>
		</div>

		<div class="pop-mensajes">
			<div class="notice-body"></div>
			<div class="notice-bottom"></div>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
