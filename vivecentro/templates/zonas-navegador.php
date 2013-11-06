					<div class="navegador zonas" >

						<?php get_template_part('templates/content', 'navegador'); ?>
						<img id="img-zonas" src="<?php echo THEMEPATH; ?>images/mapa-zonas.png" usemap="#img-zonas_map">
						<map id="img-zonas_map" name="img-zonas_map">
							<area class="trigger_hover <?php echo where_am_i_term('garibaldi', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="376,24,373,29,349,186,454,204,469,102,517,93,523,52,467,44,467,28," href="<?php echo site_url('zonas/garibaldi'); ?>" alt="Garibaldi" title="Garibaldi" />
							<div class="info <?php echo where_am_i_term('garibaldi', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover1" class="map_hover active"  <?php echo where_am_i_term('garibaldi', 'zonas') ? 'data-maphilight="{alwaysOn: true}"' : '' ; ?> src="<?php echo THEMEPATH; ?>images/garibaldi_map.png">
								<p>Garibaldi</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('alameda-norte', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="187,124,182,147,198,153,193,190,215,196,213,212,337,234,345,170,271,150,279,98,276,94,239,128,207,126,203,128," href="<?php echo site_url('zonas/alameda-norte'); ?>" alt="Alameda Norte" title="Alameda Norte"/>
							<div class="info <?php echo where_am_i_term('alameda-norte', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover2" class="map_hover" src="<?php echo THEMEPATH; ?>images/alameda_map.png">
								<p>Alameda Norte</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('alameda-sur', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="192,194,187,214,153,211,149,213,140,278,133,282,127,300,323,330,335,238,211,215,214,196," href="<?php echo site_url('zonas/alameda-sur'); ?>" alt="Alameda Sur" title="Alameda Sur"/>
							<div class="info <?php echo where_am_i_term('alameda-sur', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover3" class="map_hover" src="<?php echo THEMEPATH; ?>images/alamedasur_map.png">
								<p>Alameda Sur</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('santo-domingo', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="455,205,471,102,565,92,549,218," href="<?php echo site_url('zonas/santo-domingo'); ?>" alt="Santo Domingo" title="Santo Domingo"/>
							<div class="info <?php echo where_am_i_term('santo-domingo', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover4" class="map_hover" src="<?php echo THEMEPATH; ?>images/domingo_map.png">
								<p>Santo <br> Domingo</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('san-ildefonso', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="569,93,617,89,613,139,679,148,668,235,578,224,575,232,570,233,547,230,549,219,554,217,555,198," href="<?php echo site_url('zonas/san-ildefonso'); ?>" alt="San Ildefonso" title="San Ildefonso"/>
							<div class="info <?php echo where_am_i_term('san-ildefonso', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover5" class="map_hover" src="<?php echo THEMEPATH; ?>images/ildefonso_map.png">
								<p>San <br> Ildefonso</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('madero', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="348,191,331,311,483,334,502,214,360,194," href="<?php echo site_url('zonas/madero'); ?>" alt="Madero" title="Madero"/>
							<div class="info <?php echo where_am_i_term('madero', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover6" class="map_hover" src="<?php echo THEMEPATH; ?>images/madero_map.png">
								<p>Madero</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('zocalo-moneda', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="512,215,509,250,547,256,545,297,589,301,595,273,683,284,686,266,690,238,625,232,580,224,577,231,569,231,566,236,554,234,547,230,544,220," href="<?php echo site_url('zonas/zocalo-moneda'); ?>" alt="Zócalo-Moneda" title="Zócalo-Moneda"/>
							<div class="info <?php echo where_am_i_term('zocalo-moneda', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover8" class="map_hover" src="<?php echo THEMEPATH; ?>images/zocalo_map.png">
								<p>Zócalo</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('antigua-merced', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="595,276,577,412,532,407,527,424,582,435,597,432,693,448,717,291," href="<?php echo site_url('zonas/antigua-merced'); ?>" alt="Antigua Merced" title="Antigua Merced"   />
							<div class="info <?php echo where_am_i_term('antigua-merced', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover9" class="map_hover" src="<?php echo THEMEPATH; ?>images/merced_map.png">
								<p>Antigua Merced</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('regina', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="329,334,501,360,492,435,330,420,321,425,313,424,317,415," href="<?php echo site_url('zonas/regina'); ?>" alt="Regina" title="Regina"   />
							<div class="info <?php echo where_am_i_term('regina', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover10" class="map_hover" src="<?php echo THEMEPATH; ?>images/regina_map.png">
								<p>Regina</p>
							</div>
							<area class="trigger_hover <?php echo where_am_i_term('ciudadela', 'zonas') ? '{alwaysOn: true} active' : '' ; ?>" shape="poly" coords="126,305,120,330,108,325,93,402,144,406,149,401,267,413,285,417,301,426,310,425,310,415,315,391,322,335,232,322,203,315," href="<?php echo site_url('zonas/ciudadela'); ?>" alt="La Ciudadela" title="La Ciudadela"/>
							<div class="info <?php echo where_am_i_term('ciudadela', 'zonas') ? 'active' : '' ; ?>">
								<img id="map_hover11" class="map_hover" src="<?php echo THEMEPATH; ?>images/ciudadela_map.png">
								<p>Ciudadela</p>
							</div>
						</map>
					</div>