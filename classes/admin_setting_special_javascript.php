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
 * @author  Erlend Strømsvik - Ny Media AS
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package auth/saml
 *
 * Authentication Plugin: SAML based SSO Authentication
 *
 * Authentication using SAML2 with SimpleSAMLphp.
 *
 * Based on plugins made by Sergio Gómez (moodle_ssp) and Martin Dougiamas (Shibboleth).
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Special setting for adding javascript
 *
 * @package    auth_saml
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class enrol_saml_admin_setting_javascript extends admin_setting_heading {
    public function __construct() {
        $this->nosave = true;
        parent::__construct('javascript', '', '', '');
    }

    public function output_html($data, $query = '') {
        return "
            <script>
                function hide_or_not_courses() {
                    var value = document.getElementById('id_s_enrol_saml_supportcourses').value;

                    document.getElementById('admin-courses').style.display = (value != 'nosupport') ? 'flex' : 'none';
                    document.getElementById('admin-ignoreinactivecourses').style.display = (value != 'nosupport') ? 'flex' : 'none';
                    
                    document.getElementById('admin-dbtype').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-dbhost').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-dbuser').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-dbpass').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-dbname').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-dbencoding').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-updatemappings').style.display = (value == 'external') ? 'flex' : 'none';
                    document.getElementById('admin-externalmappings').style.display = (value == 'external') ? 'flex' : 'none';


                }


                document.getElementById('id_s_enrol_saml_supportcourses').addEventListener(
                'change', hide_or_not_courses
                );

                window.addEventListener(
                'load', hide_or_not_courses
                );
            </script>

        ";
    }
}
