try { __ez.fads.adLoadGAM=(__ez.fads.adLoadGAM&&__ez.fads.adLoadGAM.loaded===true)?__ez.fads.adLoadGAM:{loaded:true,floatingAdsShown:false,slotsDone:[],slotKV:{},isInit:false,init:function(){if(this.isInit){return;}
this.isInit=true;this.LoadGPT();__ez.fads.LibraryLoaded("adLoadGAM");},LoadAd:function(id,attempt){if(this.slotsDone.indexOf(id)>-1){return;}
if(attempt<1){attempt=1;}else if(attempt>100){return;}
this.slotsDone.push(id);googletag.cmd.push(function(){if(googletag.pubadsReady!==true){setTimeout(function(){__ez.fads.adLoadGAM.SlotNotDone(id);__ez.fads.adLoadGAM.LoadAd(id,attempt+1)},100);return;}
var slot_id=__ez.fads.initslots[id](null);var slot=window[slot_id];if(document.getElementById(slot.getSlotElementId())===null){setTimeout(function(){__ez.fads.adLoadGAM.SlotNotDone(id);__ez.fads.adLoadGAM.LoadAd(id,attempt+1)},100);}else{googletag.display(slot.getSlotElementId());if(window.ezoResponsiveSizes){__ez.fads.adLoadGAM.adjustResponsiveDiv(slot.getSlotElementId());slot.defineSizeMapping(__ez.fads.adLoadGAM.buildSlotResponsiveSizes(slot.getSlotElementId()));}
if(typeof window.__ezWillLoadCnx!=='undefined'&&typeof slot!='undefined'&&slot!=null&&slot.getTargeting('al')[0]=='1039'){__ez.fads.adLoadGAM.loadConnatix(slot);return;}
__ez.fads.adLoadGAM.setQueuedTargeting(id);if(typeof window.adjustHbValues==='function'){window.adjustHbValues(slot);}
googletag.pubads().refresh([slot]);}});if(this.floatingAdsShown!==true){setTimeout(window.__ez.fads.loadFloatingAds(0,true),0);}},SlotNotDone:function(id){var index=this.slotsDone.indexOf(id);if(index>-1){this.slotsDone.splice(index,1);}},ShowFloatingAds:function(){if(this.floatingAdsShown===true||typeof __ez_fad_floating==='undefined'){return;}
this.floatingAdsShown=true;var e=document.getElementById('ezmobfooter');if(e!=null){e.classList.add('ezmobtrans');}else{var head=document.head||document.getElementsByTagName('head')[0];var style=document.createElement('style');head.appendChild(style);var css="body > #ezmobfooter{bottom:0px;visibility:visible;}";style.type='text/css';if(style.styleSheet){style.styleSheet.cssText=css;}else{style.appendChild(document.createTextNode(css));}}
for(var i=0;i<__ez_fad_floating.length;i++){this.LoadAd(__ez_fad_floating[i]);}},loadConnatix:function(slot){window.__ezsbwcmd=window.__ezsbwcmd||[];var sr=[slot];window.__ezsbwcmd.push(function(){if(typeof __ezcnxPlayer==='undefined'||!__ezcnxPlayer.getSize()){googletag.pubads().refresh(sr);}else{__ezcnxPlayer.once('removed',function(){googletag.pubads().refresh(sr);});}});},SetFloor:function(id,floor){this.SetTargeting(id,'br1','0');this.SetTargeting(id,'eb_br','zero');},SetTargeting:function(id,key,value){var slot=this.GetSlotById(id);if(slot){slot.setTargeting(key,value);if(this.slotKV[id]&&this.slotKV[id][key]){delete this.slotKV[id][key];}}else{this.slotKV[id]=this.slotKV[id]||{};this.slotKV[id][key]=value;}},setQueuedTargeting:function(id){if(this.slotKV[id]){var slot=this.GetSlotById(id);if(slot){for(var key in this.slotKV[id]){slot.setTargeting(key,this.slotKV[id][key]);}}}},GetSlotById:function(n){if(typeof googletag=='undefined'||typeof googletag.pubads!='function'||typeof googletag.pubads().getSlots!='function'){return;}
slots=googletag.pubads().getSlots();for(slot in slots){if(slots[slot].getSlotElementId()==n){return slots[slot];}}},LoadGPT:function(){!function(){var t=document.createElement("script");t.async=!0,t.type="text/javascript";var e="https:"==document.location.protocol;t.src=(e?"https:":"http:")+"//securepubads.g.doubleclick.net/tag/js/gpt.js";var c=document.getElementsByTagName("script")[0];c.parentNode.insertBefore(t,c)}();},buildSlotResponsiveSizes:function(domID){var gptSizeMapping=googletag.sizeMapping();if(typeof window.ezoResponsiveSizes==='undefined'||typeof window.ezoResponsiveSizes[domID]==='undefined'){return gptSizeMapping.build();}
window.ezoResponsiveSizes[domID].responsiveSizes.sort(function(a,b){var largerWidth=a.minWidth>b.minWidth;var equalWidth=a.minWidth===b.minWidth;var largerHeight=a.minHeight>b.minHeight;if(largerWidth)return-1;if(equalWidth&&largerHeight)return-1;return 0;});if(window.ezoResponsiveSizes[domID].responsiveSizes){var hasSizesAtZero=false;for(var sizeIdx=0;sizeIdx<window.ezoResponsiveSizes[domID].responsiveSizes.length;sizeIdx++){var sizeDirective=window.ezoResponsiveSizes[domID].responsiveSizes[sizeIdx];if(sizeDirective.minWidth===0&&sizeDirective.minHeight===0){hasSizesAtZero=true;}
gptSizeMapping.addSize([sizeDirective.minWidth,sizeDirective.minHeight],sizeDirective.sizes);}
if(!hasSizesAtZero){gptSizeMapping.addSize([0,0],[]);}}
return gptSizeMapping.build();},adjustResponsiveDiv:function(divID){if(!window.ezoResponsiveSizes||!window.ezoResponsiveSizes[divID]){return;}
var adDiv=document.getElementById(divID);if(!adDiv){return;}
var fillSize=__ez_get_largest_ad_size(divID);if(fillSize.length===0||fillSize[0]===0||fillSize[1]===0){return;}
var orivDivSize=[adDiv.getAttribute('ezaw'),adDiv.getAttribute('ezah')];if(orivDivSize[0]===null||orivDivSize[1]===null){return;}
if(fillSize[0]>=orivDivSize[0]){return;}
var parentDiv=adDiv.parentElement;if(!parentDiv||!parentDiv.classList.contains('ezoic-ad')){return;}
parentDiv.style.minWidth=fillSize[0]+'px';parentDiv.style.width=fillSize[0]+'px';parentDiv.style.maxWidth="100%";adDiv.style.width='';adDiv.style.minWidth=fillSize[0]+'px';},getLargestAdSize:function(slotID){var applicableSizes=[];if(ezoResponsiveSizes[slotID]){var clientWidth=document.documentElement.clientWidth;var clientHeight=document.documentElement.clientHeight;var bestResponsiveFit=null;window.ezoResponsiveSizes[slotID].responsiveSizes.forEach(responsiveSize=>{var appliesToViewport=responsiveSize.minWidth<=clientWidth&&responsiveSize.minHeight<=clientHeight;var betterResponsiveFit=bestResponsiveFit===null||responsiveSize.minWidth>bestResponsiveFit.minWidth||(bestResponsiveFit.minWidth==responsiveSize.minWidth&&responsiveSize.minHeight>bestResponsiveFit.minHeight);if(appliesToViewport&&betterResponsiveFit){bestResponsiveFit=responsiveSize;}});if(bestResponsiveFit!==null){applicableSizes=bestResponsiveFit.sizes;}}
var largestDims=[0,0];applicableSizes.forEach(size=>{if(size[0]>largestDims[0]){largestDims[0]=size[0];}
if(size[1]>largestDims[1]){largestDims[1]=size[1];}});return largestDims;},};__ez.fads.adLoadGAM.init();} catch(err) {var hREED = function(er) {return function() {reportEzError(er, "/porpoiseant/ezadloadgam.js")}}; typeof reportEzError==="function"?hREED(err):window.addEventListener('reportEzErrorDefined',hREED(err), {once: true}); console.error(err);}