/*
@license
dhtmlxScheduler v.4.4.9 Professional

This software can be used only as part of dhtmlx.com site.
You are not allowed to use it on any other site

(c) Dinamenta, UAB.


*/
Scheduler.plugin(function(e){e.form_blocks.combo={render:function(e){e.cached_options||(e.cached_options={});var t="";return t+="<div class='"+e.type+"' style='height:"+(e.height||20)+"px;' ></div>"},set_value:function(t,a,i,n){!function(){function a(){if(t._combo&&t._combo.DOMParent){var e=t._combo;e.unload?e.unload():e.destructor&&e.destructor(),e.DOMParent=e.DOMelem=null}}a();var i=e.attachEvent("onAfterLightbox",function(){a(),e.detachEvent(i)})}(),window.dhx_globalImgPath=n.image_path||"/",t._combo=new dhtmlXCombo(t,n.name,t.offsetWidth-8),
n.onchange&&t._combo.attachEvent("onChange",n.onchange),n.options_height&&t._combo.setOptionHeight(n.options_height);var r=t._combo;if(r.enableFilteringMode(n.filtering,n.script_path||null,!!n.cache),n.script_path){var s=i[n.map_to];s?n.cached_options[s]?(r.addOption(s,n.cached_options[s]),r.disable(1),r.selectOption(0),r.disable(0)):dhtmlxAjax.get(n.script_path+"?id="+s+"&uid="+e.uid(),function(e){var t=e.doXPath("//option")[0],a=t.childNodes[0].nodeValue;n.cached_options[s]=a,r.addOption(s,a),r.disable(1),
r.selectOption(0),r.disable(0)}):r.setComboValue("")}else{for(var d=[],o=0;o<n.options.length;o++){var l=n.options[o],_=[l.key,l.label,l.css];d.push(_)}if(r.addOption(d),i[n.map_to]){var h=r.getIndexByValue(i[n.map_to]);r.selectOption(h)}}},get_value:function(e,t,a){var i=e._combo.getSelectedValue();return a.script_path&&(a.cached_options[i]=e._combo.getSelectedText()),i},focus:function(e){}},e.form_blocks.radio={render:function(t){var a="";a+="<div class='dhx_cal_ltext dhx_cal_radio' style='height:"+t.height+"px;' >";
for(var i=0;i<t.options.length;i++){var n=e.uid();a+="<input id='"+n+"' type='radio' name='"+t.name+"' value='"+t.options[i].key+"'><label for='"+n+"'> "+t.options[i].label+"</label>",t.vertical&&(a+="<br/>")}return a+="</div>"},set_value:function(e,t,a,i){for(var n=e.getElementsByTagName("input"),r=0;r<n.length;r++){n[r].checked=!1;var s=a[i.map_to]||t;n[r].value==s&&(n[r].checked=!0)}},get_value:function(e,t,a){for(var i=e.getElementsByTagName("input"),n=0;n<i.length;n++)if(i[n].checked)return i[n].value;
},focus:function(e){}},e.form_blocks.checkbox={render:function(t){return e.config.wide_form?'<div class="dhx_cal_wide_checkbox" '+(t.height?"style='height:"+t.height+"px;'":"")+"></div>":""},set_value:function(t,a,i,n){t=document.getElementById(n.id);var r=e.uid(),s="undefined"!=typeof n.checked_value?a==n.checked_value:!!a;t.className+=" dhx_cal_checkbox";var d="<input id='"+r+"' type='checkbox' value='true' name='"+n.name+"'"+(s?"checked='true'":"")+"'>",o="<label for='"+r+"'>"+(e.locale.labels["section_"+n.name]||n.name)+"</label>";
if(e.config.wide_form?(t.innerHTML=o,t.nextSibling.innerHTML=d):t.innerHTML=d+o,n.handler){var l=t.getElementsByTagName("input")[0];l.onclick=n.handler}},get_value:function(e,t,a){e=document.getElementById(a.id);var i=e.getElementsByTagName("input")[0];return i||(i=e.nextSibling.getElementsByTagName("input")[0]),i.checked?a.checked_value||!0:a.unchecked_value||!1},focus:function(e){}}});
//# sourceMappingURL=../sources/ext/dhtmlxscheduler_editors.js.map