var ie=Object.defineProperty,oe=Object.defineProperties;var se=Object.getOwnPropertyDescriptors;var Rt=Object.getOwnPropertySymbols;var ue=Object.prototype.hasOwnProperty,ce=Object.prototype.propertyIsEnumerable;var bt=(t,e,r)=>e in t?ie(t,e,{enumerable:!0,configurable:!0,writable:!0,value:r}):t[e]=r,R=(t,e)=>{for(var r in e||(e={}))ue.call(e,r)&&bt(t,r,e[r]);if(Rt)for(var r of Rt(e))ce.call(e,r)&&bt(t,r,e[r]);return t},it=(t,e)=>oe(t,se(e));import{V as fe}from"./vueComponentNormalizer.87056a83.js";import{s as g,g as pe,m as $}from"./index.d328c175.js";import{_ as le}from"./default-i18n.abde8d59.js";/*!
  * vue-router v3.5.3
  * (c) 2021 Evan You
  * @license MIT
  */function A(t,e){for(var r in e)t[r]=e[r];return t}var he=/[!'()*]/g,ve=function(t){return"%"+t.charCodeAt(0).toString(16)},de=/%2C/g,U=function(t){return encodeURIComponent(t).replace(he,ve).replace(de,",")};function ot(t){try{return decodeURIComponent(t)}catch{}return t}function ye(t,e,r){e===void 0&&(e={});var n=r||ge,a;try{a=n(t||"")}catch{a={}}for(var i in e){var o=e[i];a[i]=Array.isArray(o)?o.map(xt):xt(o)}return a}var xt=function(t){return t==null||typeof t=="object"?t:String(t)};function ge(t){var e={};return t=t.trim().replace(/^(\?|#|&)/,""),t&&t.split("&").forEach(function(r){var n=r.replace(/\+/g," ").split("="),a=ot(n.shift()),i=n.length>0?ot(n.join("=")):null;e[a]===void 0?e[a]=i:Array.isArray(e[a])?e[a].push(i):e[a]=[e[a],i]}),e}function me(t){var e=t?Object.keys(t).map(function(r){var n=t[r];if(n===void 0)return"";if(n===null)return U(r);if(Array.isArray(n)){var a=[];return n.forEach(function(i){i!==void 0&&(i===null?a.push(U(r)):a.push(U(r)+"="+U(i)))}),a.join("&")}return U(r)+"="+U(n)}).filter(function(r){return r.length>0}).join("&"):null;return e?"?"+e:""}var Q=/\/?$/;function W(t,e,r,n){var a=n&&n.options.stringifyQuery,i=e.query||{};try{i=st(i)}catch{}var o={name:e.name||t&&t.name,meta:t&&t.meta||{},path:e.path||"/",hash:e.hash||"",query:i,params:e.params||{},fullPath:Et(e,a),matched:t?we(t):[]};return r&&(o.redirectedFrom=Et(r,a)),Object.freeze(o)}function st(t){if(Array.isArray(t))return t.map(st);if(t&&typeof t=="object"){var e={};for(var r in t)e[r]=st(t[r]);return e}else return t}var q=W(null,{path:"/"});function we(t){for(var e=[];t;)e.unshift(t),t=t.parent;return e}function Et(t,e){var r=t.path,n=t.query;n===void 0&&(n={});var a=t.hash;a===void 0&&(a="");var i=e||me;return(r||"/")+i(n)+a}function It(t,e,r){return e===q?t===e:e?t.path&&e.path?t.path.replace(Q,"")===e.path.replace(Q,"")&&(r||t.hash===e.hash&&z(t.query,e.query)):t.name&&e.name?t.name===e.name&&(r||t.hash===e.hash&&z(t.query,e.query)&&z(t.params,e.params)):!1:!1}function z(t,e){if(t===void 0&&(t={}),e===void 0&&(e={}),!t||!e)return t===e;var r=Object.keys(t).sort(),n=Object.keys(e).sort();return r.length!==n.length?!1:r.every(function(a,i){var o=t[a],s=n[i];if(s!==a)return!1;var u=e[a];return o==null||u==null?o===u:typeof o=="object"&&typeof u=="object"?z(o,u):String(o)===String(u)})}function Re(t,e){return t.path.replace(Q,"/").indexOf(e.path.replace(Q,"/"))===0&&(!e.hash||t.hash===e.hash)&&be(t.query,e.query)}function be(t,e){for(var r in e)if(!(r in t))return!1;return!0}function Ht(t){for(var e=0;e<t.matched.length;e++){var r=t.matched[e];for(var n in r.instances){var a=r.instances[n],i=r.enteredCbs[n];if(!(!a||!i)){delete r.enteredCbs[n];for(var o=0;o<i.length;o++)a._isBeingDestroyed||i[o](a)}}}}var xe={name:"RouterView",functional:!0,props:{name:{type:String,default:"default"}},render:function(e,r){var n=r.props,a=r.children,i=r.parent,o=r.data;o.routerView=!0;for(var s=i.$createElement,u=n.name,c=i.$route,l=i._routerViewCache||(i._routerViewCache={}),d=0,y=!1;i&&i._routerRoot!==i;){var v=i.$vnode?i.$vnode.data:{};v.routerView&&d++,v.keepAlive&&i._directInactive&&i._inactive&&(y=!0),i=i.$parent}if(o.routerViewDepth=d,y){var h=l[u],f=h&&h.component;return f?(h.configProps&&Ot(f,o,h.route,h.configProps),s(f,o,a)):s()}var p=c.matched[d],m=p&&p.components[u];if(!p||!m)return l[u]=null,s();l[u]={component:m},o.registerRouteInstance=function(w,O){var b=p.instances[u];(O&&b!==w||!O&&b===w)&&(p.instances[u]=O)},(o.hook||(o.hook={})).prepatch=function(w,O){p.instances[u]=O.componentInstance},o.hook.init=function(w){w.data.keepAlive&&w.componentInstance&&w.componentInstance!==p.instances[u]&&(p.instances[u]=w.componentInstance),Ht(c)};var E=p.props&&p.props[u];return E&&(A(l[u],{route:c,configProps:E}),Ot(m,o,c,E)),s(m,o,a)}};function Ot(t,e,r,n){var a=e.props=Ee(r,n);if(a){a=e.props=A({},a);var i=e.attrs=e.attrs||{};for(var o in a)(!t.props||!(o in t.props))&&(i[o]=a[o],delete a[o])}}function Ee(t,e){switch(typeof e){case"undefined":return;case"object":return e;case"function":return e(t);case"boolean":return e?t.params:void 0}}function Bt(t,e,r){var n=t.charAt(0);if(n==="/")return t;if(n==="?"||n==="#")return e+t;var a=e.split("/");(!r||!a[a.length-1])&&a.pop();for(var i=t.replace(/^\//,"").split("/"),o=0;o<i.length;o++){var s=i[o];s===".."?a.pop():s!=="."&&a.push(s)}return a[0]!==""&&a.unshift(""),a.join("/")}function Oe(t){var e="",r="",n=t.indexOf("#");n>=0&&(e=t.slice(n),t=t.slice(0,n));var a=t.indexOf("?");return a>=0&&(r=t.slice(a+1),t=t.slice(0,a)),{path:t,query:r,hash:e}}function T(t){return t.replace(/\/+/g,"/")}var X=Array.isArray||function(t){return Object.prototype.toString.call(t)=="[object Array]"},M=Ft,_e=ht,$e=Se,Pe=Vt,Ae=zt,Ce=new RegExp(["(\\\\.)","([\\/.])?(?:(?:\\:(\\w+)(?:\\(((?:\\\\.|[^\\\\()])+)\\))?|\\(((?:\\\\.|[^\\\\()])+)\\))([+*?])?|(\\*))"].join("|"),"g");function ht(t,e){for(var r=[],n=0,a=0,i="",o=e&&e.delimiter||"/",s;(s=Ce.exec(t))!=null;){var u=s[0],c=s[1],l=s.index;if(i+=t.slice(a,l),a=l+u.length,c){i+=c[1];continue}var d=t[a],y=s[2],v=s[3],h=s[4],f=s[5],p=s[6],m=s[7];i&&(r.push(i),i="");var E=y!=null&&d!=null&&d!==y,w=p==="+"||p==="*",O=p==="?"||p==="*",b=s[2]||o,_=h||f;r.push({name:v||n++,prefix:y||"",delimiter:b,optional:O,repeat:w,partial:E,asterisk:!!m,pattern:_?Ne(_):m?".*":"[^"+F(b)+"]+?"})}return a<t.length&&(i+=t.substr(a)),i&&r.push(i),r}function Se(t,e){return Vt(ht(t,e),e)}function Te(t){return encodeURI(t).replace(/[\/?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function Le(t){return encodeURI(t).replace(/[?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function Vt(t,e){for(var r=new Array(t.length),n=0;n<t.length;n++)typeof t[n]=="object"&&(r[n]=new RegExp("^(?:"+t[n].pattern+")$",dt(e)));return function(a,i){for(var o="",s=a||{},u=i||{},c=u.pretty?Te:encodeURIComponent,l=0;l<t.length;l++){var d=t[l];if(typeof d=="string"){o+=d;continue}var y=s[d.name],v;if(y==null)if(d.optional){d.partial&&(o+=d.prefix);continue}else throw new TypeError('Expected "'+d.name+'" to be defined');if(X(y)){if(!d.repeat)throw new TypeError('Expected "'+d.name+'" to not repeat, but received `'+JSON.stringify(y)+"`");if(y.length===0){if(d.optional)continue;throw new TypeError('Expected "'+d.name+'" to not be empty')}for(var h=0;h<y.length;h++){if(v=c(y[h]),!r[l].test(v))throw new TypeError('Expected all "'+d.name+'" to match "'+d.pattern+'", but received `'+JSON.stringify(v)+"`");o+=(h===0?d.prefix:d.delimiter)+v}continue}if(v=d.asterisk?Le(y):c(y),!r[l].test(v))throw new TypeError('Expected "'+d.name+'" to match "'+d.pattern+'", but received "'+v+'"');o+=d.prefix+v}return o}}function F(t){return t.replace(/([.+*?=^!:${}()[\]|\/\\])/g,"\\$1")}function Ne(t){return t.replace(/([=!:$\/()])/g,"\\$1")}function vt(t,e){return t.keys=e,t}function dt(t){return t&&t.sensitive?"":"i"}function qe(t,e){var r=t.source.match(/\((?!\?)/g);if(r)for(var n=0;n<r.length;n++)e.push({name:n,prefix:null,delimiter:null,optional:!1,repeat:!1,partial:!1,asterisk:!1,pattern:null});return vt(t,e)}function ke(t,e,r){for(var n=[],a=0;a<t.length;a++)n.push(Ft(t[a],e,r).source);var i=new RegExp("(?:"+n.join("|")+")",dt(r));return vt(i,e)}function Ue(t,e,r){return zt(ht(t,r),e,r)}function zt(t,e,r){X(e)||(r=e||r,e=[]),r=r||{};for(var n=r.strict,a=r.end!==!1,i="",o=0;o<t.length;o++){var s=t[o];if(typeof s=="string")i+=F(s);else{var u=F(s.prefix),c="(?:"+s.pattern+")";e.push(s),s.repeat&&(c+="(?:"+u+c+")*"),s.optional?s.partial?c=u+"("+c+")?":c="(?:"+u+"("+c+"))?":c=u+"("+c+")",i+=c}}var l=F(r.delimiter||"/"),d=i.slice(-l.length)===l;return n||(i=(d?i.slice(0,-l.length):i)+"(?:"+l+"(?=$))?"),a?i+="$":i+=n&&d?"":"(?="+l+"|$)",vt(new RegExp("^"+i,dt(r)),e)}function Ft(t,e,r){return X(e)||(r=e||r,e=[]),r=r||{},t instanceof RegExp?qe(t,e):X(t)?ke(t,e,r):Ue(t,e,r)}M.parse=_e;M.compile=$e;M.tokensToFunction=Pe;M.tokensToRegExp=Ae;var _t=Object.create(null);function G(t,e,r){e=e||{};try{var n=_t[t]||(_t[t]=M.compile(t));return typeof e.pathMatch=="string"&&(e[0]=e.pathMatch),n(e,{pretty:!0})}catch{return""}finally{delete e[0]}}function yt(t,e,r,n){var a=typeof t=="string"?{path:t}:t;if(a._normalized)return a;if(a.name){a=A({},t);var i=a.params;return i&&typeof i=="object"&&(a.params=A({},i)),a}if(!a.path&&a.params&&e){a=A({},a),a._normalized=!0;var o=A(A({},e.params),a.params);if(e.name)a.name=e.name,a.params=o;else if(e.matched.length){var s=e.matched[e.matched.length-1].path;a.path=G(s,o,"path "+e.path)}return a}var u=Oe(a.path||""),c=e&&e.path||"/",l=u.path?Bt(u.path,c,r||a.append):c,d=ye(u.query,a.query,n&&n.options.parseQuery),y=a.hash||u.hash;return y&&y.charAt(0)!=="#"&&(y="#"+y),{_normalized:!0,path:l,query:d,hash:y}}var je=[String,Object],Me=[String,Array],$t=function(){},Ie={name:"RouterLink",props:{to:{type:je,required:!0},tag:{type:String,default:"a"},custom:Boolean,exact:Boolean,exactPath:Boolean,append:Boolean,replace:Boolean,activeClass:String,exactActiveClass:String,ariaCurrentValue:{type:String,default:"page"},event:{type:Me,default:"click"}},render:function(e){var r=this,n=this.$router,a=this.$route,i=n.resolve(this.to,a,this.append),o=i.location,s=i.route,u=i.href,c={},l=n.options.linkActiveClass,d=n.options.linkExactActiveClass,y=l==null?"router-link-active":l,v=d==null?"router-link-exact-active":d,h=this.activeClass==null?y:this.activeClass,f=this.exactActiveClass==null?v:this.exactActiveClass,p=s.redirectedFrom?W(null,yt(s.redirectedFrom),null,n):s;c[f]=It(a,p,this.exactPath),c[h]=this.exact||this.exactPath?c[f]:Re(a,p);var m=c[f]?this.ariaCurrentValue:null,E=function(at){Pt(at)&&(r.replace?n.replace(o,$t):n.push(o,$t))},w={click:Pt};Array.isArray(this.event)?this.event.forEach(function(at){w[at]=E}):w[this.event]=E;var O={class:c},b=!this.$scopedSlots.$hasNormal&&this.$scopedSlots.default&&this.$scopedSlots.default({href:u,route:s,navigate:E,isActive:c[h],isExactActive:c[f]});if(b){if(b.length===1)return b[0];if(b.length>1||!b.length)return b.length===0?e():e("span",{},b)}if(this.tag==="a")O.on=w,O.attrs={href:u,"aria-current":m};else{var _=Gt(this.$slots.default);if(_){_.isStatic=!1;var P=_.data=A({},_.data);P.on=P.on||{};for(var S in P.on){var nt=P.on[S];S in w&&(P.on[S]=Array.isArray(nt)?nt:[nt])}for(var B in w)B in P.on?P.on[B].push(w[B]):P.on[B]=E;var wt=_.data.attrs=A({},_.data.attrs);wt.href=u,wt["aria-current"]=m}else O.on=w}return e(this.tag,O,this.$slots.default)}};function Pt(t){if(!(t.metaKey||t.altKey||t.ctrlKey||t.shiftKey)&&!t.defaultPrevented&&!(t.button!==void 0&&t.button!==0)){if(t.currentTarget&&t.currentTarget.getAttribute){var e=t.currentTarget.getAttribute("target");if(/\b_blank\b/i.test(e))return}return t.preventDefault&&t.preventDefault(),!0}}function Gt(t){if(t){for(var e,r=0;r<t.length;r++)if(e=t[r],e.tag==="a"||e.children&&(e=Gt(e.children)))return e}}var Y;function ut(t){if(!(ut.installed&&Y===t)){ut.installed=!0,Y=t;var e=function(a){return a!==void 0},r=function(a,i){var o=a.$options._parentVnode;e(o)&&e(o=o.data)&&e(o=o.registerRouteInstance)&&o(a,i)};t.mixin({beforeCreate:function(){e(this.$options.router)?(this._routerRoot=this,this._router=this.$options.router,this._router.init(this),t.util.defineReactive(this,"_route",this._router.history.current)):this._routerRoot=this.$parent&&this.$parent._routerRoot||this,r(this,this)},destroyed:function(){r(this)}}),Object.defineProperty(t.prototype,"$router",{get:function(){return this._routerRoot._router}}),Object.defineProperty(t.prototype,"$route",{get:function(){return this._routerRoot._route}}),t.component("RouterView",xe),t.component("RouterLink",Ie);var n=t.config.optionMergeStrategies;n.beforeRouteEnter=n.beforeRouteLeave=n.beforeRouteUpdate=n.created}}var H=typeof window!="undefined";function V(t,e,r,n,a){var i=e||[],o=r||Object.create(null),s=n||Object.create(null);t.forEach(function(l){ct(i,o,s,l,a)});for(var u=0,c=i.length;u<c;u++)i[u]==="*"&&(i.push(i.splice(u,1)[0]),c--,u--);return{pathList:i,pathMap:o,nameMap:s}}function ct(t,e,r,n,a,i){var o=n.path,s=n.name,u=n.pathToRegexpOptions||{},c=Be(o,a,u.strict);typeof n.caseSensitive=="boolean"&&(u.sensitive=n.caseSensitive);var l={path:c,regex:He(c,u),components:n.components||{default:n.component},alias:n.alias?typeof n.alias=="string"?[n.alias]:n.alias:[],instances:{},enteredCbs:{},name:s,parent:a,matchAs:i,redirect:n.redirect,beforeEnter:n.beforeEnter,meta:n.meta||{},props:n.props==null?{}:n.components?n.props:{default:n.props}};if(n.children&&n.children.forEach(function(f){var p=i?T(i+"/"+f.path):void 0;ct(t,e,r,f,l,p)}),e[l.path]||(t.push(l.path),e[l.path]=l),n.alias!==void 0)for(var d=Array.isArray(n.alias)?n.alias:[n.alias],y=0;y<d.length;++y){var v=d[y],h={path:v,children:n.children};ct(t,e,r,h,a,l.path||"/")}s&&(r[s]||(r[s]=l))}function He(t,e){var r=M(t,[],e);return r}function Be(t,e,r){return r||(t=t.replace(/\/$/,"")),t[0]==="/"||e==null?t:T(e.path+"/"+t)}function Ve(t,e){var r=V(t),n=r.pathList,a=r.pathMap,i=r.nameMap;function o(v){V(v,n,a,i)}function s(v,h){var f=typeof v!="object"?i[v]:void 0;V([h||v],n,a,i,f),f&&f.alias.length&&V(f.alias.map(function(p){return{path:p,children:[h]}}),n,a,i,f)}function u(){return n.map(function(v){return a[v]})}function c(v,h,f){var p=yt(v,h,!1,e),m=p.name;if(m){var E=i[m];if(!E)return y(null,p);var w=E.regex.keys.filter(function(S){return!S.optional}).map(function(S){return S.name});if(typeof p.params!="object"&&(p.params={}),h&&typeof h.params=="object")for(var O in h.params)!(O in p.params)&&w.indexOf(O)>-1&&(p.params[O]=h.params[O]);return p.path=G(E.path,p.params),y(E,p,f)}else if(p.path){p.params={};for(var b=0;b<n.length;b++){var _=n[b],P=a[_];if(ze(P.regex,p.path,p.params))return y(P,p,f)}}return y(null,p)}function l(v,h){var f=v.redirect,p=typeof f=="function"?f(W(v,h,null,e)):f;if(typeof p=="string"&&(p={path:p}),!p||typeof p!="object")return y(null,h);var m=p,E=m.name,w=m.path,O=h.query,b=h.hash,_=h.params;if(O=m.hasOwnProperty("query")?m.query:O,b=m.hasOwnProperty("hash")?m.hash:b,_=m.hasOwnProperty("params")?m.params:_,E)return i[E],c({_normalized:!0,name:E,query:O,hash:b,params:_},void 0,h);if(w){var P=Fe(w,v),S=G(P,_);return c({_normalized:!0,path:S,query:O,hash:b},void 0,h)}else return y(null,h)}function d(v,h,f){var p=G(f,h.params),m=c({_normalized:!0,path:p});if(m){var E=m.matched,w=E[E.length-1];return h.params=m.params,y(w,h)}return y(null,h)}function y(v,h,f){return v&&v.redirect?l(v,f||h):v&&v.matchAs?d(v,h,v.matchAs):W(v,h,f,e)}return{match:c,addRoute:s,getRoutes:u,addRoutes:o}}function ze(t,e,r){var n=e.match(t);if(n){if(!r)return!0}else return!1;for(var a=1,i=n.length;a<i;++a){var o=t.keys[a-1];o&&(r[o.name||"pathMatch"]=typeof n[a]=="string"?ot(n[a]):n[a])}return!0}function Fe(t,e){return Bt(t,e.parent?e.parent.path:"/",!0)}var Ge=H&&window.performance&&window.performance.now?window.performance:Date;function Jt(){return Ge.now().toFixed(3)}var Kt=Jt();function tt(){return Kt}function Qt(t){return Kt=t}var Wt=Object.create(null);function Xt(){"scrollRestoration"in window.history&&(window.history.scrollRestoration="manual");var t=window.location.protocol+"//"+window.location.host,e=window.location.href.replace(t,""),r=A({},window.history.state);return r.key=tt(),window.history.replaceState(r,"",e),window.addEventListener("popstate",At),function(){window.removeEventListener("popstate",At)}}function L(t,e,r,n){if(!!t.app){var a=t.options.scrollBehavior;!a||t.app.$nextTick(function(){var i=Je(),o=a.call(t,e,r,n?i:null);!o||(typeof o.then=="function"?o.then(function(s){Tt(s,i)}).catch(function(s){}):Tt(o,i))})}}function Yt(){var t=tt();t&&(Wt[t]={x:window.pageXOffset,y:window.pageYOffset})}function At(t){Yt(),t.state&&t.state.key&&Qt(t.state.key)}function Je(){var t=tt();if(t)return Wt[t]}function Ke(t,e){var r=document.documentElement,n=r.getBoundingClientRect(),a=t.getBoundingClientRect();return{x:a.left-n.left-e.x,y:a.top-n.top-e.y}}function Ct(t){return j(t.x)||j(t.y)}function St(t){return{x:j(t.x)?t.x:window.pageXOffset,y:j(t.y)?t.y:window.pageYOffset}}function Qe(t){return{x:j(t.x)?t.x:0,y:j(t.y)?t.y:0}}function j(t){return typeof t=="number"}var We=/^#\d/;function Tt(t,e){var r=typeof t=="object";if(r&&typeof t.selector=="string"){var n=We.test(t.selector)?document.getElementById(t.selector.slice(1)):document.querySelector(t.selector);if(n){var a=t.offset&&typeof t.offset=="object"?t.offset:{};a=Qe(a),e=Ke(n,a)}else Ct(t)&&(e=St(t))}else r&&Ct(t)&&(e=St(t));e&&("scrollBehavior"in document.documentElement.style?window.scrollTo({left:e.x,top:e.y,behavior:t.behavior}):window.scrollTo(e.x,e.y))}var N=H&&function(){var t=window.navigator.userAgent;return(t.indexOf("Android 2.")!==-1||t.indexOf("Android 4.0")!==-1)&&t.indexOf("Mobile Safari")!==-1&&t.indexOf("Chrome")===-1&&t.indexOf("Windows Phone")===-1?!1:window.history&&typeof window.history.pushState=="function"}();function Z(t,e){Yt();var r=window.history;try{if(e){var n=A({},r.state);n.key=tt(),r.replaceState(n,"",t)}else r.pushState({key:Qt(Jt())},"",t)}catch{window.location[e?"replace":"assign"](t)}}function ft(t){Z(t,!0)}function Lt(t,e,r){var n=function(a){a>=t.length?r():t[a]?e(t[a],function(){n(a+1)}):n(a+1)};n(0)}var k={redirected:2,aborted:4,cancelled:8,duplicated:16};function Xe(t,e){return et(t,e,k.redirected,'Redirected when going from "'+t.fullPath+'" to "'+tr(e)+'" via a navigation guard.')}function Ye(t,e){var r=et(t,e,k.duplicated,'Avoided redundant navigation to current location: "'+t.fullPath+'".');return r.name="NavigationDuplicated",r}function Nt(t,e){return et(t,e,k.cancelled,'Navigation cancelled from "'+t.fullPath+'" to "'+e.fullPath+'" with a new navigation.')}function Ze(t,e){return et(t,e,k.aborted,'Navigation aborted from "'+t.fullPath+'" to "'+e.fullPath+'" via a navigation guard.')}function et(t,e,r,n){var a=new Error(n);return a._isRouter=!0,a.from=t,a.to=e,a.type=r,a}var De=["params","query","hash"];function tr(t){if(typeof t=="string")return t;if("path"in t)return t.path;var e={};return De.forEach(function(r){r in t&&(e[r]=t[r])}),JSON.stringify(e,null,2)}function D(t){return Object.prototype.toString.call(t).indexOf("Error")>-1}function rt(t,e){return D(t)&&t._isRouter&&(e==null||t.type===e)}function er(t){return function(e,r,n){var a=!1,i=0,o=null;Zt(t,function(s,u,c,l){if(typeof s=="function"&&s.cid===void 0){a=!0,i++;var d=qt(function(f){nr(f)&&(f=f.default),s.resolved=typeof f=="function"?f:Y.extend(f),c.components[l]=f,i--,i<=0&&n()}),y=qt(function(f){var p="Failed to resolve async component "+l+": "+f;o||(o=D(f)?f:new Error(p),n(o))}),v;try{v=s(d,y)}catch(f){y(f)}if(v)if(typeof v.then=="function")v.then(d,y);else{var h=v.component;h&&typeof h.then=="function"&&h.then(d,y)}}}),a||n()}}function Zt(t,e){return Dt(t.map(function(r){return Object.keys(r.components).map(function(n){return e(r.components[n],r.instances[n],r,n)})}))}function Dt(t){return Array.prototype.concat.apply([],t)}var rr=typeof Symbol=="function"&&typeof Symbol.toStringTag=="symbol";function nr(t){return t.__esModule||rr&&t[Symbol.toStringTag]==="Module"}function qt(t){var e=!1;return function(){for(var r=[],n=arguments.length;n--;)r[n]=arguments[n];if(!e)return e=!0,t.apply(this,r)}}var C=function(e,r){this.router=e,this.base=ar(r),this.current=q,this.pending=null,this.ready=!1,this.readyCbs=[],this.readyErrorCbs=[],this.errorCbs=[],this.listeners=[]};C.prototype.listen=function(e){this.cb=e};C.prototype.onReady=function(e,r){this.ready?e():(this.readyCbs.push(e),r&&this.readyErrorCbs.push(r))};C.prototype.onError=function(e){this.errorCbs.push(e)};C.prototype.transitionTo=function(e,r,n){var a=this,i;try{i=this.router.match(e,this.current)}catch(s){throw this.errorCbs.forEach(function(u){u(s)}),s}var o=this.current;this.confirmTransition(i,function(){a.updateRoute(i),r&&r(i),a.ensureURL(),a.router.afterHooks.forEach(function(s){s&&s(i,o)}),a.ready||(a.ready=!0,a.readyCbs.forEach(function(s){s(i)}))},function(s){n&&n(s),s&&!a.ready&&(!rt(s,k.redirected)||o!==q)&&(a.ready=!0,a.readyErrorCbs.forEach(function(u){u(s)}))})};C.prototype.confirmTransition=function(e,r,n){var a=this,i=this.current;this.pending=e;var o=function(f){!rt(f)&&D(f)&&(a.errorCbs.length?a.errorCbs.forEach(function(p){p(f)}):console.error(f)),n&&n(f)},s=e.matched.length-1,u=i.matched.length-1;if(It(e,i)&&s===u&&e.matched[s]===i.matched[u])return this.ensureURL(),e.hash&&L(this.router,i,e,!1),o(Ye(i,e));var c=ir(this.current.matched,e.matched),l=c.updated,d=c.deactivated,y=c.activated,v=[].concat(sr(d),this.router.beforeHooks,ur(l),y.map(function(f){return f.beforeEnter}),er(y)),h=function(f,p){if(a.pending!==e)return o(Nt(i,e));try{f(e,i,function(m){m===!1?(a.ensureURL(!0),o(Ze(i,e))):D(m)?(a.ensureURL(!0),o(m)):typeof m=="string"||typeof m=="object"&&(typeof m.path=="string"||typeof m.name=="string")?(o(Xe(i,e)),typeof m=="object"&&m.replace?a.replace(m):a.push(m)):p(m)})}catch(m){o(m)}};Lt(v,h,function(){var f=cr(y),p=f.concat(a.router.resolveHooks);Lt(p,h,function(){if(a.pending!==e)return o(Nt(i,e));a.pending=null,r(e),a.router.app&&a.router.app.$nextTick(function(){Ht(e)})})})};C.prototype.updateRoute=function(e){this.current=e,this.cb&&this.cb(e)};C.prototype.setupListeners=function(){};C.prototype.teardown=function(){this.listeners.forEach(function(e){e()}),this.listeners=[],this.current=q,this.pending=null};function ar(t){if(!t)if(H){var e=document.querySelector("base");t=e&&e.getAttribute("href")||"/",t=t.replace(/^https?:\/\/[^\/]+/,"")}else t="/";return t.charAt(0)!=="/"&&(t="/"+t),t.replace(/\/$/,"")}function ir(t,e){var r,n=Math.max(t.length,e.length);for(r=0;r<n&&t[r]===e[r];r++);return{updated:e.slice(0,r),activated:e.slice(r),deactivated:t.slice(r)}}function gt(t,e,r,n){var a=Zt(t,function(i,o,s,u){var c=or(i,e);if(c)return Array.isArray(c)?c.map(function(l){return r(l,o,s,u)}):r(c,o,s,u)});return Dt(n?a.reverse():a)}function or(t,e){return typeof t!="function"&&(t=Y.extend(t)),t.options[e]}function sr(t){return gt(t,"beforeRouteLeave",te,!0)}function ur(t){return gt(t,"beforeRouteUpdate",te)}function te(t,e){if(e)return function(){return t.apply(e,arguments)}}function cr(t){return gt(t,"beforeRouteEnter",function(e,r,n,a){return fr(e,n,a)})}function fr(t,e,r){return function(a,i,o){return t(a,i,function(s){typeof s=="function"&&(e.enteredCbs[r]||(e.enteredCbs[r]=[]),e.enteredCbs[r].push(s)),o(s)})}}var ee=function(t){function e(r,n){t.call(this,r,n),this._startLocation=I(this.base)}return t&&(e.__proto__=t),e.prototype=Object.create(t&&t.prototype),e.prototype.constructor=e,e.prototype.setupListeners=function(){var n=this;if(!(this.listeners.length>0)){var a=this.router,i=a.options.scrollBehavior,o=N&&i;o&&this.listeners.push(Xt());var s=function(){var u=n.current,c=I(n.base);n.current===q&&c===n._startLocation||n.transitionTo(c,function(l){o&&L(a,l,u,!0)})};window.addEventListener("popstate",s),this.listeners.push(function(){window.removeEventListener("popstate",s)})}},e.prototype.go=function(n){window.history.go(n)},e.prototype.push=function(n,a,i){var o=this,s=this,u=s.current;this.transitionTo(n,function(c){Z(T(o.base+c.fullPath)),L(o.router,c,u,!1),a&&a(c)},i)},e.prototype.replace=function(n,a,i){var o=this,s=this,u=s.current;this.transitionTo(n,function(c){ft(T(o.base+c.fullPath)),L(o.router,c,u,!1),a&&a(c)},i)},e.prototype.ensureURL=function(n){if(I(this.base)!==this.current.fullPath){var a=T(this.base+this.current.fullPath);n?Z(a):ft(a)}},e.prototype.getCurrentLocation=function(){return I(this.base)},e}(C);function I(t){var e=window.location.pathname,r=e.toLowerCase(),n=t.toLowerCase();return t&&(r===n||r.indexOf(T(n+"/"))===0)&&(e=e.slice(t.length)),(e||"/")+window.location.search+window.location.hash}var re=function(t){function e(r,n,a){t.call(this,r,n),!(a&&pr(this.base))&&kt()}return t&&(e.__proto__=t),e.prototype=Object.create(t&&t.prototype),e.prototype.constructor=e,e.prototype.setupListeners=function(){var n=this;if(!(this.listeners.length>0)){var a=this.router,i=a.options.scrollBehavior,o=N&&i;o&&this.listeners.push(Xt());var s=function(){var c=n.current;!kt()||n.transitionTo(J(),function(l){o&&L(n.router,l,c,!0),N||K(l.fullPath)})},u=N?"popstate":"hashchange";window.addEventListener(u,s),this.listeners.push(function(){window.removeEventListener(u,s)})}},e.prototype.push=function(n,a,i){var o=this,s=this,u=s.current;this.transitionTo(n,function(c){Ut(c.fullPath),L(o.router,c,u,!1),a&&a(c)},i)},e.prototype.replace=function(n,a,i){var o=this,s=this,u=s.current;this.transitionTo(n,function(c){K(c.fullPath),L(o.router,c,u,!1),a&&a(c)},i)},e.prototype.go=function(n){window.history.go(n)},e.prototype.ensureURL=function(n){var a=this.current.fullPath;J()!==a&&(n?Ut(a):K(a))},e.prototype.getCurrentLocation=function(){return J()},e}(C);function pr(t){var e=I(t);if(!/^\/#/.test(e))return window.location.replace(T(t+"/#"+e)),!0}function kt(){var t=J();return t.charAt(0)==="/"?!0:(K("/"+t),!1)}function J(){var t=window.location.href,e=t.indexOf("#");return e<0?"":(t=t.slice(e+1),t)}function pt(t){var e=window.location.href,r=e.indexOf("#"),n=r>=0?e.slice(0,r):e;return n+"#"+t}function Ut(t){N?Z(pt(t)):window.location.hash=t}function K(t){N?ft(pt(t)):window.location.replace(pt(t))}var lr=function(t){function e(r,n){t.call(this,r,n),this.stack=[],this.index=-1}return t&&(e.__proto__=t),e.prototype=Object.create(t&&t.prototype),e.prototype.constructor=e,e.prototype.push=function(n,a,i){var o=this;this.transitionTo(n,function(s){o.stack=o.stack.slice(0,o.index+1).concat(s),o.index++,a&&a(s)},i)},e.prototype.replace=function(n,a,i){var o=this;this.transitionTo(n,function(s){o.stack=o.stack.slice(0,o.index).concat(s),a&&a(s)},i)},e.prototype.go=function(n){var a=this,i=this.index+n;if(!(i<0||i>=this.stack.length)){var o=this.stack[i];this.confirmTransition(o,function(){var s=a.current;a.index=i,a.updateRoute(o),a.router.afterHooks.forEach(function(u){u&&u(o,s)})},function(s){rt(s,k.duplicated)&&(a.index=i)})}},e.prototype.getCurrentLocation=function(){var n=this.stack[this.stack.length-1];return n?n.fullPath:"/"},e.prototype.ensureURL=function(){},e}(C),x=function(e){e===void 0&&(e={}),this.app=null,this.apps=[],this.options=e,this.beforeHooks=[],this.resolveHooks=[],this.afterHooks=[],this.matcher=Ve(e.routes||[],this);var r=e.mode||"hash";switch(this.fallback=r==="history"&&!N&&e.fallback!==!1,this.fallback&&(r="hash"),H||(r="abstract"),this.mode=r,r){case"history":this.history=new ee(this,e.base);break;case"hash":this.history=new re(this,e.base,this.fallback);break;case"abstract":this.history=new lr(this,e.base);break}},ne={currentRoute:{configurable:!0}};x.prototype.match=function(e,r,n){return this.matcher.match(e,r,n)};ne.currentRoute.get=function(){return this.history&&this.history.current};x.prototype.init=function(e){var r=this;if(this.apps.push(e),e.$once("hook:destroyed",function(){var o=r.apps.indexOf(e);o>-1&&r.apps.splice(o,1),r.app===e&&(r.app=r.apps[0]||null),r.app||r.history.teardown()}),!this.app){this.app=e;var n=this.history;if(n instanceof ee||n instanceof re){var a=function(o){var s=n.current,u=r.options.scrollBehavior,c=N&&u;c&&"fullPath"in o&&L(r,o,s,!1)},i=function(o){n.setupListeners(),a(o)};n.transitionTo(n.getCurrentLocation(),i,i)}n.listen(function(o){r.apps.forEach(function(s){s._route=o})})}};x.prototype.beforeEach=function(e){return mt(this.beforeHooks,e)};x.prototype.beforeResolve=function(e){return mt(this.resolveHooks,e)};x.prototype.afterEach=function(e){return mt(this.afterHooks,e)};x.prototype.onReady=function(e,r){this.history.onReady(e,r)};x.prototype.onError=function(e){this.history.onError(e)};x.prototype.push=function(e,r,n){var a=this;if(!r&&!n&&typeof Promise!="undefined")return new Promise(function(i,o){a.history.push(e,i,o)});this.history.push(e,r,n)};x.prototype.replace=function(e,r,n){var a=this;if(!r&&!n&&typeof Promise!="undefined")return new Promise(function(i,o){a.history.replace(e,i,o)});this.history.replace(e,r,n)};x.prototype.go=function(e){this.history.go(e)};x.prototype.back=function(){this.go(-1)};x.prototype.forward=function(){this.go(1)};x.prototype.getMatchedComponents=function(e){var r=e?e.matched?e:this.resolve(e).route:this.currentRoute;return r?[].concat.apply([],r.matched.map(function(n){return Object.keys(n.components).map(function(a){return n.components[a]})})):[]};x.prototype.resolve=function(e,r,n){r=r||this.history.current;var a=yt(e,r,n,this),i=this.match(a,r),o=i.redirectedFrom||i.fullPath,s=this.history.base,u=hr(s,o,this.mode);return{location:a,route:i,href:u,normalizedTo:a,resolved:i}};x.prototype.getRoutes=function(){return this.matcher.getRoutes()};x.prototype.addRoute=function(e,r){this.matcher.addRoute(e,r),this.history.current!==q&&this.history.transitionTo(this.history.getCurrentLocation())};x.prototype.addRoutes=function(e){this.matcher.addRoutes(e),this.history.current!==q&&this.history.transitionTo(this.history.getCurrentLocation())};Object.defineProperties(x.prototype,ne);function mt(t,e){return t.push(e),function(){var r=t.indexOf(e);r>-1&&t.splice(r,1)}}function hr(t,e,r){var n=r==="hash"?"#"+e:e;return t?T(t+"/"+n):n}x.install=ut;x.version="3.5.3";x.isNavigationFailure=rt;x.NavigationFailureType=k;x.START_LOCATION=q;H&&window.Vue&&window.Vue.use(x);var jt=x;const vr="all-in-one-seo-pack",ae=(t,e,r)=>{const n=e[r];return n?(...a)=>{t.next(...a);const i=ae(t,e,r+1);n(it(R({},t),{next:i}))}:t.next};var br=t=>{fe.use(jt);const e=new jt({base:`wp-admin/admin.php?page=aioseo-${window.aioseo.page}`,routes:t,scrollBehavior(r,n,a){return a||(r.hash?{selector:r.hash}:{x:0,y:0})}});return e.beforeEach(async(r,n,a)=>{if(!g.state.loaded){const{internalOptions:o,options:s,dynamicOptions:u,networkOptions:c,settings:l,notifications:d,helpPanel:y,addons:v,tags:h,license:f,backups:p,redirects:m,linkAssistant:E,indexNow:w}=await pe(e.app.$http);e.app.$set(g.state,"redirects",$(R({},g.state.redirects),R({},m))),e.app.$set(g.state,"linkAssistant",$(R({},g.state.linkAssistant),R({},E))),e.app.$set(g.state,"index-now",$(R({},g.state["index-now"]),R({},w))),e.app.$set(g.state,"internalOptions",$(R({},g.state.internalOptions),R({},o))),e.app.$set(g.state,"options",$(R({},g.state.options),R({},s))),e.app.$set(g.state,"dynamicOptions",$(R({},g.state.dynamicOptions),R({},u))),e.app.$set(g.state,"networkOptions",$(R({},g.state.networkOptions),R({},c))),e.app.$set(g.state,"settings",$(R({},g.state.settings),R({},l))),e.app.$set(g.state,"notifications",$(R({},g.state.notifications),R({},d))),e.app.$set(g.state,"helpPanel",$(R({},g.state.helpPanel),R({},y))),e.app.$set(g.state,"addons",$([...g.state.addons],[...v])),e.app.$set(g.state,"backups",$([...g.state.backups],[...p])),e.app.$set(g.state,"tags",$(R({},g.state.tags),R({},h))),e.app.$set(g.state,"license",$(R({},g.state.license),R({},f))),e.app.$set(g.state,"loaded",!0),g.commit("original/setOriginalOptions",JSON.parse(JSON.stringify(g.state.options))),g.commit("original/setOriginalDynamicOptions",JSON.parse(JSON.stringify(g.state.dynamicOptions))),g.commit("original/setOriginalNetworkOptions",JSON.parse(JSON.stringify(g.state.networkOptions))),g.state.redirects&&g.state.redirects.options&&g.commit("original/setOriginalRedirectOptions",JSON.parse(JSON.stringify(g.state.redirects.options))),g.state["index-now"]&&g.state["index-now"].options&&g.commit("original/setOriginalIndexNowOptions",JSON.parse(JSON.stringify(g.state["index-now"].options))),window.addEventListener("beforeunload",O=>{if(!g.getters["original/isDirty"])return;const b=le("Are you sure you want to leave? you have unsaved changes!",vr);return(O||window.event).returnValue=b,b}),g.dispatch("ping")}const i=r.meta.access;if(!e.app.$allowed(i))return r.meta.home!==n.name?e.replace({name:r.meta.home}):null;if(r.meta.middleware){const o=Array.isArray(r.meta.middleware)?r.meta.middleware:[r.meta.middleware],s={from:n,next:a,router:e,to:r},u=ae(s,o,1);return o[0](it(R({},s),{next:u}))}return g.commit("redirects/resetPageNumbers"),a()}),e};const dr="modulepreload",Mt={},yr="",xr=function(e,r){return!r||r.length===0?e():Promise.all(r.map(n=>{if(n=`${yr}${n}`,n in Mt)return;Mt[n]=!0;const a=n.endsWith(".css"),i=a?'[rel="stylesheet"]':"";if(document.querySelector(`link[href="${n}"]${i}`))return;const o=document.createElement("link");if(o.rel=a?"stylesheet":dr,a||(o.as="script",o.crossOrigin=""),o.href=n,document.head.appendChild(o),a)return new Promise((s,u)=>{o.addEventListener("load",s),o.addEventListener("error",()=>u(new Error(`Unable to preload CSS for ${n}`)))})})).then(()=>e())};var Er=function(t,e,r){var n=(r||{}).moduleName||"route";t.registerModule(n,{namespaced:!0,state:lt(e.currentRoute),mutations:{ROUTE_CHANGED:function(c,l){t.state[n]=lt(l.to,l.from)}}});var a=!1,i,o=t.watch(function(u){return u[n]},function(u){var c=u.fullPath;c!==i&&(i!=null&&(a=!0,e.push(u)),i=c)},{sync:!0}),s=e.afterEach(function(u,c){if(a){a=!1;return}i=u.fullPath,t.commit(n+"/ROUTE_CHANGED",{to:u,from:c})});return function(){s!=null&&s(),o!=null&&o(),t.unregisterModule(n)}};function lt(t,e){var r={name:t.name,path:t.path,hash:t.hash,query:t.query,params:t.params,fullPath:t.fullPath,meta:t.meta};return e&&(r.from=lt(e)),Object.freeze(r)}export{xr as _,Er as a,br as s};
