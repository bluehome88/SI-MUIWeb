!function(){var u,i,l,o={frameRate:150,animationTime:400,stepSize:100,pulseAlgorithm:!0,pulseScale:4,pulseNormalize:1,accelerationDelta:50,accelerationMax:3,keyboardSupport:!0,arrowScroll:50,touchpadSupport:!1,fixedBackground:!0,excluded:""},h=o,c=!1,d=!1,n={x:0,y:0},s=!1,m=document.documentElement,r=[],a=/^Mac/.test(navigator.platform),f={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36};function w(){var e,t,o,n,r,a;!s&&document.body&&(s=!0,e=document.body,t=document.documentElement,a=window.innerHeight,o=e.scrollHeight,m=0<=document.compatMode.indexOf("CSS")?t:e,u=e,h.keyboardSupport&&X("keydown",v),top!=self?d=!0:a<o&&(e.offsetHeight<=a||t.offsetHeight<=a)&&((n=document.createElement("div")).style.cssText="position:absolute; z-index:-10000; top:0; left:0; right:0; height:"+m.scrollHeight+"px",document.body.appendChild(n),l=function(){r=r||setTimeout(function(){c||(n.style.height="0",n.style.height=m.scrollHeight+"px",r=null)},500)},setTimeout(l,10),X("resize",l),(i=new q(l)).observe(e,{attributes:!0,childList:!0,characterData:!1}),m.offsetHeight<=a&&((a=document.createElement("div")).style.clear="both",e.appendChild(a))),h.fixedBackground||c||(e.style.backgroundAttachment="scroll",t.style.backgroundAttachment="scroll"))}var p=[],b=!1,g=Date.now();function y(u,d,s){var e,t,m,f;e=0<(e=d)?1:-1,t=0<(t=s)?1:-1,n.x===e&&n.y===t||(n.x=e,n.y=t,p=[],g=0),1!=h.accelerationMax&&((t=Date.now()-g)<h.accelerationDelta&&(1<(t=(1+50/t)/2)&&(t=Math.min(t,h.accelerationMax),d*=t,s*=t)),g=Date.now()),p.push({x:d,y:s,lastX:d<0?.99:-.99,lastY:s<0?.99:-.99,start:Date.now()}),b||(m=u===document.body,f=function(e){for(var t=Date.now(),o=0,n=0,r=0;r<p.length;r++){var a=p[r],i=t-a.start,l=i>=h.animationTime,c=l?1:i/h.animationTime;h.pulseAlgorithm&&(c=function(e){if(1<=e)return 1;if(e<=0)return 0;1==h.pulseNormalize&&(h.pulseNormalize/=R(1));return R(e)}(c));i=a.x*c-a.lastX>>0,c=a.y*c-a.lastY>>0;o+=i,n+=c,a.lastX+=i,a.lastY+=c,l&&(p.splice(r,1),r--)}m?window.scrollBy(o,n):(o&&(u.scrollLeft+=o),n&&(u.scrollTop+=n)),d||s||(p=[]),p.length?N(f,u,1e3/h.frameRate+1):b=!1},N(f,u,0),b=!0)}function e(e){s||w();var t=e.target,o=H(t);if(!o||e.defaultPrevented||e.ctrlKey)return!0;if(A(u,"embed")||A(t,"embed")&&/\.pdf/i.test(t.src)||A(u,"object"))return!0;var n=-e.wheelDeltaX||e.deltaX||0,t=-e.wheelDeltaY||e.deltaY||0;if(a&&(e.wheelDeltaX&&B(e.wheelDeltaX,120)&&(n=e.wheelDeltaX/Math.abs(e.wheelDeltaX)*-120),e.wheelDeltaY&&B(e.wheelDeltaY,120)&&(t=e.wheelDeltaY/Math.abs(e.wheelDeltaY)*-120)),n||t||(t=-e.wheelDelta||0),1===e.deltaMode&&(n*=40,t*=40),!h.touchpadSupport&&function(e){if(!e)return;r.length||(r=[e,e,e]);return e=Math.abs(e),r.push(e),r.shift(),clearTimeout(k),k=setTimeout(function(){window.localStorage&&(localStorage.SS_deltaBuffer=r.join(","))},1e3),!O(120)&&!O(100)}(t))return!0;1.2<Math.abs(n)&&(n*=h.stepSize/120),1.2<Math.abs(t)&&(t*=h.stepSize/120),y(o,n,t),e.preventDefault(),T()}function v(e){var t=e.target,o=e.ctrlKey||e.altKey||e.metaKey||e.shiftKey&&e.keyCode!==f.spacebar;document.contains(u)||(u=document.activeElement);var n=/^(button|submit|radio|checkbox|file|color|image)$/i;if(/^(textarea|select|embed|object)$/i.test(t.nodeName)||A(t,"input")&&!n.test(t.type)||A(u,"video")||function(e){var t=e.target,o=!1;if(-1!=document.URL.indexOf("www.youtube.com/watch"))do{if(o=t.classList&&t.classList.contains("html5-video-controls"))break}while(t=t.parentNode);return o}(e)||t.isContentEditable||e.defaultPrevented||o)return!0;if((A(t,"button")||A(t,"input")&&n.test(t.type))&&e.keyCode===f.spacebar)return!0;var r=0,a=0,i=H(u),l=i.clientHeight;switch(i==document.body&&(l=window.innerHeight),e.keyCode){case f.up:a=-h.arrowScroll;break;case f.down:a=h.arrowScroll;break;case f.spacebar:a=-(e.shiftKey?1:-1)*l*.9;break;case f.pageup:a=.9*-l;break;case f.pagedown:a=.9*l;break;case f.home:a=-i.scrollTop;break;case f.end:var c=i.scrollHeight-i.scrollTop-l,a=0<c?10+c:0;break;case f.left:r=-h.arrowScroll;break;case f.right:r=h.arrowScroll;break;default:return!0}y(i,r,a),e.preventDefault(),T()}function t(e){u=e.target}var S,x,k,D=(S=0,function(e){return e.uniqueID||(e.uniqueID=S++)}),M={};function T(){clearTimeout(x),x=setInterval(function(){M={}},1e3)}function E(e,t){for(var o=e.length;o--;)M[D(e[o])]=t;return t}function H(e){var t=[],o=document.body,n=m.scrollHeight;do{var r=M[D(e)];if(r)return E(t,r);if(t.push(e),n===e.scrollHeight){r=z(m)&&z(o)||L(m);if(d&&C(m)||!d&&r)return E(t,P())}else if(C(e)&&L(e))return E(t,e)}while(e=e.parentElement)}function C(e){return e.clientHeight+10<e.scrollHeight}function z(e){return"hidden"!==getComputedStyle(e,"").getPropertyValue("overflow-y")}function L(e){e=getComputedStyle(e,"").getPropertyValue("overflow-y");return"scroll"===e||"auto"===e}function X(e,t){window.addEventListener(e,t,!1)}function Y(e,t){window.removeEventListener(e,t,!1)}function A(e,t){return(e.nodeName||"").toLowerCase()===t.toLowerCase()}function B(e,t){return Math.floor(e/t)==e/t}function O(e){return B(r[0],e)&&B(r[1],e)&&B(r[2],e)}window.localStorage&&localStorage.SS_deltaBuffer&&(r=localStorage.SS_deltaBuffer.split(","));var K,N=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e,t,o){window.setTimeout(e,o||1e3/60)},q=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,P=function(){var e,t;return K||((e=document.createElement("div")).style.cssText="height:10000px;width:1px;",document.body.appendChild(e),t=document.body.scrollTop,document.documentElement.scrollTop,window.scrollBy(0,3),K=document.body.scrollTop!=t?document.body:document.documentElement,window.scrollBy(0,-3),document.body.removeChild(e)),K};function R(e){var t;return((e*=h.pulseScale)<1?e-(1-Math.exp(-e)):(--e,(t=Math.exp(-1))+(1-Math.exp(-e))*(1-t)))*h.pulseNormalize}var j,F=window.navigator.userAgent,I=/Edge/.test(F),_=/chrome/i.test(F)&&!I,I=/safari/i.test(F)&&!I,F=/mobile/i.test(F),F=(_||I)&&!F;function V(e){for(var t in e)o.hasOwnProperty(t)&&(h[t]=e[t])}"onwheel"in document.createElement("div")?j="wheel":"onmousewheel"in document.createElement("div")&&(j="mousewheel"),j&&F&&(X(j,e),X("mousedown",t),X("load",w)),V.destroy=function(){i&&i.disconnect(),Y(j,e),Y("mousedown",t),Y("keydown",v),Y("resize",l),Y("load",w)},window.SmoothScrollOptions&&V(window.SmoothScrollOptions),"function"==typeof define&&define.amd?define(function(){return V}):"object"==typeof exports?module.exports=V:window.SmoothScroll=V}();