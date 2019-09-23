/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */
define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('kien.hello', {
        options: {
           
        },

        /**
         * Close modal window.
         */
        
        _create: function () {
            this.actions = $(this.options.actionsSelector);
            // alert("Hello");
            $(this.actions).on('click', $.proxy(function () {
                alert("Hello");
                // $(console.log(config));
                // $(console.log(config.content));
                // return $('<div></div>').html(config.content).alert(config);
            }, this));
        }
    });
    
    return $.kien.hello;
});