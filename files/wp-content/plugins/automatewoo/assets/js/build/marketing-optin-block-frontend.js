!function(){"use strict";var t=window.wc.blocksCheckout,e=window.wc.wcBlocksSharedHocs,o=JSON.parse('{"apiVersion":2,"name":"automatewoo/marketing-optin","version":"0.1.0","title":"AutomateWoo Marketing opt-in","category":"woocommerce","textdomain":"automatewoo","supports":{"multiple":false},"attributes":{"lock":{"type":"object","default":{"remove":true}}},"parent":["woocommerce/checkout-contact-information-block"],"editorScript":"file:../build/marketing-optin-block.js","editorStyle":"file:../build/marketing-optin-block.css"}'),n=window.wc.wcSettings,r={text:{type:"string",default:(0,n.getSetting)("automatewoo_data","").optinDefaultText}};function a(t,e){(null==e||e>t.length)&&(e=t.length);for(var o=0,n=new Array(e);o<e;o++)n[o]=t[o];return n}var i=window.wp.element,l=(0,n.getSetting)("automatewoo_data"),c=l.optinEnabled,u=l.alreadyOptedIn;(0,t.registerCheckoutBlock)({metadata:o,component:(0,e.withFilteredAttributes)(r)((function(e){var o,n,r=e.text,l=e.checkoutExtensionData,s=(o=(0,i.useState)(!1),n=2,function(t){if(Array.isArray(t))return t}(o)||function(t,e){var o=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null!=o){var n,r,a=[],_n=!0,i=!1;try{for(o=o.call(t);!(_n=(n=o.next()).done)&&(a.push(n.value),!e||a.length!==e);_n=!0);}catch(t){i=!0,r=t}finally{try{_n||null==o.return||o.return()}finally{if(i)throw r}}return a}}(o,n)||function(t,e){if(t){if("string"==typeof t)return a(t,e);var o=Object.prototype.toString.call(t).slice(8,-1);return"Object"===o&&t.constructor&&(o=t.constructor.name),"Map"===o||"Set"===o?Array.from(t):"Arguments"===o||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(o)?a(t,e):void 0}}(o,n)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),m=s[0],d=s[1],f=l.setExtensionData;return(0,i.useEffect)((function(){(c||u)&&f("automatewoo","optin",m)}),[m,f]),!c||u?null:(0,i.createElement)(t.CheckboxControl,{checked:m,onChange:d},(0,i.createElement)("span",{dangerouslySetInnerHTML:{__html:r}}))}))})}();