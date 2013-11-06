	<div class="main_fq border_fq" id="edit-profile">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Profile', 'bemygirl'); ?> </span>
		</div>
		<div class="register">
			<form id="form-girlProfile-edit" class="forms-admin no-submit">

				<div class="col2 selected-contact">

					<label for="contact-girl-nationality">
						<?php _e('Nationality', 'bemygirl'); ?>
						<span class="form-required">*</span>
					</label>

					<select id="nationality" name="nationality">
						<option value="">&lt;none&gt;</option>
						<option value="American">American</option>
						<option value="Antilles">Antilles</option>
						<option value="Australian">Australian</option>
						<option value="Argentinian">Argentinian</option>
						<option value="Belgian">Belgian</option>
						<option value="Brazilian">Brazilian</option>
						<option value="British">British</option>
						<option value="Colombian">Colombian</option>
						<option value="Cuban">Cuban</option>
						<option value="Czech">Czech</option>
						<option value="Filipinas">Filipinas</option>
						<option value="French">French</option>
						<option value="German">German</option>
						<option value="Hungarian">Hungarian</option>
						<option value="Indian">Indian</option>
						<option value="Italian">Italian</option>
						<option value="Latvian">Latvian</option>
						<option value="Lebanese">Lebanese</option>
						<option value="Mexican">Mexican</option>
						<option value="Polish">Polish</option>
						<option value="Portuguese">Portuguese</option>
						<option value="Romanian">Romanian</option>
						<option value="Russian">Russian</option>
						<option value="Slovakian">Slovakian</option>
						<option value="Spanish">Spanish</option>
						<option value="Swiss">Swiss</option>
						<option value="Thai">Thai</option>
						<option value="Venezuelan">Venezuelan</option>

					</select>
					<div id="bt-select-nationality"></div>
				</div>
				<div class="col1 coloca-nationality">
					<!-- aqui se colocan las nacionalidades -->
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-ethnicity"><?php _e('Ethnicity', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<select id="ethnicity" name="ethnicity">
						<option value="">&lt;none&gt;</option>
						<option value="Asian">Asian</option>
						<option value="Black">Black</option>
						<option value="Caucassian">Caucasian</option>
						<option value="Indian">Indian</option>
						<option value="Latin">Latin</option>
						<option value="Middle East">Middle East</option>
						<option value="Mixed">Mixed</option>
					</select>
					<div id="bt-select-ethnicity"></div>
				</div>
				<div class="col1 coloca-ethnicity">
					<!-- aqui se colocan las etnias -->
				</div>
				<div class="col1">
					<label for="contact-girl-service-for "><?php _e('Service for ', 'bemygirl'); ?>  <span class="form-required">*</span> </label>

					<input type="checkbox" name="service" value="men" id="men">
					<label for="men" class="withheld"><?php _e('Men', 'bemygirl'); ?></label>

					<input type="checkbox" name="service" value="women" id="women">
					<label for="women" class="withheld"><?php _e('Women', 'bemygirl'); ?></label>

					<input type="checkbox" name="service" value="groups" id="mas2">
					<label for="mas2" class="withheld"><?php _e('+2', 'bemygirl'); ?></label>

					<input type="checkbox" name="service" value="couples" id="couples">
					<label for="couples" class="withheld"><?php _e('Couples', 'bemygirl'); ?></label>

				</div>
				<div class="col2 selected-contact-small">
					<label for="contact-girl-age"><?php _e('Age', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<select id="select-age" name="age">
						<option value="">&lt;none&gt;</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35</option>
						<option value="36">36</option>
						<option value="37">37</option>
						<option value="38">38</option>
						<option value="39">39</option>
						<option value="40">40</option>
					</select>
				</div>
				<div class="col2 selected-contact-small">
					<label for="contact-girl-weight"><?php _e('Weight', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<select id="select-weight" name="weight">
						<option value="">&lt;none&gt;</option>
						<option value="44">44 kg</option>
						<option value="45">45 kg</option>
						<option value="46">46 kg</option>
						<option value="47">47 kg</option>
						<option value="48">48 kg</option>
						<option value="49">49 kg</option>
						<option value="50">50 kg</option>
						<option value="51">51 kg</option>
						<option value="52">52 kg</option>
						<option value="53">53 kg</option>
						<option value="54">54 kg</option>
						<option value="55">55 kg</option>
						<option value="56">56 kg</option>
						<option value="57">57 kg</option>
						<option value="58">58 kg</option>
						<option value="59">59 kg</option>
						<option value="60">60 kg</option>
						<option value="61">61 kg</option>
						<option value="62">62 kg</option>
						<option value="63">63 kg</option>
						<option value="64">64 kg</option>
						<option value="65">65 kg</option>
						<option value="66">66 kg</option>
						<option value="67">67 kg</option>
						<option value="68">68 kg</option>
						<option value="69">69 kg</option>
						<option value="70">70 kg</option>
						<option value="71">71 kg</option>
						<option value="72">72 kg</option>
						<option value="73">73 kg</option>
					</select>
				</div>
				<div class="col2 selected-contact-small">
					<label for="contact-girl-height"><?php _e('Height', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<select id="select-height" name="height">
						<option value="">&lt;none&gt;</option>
						<option value="157">157 cm</option>
						<option value="158">158 cm</option>
						<option value="159">159 cm</option>
						<option value="160">160 cm</option>
						<option value="161">161 cm</option>
						<option value="162">162 cm</option>
						<option value="163">163 cm</option>
						<option value="164">164 cm</option>
						<option value="165">165 cm</option>
						<option value="166">166 cm</option>
						<option value="167">167 cm</option>
						<option value="168">168 cm</option>
						<option value="169">169 cm</option>
						<option value="170">170 cm</option>
						<option value="171">171 cm</option>
						<option value="172">172 cm</option>
						<option value="173">173 cm</option>
						<option value="174">174 cm</option>
						<option value="175">175 cm</option>
						<option value="176">176 cm</option>
						<option value="177">177 cm</option>
						<option value="178">178 cm</option>
						<option value="179">179 cm</option>
						<option value="180">180 cm</option>
						<option value="181">181 cm</option>
					</select>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-hair"><?php _e('Hair', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<select name="hair-color">
						<option value="">&lt;none&gt;</option>
						<option value="Black">Black</option>
						<option value="Blonde">Blonde</option>
						<option value="Brown">Brown</option>
						<option value="Light brown">Light brown</option>
						<option value="Red">Red</option>
					</select>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-eyes"><?php _e('Eyes', 'bemygirl'); ?> <span class="form-required">*</span></label>
					<select name="eye-color">
						<option value="">&lt;none&gt;</option>
						<option value="Dark Brown">Dark Brown</option>
						<option value="Grey">Grey</option>
						<option value="Hazel">Hazel</option>
						<option value="Blue">Blue</option>
						<option value="Green">Green</option>
					</select>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-shoe-size"><?php _e('Shoe size', 'bemygirl'); ?></label>

					<select name="shoe-size">
						<option value="">&lt;none&gt;</option>
						<option value="35">35</option>
						<option value="36">36</option>
						<option value="37">37</option>
						<option value="38">38</option>
						<option value="39">39</option>
						<option value="40">40</option>
					</select>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-breast-size"><?php _e('Breast size ', 'bemygirl'); ?> <span class="form-required">*</span></label>

					<select name="breast-size">
						<option value="">&lt;none&gt;</option>
						<option value="Small">Small</option>
						<option value="Medium">Medium</option>
						<option value="Large">Large</option>
					</select>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-pubic-hair"><?php _e('Pubic Hair ', 'bemygirl'); ?> <span class="form-required">*</span></label>

					<select name="pubic-hair">
						<option value="">&lt;none&gt;</option>
						<option value="Shaved">Shaved</option>
						<option value="Trimmed">Trimmed</option>
						<option value="Hairy">Hairy</option>
					</select>
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-languages"><?php _e('Languages', 'bemygirl'); ?></label>

					<select id="languages" name="languages">
						<option value="">&lt;none&gt;</option>
						<option value="Arabian">Arabian</option>
						<option value="Chinese">Chinese</option>
						<option value="English">English</option>
						<option value="French">French</option>
						<option value="German">German</option>
						<option value="Hungarian">Hungarian</option>
						<option value="Italian">Italian</option>
						<option value="Japanese">Japanese</option>
						<option value="Portuguese">Portuguese</option>
						<option value="Russian">Russian</option>
						<option value="Spanish">Spanish</option>
					</select>
					<div id="bt-select-languages"></div>
				</div>
				<div class="col1 coloca-language">
					<!-- aqui se colocan los lenguages -->
				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-blocked-countries "><?php _e('Blocked Countries ', 'bemygirl'); ?></label>

					<select id="countries" name="countries">
						<option value="">&lt;none&gt;</option>
						<option value="Afghanistan" class="has-no-children">Afghanistan
						<option value="Åland Islands" class="has-no-children">Åland Islands
						<option value="Albania" class="has-no-children">Albania
						<option value="Algeria" class="has-no-children">Algeria
						<option value="American Samoa" class="has-no-children">American Samoa
						<option value="Andorra" class="has-no-children">Andorra
						<option value="Angola" class="has-no-children">Angola
						<option value="Anguilla" class="has-no-children">Anguilla
						<option value="Antarctica" class="has-no-children">Antarctica
						<option value="Antigua and Barbuda" class="has-no-children">Antigua and Barbuda
						<option value="Argentina" class="has-no-children">Argentina
						<option value="Armenia" class="has-no-children">Armenia
						<option value="Aruba" class="has-no-children">Aruba
						<option value="Australia" class="has-no-children">Australia
						<option value="Austria" class="has-no-children">Austria
						<option value="Azerbaijan" class="has-no-children">Azerbaijan
						<option value="Bahamas" class="has-no-children">Bahamas
						<option value="Bahrain" class="has-no-children">Bahrain
						<option value="Bangladesh" class="has-no-children">Bangladesh
						<option value="Barbados" class="has-no-children">Barbados
						<option value="Belarus" class="has-no-children">Belarus
						<option value="Belgium" class="has-no-children">Belgium
						<option value="Belize" class="has-no-children">Belize
						<option value="Benin" class="has-no-children">Benin
						<option value="Bermuda" class="has-no-children">Bermuda
						<option value="Bhutan" class="has-no-children">Bhutan
						<option value="Bolivia" class="has-no-children">Bolivia
						<option value="Bonaire Sint Eustatius and Saba" class="has-no-children">Bonaire Sint Eustatius and Saba
						<option value="Bosnia and Herzegovina" class="has-no-children">Bosnia and Herzegovina
						<option value="Botswana" class="has-no-children">Botswana
						<option value="Bouvet Island" class="has-no-children">Bouvet Island
						<option value="Brazil" class="has-no-children">Brazil
						<option value="British Indian Ocean Territory" class="has-no-children">British Indian Ocean Territory
						<option value="British Virgin Islands" class="has-no-children">British Virgin Islands
						<option value="Brunei Darussalam" class="has-no-children">Brunei Darussalam
						<option value="Bulgaria" class="has-no-children">Bulgaria
						<option value="Burkina Faso" class="has-no-children">Burkina Faso
						<option value="Burundi" class="has-no-children">Burundi
						<option value="Cambodia" class="has-no-children">Cambodia
						<option value="Cameroon" class="has-no-children">Cameroon
						<option value="Canada" class="has-no-children">Canada
						<option value="Cape Verde" class="has-no-children">Cape Verde
						<option value="Cayman Islands" class="has-no-children">Cayman Islands
						<option value="Central African Republic" class="has-no-children">Central African Republic
						<option value="Chad" class="has-no-children">Chad
						<option value="Chile" class="has-no-children">Chile
						<option value="China" class="has-no-children">China
						<option value="Christmas Island" class="has-no-children">Christmas Island
						<option value="Cocos (Keeling) Islands" class="has-no-children">Cocos (Keeling) Islands
						<option value="Colombia" class="has-no-children">Colombia
						<option value="Comoros" class="has-no-children">Comoros
						<option value="Congo" class="has-no-children">Congo
						<option value="Cook Islands" class="has-no-children">Cook Islands
						<option value="Costa Rica" class="has-no-children">Costa Rica
						<option value="Côte D'ivoire" class="has-no-children">Côte D'ivoire
						<option value="Croatia" class="has-no-children">Croatia
						<option value="Cuba" class="has-no-children">Cuba
						<option value="Curaçao" class="has-no-children">Curaçao
						<option value="Cyprus" class="has-no-children">Cyprus
						<option value="Czech Republic" class="has-no-children">Czech Republic
						<option value="Democratic People's Republic of Korea" class="has-no-children">Democratic People's Republic of Korea
						<option value="Democratic Republic of the Congo" class="has-no-children">Democratic Republic of the Congo
						<option value="Denmark" class="has-no-children">Denmark
						<option value="Djibouti" class="has-no-children">Djibouti
						<option value="Dominica" class="has-no-children">Dominica
						<option value="Dominican Republic" class="has-no-children">Dominican Republic
						<option value="Ecuador" class="has-no-children">Ecuador
						<option value="Egypt" class="has-no-children">Egypt
						<option value="El Salvador" class="has-no-children">El Salvador
						<option value="Equatorial Guinea" class="has-no-children">Equatorial Guinea
						<option value="Eritrea" class="has-no-children">Eritrea
						<option value="Estonia" class="has-no-children">Estonia
						<option value="Ethiopia" class="has-no-children">Ethiopia
						<option value="Falkland Islands (Malvinas)" class="has-no-children">Falkland Islands (Malvinas)
						<option value="Faroe Islands" class="has-no-children">Faroe Islands
						<option value="Fiji" class="has-no-children">Fiji
						<option value="Finland" class="has-no-children">Finland
						<option value="France" class="has-no-children">France
						<option value="French Guiana" class="has-no-children">French Guiana
						<option value="French Polynesia" class="has-no-children">French Polynesia
						<option value="French Southern Territories" class="has-no-children">French Southern Territories
						<option value="Gabon" class="has-no-children">Gabon
						<option value="Gambia" class="has-no-children">Gambia
						<option value="Georgia" class="has-no-children">Georgia
						<option value="Germany" class="has-no-children">Germany
						<option value="Ghana" class="has-no-children">Ghana
						<option value="Gibraltar" class="has-no-children">Gibraltar
						<option value="Greece" class="has-no-children">Greece
						<option value="Greenland" class="has-no-children">Greenland
						<option value="Grenada" class="has-no-children">Grenada
						<option value="Guadeloupe" class="has-no-children">Guadeloupe
						<option value="Guam" class="has-no-children">Guam
						<option value="Guatemala" class="has-no-children">Guatemala
						<option value="Guernsey" class="has-no-children">Guernsey
						<option value="Guinea" class="has-no-children">Guinea
						<option value="Guinea-Bissau" class="has-no-children">Guinea-Bissau
						<option value="Guyana" class="has-no-children">Guyana
						<option value="Haiti" class="has-no-children">Haiti
						<option value="Heard Island and Mcdonald Islands" class="has-no-children">Heard Island and Mcdonald Islands
						<option value="Holy See (Vatican City State)" class="has-no-children">Holy See (Vatican City State)
						<option value="Honduras" class="has-no-children">Honduras
						<option value="Hong Kong" class="has-no-children">Hong Kong
						<option value="Hungary" class="has-no-children">Hungary
						<option value="Iceland" class="has-no-children">Iceland
						<option value="India" class="has-no-children">India
						<option value="Indonesia" class="has-no-children">Indonesia
						<option value="Iraq" class="has-no-children">Iraq
						<option value="Ireland" class="has-no-children">Ireland
						<option value="Islamic Republic of Iran" class="has-no-children">Islamic Republic of Iran
						<option value="Isle of Man" class="has-no-children">Isle of Man
						<option value="Israel" class="has-no-children">Israel
						<option value="Italy" class="has-no-children">Italy
						<option value="Jamaica" class="has-no-children">Jamaica
						<option value="Japan" class="has-no-children">Japan
						<option value="Jersey" class="has-no-children">Jersey
						<option value="Jordan" class="has-no-children">Jordan
						<option value="Kazakhstan" class="has-no-children">Kazakhstan
						<option value="Kenya" class="has-no-children">Kenya
						<option value="Kiribati" class="has-no-children">Kiribati
						<option value="Kuwait" class="has-no-children">Kuwait
						<option value="Kyrgyzstan" class="has-no-children">Kyrgyzstan
						<option value="Lao People's Democratic Republic" class="has-no-children">Lao People's Democratic Republic
						<option value="Latvia" class="has-no-children">Latvia
						<option value="Lebanon" class="has-no-children">Lebanon
						<option value="Lesotho" class="has-no-children">Lesotho
						<option value="Liberia" class="has-no-children">Liberia
						<option value="Libya" class="has-no-children">Libya
						<option value="Liechtenstein" class="has-no-children">Liechtenstein
						<option value="Lithuania" class="has-no-children">Lithuania
						<option value="Luxembourg" class="has-no-children">Luxembourg
						<option value="Macao" class="has-no-children">Macao
						<option value="Macedonia" class="has-no-children">Macedonia
						<option value="Madagascar" class="has-no-children">Madagascar
						<option value="Malawi" class="has-no-children">Malawi
						<option value="Malaysia" class="has-no-children">Malaysia
						<option value="Maldives" class="has-no-children">Maldives
						<option value="Mali" class="has-no-children">Mali
						<option value="Malta" class="has-no-children">Malta
						<option value="Marshall Islands" class="has-no-children">Marshall Islands
						<option value="Martinique" class="has-no-children">Martinique
						<option value="Mauritania" class="has-no-children">Mauritania
						<option value="Mauritius" class="has-no-children">Mauritius
						<option value="Mayotte" class="has-no-children">Mayotte
						<option value="Mexico" class="has-no-children">Mexico
						<option value="Micronesia" class="has-no-children">Micronesia
						<option value="Moldova" class="has-no-children">Moldova
						<option value="Monaco" class="has-no-children">Monaco
						<option value="Mongolia" class="has-no-children">Mongolia
						<option value="Montenegro" class="has-no-children">Montenegro
						<option value="Montserrat" class="has-no-children">Montserrat
						<option value="Morocco" class="has-no-children">Morocco
						<option value="Mozambique" class="has-no-children">Mozambique
						<option value="Myanmar" class="has-no-children">Myanmar
						<option value="Namibia" class="has-no-children">Namibia
						<option value="Nauru" class="has-no-children">Nauru
						<option value="Nepal" class="has-no-children">Nepal
						<option value="Netherlands" class="has-no-children">Netherlands
						<option value="New Caledonia" class="has-no-children">New Caledonia
						<option value="New Zealand" class="has-no-children">New Zealand
						<option value="Nicaragua" class="has-no-children">Nicaragua
						<option value="Niger" class="has-no-children">Niger
						<option value="Nigeria" class="has-no-children">Nigeria
						<option value="Niue" class="has-no-children">Niue
						<option value="Norfolk Island" class="has-no-children">Norfolk Island
						<option value="Northern Mariana Islands" class="has-no-children">Northern Mariana Islands
						<option value="Norway" class="has-no-children">Norway
						<option value="Oman" class="has-no-children">Oman
						<option value="Pakistan" class="has-no-children">Pakistan
						<option value="Palau" class="has-no-children">Palau
						<option value="Palestinian Territory" class="has-no-children">Palestinian Territory
						<option value="Panama" class="has-no-children">Panama
						<option value="Papua New Guinea" class="has-no-children">Papua New Guinea
						<option value="Paraguay" class="has-no-children">Paraguay
						<option value="Peru" class="has-no-children">Peru
						<option value="Philippines" class="has-no-children">Philippines
						<option value="Pitcairn" class="has-no-children">Pitcairn
						<option value="Poland" class="has-no-children">Poland
						<option value="Portugal" class="has-no-children">Portugal
						<option value="Puerto Rico" class="has-no-children">Puerto Rico
						<option value="Qatar" class="has-no-children">Qatar
						<option value="Republic of Korea" class="has-no-children">Republic of Korea
						<option value="Réunion" class="has-no-children">Réunion
						<option value="Romania" class="has-no-children">Romania
						<option value="Russian Federation" class="has-no-children">Russian Federation
						<option value="Rwanda" class="has-no-children">Rwanda
						<option value="Saint Barthélemy" class="has-no-children">Saint Barthélemy
						<option value="Saint Helena Ascension and Tristan Da Cunha" class="has-no-children">Saint Helena Ascension and Tristan Da Cunha
						<option value="Saint Kitts and Nevis" class="has-no-children">Saint Kitts and Nevis
						<option value="Saint Lucia" class="has-no-children">Saint Lucia
						<option value="Saint Martin (French Part)" class="has-no-children">Saint Martin (French Part)
						<option value="Saint Pierre and Miquelon" class="has-no-children">Saint Pierre and Miquelon
						<option value="Saint Vincent and the Grenadines" class="has-no-children">Saint Vincent and the Grenadines
						<option value="Samoa" class="has-no-children">Samoa
						<option value="San Marino" class="has-no-children">San Marino
						<option value="Sao Tome and Principe" class="has-no-children">Sao Tome and Principe
						<option value="Saudi Arabia" class="has-no-children">Saudi Arabia
						<option value="Senegal" class="has-no-children">Senegal
						<option value="Serbia" class="has-no-children">Serbia
						<option value="Seychelles" class="has-no-children">Seychelles
						<option value="Sierra Leone" class="has-no-children">Sierra Leone
						<option value="Singapore" class="has-no-children">Singapore
						<option value="Sint Maarten (Dutch Part)" class="has-no-children">Sint Maarten (Dutch Part)
						<option value="Slovakia" class="has-no-children">Slovakia
						<option value="Slovenia" class="has-no-children">Slovenia
						<option value="Solomon Islands" class="has-no-children">Solomon Islands
						<option value="Somalia" class="has-no-children">Somalia
						<option value="South Africa" class="has-no-children">South Africa
						<option value="South Georgia and the South Sandwich Islands" class="has-no-children">South Georgia and the South Sandwich Islands
						<option value="South Sudan" class="has-no-children">South Sudan
						<option value="Spain" class="has-no-children">Spain
						<option value="Sri Lanka" class="has-no-children">Sri Lanka
						<option value="Sudan" class="has-no-children">Sudan
						<option value="Suriname" class="has-no-children">Suriname
						<option value="Svalbard and Jan Mayen" class="has-no-children">Svalbard and Jan Mayen
						<option value="Swaziland" class="has-no-children">Swaziland
						<option value="Sweden" class="has-no-children">Sweden
						<option value="Switzerland" class="has-no-children">Switzerland
						<option value="Syrian Arab Republic" class="has-no-children">Syrian Arab Republic
						<option value="Taiwan" class="has-no-children">Taiwan
						<option value="Tajikistan" class="has-no-children">Tajikistan
						<option value="Tanzania" class="has-no-children">Tanzania
						<option value="Thailand" class="has-no-children">Thailand
						<option value="Timor-Leste" class="has-no-children">Timor-Leste
						<option value="Togo" class="has-no-children">Togo
						<option value="Tokelau" class="has-no-children">Tokelau
						<option value="Tonga" class="has-no-children">Tonga
						<option value="Trinidad and Tobago" class="has-no-children">Trinidad and Tobago
						<option value="Tunisia" class="has-no-children">Tunisia
						<option value="Turkey" class="has-no-children">Turkey
						<option value="Turkmenistan" class="has-no-children">Turkmenistan
						<option value="Turks and Caicos Islands" class="has-no-children">Turks and Caicos Islands
						<option value="Tuvalu" class="has-no-children">Tuvalu
						<option value="U.S. Virgin Islands" class="has-no-children">U.S. Virgin Islands
						<option value="Uganda" class="has-no-children">Uganda
						<option value="Ukraine" class="has-no-children">Ukraine
						<option value="United Arab Emirates" class="has-no-children">United Arab Emirates
						<option value="United Kingdom" class="has-no-children">United Kingdom
						<option value="United States" class="has-no-children">United States
						<option value="United States Minor Outlying Islands" class="has-no-children">United States Minor Outlying Islands
						<option value="Uruguay" class="has-no-children">Uruguay
						<option value="Uzbekistan" class="has-no-children">Uzbekistan
						<option value="Vanuatu" class="has-no-children">Vanuatu
						<option value="Venezuela" class="has-no-children">Venezuela
						<option value="Viet Nam" class="has-no-children">Viet Nam
						<option value="Wallis and Futuna" class="has-no-children">Wallis and Futuna
						<option value="Western Sahara" class="has-no-children">Western Sahara
						<option value="Yemen" class="has-no-children">Yemen
						<option value="Zambia" class="has-no-children">Zambia
						<option value="Zimbabwe" class="has-no-children">Zimbabwe
					</select>
					<div id="bt-select-countries"></div>
				</div>
				<div class="col1 coloca-countries">
					<!-- aqui se colocan los countries -->
				</div>

				<input type="submit" name="op" value="Save" class="form-submit-contact-girl" >
			 </form>
		</div>

	</div><!-- end main -->