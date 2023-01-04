import {domReady} from '@roots/sage/client';
import DateRangePicker from 'flowbite-datepicker/DateRangePicker';

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
    console.log(el);
    if(el)
        new DateRangePicker(el, {
            // options
        }); 
  });
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
