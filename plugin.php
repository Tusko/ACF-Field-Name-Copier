<?php
/**
 * Plugin Name: Advanced Custom Fields : Field Name Copier
 * Plugin URI: https://wordpress.org/plugins/acf-field-name-copier/
 * Description: Creates inputs with fields name to quick copy it.
 * Author: Tusko Trush
 * Author URI: https://frontend.im/
 * Version: 1.0.2
 * License: GPL v3
 *
 * Advanced Custom Fields : Field Name Copier
 * Copyright (C) 2017, Tusko Trush - tusko@photoinside.me
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 **/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if(!function_exists('wpa_acf_copier_admin_js')) {
    function wpa_acf_copier_admin_js() {
        echo "<script type=\"text/javascript\">
            function wpa_acf_editor__create_input(val){
                return '<input class=\"regular-text\" type=\"text\" readonly value=\"'+val+'\" onclick=\"this.select();document.execCommand(\'copy\')\" />';
            }
            jQuery(document).ready(function($){
                $('.acf-field-list .acf-field-object .li-field-name').each(function(){
                    $(this).html( wpa_acf_editor__create_input( $(this).text().trim() ) );
                });
                $(document).on('change focus blur keyup', '.field-name', function(){
                var wpa_field_name     = $(this),
                    wpa_field_to_input = wpa_field_name.closest('.settings').prev().find('.li-field-name');
                    wpa_field_to_input.html( wpa_acf_editor__create_input( wpa_field_name.val().trim() ) );
                });
            });
        </script>";
    }
    add_action('admin_footer', 'wpa_acf_copier_admin_js', 10, 3);
}