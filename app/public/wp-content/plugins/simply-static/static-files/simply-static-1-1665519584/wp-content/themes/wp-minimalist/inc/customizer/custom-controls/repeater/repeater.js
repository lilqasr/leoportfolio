/**
 * Handles overall events and triggers for the repeater control
 * 
 * @since 1.0.0
 */
jQuery(document).ready(function($) {
    /**
     * General events handler for the control
     * 
     * 
     */
    $( ".wp-minimalist-repeater-control" ).each(function() {
        var container = $(this)

        // render wpo.editor inside
        container.find( ".wp-editor-field" ).each(function() {
            var wpEditor = $(this), wpEditorElement = wpEditor.find( "textarea" ), wpEditorID = wpEditorElement.attr( "id" )
            if ( wp.editor && wp.editor.initialize ) {
                wp.editor.initialize( wpEditorID, {
                    tinymce      : {
                        wpautop : false,
                        forced_root_block : "",
                    },
                    quicktags    : true,
                    mediaButtons : true
                });
                var editor = tinyMCE.get( wpEditorID );
                editor.onChange.add( function ( ed ) {
                    var content;
                    ed.save();
                    content = editor.getContent();
                    wpEditorElement.val( content );
                    repeater_value_refresh(wpEditor);
                });
            }
        })

        // media control type handler
        container.on( "click", ".image-field .add-image-trigger", function(event) {
            event.preventDefault();
            if( frame ) {
                frame.open();
                return;
            }
            var _this = $(this), frame = wp.media({
                title: "Select or Upload Image",
                button: {
                    text: 'Add Image'
                },
                multiple: false
            });
            frame.open();
            frame.on( 'select', function() {
                var attachment = frame.state().get( 'selection' ).first().toJSON();
                _this.slideUp().addClass("no-trigger");
                _this.next( ".repeater-field-value-holder" ).val( attachment.id );
                _this.parent().find("img").attr( "src", attachment.url );
                _this.prev().removeClass("no-image")
                repeater_value_refresh(_this);
            })
        })
        // remove image
        container.on( "click", ".image-field .remove-image", function(event) {
            var _this = $(this);
            _this.prev().attr( "src", "" );
            _this.parent().addClass("no-image");
            _this.parent().next().slideDown().removeClass("no-trigger");
            _this.parent().siblings( ".repeater-field-value-holder" ).val('')
            repeater_value_refresh(_this);
        })

        // change the position of selected icon at front
        function searchIcon() {
            container.find( ".fontawesome-icon-picker" ).each(function() {
                var listContainer  = $(this).find( ".icons-list" ), searchField = $(this).find( ".search-field input" )
                listContainer.find( "i.selected" ).prependTo( listContainer );
                // search icon with given input value
                searchField.on( "keyup", function() {
                    var toSearch = $(this).val();
                    if( toSearch ) {
                        listContainer.find( "i" ).each( function() {
                            if( $(this).attr( "class" ).indexOf( toSearch ) > 0 ) {
                                $(this).show()
                            } else {
                                $(this).hide()
                            }
                        })
                    } else {
                        listContainer.find( "i" ).show();
                    }
                })
            })
        }
        searchIcon();

        // fontawesome icon picker handler
        container.on( "click", ".fontawesome-icon-picker .icon-header", function() {
            var _this = $(this)
            _this.find( ".icon-list-trigger i" ).toggleClass( "fa-angle-down fa-angle-up" );
            _this.siblings( ".search-field, .icons-list" ).slideToggle();
        })

        container.on( "click", ".fontawesome-icon-picker .icons-list i", function() {
            var _this = $(this), newValue = _this.attr( "class" );
            _this.parent().prev().find( "input" ).val('')
            _this.removeClass( "selected" ).addClass( "selected" ).siblings().removeClass( "selected" );
            _this.parent().next().val( newValue );
            _this.parent().siblings( ".icon-header" ).find( "i" ).first().removeClass().addClass( newValue );
            _this.siblings().show()
            searchIcon();
            repeater_value_refresh(_this);
        })

        /**
         * Sortable handler
         */
         container.find( ".wp-minimalist-repeater-control-inner" ).sortable({
            orientation: "vertical",
            handle: ".sortable-icon",
            items: "> .wp-minimalist-repeater-item",
            update: function (event, ui) {
                repeater_value_refresh( $(this) );
                $(this).find( " > .wp-minimalist-repeater-item .remove-item" ).show()
                $(this).find( ".wp-minimalist-repeater-item:first .remove-item" ).hide()
            }
         })

        /**
         * Handle the control value rendering and ui
         * 
         */
        // container.find( "div.wp-minimalist-repeater-item.visible" ).first().find( ".item-control-fields" ).slideDown(); // slide down first child of the repeater item
        // on click display item icon
        container.on( "click", ".display-icon", function() {
            var _this = $(this);
            _this.parent().next().find("input[data-key='item_option']").val(function(index,current) {
                if( current === 'show' ) {
                    return 'hide';
                } else {
                    return 'show';
                }
            })
            _this.toggleClass( "dashicons-visibility dashicons-hidden" ).parent().next().slideUp();
            _this.parents( ".wp-minimalist-repeater-item" ).toggleClass( "not-visible visible" );
            repeater_value_refresh(_this)
        })
        
        // on click remove item button
        container.on( "click", ".remove-item", function(e) {
            e.preventDefault();
            var controller = $(this).parents( ".wp-minimalist-repeater-control" ), toRemove = $(this).parents( ".wp-minimalist-repeater-item" );
            toRemove.slideUp( "slow", function() {
                toRemove.remove();
                repeater_value_refresh(controller);
            })
        })

        // on click add new button
        container.on( "click", ".add-new-item", function(e) {
            e.preventDefault();
            var _this = $(this), defaultValue, clonedBlock = _this.parent().prev().clone();
            // initialize wp.editor after cloning.
            // var newEditor = clonedBlock.find( ".wp-editor-field .control--item-label" ), dataKey = newEditor.next().find( ".repeater-field-value-holder" ).data("key") 
            // newEditor.siblings().remove();
            // toAppend = $( '<textarea class="repeater-field-value-holder" data-key="' +dataKey+ '" style="width:100%"></textarea>' ).uniqueId();
            // newEditor.after( toAppend );
            // if ( wp.editor && wp.editor.initialize ) {
            //     var newEditorID = toAppend.attr( "id" )
            //     wp.editor.initialize( newEditorID, {
            //         tinymce      : {
            //             wpautop : false,
            //             forced_root_block : "",
            //         },
            //         quicktags    : true,
            //         mediaButtons : true
            //     });
            //     var newEditorField = tinyMCE.get( newEditorID );
            //     newEditorField.onChange.add( function ( ed ) {
            //         var content;
            //         ed.save();
            //         content = newEditorField.getContent();
            //         newEditor.find( ".wp-editor-field textarea" ).val( content );
            //         repeater_value_refresh(newEditor);
            //     });
            // }
            if( clonedBlock.hasClass( "not-visible" ) ) clonedBlock.removeClass( "not-visible" ).addClass( "visible" )
            if( clonedBlock.find( ".display-icon" ).hasClass( "dashicons-hidden" ) ) clonedBlock.find( ".display-icon" ).removeClass( "dashicons-hidden" ).addClass( "dashicons-visibility" )
            clonedBlock.find( ".repeater-field-value-holder" ).each(function() {
                defaultValue = $(this).data( "default" )
                if( $(this).attr("type") === 'checkbox' ) {
                    if( defaultValue === 'true' ) {
                        $(this).prop( "checked", true );
                    } else {
                        $(this).prop( "checked", false );
                    }
                } else {
                    $(this).val(defaultValue)
                }
            })
            clonedBlock.find( ".image-field" ).each(function() {
                if( ! $(this).find( ".image-element" ).hasClass( "no-image" ) ) $(this).find( ".image-element" ).addClass( "no-image" );
                if( $(this).find( ".add-image-trigger" ).hasClass( "no-trigger" ) ) $(this).find( ".add-image-trigger" ).removeClass( "no-trigger" ).show();
            })
            clonedBlock.find( ".remove-item" ).show()

            _this.parent().before(clonedBlock)
            clonedBlock.siblings().find( ".item-control-fields" ).slideUp()
            clonedBlock.find( ".item-control-fields" ).slideDown('slow', function() {
                repeater_value_refresh(_this)
            })
            searchIcon();
        })

        // on click heading toggle content
        container.on( "click", ".wp-minimalist-repeater-item.visible .item-heading", function() {
            $(this).parent().next().slideToggle();
        })

        // collect repeater field values
        container.on( "change keyup", ".wp-minimalist-repeater-item .repeater-field-value-holder", function() {
            var _this = $(this)
            repeater_value_refresh(_this)
        })
    })

    // collect repeater control field value
    function repeater_value_refresh( _this ) {
        var controlValue = [], container =  ( _this.hasClass( "wp-minimalist-repeater-control" ) ) ? _this : _this.parents( ".wp-minimalist-repeater-control" );
        container.find( ".wp-minimalist-repeater-item" ).each(function() {
            var newValue = {}
            $(this).find( ".repeater-field-value-holder" ).each(function() {
                var fieldValue, fieldName = $(this).data("key");
                if( $(this).attr("type") === 'checkbox' ) {
                    if( $(this).is(":checked") ) {
                        fieldValue = true;
                    } else {
                        fieldValue = false;
                    }
                } else {
                    fieldValue = $(this).val()
                }
                if( $(this).data( "field" ) === 'wp-custom-editor' ) {
                    newValue[fieldName] = fieldValue
                } else {
                    newValue[fieldName] = fieldValue
                }
            })
            controlValue.push(newValue)
        })
        container.find( ".repeater-control-value-holder" ).val( JSON.stringify( controlValue ) ).trigger("change")
    }
})