import {domReady} from '@roots/sage/client';
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';
import Alpine from 'alpinejs';

import invoicesTable from './alpine/data/invoicesTable';
 
window.Alpine = Alpine;

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code

  const dateRangePickerEl = document.querySelectorAll('[date-rangepicker]');

  dateRangePickerEl.forEach(el => {
    if(el)
        new DateRangePicker(el, {
            format: 'dd/mm/yyyy',
        }); 
  });
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
Alpine.data('invoicesTable', invoicesTable);
Alpine.start();
import.meta.webpackHot?.accept(main);
