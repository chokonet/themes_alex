	<div class="main_fq border_fq" id="edit-profile">

		<?php get_template_part( 'templates/user-edit/profile', 'girl' ) ?><!-- profile girl -->

		<div id="plecasup">
			<span><?php _e('Profile', 'bemygirl'); ?> </span>
		</div>
		<div class="register">
			<form id="form-girlProfile-edit" class="forms-admin">
 				<div class="col2 selected-contact">
					<label for="contact-girl-nationality"><?php _e('Nationality', 'bemygirl'); ?> <span class="form-required">*</span></label>

                    <select>
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
						<option value="Spanish" selected="selected">Spanish</option>
						<option value="Swiss">Swiss</option>
						<option value="Thai">Thai</option>
						<option value="Venezuelan">Venezuelan</option>

					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-ethnicity"><?php _e('Ethnicity', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <select>
                    	<option value="Asian">Asian</option>
                    	<option value="Black">Black</option>
                    	<option value="Caucassian" selected="selected">Caucasian</option>
                    	<option value="Indian">Indian</option>
                    	<option value="Latin">Latin</option>
                    	<option value="Middle East">Middle East</option>
                    	<option value="Mixed">Mixed</option>
					</select>
 				</div>
 				<div class="col1">
					<label for="contact-girl-service-for "><?php _e('Service for ', 'bemygirl'); ?>  <span class="form-required">*</span> </label>
					<input type="checkbox" name="men" value="" id="men">
					<label for="men" class="withheld"><?php _e('Men', 'bemygirl'); ?></label>
					<input type="checkbox" name="women" value="" id="women">
					<label for="women" class="withheld"><?php _e('Women', 'bemygirl'); ?></label>
					<input type="checkbox" name="mas2" value="" id="mas2">
					<label for="mas2" class="withheld"><?php _e('+2', 'bemygirl'); ?></label>
					<input type="checkbox" name="couples" value="" id="couples">
					<label for="couples" class="withheld"><?php _e('Couples', 'bemygirl'); ?></label>
				</div>
				<div class="col2 selected-contact-small">
					<label for="contact-girl-age"><?php _e('Age', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <select id="chico">
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20" selected="selected">20</option>
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
                    <select id="chico">
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
						<option value="68" selected="selected">68 kg</option>
						<option value="69">69 kg</option>
						<option value="70">70 kg</option>
						<option value="71">71 kg</option>
						<option value="72">72 kg</option>
						<option value="73">73 kg</option>
					</select>
 				</div>
 				<div class="col2 selected-contact-small">
					<label for="contact-girl-height"><?php _e('Height', 'bemygirl'); ?> <span class="form-required">*</span></label>
                    <select id="chico">
						<option value="_none">- Select a value -</option>
						<option value="157">157</option>
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
						<option value="175" selected="selected">175 cm</option>
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
                    <select>
						<option value="Black">Black</option>
						<option value="Blonde">Blonde</option>
						<option value="Brown" selected="selected">Brown</option>
						<option value="Light brown">Light brown</option>
						<option value="Red">Red</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-eyes"><?php _e('Eyes', 'bemygirl'); ?> <span class="form-required">*</span></label>

                    <select>
						<option value="Dark Brown" selected="selected">Dark Brown</option>
						<option value="Grey">Grey</option>
						<option value="Hazel">Hazel</option>
						<option value="Blue">Blue</option>
						<option value="Green">Green</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-shoe-size"><?php _e('Shoe size', 'bemygirl'); ?></label>

                    <select>
						<option value="_none">- Select a value -</option>
						<option value="35">35</option>
						<option value="36">36</option>
						<option value="37">37</option>
						<option value="38">38</option>
						<option value="39">39</option>
						<option value="40" selected="selected">40</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-breast-size "><?php _e('Breast size ', 'bemygirl'); ?> <span class="form-required">*</span></label>

                    <select>
						<option value="Small">Small</option>
						<option value="Medium">Medium</option>
						<option value="Large" selected="selected">Large</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-pubic-hair  "><?php _e('Pubic Hair ', 'bemygirl'); ?> <span class="form-required">*</span></label>

                    <select>
						<option value="Shaved" selected="selected">Shaved</option>
						<option value="Trimmed">Trimmed</option>
						<option value="Hairy">Hairy</option>
					</select>
 				</div>
 				<div class="col2 selected-contact">
					<label for="contact-girl-languages"><?php _e('Languages', 'bemygirl'); ?></label>

                    <select id="languages">
						<option value="none" class="">&lt;none&gt;</option>
						<option value="23">Arabian</option>
						<option value="24">Chinese</option>
						<option value="17">English</option>
						<option value="16">French</option>
						<option value="18">German</option>
						<option value="551">Hungarian</option>
						<option value="19">Italian</option>
						<option value="25">Japanese</option>
						<option value="20">Portuguese</option>
						<option value="22">Russian</option>
						<option value="21">Spanish</option>
					</select>
					<div id="bt-select-languages"></div>
 				</div>
 				<div class="col1 coloca-language">
					<!-- aqui se colocan los lenguages -->
 				</div>
				<div class="col2 selected-contact">
					<label for="contact-girl-blocked-countries "><?php _e('Blocked Countries ', 'bemygirl'); ?></label>

                    <select id="countries">
						<option value="none" class="">&lt;none&gt;</option>
						<option value="302" class="has-no-children">Afghanistan</option>
						<option value="303" class="has-no-children">Åland Islands</option>
						<option value="304" class="has-no-children">Albania</option>
						<option value="305" class="has-no-children">Algeria</option>
						<option value="306" class="has-no-children">American Samoa</option>
						<option value="307" class="has-no-children">Andorra</option>
						<option value="308" class="has-no-children">Angola</option>
						<option value="309" class="has-no-children">Anguilla</option>
						<option value="310" class="has-no-children">Antarctica</option>
						<option value="311" class="has-no-children">Antigua and Barbuda</option>
						<option value="312" class="has-no-children">Argentina</option>
						<option value="313" class="has-no-children">Armenia</option>
						<option value="314" class="has-no-children">Aruba</option>
						<option value="315" class="has-no-children">Australia</option>
						<option value="316" class="has-no-children">Austria</option>
						<option value="317" class="has-no-children">Azerbaijan</option>
						<option value="318" class="has-no-children">Bahamas</option>
						<option value="319" class="has-no-children">Bahrain</option>
						<option value="320" class="has-no-children">Bangladesh</option>
						<option value="321" class="has-no-children">Barbados</option>
						<option value="322" class="has-no-children">Belarus</option>
						<option value="323" class="has-no-children">Belgium</option>
						<option value="324" class="has-no-children">Belize</option>
						<option value="325" class="has-no-children">Benin</option>
						<option value="326" class="has-no-children">Bermuda</option>
						<option value="327" class="has-no-children">Bhutan</option>
						<option value="328" class="has-no-children">Bolivia</option>
						<option value="329" class="has-no-children">Bonaire Sint Eustatius and Saba</option>
						<option value="330" class="has-no-children">Bosnia and Herzegovina</option>
						<option value="331" class="has-no-children">Botswana</option>
						<option value="332" class="has-no-children">Bouvet Island</option>
						<option value="333" class="has-no-children">Brazil</option>
						<option value="334" class="has-no-children">British Indian Ocean Territory</option>
						<option value="544" class="has-no-children">British Virgin Islands</option>
						<option value="335" class="has-no-children">Brunei Darussalam</option>
						<option value="336" class="has-no-children">Bulgaria</option>
						<option value="337" class="has-no-children">Burkina Faso</option>
						<option value="338" class="has-no-children">Burundi</option>
						<option value="339" class="has-no-children">Cambodia</option>
						<option value="340" class="has-no-children">Cameroon</option>
						<option value="341" class="has-no-children">Canada</option>
						<option value="342" class="has-no-children">Cape Verde</option>
						<option value="343" class="has-no-children">Cayman Islands</option>
						<option value="344" class="has-no-children">Central African Republic</option>
						<option value="345" class="has-no-children">Chad</option>
						<option value="346" class="has-no-children">Chile</option>
						<option value="347" class="has-no-children">China</option>
						<option value="348" class="has-no-children">Christmas Island</option>
						<option value="349" class="has-no-children">Cocos (Keeling) Islands</option>
						<option value="350" class="has-no-children">Colombia</option>
						<option value="351" class="has-no-children">Comoros</option>
						<option value="352" class="has-no-children">Congo</option>
						<option value="354" class="has-no-children">Cook Islands</option>
						<option value="355" class="has-no-children">Costa Rica</option>
						<option value="356" class="has-no-children">Côte D'ivoire</option>
						<option value="357" class="has-no-children">Croatia</option>
						<option value="358" class="has-no-children">Cuba</option>
						<option value="359" class="has-no-children">Curaçao</option>
						<option value="360" class="has-no-children">Cyprus</option>
						<option value="361" class="has-no-children">Czech Republic</option>
						<option value="419" class="has-no-children">Democratic People's Republic of Korea</option>
						<option value="353" class="has-no-children">Democratic Republic of the Congo</option>
						<option value="362" class="has-no-children">Denmark</option>
						<option value="363" class="has-no-children">Djibouti</option>
						<option value="364" class="has-no-children">Dominica</option>
						<option value="365" class="has-no-children">Dominican Republic</option>
						<option value="366" class="has-no-children">Ecuador</option>
						<option value="367" class="has-no-children">Egypt</option>
						<option value="368" class="has-no-children">El Salvador</option>
						<option value="369" class="has-no-children">Equatorial Guinea</option>
						<option value="370" class="has-no-children">Eritrea</option>
						<option value="371" class="has-no-children">Estonia</option>
						<option value="372" class="has-no-children">Ethiopia</option>
						<option value="373" class="has-no-children">Falkland Islands (Malvinas)</option>
						<option value="374" class="has-no-children">Faroe Islands</option>
						<option value="375" class="has-no-children">Fiji</option>
						<option value="376" class="has-no-children">Finland</option>
						<option value="377" class="has-no-children">France</option>
						<option value="378" class="has-no-children">French Guiana</option>
						<option value="379" class="has-no-children">French Polynesia</option>
						<option value="380" class="has-no-children">French Southern Territories</option>
						<option value="381" class="has-no-children">Gabon</option>
						<option value="382" class="has-no-children">Gambia</option>
						<option value="383" class="has-no-children">Georgia</option>
						<option value="384" class="has-no-children">Germany</option>
						<option value="385" class="has-no-children">Ghana</option>
						<option value="386" class="has-no-children">Gibraltar</option>
						<option value="387" class="has-no-children">Greece</option>
						<option value="388" class="has-no-children">Greenland</option>
						<option value="389" class="has-no-children">Grenada</option>
						<option value="390" class="has-no-children">Guadeloupe</option>
						<option value="391" class="has-no-children">Guam</option>
						<option value="392" class="has-no-children">Guatemala</option>
						<option value="393" class="has-no-children">Guernsey</option>
						<option value="394" class="has-no-children">Guinea</option>
						<option value="395" class="has-no-children">Guinea-Bissau</option>
						<option value="396" class="has-no-children">Guyana</option>
						<option value="397" class="has-no-children">Haiti</option>
						<option value="398" class="has-no-children">Heard Island and Mcdonald Islands</option>
						<option value="399" class="has-no-children">Holy See (Vatican City State)</option>
						<option value="400" class="has-no-children">Honduras</option>
						<option value="401" class="has-no-children">Hong Kong</option>
						<option value="402" class="has-no-children">Hungary</option>
						<option value="403" class="has-no-children">Iceland</option>
						<option value="404" class="has-no-children">India</option>
						<option value="405" class="has-no-children">Indonesia</option>
						<option value="407" class="has-no-children">Iraq</option>
						<option value="408" class="has-no-children">Ireland</option>
						<option value="406" class="has-no-children">Islamic Republic of Iran</option>
						<option value="409" class="has-no-children">Isle of Man</option>
						<option value="410" class="has-no-children">Israel</option>
						<option value="411" class="has-no-children">Italy</option>
						<option value="412" class="has-no-children">Jamaica</option>
						<option value="413" class="has-no-children">Japan</option>
						<option value="414" class="has-no-children">Jersey</option>
						<option value="415" class="has-no-children">Jordan</option>
						<option value="416" class="has-no-children">Kazakhstan</option>
						<option value="417" class="has-no-children">Kenya</option>
						<option value="418" class="has-no-children">Kiribati</option>
						<option value="421" class="has-no-children">Kuwait</option>
						<option value="422" class="has-no-children">Kyrgyzstan</option>
						<option value="423" class="has-no-children">Lao People's Democratic Republic</option>
						<option value="424" class="has-no-children">Latvia</option>
						<option value="425" class="has-no-children">Lebanon</option>
						<option value="426" class="has-no-children">Lesotho</option>
						<option value="427" class="has-no-children">Liberia</option>
						<option value="428" class="has-no-children">Libya</option>
						<option value="429" class="has-no-children">Liechtenstein</option>
						<option value="430" class="has-no-children">Lithuania</option>
						<option value="431" class="has-no-children">Luxembourg</option>
						<option value="432" class="has-no-children">Macao</option>
						<option value="433" class="has-no-children">Macedonia</option>
						<option value="434" class="has-no-children">Madagascar</option>
						<option value="435" class="has-no-children">Malawi</option>
						<option value="436" class="has-no-children">Malaysia</option>
						<option value="437" class="has-no-children">Maldives</option>
						<option value="438" class="has-no-children">Mali</option>
						<option value="439" class="has-no-children">Malta</option>
						<option value="440" class="has-no-children">Marshall Islands</option>
						<option value="441" class="has-no-children">Martinique</option>
						<option value="442" class="has-no-children">Mauritania</option>
						<option value="443" class="has-no-children">Mauritius</option>
						<option value="444" class="has-no-children">Mayotte</option>
						<option value="445" class="has-no-children">Mexico</option>
						<option value="446" class="has-no-children">Micronesia</option>
						<option value="447" class="has-no-children">Moldova</option>
						<option value="448" class="has-no-children">Monaco</option>
						<option value="449" class="has-no-children">Mongolia</option>
						<option value="450" class="has-no-children">Montenegro</option>
						<option value="451" class="has-no-children">Montserrat</option>
						<option value="452" class="has-no-children">Morocco</option>
						<option value="453" class="has-no-children">Mozambique</option>
						<option value="454" class="has-no-children">Myanmar</option>
						<option value="455" class="has-no-children">Namibia</option>
						<option value="456" class="has-no-children">Nauru</option>
						<option value="457" class="has-no-children">Nepal</option>
						<option value="458" class="has-no-children">Netherlands</option>
						<option value="459" class="has-no-children">New Caledonia</option>
						<option value="460" class="has-no-children">New Zealand</option>
						<option value="461" class="has-no-children">Nicaragua</option>
						<option value="462" class="has-no-children">Niger</option>
						<option value="463" class="has-no-children">Nigeria</option>
						<option value="464" class="has-no-children">Niue</option>
						<option value="465" class="has-no-children">Norfolk Island</option>
						<option value="466" class="has-no-children">Northern Mariana Islands</option>
						<option value="467" class="has-no-children">Norway</option>
						<option value="468" class="has-no-children">Oman</option>
						<option value="469" class="has-no-children">Pakistan</option>
						<option value="470" class="has-no-children">Palau</option>
						<option value="471" class="has-no-children">Palestinian Territory</option>
						<option value="472" class="has-no-children">Panama</option>
						<option value="473" class="has-no-children">Papua New Guinea</option>
						<option value="474" class="has-no-children">Paraguay</option>
						<option value="475" class="has-no-children">Peru</option>
						<option value="476" class="has-no-children">Philippines</option>
						<option value="477" class="has-no-children">Pitcairn</option>
						<option value="478" class="has-no-children">Poland</option>
						<option value="479" class="has-no-children">Portugal</option>
						<option value="480" class="has-no-children">Puerto Rico</option>
						<option value="481" class="has-no-children">Qatar</option>
						<option value="420" class="has-no-children">Republic of Korea</option>
						<option value="482" class="has-no-children">Réunion</option>
						<option value="483" class="has-no-children">Romania</option>
						<option value="484" class="has-no-children">Russian Federation</option>
						<option value="485" class="has-no-children">Rwanda</option>
						<option value="486" class="has-no-children">Saint Barthélemy</option>
						<option value="487" class="has-no-children">Saint Helena Ascension and Tristan Da Cunha</option>
						<option value="488" class="has-no-children">Saint Kitts and Nevis</option>
						<option value="489" class="has-no-children">Saint Lucia</option>
						<option value="490" class="has-no-children">Saint Martin (French Part)</option>
						<option value="491" class="has-no-children">Saint Pierre and Miquelon</option>
						<option value="492" class="has-no-children">Saint Vincent and the Grenadines</option>
						<option value="493" class="has-no-children">Samoa</option>
						<option value="494" class="has-no-children">San Marino</option>
						<option value="495" class="has-no-children">Sao Tome and Principe</option>
						<option value="496" class="has-no-children">Saudi Arabia</option>
						<option value="497" class="has-no-children">Senegal</option>
						<option value="498" class="has-no-children">Serbia</option>
						<option value="499" class="has-no-children">Seychelles</option>
						<option value="500" class="has-no-children">Sierra Leone</option>
						<option value="501" class="has-no-children">Singapore</option>
						<option value="502" class="has-no-children">Sint Maarten (Dutch Part)</option>
						<option value="503" class="has-no-children">Slovakia</option>
						<option value="504" class="has-no-children">Slovenia</option>
						<option value="505" class="has-no-children">Solomon Islands</option>
						<option value="506" class="has-no-children">Somalia</option>
						<option value="507" class="has-no-children">South Africa</option>
						<option value="508" class="has-no-children">South Georgia and the South Sandwich Islands</option>
						<option value="509" class="has-no-children">South Sudan</option>
						<option value="510" class="has-no-children">Spain</option>
						<option value="511" class="has-no-children">Sri Lanka</option>
						<option value="512" class="has-no-children">Sudan</option>
						<option value="513" class="has-no-children">Suriname</option>
						<option value="514" class="has-no-children">Svalbard and Jan Mayen</option>
						<option value="515" class="has-no-children">Swaziland</option>
						<option value="516" class="has-no-children">Sweden</option>
						<option value="517" class="has-no-children">Switzerland</option>
						<option value="518" class="has-no-children">Syrian Arab Republic</option>
						<option value="519" class="has-no-children">Taiwan</option>
						<option value="520" class="has-no-children">Tajikistan</option>
						<option value="521" class="has-no-children">Tanzania</option>
						<option value="522" class="has-no-children">Thailand</option>
						<option value="523" class="has-no-children">Timor-Leste</option>
						<option value="524" class="has-no-children">Togo</option>
						<option value="525" class="has-no-children">Tokelau</option>
						<option value="526" class="has-no-children">Tonga</option>
						<option value="527" class="has-no-children">Trinidad and Tobago</option>
						<option value="528" class="has-no-children">Tunisia</option>
						<option value="529" class="has-no-children">Turkey</option>
						<option value="530" class="has-no-children">Turkmenistan</option>
						<option value="531" class="has-no-children">Turks and Caicos Islands</option>
						<option value="532" class="has-no-children">Tuvalu</option>
						<option value="545" class="has-no-children">U.S. Virgin Islands</option>
						<option value="533" class="has-no-children">Uganda</option>
						<option value="534" class="has-no-children">Ukraine</option>
						<option value="535" class="has-no-children">United Arab Emirates</option>
						<option value="536" class="has-no-children">United Kingdom</option>
						<option value="537" class="has-no-children">United States</option>
						<option value="538" class="has-no-children">United States Minor Outlying Islands</option>
						<option value="539" class="has-no-children">Uruguay</option>
						<option value="540" class="has-no-children">Uzbekistan</option>
						<option value="541" class="has-no-children">Vanuatu</option>
						<option value="542" class="has-no-children">Venezuela</option>
						<option value="543" class="has-no-children">Viet Nam</option>
						<option value="546" class="has-no-children">Wallis and Futuna</option>
						<option value="547" class="has-no-children">Western Sahara</option>
						<option value="548" class="has-no-children">Yemen</option>
						<option value="549" class="has-no-children">Zambia</option>
						<option value="550" class="has-no-children">Zimbabwe</option>
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