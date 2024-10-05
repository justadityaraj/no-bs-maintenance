<?php
/*
 * Plugin Name: No-BS! Maintenance Mode
 * Plugin URI: https://github.com/justadityaraj/maintenance
 * Description: A simple no-bull$hit maintenance mode plugin to display a maintenance message without any fluff.
 * Version: 1.2
 * Author: Aditya Raj Singh
 * Author URI: https://adityarajsingh.com/
 * License:		GPL-2.0+
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

function smm_display_maintenance_mode() {
    if (!current_user_can('administrator')) {
        $site_title = get_bloginfo('name');
        echo '<html><head><title>Maintenance Mode</title>';
        echo '<style>
                body {
                    text-align: center;
                    padding: 50px;
                    font-family: Arial, sans-serif;
                    margin: 0;
                    background-color: #f7f7f7;
                }
                h1 {
                    font-size: 24px; /* Adjust the font size here */
                    color: #333;
                }
                @media (max-width: 600px) {
                    h1 {
                        font-size: 20px; /* Smaller font size for mobile */
                    }
                }
              </style>';
        echo '</head><body>';
        echo '<h1>' . esc_html($site_title) . ' Under Maintenance</h1>';
        echo '</body></html>';
        exit;
    }
}

add_action('template_redirect', 'smm_display_maintenance_mode');
