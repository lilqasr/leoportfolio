/**
 * Theme Info
 * 
 * @package Wp Minimalist
 * @since 1.2.0
 */

/**
 * Plugin install and activate
 * 
 */
jQuery(document).ready(function($) {
    var ajaxUrl = wpMinimalistThemeInfoObject.ajaxUrl, _wpnonce = wpMinimalistThemeInfoObject._wpnonce
    /**
     * On click
     * 
     */
    $(document).on( "click", ".wp-minimalist-importer-action-trigger", function() {
        var _this = $(this), param;
        plugin_action = _this.data( "action" );
        plugin_process_message = _this.data( "process" );
        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {
                "action": "wp_minimalist_importer_plugin_action",
                "_wpnonce": _wpnonce,
                "plugin_action": plugin_action
            },
            beforeSend: function () {
                if ( plugin_process_message ) {
                    _this.hide().html('').fadeIn().html(plugin_process_message);
                }
            },
            success: function(res) {
                var info = JSON.parse(res);
                if( info.message ) {
                    _this.hide().html('').fadeIn().html(info.message);   
                }
            },
            complete: function() {
                location.reload();
            }
        })
    })
})