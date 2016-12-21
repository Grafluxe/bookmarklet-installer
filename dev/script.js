/**
 * @author Leandro Silva | Grafluxe, 2016
 */

/*jshint devel:true*/

"use strict";

var bmkDesktop = document.querySelector("#desktop"),
    bmkMobile = document.querySelector("#mobile");

bmkDesktop.addEventListener("click", function (e) {
  e.preventDefault();
  alert("For desktop use, drag and drop this button into your bookmarks bar.");
});

bmkMobile.addEventListener("click", function (e) {
  e.preventDefault();
  location.hash = bmkMobile.dataset.hash;
});
