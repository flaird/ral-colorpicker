<?php

/**
 * @package RAL Colorpicker
 */
/*
Plugin Name: RAL Colorpicker
Plugin URI: http://sagaio.github.io/ral-colorpicker/
Description: Insert an extremely simple select-dropdown including all RAL Classic colors by writing the shortcode [ral-colorpicker].
Version: 0.1.0
Author: SAGAIO
Author URI: http://www.sagaio.com
License: MIT
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define('WP_DEBUG', true);

/**
 * Properly enqueue scripts and styles
 */
function ralcolorpicker_scripts() {

    wp_enqueue_style( 'ral-colorpicker', plugins_url( 'css/ral-colorpicker.css', __FILE__ ) );
    //wp_enqueue_script( 'ral-colorpicker', plugins_url( 'js/ral-colorpicker.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'ralcolorpicker_scripts' );

// Add Shortcode
function ralcolorpicker_shortcode( $atts ) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'headers' => '0',
        ),
        $atts
    );

    load_plugin_textdomain('ral-colorpicker', false, basename( dirname( __FILE__ ) ) . '/languages' );

    $ralclassic = [
        'yellow_and_beige' => [
            'name' => __('Yellow and Beige','ral-colorpicker_header_yellow_and_beige'),
            'colors' => [
                ['name' => 'RAL 1000', 'hex' => '#BEBD7F'],
                ['name' => 'RAL 1001', 'hex' => '#C2B078'],
                ['name' => 'RAL 1002', 'hex' => '#C6A664'],
                ['name' => 'RAL 1003', 'hex' => '#E5BE01'],
                ['name' => 'RAL 1004', 'hex' => '#CDA434'],
                ['name' => 'RAL 1005', 'hex' => '#A98307'],
                ['name' => 'RAL 1006', 'hex' => '#E4A010'],
                ['name' => 'RAL 1007', 'hex' => '#DC9D00'],
                ['name' => 'RAL 1011', 'hex' => '#8A6642'],
                ['name' => 'RAL 1012', 'hex' => '#C7B446'],
                ['name' => 'RAL 1013', 'hex' => '#EAE6CA'],
                ['name' => 'RAL 1014', 'hex' => '#E1CC4F'],
                ['name' => 'RAL 1015', 'hex' => '#E6D690'],
                ['name' => 'RAL 1016', 'hex' => '#EDFF21'],
                ['name' => 'RAL 1017', 'hex' => '#F5D033'],
                ['name' => 'RAL 1018', 'hex' => '#F8F32B'],
                ['name' => 'RAL 1019', 'hex' => '#9E9764'],
                ['name' => 'RAL 1020', 'hex' => '#999950'],
                ['name' => 'RAL 1021', 'hex' => '#F3DA0B'],
                ['name' => 'RAL 1023', 'hex' => '#FAD201'],
                ['name' => 'RAL 1024', 'hex' => '#AEA04B'],
                ['name' => 'RAL 1026', 'hex' => '#FFFF00'],
                ['name' => 'RAL 1027', 'hex' => '#9D9101'],
                ['name' => 'RAL 1028', 'hex' => '#F4A900'],
                ['name' => 'RAL 1032', 'hex' => '#D6AE01'],
                ['name' => 'RAL 1033', 'hex' => '#F3A505'],
                ['name' => 'RAL 1034', 'hex' => '#EFA94A'],
                ['name' => 'RAL 1035', 'hex' => '#6A5D4D'],
                ['name' => 'RAL 1036', 'hex' => '#705335'],
                ['name' => 'RAL 1037', 'hex' => '#F39F18'],
            ],
        ],
        'orange' => [
            'name' => __('Orange','ral-colorpicker_header_orange'),
            'colors' => [
                ['name' => 'RAL 2000', 'hex' => '#ED760E'],
                ['name' => 'RAL 2001', 'hex' => '#C93C20'],
                ['name' => 'RAL 2002', 'hex' => '#CB2821'],
                ['name' => 'RAL 2003', 'hex' => '#FF7514'],
                ['name' => 'RAL 2004', 'hex' => '#F44611'],
                ['name' => 'RAL 2005', 'hex' => '#FF2301'],
                ['name' => 'RAL 2007', 'hex' => '#FFA420'],
                ['name' => 'RAL 2008', 'hex' => '#F75E25'],
                ['name' => 'RAL 2009', 'hex' => '#F54021'],
                ['name' => 'RAL 2010', 'hex' => '#D84B20'],
                ['name' => 'RAL 2011', 'hex' => '#EC7C26'],
                ['name' => 'RAL 2012', 'hex' => '#E55137'],
                ['name' => 'RAL 2013', 'hex' => '#C35831'],
            ],
        ],
        'red' => [
            'name' => __('Red','ral-colorpicker_header_red'),
            'colors' => [
                ['name' => 'RAL 3000', 'hex' => '#AF2B1E'],
                ['name' => 'RAL 3001', 'hex' => '#A52019'],
                ['name' => 'RAL 3002', 'hex' => '#A2231D'],
                ['name' => 'RAL 3003', 'hex' => '#9B111E'],
                ['name' => 'RAL 3004', 'hex' => '#75151E'],
                ['name' => 'RAL 3005', 'hex' => '#5E2129'],
                ['name' => 'RAL 3007', 'hex' => '#412227'],
                ['name' => 'RAL 3009', 'hex' => '#642424'],
                ['name' => 'RAL 3011', 'hex' => '#781F19'],
                ['name' => 'RAL 3012', 'hex' => '#C1876B'],
                ['name' => 'RAL 3013', 'hex' => '#A12312'],
                ['name' => 'RAL 3014', 'hex' => '#D36E70'],
                ['name' => 'RAL 3015', 'hex' => '#EA899A'],
                ['name' => 'RAL 3016', 'hex' => '#B32821'],
                ['name' => 'RAL 3017', 'hex' => '#E63244'],
                ['name' => 'RAL 3018', 'hex' => '#D53032'],
                ['name' => 'RAL 3020', 'hex' => '#CC0605'],
                ['name' => 'RAL 3022', 'hex' => '#D95030'],
                ['name' => 'RAL 3024', 'hex' => '#F80000'],
                ['name' => 'RAL 3026', 'hex' => '#FE0000'],
                ['name' => 'RAL 3027', 'hex' => '#C51D34'],
                ['name' => 'RAL 3028', 'hex' => '#CB3234'],
                ['name' => 'RAL 3031', 'hex' => '#B32428'],
                ['name' => 'RAL 3032', 'hex' => '#721422'],
                ['name' => 'RAL 3033', 'hex' => '#B44C43'],
            ],
        ],
        'violet' => [
            'name' => __('Violet','ral-colorpicker_header_violet'),
            'colors' => [
                ['name' => 'RAL 4001', 'hex' => '#6D3F5B'],
                ['name' => 'RAL 4002', 'hex' => '#922B3E'],
                ['name' => 'RAL 4003', 'hex' => '#DE4C8A'],
                ['name' => 'RAL 4004', 'hex' => '#641C34'],
                ['name' => 'RAL 4005', 'hex' => '#6C4675'],
                ['name' => 'RAL 4006', 'hex' => '#A03472'],
                ['name' => 'RAL 4007', 'hex' => '#4A192C'],
                ['name' => 'RAL 4008', 'hex' => '#924E7D'],
                ['name' => 'RAL 4009', 'hex' => '#A18594'],
                ['name' => 'RAL 4010', 'hex' => '#CF3476'],
                ['name' => 'RAL 4011', 'hex' => '#8673A1'],
                ['name' => 'RAL 4012', 'hex' => '#6C6874'],
            ],
        ],
        'blue' => [
            'name' => __('Blue','ral-colorpicker_header_blue'),
            'colors' => [
                ['name' => 'RAL 5001', 'hex' => '#1F3438'],
                ['name' => 'RAL 5002', 'hex' => '#20214F'],
                ['name' => 'RAL 5003', 'hex' => '#1D1E33'],
                ['name' => 'RAL 5004', 'hex' => '#18171C'],
                ['name' => 'RAL 5005', 'hex' => '#1E2460'],
                ['name' => 'RAL 5007', 'hex' => '#3E5F8A'],
                ['name' => 'RAL 5008', 'hex' => '#26252D'],
                ['name' => 'RAL 5009', 'hex' => '#025669'],
                ['name' => 'RAL 5010', 'hex' => '#0E294B'],
                ['name' => 'RAL 5011', 'hex' => '#231A24'],
                ['name' => 'RAL 5012', 'hex' => '#3B83BD'],
                ['name' => 'RAL 5013', 'hex' => '#1E213D'],
                ['name' => 'RAL 5014', 'hex' => '#606E8C'],
                ['name' => 'RAL 5015', 'hex' => '#2271B3'],
                ['name' => 'RAL 5017', 'hex' => '#063971'],
                ['name' => 'RAL 5018', 'hex' => '#3F888F'],
                ['name' => 'RAL 5019', 'hex' => '#1B5583'],
                ['name' => 'RAL 5020', 'hex' => '#1D334A'],
                ['name' => 'RAL 5021', 'hex' => '#256D7B'],
                ['name' => 'RAL 5022', 'hex' => '#252850'],
                ['name' => 'RAL 5023', 'hex' => '#49678D'],
                ['name' => 'RAL 5024', 'hex' => '#5D9B9B'],
                ['name' => 'RAL 5025', 'hex' => '#2A6478'],
                ['name' => 'RAL 5026', 'hex' => '#102C54'],
            ],
        ],
        'green' => [
            'name' => __('Green','ral-colorpicker_header_green'),
            'colors' => [
                ['name' => 'RAL 6000', 'hex' => '#316650'],
                ['name' => 'RAL 6001', 'hex' => '#287233'],
                ['name' => 'RAL 6002', 'hex' => '#2D572C'],
                ['name' => 'RAL 6003', 'hex' => '#424632'],
                ['name' => 'RAL 6004', 'hex' => '#1F3A3D'],
                ['name' => 'RAL 6005', 'hex' => '#2F4538'],
                ['name' => 'RAL 6006', 'hex' => '#3E3B32'],
                ['name' => 'RAL 6007', 'hex' => '#343B29'],
                ['name' => 'RAL 6008', 'hex' => '#39352A'],
                ['name' => 'RAL 6009', 'hex' => '#31372B'],
                ['name' => 'RAL 6010', 'hex' => '#35682D'],
                ['name' => 'RAL 6011', 'hex' => '#587246'],
                ['name' => 'RAL 6012', 'hex' => '#343E40'],
                ['name' => 'RAL 6013', 'hex' => '#6C7156'],
                ['name' => 'RAL 6014', 'hex' => '#47402E'],
                ['name' => 'RAL 6015', 'hex' => '#3B3C36'],
                ['name' => 'RAL 6016', 'hex' => '#1E5945'],
                ['name' => 'RAL 6017', 'hex' => '#4C9141'],
                ['name' => 'RAL 6018', 'hex' => '#57A639'],
                ['name' => 'RAL 6019', 'hex' => '#BDECB6'],
                ['name' => 'RAL 6020', 'hex' => '#2E3A23'],
                ['name' => 'RAL 6021', 'hex' => '#89AC76'],
                ['name' => 'RAL 6022', 'hex' => '#25221B'],
                ['name' => 'RAL 6024', 'hex' => '#308446'],
                ['name' => 'RAL 6025', 'hex' => '#3D642D'],
                ['name' => 'RAL 6026', 'hex' => '#015D52'],
                ['name' => 'RAL 6027', 'hex' => '#84C3BE'],
                ['name' => 'RAL 6028', 'hex' => '#2C5545'],
                ['name' => 'RAL 6029', 'hex' => '#20603D'],
                ['name' => 'RAL 6032', 'hex' => '#317F43'],
                ['name' => 'RAL 6033', 'hex' => '#497E76'],
                ['name' => 'RAL 6034', 'hex' => '#7FB5B5'],
                ['name' => 'RAL 6035', 'hex' => '#1C542D'],
                ['name' => 'RAL 6036', 'hex' => '#193737'],
                ['name' => 'RAL 6037', 'hex' => '#008F39'],
                ['name' => 'RAL 6038', 'hex' => '#00BB2D'],
            ],
        ],
        'grey' => [
            'name' => __('Grey','ral-colorpicker_header_grey'),
            'colors' => [
                ['name' => 'RAL 7000', 'hex' => '#78858B'],
                ['name' => 'RAL 7001', 'hex' => '#8A9597'],
                ['name' => 'RAL 7002', 'hex' => '#7E7B52'],
                ['name' => 'RAL 7003', 'hex' => '#6C7059'],
                ['name' => 'RAL 7004', 'hex' => '#969992'],
                ['name' => 'RAL 7005', 'hex' => '#646B63'],
                ['name' => 'RAL 7006', 'hex' => '#6D6552'],
                ['name' => 'RAL 7008', 'hex' => '#6A5F31'],
                ['name' => 'RAL 7009', 'hex' => '#4D5645'],
                ['name' => 'RAL 7010', 'hex' => '#4C514A'],
                ['name' => 'RAL 7011', 'hex' => '#434B4D'],
                ['name' => 'RAL 7012', 'hex' => '#4E5754'],
                ['name' => 'RAL 7013', 'hex' => '#464531'],
                ['name' => 'RAL 7015', 'hex' => '#434750'],
                ['name' => 'RAL 7016', 'hex' => '#293133'],
                ['name' => 'RAL 7021', 'hex' => '#23282B'],
                ['name' => 'RAL 7022', 'hex' => '#332F2C'],
                ['name' => 'RAL 7023', 'hex' => '#686C5E'],
                ['name' => 'RAL 7024', 'hex' => '#474A51'],
                ['name' => 'RAL 7026', 'hex' => '#2F353B'],
                ['name' => 'RAL 7030', 'hex' => '#8B8C7A'],
                ['name' => 'RAL 7031', 'hex' => '#474B4E'],
                ['name' => 'RAL 7032', 'hex' => '#B8B799'],
                ['name' => 'RAL 7033', 'hex' => '#7D8471'],
                ['name' => 'RAL 7034', 'hex' => '#8F8B66'],
                ['name' => 'RAL 7035', 'hex' => '#D7D7D7'],
                ['name' => 'RAL 7036', 'hex' => '#7F7679'],
                ['name' => 'RAL 7037', 'hex' => '#7D7F7D'],
                ['name' => 'RAL 7038', 'hex' => '#B5B8B1'],
                ['name' => 'RAL 7039', 'hex' => '#6C6960'],
                ['name' => 'RAL 7040', 'hex' => '#9DA1AA'],
                ['name' => 'RAL 7042', 'hex' => '#8D948D'],
                ['name' => 'RAL 7043', 'hex' => '#4E5452'],
                ['name' => 'RAL 7044', 'hex' => '#CAC4B0'],
                ['name' => 'RAL 7045', 'hex' => '#909090'],
                ['name' => 'RAL 7046', 'hex' => '#82898F'],
                ['name' => 'RAL 7047', 'hex' => '#D0D0D0'],
                ['name' => 'RAL 7048', 'hex' => '#898176'],
            ],
        ],
        'brown' => [
            'name' => __('Brown','ral-colorpicker_header_brown'),
            'colors' => [
                ['name' => 'RAL 8000', 'hex' => '#826C34'],
                ['name' => 'RAL 8001', 'hex' => '#955F20'],
                ['name' => 'RAL 8002', 'hex' => '#6C3B2A'],
                ['name' => 'RAL 8003', 'hex' => '#734222'],
                ['name' => 'RAL 8004', 'hex' => '#8E402A'],
                ['name' => 'RAL 8007', 'hex' => '#59351F'],
                ['name' => 'RAL 8008', 'hex' => '#6F4F28'],
                ['name' => 'RAL 8011', 'hex' => '#5B3A29'],
                ['name' => 'RAL 8012', 'hex' => '#592321'],
                ['name' => 'RAL 8014', 'hex' => '#382C1E'],
                ['name' => 'RAL 8015', 'hex' => '#633A34'],
                ['name' => 'RAL 8016', 'hex' => '#4C2F27'],
                ['name' => 'RAL 8017', 'hex' => '#45322E'],
                ['name' => 'RAL 8019', 'hex' => '#403A3A'],
                ['name' => 'RAL 8022', 'hex' => '#212121'],
                ['name' => 'RAL 8023', 'hex' => '#A65E2E'],
                ['name' => 'RAL 8024', 'hex' => '#79553D'],
                ['name' => 'RAL 8025', 'hex' => '#755C48'],
                ['name' => 'RAL 8028', 'hex' => '#4E3B31'],
                ['name' => 'RAL 8029', 'hex' => '#763C28'],
            ],
        ],
        'white_and_black' => [
            'name' => __('White and Black','ral-colorpicker_header_white_and_black'),
            'colors' => [
                ['name' => 'RAL 9001', 'hex' => '#FDF4E3'],
                ['name' => 'RAL 9002', 'hex' => '#E7EBDA'],
                ['name' => 'RAL 9003', 'hex' => '#F4F4F4'],
                ['name' => 'RAL 9004', 'hex' => '#282828'],
                ['name' => 'RAL 9005', 'hex' => '#0A0A0A'],
                ['name' => 'RAL 9006', 'hex' => '#A5A5A5'],
                ['name' => 'RAL 9007', 'hex' => '#8F8F8F'],
                ['name' => 'RAL 9010', 'hex' => '#FFFFFF'],
                ['name' => 'RAL 9011', 'hex' => '#1C1C1C'],
                ['name' => 'RAL 9016', 'hex' => '#F6F6F6'],
                ['name' => 'RAL 9017', 'hex' => '#1E1E1E'],
                ['name' => 'RAL 9018', 'hex' => '#D7D7D7'],
                ['name' => 'RAL 9022', 'hex' => '#9C9C9C'],
                ['name' => 'RAL 9023', 'hex' => '#828282'],
            ],
        ],
    ];

    $output = '<select class="ralcp-select">';
    foreach($ralclassic as $optgroup) {
        if($atts['headers'] == 1) { $output .= '<optgroup label="'.$optgroup['name'].'">'; }
        foreach($optgroup['colors'] as $color) {
            $output .= '<option value="'.$color['name'].'" style="background-color:'.$color['hex'].'">'.$color['name'].'</option>';
        }
        if($atts['headers'] == 1) { $output .= '</optgroup>'; }
    }
    $output .= '</select>';

    return $output;
}

add_shortcode( 'ral-colorpicker', 'ralcolorpicker_shortcode' );