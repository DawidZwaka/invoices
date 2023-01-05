import {domReady} from '@roots/sage/client';
import Alpine from 'alpinejs';

import invoicesTable from './alpine/data/invoicesTable';
 
import initFlowbiteComponents from './vendros/flowbite';


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

  initFlowbiteComponents();
}

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
Alpine.data('invoicesTable', invoicesTable);
Alpine.start();
import.meta.webpackHot?.accept(main);
