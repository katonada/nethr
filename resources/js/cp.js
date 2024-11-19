/**
 * When extending the control panel, be sure to uncomment the necessary code for your build process:
 * https://statamic.dev/extending/control-panel
 */

/** Example Fieldtype

import ExampleFieldtype from './components/fieldtypes/ExampleFieldtype.vue';

Statamic.booting(() => {
    Statamic.$components.register('example-fieldtype', ExampleFieldtype);
});

*/
import Timepicker from './components/fieldtypes/Timepicker.vue';

Statamic.booting(() => {
    Statamic.$components.register('timepicker-fieldtype', Timepicker);
});
