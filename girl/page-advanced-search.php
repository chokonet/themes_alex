<?php get_header(); ?>
	 <!-- main-->
    <div class="main">
        <div id="menu_select" class="noiPad noiPhone">

         	<form action="girl.php" class="inblock">
         		<div class="iphoneCol">
         	      	<label class="nomargin"><?php _e('Region', 'bemygirl'); ?></label>
         	      	<select>
	         	       	<option>All</option>
	         	       	<option>Geneve</option>
	         	       	<option>Vaud</option>
         	      	</select>
         	  	</div>
         	    <div class="iphoneCol center_iphone">
         	     	<label><?php _e('Area', 'bemygirl'); ?></label>
         	       	<select>
	         	        <option>All</option>
	         	        <option>Lausanne Center</option>
	         	        <option>Vevey</option>
         	      	</select>
         	    </div>
         	    <label><?php _e('Type', 'bemygirl'); ?></label>
     	      	<select>
         	        <option>All</option>
         	        <option>Private Apartment</option>
     	      	</select>
         	</form>

         	<form action="acomodarpor.php" id="sort">
         	    <label><?php _e('Sort by', 'bemygirl'); ?></label>
         	    <select>
	         	    <option>All</option>
	         	    <option>Geneve</option>
	         	    <option>Vaud</option>
         	    </select>
         	</form>

        </div>
    </div><!--end main-->

	<!--main search advanced-->
    <div id="main_advanced">
		<div class="pleca noiPhone">
			<div class="content">
				<div class="profile"><?php _e('Profile', 'bemygirl'); ?></div>
				<div href="" class="services"><?php _e('Services', 'bemygirl'); ?></div>
			</div>
			<div class="im_right"></div>
		</div>
		<div class="iphoneLine soloiPhone"></div>
		<h1 class="title_advanced soloiPhone"><?php _e('Advanced Search', 'bemygirl'); ?></h1>

		<div id="hover_profile" class="noiPhone"></div>
		<div id="hover_service" class="noiPhone"></div>
		<div class="cont_profile">
			<div class="pleca_advanced soloiPhone"><h2><?php _e('Profile', 'bemygirl'); ?></h2></div>
			<div class="first-col">
				<div class="centerForm">
						<label><?php _e('Nationality', 'bemygirl'); ?></label>
		                <select id="speedD">
		                  	<option>All</option>
		                 	<option>Geneve</option>
		                  	<option>Vaud</option>
		                </select>

			            <label><?php _e('Ethnicity', 'bemygirl'); ?></label>
		                <select>
		                  	<option>All</option>
		                  	<option>Geneve</option>
		                  	<option>Vaud</option>
		                </select>

			            <label><?php _e('Service for', 'bemygirl'); ?></label>
		                <select>
		                  	<option>All</option>
		                  	<option>Geneve</option>
		                  	<option>Vaud</option>
		                </select>

					<div class="chi">

			            <label><?php _e('Height', 'bemygirl'); ?></label>

			            <div class="selectWrap">
			            	<label class="chico"><?php _e('From', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

			                <label class="chicob"><?php _e('To', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

						</div><!-- selectWrap -->

			            <label><?php _e('Weight', 'bemygirl'); ?></label>

			            <div class="selectWrap">
			            	<label class="chico"><?php _e('From', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

			                <label class="chicob"><?php _e('To', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

			            </div><!-- selectWrap -->

		        	</div>
	        	</div>
			</div>
			<div class="second-col">
				<div class="centerForm">
					<div class="chi">
						<label><?php _e('Age', 'bemygirl'); ?></label>

						<div class="selectWrap">
			            	<label class="chico"><?php _e('From', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

			                <label class="chicob"><?php _e('To', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

						</div><!-- selectWrap -->

			            <label><?php _e('Shoe Size', 'bemygirl'); ?></label>

			            <div class="selectWrap">
			            	<label class="chico"><?php _e('From', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

			                <label class="chicob"><?php _e('To', 'bemygirl'); ?></label>
			            	<select class="select_chico">
			                  	<option >All</option>
			                  	<option>Geneve</option>
			                  	<option>Vaud</option>
			                </select>

			            </div><!-- selectWrap -->
		            </div>

		            <label><?php _e('Hair', 'bemygirl'); ?></label>
	                <select>
	                  	<option>All</option>
	                  	<option>Geneve</option>
	                  	<option>Vaud</option>
	                </select>

		            <label><?php _e('Eyes', 'bemygirl'); ?></label>
	                <select>
	                  	<option>All</option>
	                  	<option>Geneve</option>
	                  	<option>Vaud</option>
	                </select>

		            <label><?php _e('Breast', 'bemygirl'); ?></label>
	                <select>
	                  	<option>All</option>
	                  	<option>Geneve</option>
	                  	<option>Vaud</option>
	                </select>

		            <label><?php _e('Pubic Hair', 'bemygirl'); ?></label>
	                <select>
	                  	<option>All</option>
	                  	<option>Geneve</option>
	                  	<option>Vaud</option>
	                </select>

				</div>
			</div>

			<div class="third-col noiPhone">
                <form class="forma_buscar" method="get" action="<?php echo home_url('/'); ?>">
                  	<input type="submit" value="">
                  	<input type="text" name="s" value="Enter search keywords..." onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                </form><!-- forma_buscar boton_barra -->
				<input type="submit" class="form-submit" value="Search" name="" >
			</div>

		</div>

		<div class="cont_service">
			<div class="pleca_advanced soloiPhone"><h2><?php _e('Services', 'bemygirl'); ?></h2></div>
			<div class="columna">
				<div id="plecasup">
					<span><?php _e('Ordinary Services', 'bemygirl'); ?></span>
				</div>
				<div class="form-item">
					<input type="checkbox" name="69" id="69" value="1" class="check_02" />
			        <label for="69" class="check_02">Opción del elemento 2</label>
			        <label for="69">69</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Blowjob with Condom" id="Blowjob with Condom" value="1" class="check_02" />
			        <label for="Blowjob with Condom" class="check_02">Opción del elemento 2</label>
			        <label for="Blowjob with Condom">Blowjob with Condom</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Anal" id="Anal" value="1" class="check_02" />
			        <label for="Anal" class="check_02">Opción del elemento 2</label>
			        <label for="Anal">Anal</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Natural Blowjob" id="Natural Blowjob" value="1" class="check_02" />
			        <label for="Natural Blowjob" class="check_02">Opción del elemento 2</label>
			        <label for="Natural Blowjob">Natural Blowjob</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Cum on body" id="Cum on body" value="1" class="check_02" />
			        <label for="Cum on body" class="check_02">Opción del elemento 2</label>
			        <label for="Cum on body">Cum on body</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Cunnilingus" id="Cunnilingus" value="1" class="check_02" />
			        <label for="Cunnilingus" class="check_02">Opción del elemento 2</label>
			        <label for="Cunnilingus">Cunnilingus</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="French Kiss" id="French Kiss" value="1" class="check_02" />
			        <label for="French Kiss" class="check_02">Opción del elemento 2</label>
			        <label for="French Kiss">French Kiss</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="GFE" id="GFE" value="1" class="check_02" />
			        <label for="GFE" class="check_02">Opción del elemento 2</label>
			        <label for="GFE">GFE</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Lesbo show" id="Lesbo show" value="1" class="check_02" />
			        <label for="Lesbo show" class="check_02">Opción del elemento 2</label>
			        <label for="Lesbo show">Lesbo show</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Outdoor sex" id="Outdoor sex" value="1" class="check_02" />
			        <label for="Outdoor sex" class="check_02">Opción del elemento 2</label>
			        <label for="Outdoor sex">Outdoor sex</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Table massage" id="Table massage" value="1" class="check_02" />
			        <label for="Table massage" class="check_02">Opción del elemento 2</label>
			        <label for="Table massage">Table massage</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Tantric massage" id="Tantric massage" value="1" class="check_02" />
			        <label for="Tantric massage" class="check_02">Opción del elemento 2</label>
			        <label for="Tantric massage">Tantric massage</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Erotic massage" id="Erotic massage" value="1" class="check_02" />
			        <label for="Erotic massage" class="check_02">Opción del elemento 2</label>
			        <label for="Erotic massage">Erotic massage</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Prostate Massage" id="Prostate Massage" value="1" class="check_02" />
			        <label for="Prostate Massage" class="check_02">Opción del elemento 2</label>
			        <label for="Prostate Massage">Prostate Massage</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Sex Toys" id="Sex Toys" value="1" class="check_02" />
			        <label for="Sex Toys" class="check_02">Opción del elemento 2</label>
			        <label for="Sex Toys">Sex Toys</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Striptease" id="Striptease" value="1" class="check_02" />
			        <label for="Striptease" class="check_02">Opción del elemento 2</label>
			        <label for="Striptease">Striptease</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Traveling" id="Traveling" value="1" class="check_02" />
			        <label for="Traveling" class="check_02">Opción del elemento 2</label>
			        <label for="Traveling">Traveling</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Restaurant" id="Restaurant" value="1" class="check_02" />
			        <label for="Restaurant" class="check_02">Opción del elemento 2</label>
			        <label for="Restaurant">Restaurant</label>
				</div>

			</div>
			<div class="columna ultima_columna">
				<div id="plecasup">
					<span><?php _e('Extraordinary Services', 'bemygirl'); ?></span>
				</div>
				<div class="form-item">
					<input type="checkbox" name="BDSM" id="BDSM" value="1" class="check_02" />
			        <label for="BDSM" class="check_02">Opción del elemento 2</label>
			        <label for="BDSM">BDSM</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="BDSM (soft)" id="BDSM (soft)" value="1" class="check_02" />
			        <label for="BDSM (soft)" class="check_02">Opción del elemento 2</label>
			        <label for="BDSM (soft)">BDSM (soft)</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Fetichism" id="Fetichism" value="1" class="check_02" />
			        <label for="Fetichism" class="check_02">Opción del elemento 2</label>
			        <label for="Fetichism">Fetichism</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Foot fetishism" id="Foot fetishism" value="1" class="check_02" />
			        <label for="Foot fetishism" class="check_02">Opción del elemento 2</label>
			        <label for="Foot fetishism">Foot fetishism</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Gangbang" id="Gangbang" value="1" class="check_02" />
			        <label for="Gangbang" class="check_02">Opción del elemento 2</label>
			        <label for="Gangbang">Gangbang</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Golden Shower" id="Golden Shower" value="1" class="check_02" />
			        <label for="Golden Shower" class="check_02">Opción del elemento 2</label>
			        <label for="Golden Shower">Golden Shower</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Mistress" id="Mistress" value="1" class="check_02" />
			        <label for="Mistress" class="check_02">Opción del elemento 2</label>
			        <label for="Mistress">Mistress</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Role Play" id="Role Play" value="1" class="check_02" />
			        <label for="Role Play" class="check_02">Opción del elemento 2</label>
			        <label for="Role Play">Role Play</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Royal Blowjob" id="Royal Blowjob" value="1" class="check_02" />
			        <label for="Royal Blowjob" class="check_02">Opción del elemento 2</label>
			        <label for="Royal Blowjob">Royal Blowjob</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Submission" id="Submission" value="1" class="check_02" />
			        <label for="Submission" class="check_02">Opción del elemento 2</label>
			        <label for="Submission">Submission (soft)</label>
				</div>
				<div class="form-item">
					<input type="checkbox" name="Strap On" id="Strap On" value="1" class="check_02" />
			        <label for="Strap On" class="check_02">Opción del elemento 2</label>
			        <label for="Strap On">Strap On</label>
				</div>

			</div>
			<input type="submit" class="form-submit" value="Search" name="">
		</div>
    </div><!--end main search advanced-->

    <div class="main">

        <div id="bread_display" style="margin-top:20px;" class="noiPhone noiPad">
            <ul id="display">
            	<li id="big"><a href=""></a></li>
                <li id="small"><a href=""></a></li>
                <li id="refresh"><a href=""></a></li>
            </ul>
        </div>

         <?php get_template_part( 'templates/loop', 'escorts' ) ?>

    </div><!-- fin main-->
<?php get_footer(); ?>