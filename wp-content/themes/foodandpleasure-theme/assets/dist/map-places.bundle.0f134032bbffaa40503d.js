"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return o}});var s;(t=s=s||{})[t.INITIALIZED=0]="INITIALIZED",t[t.LOADING=1]="LOADING",t[t.SUCCESS=2]="SUCCESS",t[t.FAILURE=3]="FAILURE";const o=(()=>{let a=0,t="",s="";var e=ThemeSetupDos.themeUri;ThemeSetupDos.maps.marker,ThemeSetupDos.maps.markerActive;ThemeSetupDos.maps.api;ThemeSetupDos.maps.center;parseInt(ThemeSetupDos.maps.zoom);const o=e=>(console.log("La nota tiene lugares"),e.querySelectorAll("[data-place-id]"));return{init:()=>{console.log("Inicializando mapa de lugares",a);var e=a=ThemeSetupDos.currentID||0;t=document.getElementById("post-"+e),s=t.querySelector(".single-widget-area"),o(t)}}})()}}]);