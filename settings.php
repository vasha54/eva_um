<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * settings.php
 *
 * This is built using the boost template to allow for new theme's using
 * Moodle's new Boost theme engine
 *
 * @package     theme_eva_um
 * @copyright   2015 LMSACE Dev Team, lmsace.com
 * @author      LMSACE Dev Team
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

$settings = null;

if (is_siteadmin()) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingeva_um', get_string('configtitle', 'theme_eva_um'));
    $ADMIN->add('themes', new admin_category('theme_eva_um', 'eva_um'));

    /* General Settings */
    $temp = new admin_settingpage('theme_eva_um_general', get_string('themegeneralsettings', 'theme_eva_um'));

    // Logo file setting.
    $name = 'theme_eva_um/logo';
    $title = get_string('logo', 'theme_eva_um');
    $description = get_string('logodesc', 'theme_eva_um');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_eva_um/customcss';
    $title = get_string('customcss', 'theme_eva_um');
    $description = get_string('customcssdesc', 'theme_eva_um');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Color schemes.
    $colorscheme = get_string('colorscheme', 'theme_eva_um');
    $defaultcolor = get_string('default_color', 'theme_eva_um');
    $colorhdr = get_string('color_schemes_heading', 'theme_eva_um');

    // Theme Color scheme chooser.
    $name = 'theme_eva_um/patternselect';
    $title = get_string('patternselect', 'theme_eva_um');
    $description = get_string('patternselectdesc', 'theme_eva_um');
    $default = '1';
    $choices = array(
        '1' => get_string('color_1', 'theme_eva_um'),
        '2' => get_string('color_2', 'theme_eva_um'),
        '3' => get_string('color_3', 'theme_eva_um'),
        '4' => get_string('color_4', 'theme_eva_um'),
        '5' => get_string('color_5', 'theme_eva_um'),
        '6' => get_string('color_6', 'theme_eva_um'),
        '7' => get_string('color_7', 'theme_eva_um'),
        '8' => get_string('color_8', 'theme_eva_um'),
        '9' => get_string('color_9', 'theme_eva_um'),
        '10' => get_string('color_10', 'theme_eva_um'),
        '11' => get_string('color_11', 'theme_eva_um'),
        '12' => get_string('color_12', 'theme_eva_um'),
        '13' => get_string('color_13', 'theme_eva_um'),
        '14' => get_string('color_14', 'theme_eva_um'),
        '15' => get_string('color_15', 'theme_eva_um'),
        '16' => get_string('color_16', 'theme_eva_um'),
        '17' => get_string('color_17', 'theme_eva_um'),
        '18' => get_string('color_18', 'theme_eva_um'),
        '19' => get_string('color_19', 'theme_eva_um'),
        '20' => get_string('color_20', 'theme_eva_um'),
        '21' => get_string('color_21', 'theme_eva_um'),
        '22' => get_string('color_22', 'theme_eva_um'),
        '23' => get_string('color_23', 'theme_eva_um'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Theme Color scheme static content.
    $pimg = array();
    global $CFG;
    $cp = $CFG->wwwroot.'/theme/eva_um/pix/color/';
    $pimg = array(
             
            $cp.'colorscheme-1.jpg', 
            $cp.'colorscheme-2.jpg',
            $cp.'colorscheme-3.jpg' , 
            $cp.'colorscheme-4.jpg',
            $cp.'colorscheme-5.jpg', 
            $cp.'colorscheme-6.jpg',
            $cp.'colorscheme-7.jpg' , 
            $cp.'colorscheme-8.jpg',
            $cp.'colorscheme-9.jpg', 
            $cp.'colorscheme-10.jpg',
            $cp.'colorscheme-11.jpg' , 
            $cp.'colorscheme-12.jpg',
            $cp.'colorscheme-13.jpg', 
            $cp.'colorscheme-14.jpg',
            $cp.'colorscheme-15.jpg' , 
            $cp.'colorscheme-16.jpg',
            $cp.'colorscheme-17.jpg', 
            $cp.'colorscheme-18.jpg',
            $cp.'colorscheme-19.jpg' , 
            $cp.'colorscheme-20.jpg',
            $cp.'colorscheme-21.jpg', 
            $cp.'colorscheme-22.jpg',
    );

    $themepattern ='<ul class="thumbnails theme-color-schemes">';

    for($i = 1;$i<=count($pimg);$i++){
        $themepattern = $themepattern.'<li class=""> <div class="thumbnail"><img src="'.$pimg[$i-1].
            '" alt="default" width="100" height="100"/><h6>'.get_string( "color_".$i, 'theme_eva_um' )
            .'</h6></div></li>';
    }

    $themepattern = $themepattern.'</ul>';

    $temp->add(new admin_setting_heading('theme_eva_um_patternheading', '', $themepattern));

    // Promoted Courses Start.
    // Promoted Courses Heading.
    $name = 'theme_eva_um_promotedcoursesheading';
    $heading = get_string('promotedcoursesheading', 'theme_eva_um');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Enable / Disable Promoted Courses.
    $name = 'theme_eva_um/pcourseenable';
    $title = get_string('pcourseenable', 'theme_eva_um');
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Promoted courses Block title.
    $name = 'theme_eva_um/promotedtitle';
    $title = get_string('pcourses', 'theme_eva_um').' '.get_string('title', 'theme_eva_um');
    $description = get_string('promotedtitledesc', 'theme_eva_um');
    $default = 'lang:promotedtitledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/promotedcourses';
    $title = get_string('pcourses', 'theme_eva_um');
    $description = get_string('pcoursesdesc', 'theme_eva_um');
    $default = array();

    $courses[0] = '';
    $cnt = 0;
    if ($ccc = get_courses('all', 'c.sortorder ASC', 'c.id,c.shortname,c.visible,c.category')) {
        foreach ($ccc as $cc) {
            if ($cc->visible == "0" || $cc->id == "1") {
                continue;
            }
            $cnt++;
            $courses[$cc->id] = $cc->shortname;
            // Set some courses for default option.
            if ($cnt < 8) {
                $default[] = $cc->id;
            }
        }
    }
    $coursedefault = implode(",", $default);
    $setting = new admin_setting_configtextarea($name, $title, $description, $coursedefault);
    $temp->add($setting);
    $settings->add($temp);
    // Promoted Courses End.

    /*Slideshow Settings Start.*/
    $temp = new admin_settingpage('theme_eva_um_slideshow', get_string('slideshowheading', 'theme_eva_um'));
    $temp->add(new admin_setting_heading('theme_eva_um_slideshow', get_string('slideshowheadingsub', 'theme_eva_um'),
    format_text(get_string('slideshowdesc', 'theme_eva_um'), FORMAT_MARKDOWN)));

    // Display Slideshow.
    $name = 'theme_eva_um/toggleslideshow';
    $title = get_string('toggleslideshow', 'theme_eva_um');
    $description = get_string('toggleslideshowdesc', 'theme_eva_um');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);

    // Number of slides.
    $name = 'theme_eva_um/numberofslides';
    $title = get_string('numberofslides', 'theme_eva_um');
    $description = get_string('numberofslides_desc', 'theme_eva_um');
    $default = 1;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    $numberofslides = get_config('theme_eva_um', 'numberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {

        // This is the descriptor for Slide One.
        $name = 'theme_eva_um/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_eva_um', array('slide' => $i));
        $information = get_string('slidenodesc', 'theme_eva_um', array('slide' => $i));
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);

        // Slide Image.
        $name = 'theme_eva_um/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_eva_um');
        $description = get_string('slideimagedesc', 'theme_eva_um');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Caption.
        $name = 'theme_eva_um/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_eva_um');
        $description = get_string('slidecaptiondesc', 'theme_eva_um');
        $default = 'lang:slidecaptiondefault';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slider button.
        $name = 'theme_eva_um/slide' . $i . 'urltext';
        $title = get_string('slidebutton', 'theme_eva_um');
        $description = get_string('slidebuttondesc', 'theme_eva_um');
        $default = 'lang:knowmore';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slide button link.
        $name = 'theme_eva_um/slide'.$i.'url';
        $title = get_string('slidebuttonurl', 'theme_eva_um');
        $description = get_string('slidebuttonurldesc', 'theme_eva_um');
        $default = 'http://www.example.com/';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $temp->add($setting);
    }
        $settings->add($temp);
    /* Slideshow Settings End*/

    /* Marketing Spots */
    $temp = new admin_settingpage('theme_eva_um_marketingspots', get_string('marketingspotsheading', 'theme_eva_um'));

    /* Marketing Spot 1*/
    $name = 'theme_eva_um_mspot1heading';
    $heading = get_string('marketingspot', 'theme_eva_um').' 1 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Marketing Spot 1 Icon.
    $name = 'theme_eva_um/mspot1icon';
    $title = get_string('marketingspot', 'theme_eva_um').' 1 - '.get_string('icon', 'theme_eva_um');
    $description = get_string('faicondesc', 'theme_eva_um');
    $default = 'globe';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 1 Title.
    $name = 'theme_eva_um/mspot1title';
    $title = get_string('marketingspot', 'theme_eva_um').' 1 - '.get_string('title', 'theme_eva_um');
    $description = get_string('mspottitledesc', 'theme_eva_um');
    $default = 'lang:mspot1titledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 1 Description.
    $name = 'theme_eva_um/mspot1desc';
    $title = get_string('marketingspot', 'theme_eva_um').' 1 - '.get_string('description');
    $description = get_string('mspotdescdesc', 'theme_eva_um');
    $default = 'lang:mspot1descdefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);
    /* Marketing Spot 1*/

    /* Marketing Spot 2*/
    $name = 'theme_eva_um_mspot2heading';
    $heading = get_string('marketingspot', 'theme_eva_um').' 2 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Marketing Spot 2 Icon.
    $name = 'theme_eva_um/mspot2icon';
    $title = get_string('marketingspot', 'theme_eva_um').' 2 - '.get_string('icon', 'theme_eva_um');
    $description = get_string('faicondesc', 'theme_eva_um');
    $default = 'graduation-cap';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 2 Title.
    $name = 'theme_eva_um/mspot2title';
    $title = get_string('marketingspot', 'theme_eva_um').' 2 - '.get_string('title', 'theme_eva_um');
    $description = get_string('mspottitledesc', 'theme_eva_um');
    $default = 'lang:mspot2titledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 2 Description.
    $name = 'theme_eva_um/mspot2desc';
    $title = get_string('marketingspot', 'theme_eva_um').' 2 - '.get_string('description');
    $description = get_string('mspotdescdesc', 'theme_eva_um');
    $default = 'lang:mspot2descdefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);
    /* Marketing Spot 2*/

    /* Marketing Spot 3*/
    $name = 'theme_eva_um_mspot3heading';
    $heading = get_string('marketingspot', 'theme_eva_um').' 3 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Marketing Spot 3 Icon.
    $name = 'theme_eva_um/mspot3icon';
    $title = get_string('marketingspot', 'theme_eva_um').' 3 - '.get_string('icon', 'theme_eva_um');
    $description = get_string('faicondesc', 'theme_eva_um');
    $default = 'bullhorn';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 3 Title.
    $name = 'theme_eva_um/mspot3title';
    $title = get_string('marketingspot', 'theme_eva_um').' 3 - '.get_string('title', 'theme_eva_um');
    $description = get_string('mspottitledesc', 'theme_eva_um');
    $default = 'lang:mspot3titledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 3 Description.
    $name = 'theme_eva_um/mspot3desc';
    $title = get_string('marketingspot', 'theme_eva_um').' 3 - '.get_string('description');
    $description = get_string('mspotdescdesc', 'theme_eva_um');
    $default = 'lang:mspot3descdefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);
    /* Marketing Spot 3*/

    /* Marketing Spot 4*/
    $name = 'theme_eva_um_mspot4heading';
    $heading = get_string('marketingspot', 'theme_eva_um').' 4 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Marketing Spot 4 Icon.
    $name = 'theme_eva_um/mspot4icon';
    $title = get_string('marketingspot', 'theme_eva_um').' 4 - '.get_string('icon', 'theme_eva_um');
    $description = get_string('faicondesc', 'theme_eva_um');
    $default = 'mobile';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 4 Title.
    $name = 'theme_eva_um/mspot4title';
    $title = get_string('marketingspot', 'theme_eva_um').' 4 - '.get_string('title', 'theme_eva_um');
    $description = get_string('mspottitledesc', 'theme_eva_um');
    $default = 'lang:mspot4titledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Marketing Spot 4 Description.
    $name = 'theme_eva_um/mspot4desc';
    $title = get_string('marketingspot', 'theme_eva_um').' 4 - '.get_string('description');
    $description = get_string('mspotdescdesc', 'theme_eva_um');
    $default = 'lang:mspot4descdefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $temp->add($setting);
    $settings->add($temp);
    /* Marketing Spot 4*/
    /* Marketing Spots End */

    /* Footer Settings start */
    $temp = new admin_settingpage('theme_eva_um_footer', get_string('footerheading', 'theme_eva_um'));

    // Footer Block1.
    $name = 'theme_eva_um_footerblock1heading';
    $heading = get_string('footerblock', 'theme_eva_um').' 1 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Enable / Disable Footer logo.
    $name = 'theme_eva_um/footerblklogo';
    $title = get_string('footerblklogo', 'theme_eva_um');
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    /* Footer Footnote Content */
    $name = 'theme_eva_um/footnote';
    $title = get_string('footnote', 'theme_eva_um');
    $description = get_string('footnotedesc', 'theme_eva_um');
    $default = 'lang:footnotedefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block1. */

    /* Footer Block2. */
    $name = 'theme_eva_um_footerblock2heading';
    $heading = get_string('footerblock', 'theme_eva_um').' 2 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_eva_um/footerbtitle2';
    $title = get_string('footerblock', 'theme_eva_um').' '.get_string('title', 'theme_eva_um').' 2 ';
    $description = get_string('footerbtitle_desc', 'theme_eva_um');
    $default = 'lang:footerbtitle2default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/footerblink2';
    $title = get_string('footerblink', 'theme_eva_um').' 2';
    $description = get_string('footerblink_desc', 'theme_eva_um');
    $default = get_string('footerblink2default', 'theme_eva_um');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block2 */

    /* Footer Block3 */
    $name = 'theme_eva_um_footerblock3heading';
    $heading = get_string('footerblock', 'theme_eva_um').' 3 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_eva_um/footerbtitle3';
    $title = get_string('footerblock', 'theme_eva_um').' '.get_string('title', 'theme_eva_um').' 3 ';
    $description = get_string('footerbtitle_desc', 'theme_eva_um');
    $default = 'lang:footerbtitle3default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Facebook,Pinterest,Twitter,Google+ Settings */
    $name = 'theme_eva_um/fburl';
    $title = get_string('fburl', 'theme_eva_um');
    $description = get_string('fburldesc', 'theme_eva_um');
    $default = get_string('fburl_default', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/twurl';
    $title = get_string('twurl', 'theme_eva_um');
    $description = get_string('twurldesc', 'theme_eva_um');
    $default = get_string('twurl_default', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/gpurl';
    $title = get_string('gpurl', 'theme_eva_um');
    $description = get_string('gpurldesc', 'theme_eva_um');
    $default = get_string('gpurl_default', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/pinurl';
    $title = get_string('pinurl', 'theme_eva_um');
    $description = get_string('pinurldesc', 'theme_eva_um');
    $default = get_string('pinurl_default', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block3. */

    /* Footer Block4. */
    $name = 'theme_eva_um_footerblock4heading';
    $heading = get_string('footerblock', 'theme_eva_um').' 4 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Fooer Block Title 4.
    $name = 'theme_eva_um/footerbtitle4';
    $title = get_string('footerblock', 'theme_eva_um').' '.get_string('title', 'theme_eva_um').' 4 ';
    $description = get_string('footerbtitle_desc', 'theme_eva_um');
    $default = 'lang:footerbtitle4default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Address , Phone No ,Email */
    $name = 'theme_eva_um/address';
    $title = get_string('address', 'theme_eva_um');
    $description = '';
    $default = get_string('defaultaddress', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/phoneno';
    $title = get_string('phoneno', 'theme_eva_um');
    $description = '';
    $default = get_string('defaultphoneno', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_eva_um/emailid';
    $title = get_string('emailid', 'theme_eva_um');
    $description = '';
    $default = get_string('defaultemailid', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Copyright.
    $name = 'theme_eva_um/copyright';
    $title = get_string('copyright', 'theme_eva_um');
    $description = '';
    $default = get_string('copyright_default', 'theme_eva_um');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $settings->add($temp);
    /* Footer Block4 */
    /*  Footer Settings end */

}
