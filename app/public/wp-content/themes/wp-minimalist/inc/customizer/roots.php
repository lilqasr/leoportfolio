<?php
/**
 * Custom Controls
 * 
 * @package WP Minimalist
 * @since 1.0.0
 */
if( class_exists( 'WP_Customize_Control' ) ) :
    // base control class
    class Wp_Minimalist_WP_Base_Control extends \WP_Customize_Control {
        /**
         * List of controls for this theme.
         * 
         * @since 1.0.0
         */
        protected $type_array =  array(
            'toggle-button',
            'info-box',
            'multicheckbox',
            'checkbox',
            'range',
            'simple-toggle-button',
            'tab-group',
            'box',
            'responsive-box',
            'color-group-picker',
            'border-box',
            'color-image-group',
            'color-picker',
            'advanced-color-group'
        );

        /**
         * Render the control's content.
         *
         */
        public function render_content() {
            if( ! in_array( $this->type, $this->type_array ) ) return;
    ?>
            <div class="customize-<?php echo esc_attr( $this->type ); ?>-control" data-setting="<?php echo esc_attr( $this->setting->id ); ?>"></div>
    <?php
        }
    }

    // multicheckbox control
    class Wp_Minimalist_WP_Multicheckbox_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'multicheckbox';

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            $this->json['choices'] = $this->choices;
        }
    }

    // toggle control 
    class Wp_Minimalist_WP_Toggle_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'toggle-button';
    }

    // checkbox control 
    class Wp_Minimalist_WP_Checkbox_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'checkbox';
    }

    // range control
    class Wp_Minimalist_WP_Range_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'range';

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            $this->json['input_attrs'] = $this->input_attrs;
        }
    }

    // tab group control
    class Wp_Minimalist_WP_Tab_Group_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'tab-group';

        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            $this->json['choices'] = $this->choices;
        }
    }

    // box control
    class Wp_Minimalist_WP_Box_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'box';
    }

    // responsive box control
    class Wp_Minimalist_WP_Responsive_Box_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'responsive-box';
    }

    // color group picker control - renders color and hover color control
    class Wp_Minimalist_WP_Color_Group_Picker_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'color-group-picker';
    }

    // border box control - renders border property control
    class Wp_Minimalist_WP_Border_Box_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'border-box';
    }

    // color gradient and image group control
    class Wp_Minimalist_WP_Color_Image_Group_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'color-image-group';
    }

    // color picker control
    class Wp_Minimalist_WP_Color_Picker_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'color-picker';
    }

    // advanced color group picker control
    class Wp_Minimalist_WP_Advanced_Color_Group_Control extends Wp_Minimalist_WP_Base_Control {
        /**
         * Control type
         * 
         */
        public $type = 'advanced-color-group';
    }

    // info box control
    class Wp_Minimalist_WP_Info_Box_Control extends Wp_Minimalist_WP_Base_Control {
        // control type
        public $type = 'info-box';
        
        /**
         * Add custom JSON parameters to use in the JS template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            $this->json['choices'] = $this->choices;
        }
    }
endif;