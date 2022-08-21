var d=Object.defineProperty,f=Object.defineProperties;var g=Object.getOwnPropertyDescriptors;var c=Object.getOwnPropertySymbols;var m=Object.prototype.hasOwnProperty,y=Object.prototype.propertyIsEnumerable;var i=(t,e,r)=>e in t?d(t,e,{enumerable:!0,configurable:!0,writable:!0,value:r}):t[e]=r,a=(t,e)=>{for(var r in e||(e={}))m.call(e,r)&&i(t,r,e[r]);if(c)for(var r of c(e))y.call(e,r)&&i(t,r,e[r]);return t},_=(t,e)=>f(t,g(e));import{n as s}from"./vueComponentNormalizer.87056a83.js";import{b as $}from"./index.d328c175.js";import{S as h}from"./Logo.1a5e022a.js";var C=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"aioseo-wizard-body"},[r("div",{staticClass:"body-content"},[t._t("default")],2),t.$slots.cta?r("div",{staticClass:"cta"},[t._t("cta")],2):t._e(),r("div",{staticClass:"body-footer"},[t._t("footer")],2)])},x=[];const S={},u={};var z=s(S,C,x,!1,A,null,null,null);function A(t){for(let e in u)this[e]=u[e]}var K=function(){return z.exports}(),w=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"aioseo-wizard-container"},[t._t("default")],2)},b=[];const R={},l={};var W=s(R,w,b,!1,j,null,null,null);function j(t){for(let e in l)this[e]=l[e]}var N=function(){return W.exports}(),E=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"aioseo-wizard-progress"},t._l(t.getSteps,function(n,o){return r("div",{key:o,class:[{circle:!n.spacer},{spacer:n.spacer},{active:t.getActiveClass(n,o)}]})}),0)},F=[];const M={props:{steps:{type:Array,required:!0}},computed:{getSteps(){const t={spacer:!0};return[...this.steps].map((e,r)=>r<this.steps.length-1?[e,a({},t)]:[e]).reduce((e,r)=>e.concat(r))}},methods:{getActiveClass(t,e){return t.spacer?!!this.getSteps[e+1].active:t.active}}},v={};var L=s(M,E,F,!1,P,null,null,null);function P(t){for(let e in v)this[e]=v[e]}var B=function(){return L.exports}(),H=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"aioseo-wizard-header"},[r("div",{staticClass:"logo"},[r("svg-aioseo-logo")],1),r("wizard-progress",{attrs:{steps:t.steps}})],1)},T=[];const k={components:{SvgAioseoLogo:h,WizardProgress:B},computed:_(a({},$("wizard",["getCurrentStageCount","getTotalStageCount"])),{steps(){const t=[];for(let e=0;e<this.getTotalStageCount;e++)e<this.getCurrentStageCount?t.push({active:!0}):t.push({active:!1});return t}})},p={};var q=s(k,H,T,!1,G,null,null,null);function G(t){for(let e in p)this[e]=p[e]}var O=function(){return q.exports}();export{K as W,N as a,O as b};
