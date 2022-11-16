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
 * eva_um theme custom data.
 *
 * @package   theme_eva_um
 * @copyright 2021 Bas Brands
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$logo = theme_eva_um_get_logo_url();
$surl = new moodle_url('/course/search.php');

$footerlogo = !empty(theme_eva_um_get_setting('footerblklogo')) ? 1 : 0;

$footnote = !empty(theme_eva_um_get_setting('footnote')) ? theme_eva_um_get_setting('footnote', 'format_html') : '';
$footnote = theme_eva_um_lang($footnote);

$footerbtitle2 = !empty(theme_eva_um_get_setting('footerbtitle2')) ? theme_eva_um_get_setting('footerbtitle2', 'format_html') : '';
$footerbtitle2 = theme_eva_um_lang($footerbtitle2);

$footerbtitle3 = !empty(theme_eva_um_get_setting('footerbtitle3')) ? theme_eva_um_get_setting('footerbtitle3', 'format_html') : '';
$footerbtitle3 = theme_eva_um_lang($footerbtitle3);

$footerbtitle4 = !empty(theme_eva_um_get_setting('footerbtitle4')) ? theme_eva_um_get_setting('footerbtitle4', 'format_html') : '';
$footerbtitle4 = theme_eva_um_lang($footerbtitle4);

$footerlinks = theme_eva_um_generate_links('footerblink2');
$logourl = theme_eva_um_get_logo_url();

$fburl    = theme_eva_um_get_setting('fburl');
$fburl    = trim($fburl);
$twurl    = theme_eva_um_get_setting('twurl');
$twurl    = trim($twurl);
$gpurl    = theme_eva_um_get_setting('gpurl');
$gpurl    = trim($gpurl);
$pinurl   = theme_eva_um_get_setting('pinurl');
$pinurl   = trim($pinurl);

$socialurl = ($fburl != '' || $pinurl != '' || $twurl != '' || $gpurl != '') ? 1 : 0;


$fb = get_string('mediaicon1', 'theme_eva_um');
$tw = get_string('mediaicon2', 'theme_eva_um');
$gp = get_string('mediaicon3', 'theme_eva_um');
$pi = get_string('mediaicon4', 'theme_eva_um');
$fbn = get_string('medianame1', 'theme_eva_um');
$twn = get_string('medianame2', 'theme_eva_um');
$gpn = get_string('medianame3', 'theme_eva_um');
$pin = get_string('medianame4', 'theme_eva_um');

$address = theme_eva_um_get_setting('address') ? theme_eva_um_get_setting('address') : '';
$emailid  = theme_eva_um_get_setting('emailid');
$phoneno  = theme_eva_um_get_setting('phoneno');
$mail = get_string('footeremail', 'theme_eva_um');
$phone = get_string('phone', 'theme_eva_um');
$copyright = theme_eva_um_get_setting('copyright', 'format_html');

$block1 = ($footerlogo != '' || $footnote != '') ? 1 : 0;
$block2 = ($footerbtitle2 != '' || $footerlinks != '') ? 1 : 0;
$block3 = ($footerbtitle3 != '' || $socialurl != 0) ? 1 : 0;
$block4 = ($address != '' || $emailid != '' || $phoneno != '') ? 1 : 0;

$blockarrange = $block1 + $block2 + $block3 + $block4;

switch ($blockarrange) {
    case 4:
        $colclass = 'col-md-3';
        break;
    case 3:
        $colclass = 'col-md-4';
        break;
    case 2:
        $colclass = 'col-md-6';
        break;
    case 1:
        $colclass = 'col-md-12';
        break;
    case 0:
        $colclass = '';
        break;
    default:
        $colclass = 'col-md-3';
    break;
}
$custom = $OUTPUT->custom_menu();

if ($custom == '') {
    $class = "navbar-toggler navbar-toggler-right d-lg-none nocontent-navbar";
} else {
    $class = "navbar-toggler navbar-toggler-right d-lg-none";
}


$templatecontext = [
'logo' => $logo,
'surl' => $surl,
'footerlogo' => $footerlogo,
'footnote' => $footnote,
'footerbtitle2' => $footerbtitle2,
'footerbtitle3' => $footerbtitle3,
'footerbtitle4' => $footerbtitle4,
'footerlinks' => $footerlinks,
'logourl' => $logourl,
'fburl' => $fburl,
'pinurl' => $pinurl,
'twurl' => $twurl,
'gpurl' => $gpurl,
'fb' => $fb,
'pi' => $pi,
'tw' => $tw,
'gp' => $gp,
'fbn' => $fbn,
'pin' => $pin,
'twn' => $twn,
'gpn' => $gpn,
'socialurl' => $socialurl,
'address' => $address,
'phoneno' => $phoneno,
'emailid' => $emailid,
'phone' => $phone,
'mail' => $mail,
'copyright' => $copyright,
'block1' => $block1,
'block2' => $block2,
'block3' => $block3,
'block4' => $block4,
'colclass' => $colclass,
'blockarrange' => $blockarrange,
'customclass' => $class
];
