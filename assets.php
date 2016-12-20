<?php
/**
 * If you plan on including app-specific assets,
 * copy this file into the root of your project.
 * Define within these array elements the assets you
 * would like to be included in the compiling, concatenation,
 * and minification process.
 *
 * The expected paths are indicated below.
 */
return [
    'scssFiles' =>  [
        //located in resources/assets/scss
        "app.scss", "orgChange.scss","dropzone.scss"
    ],
    'cssFiles'  =>  [
        //located in resources/assets/css
        //"app.css"
    ],
    'jsFiles'   =>  [
        //located in resources/assets/js
        //"app.js"
        "dropzone.js"
    ],
    'jsPublic'  =>  [
        //located in resources/assets/js
        //will get copied directly to the public/js folder and not be included in minification
        //"scripts-for-a-single-view.js"
    ],
];
