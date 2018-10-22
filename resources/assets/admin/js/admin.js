
try {
    window.$ = window.jQuery = require('jquery');

} catch (e) {}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./vendor/bootstrap/dist/js/bootstrap.min');
require('./scripts/ui-load');
require('./scripts/ui-jp.config');
require('./scripts/ui-jp');
require('./scripts/ui-nav');
require('./scripts/ui-toggle');
require('./scripts/ui-client');