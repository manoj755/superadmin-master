/*! range-picker - v0.0.3 - 2016-03-22 */
!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){"use strict";function b(a){return"undefined"==typeof a}function c(a,b){return a.replace(g,function(a,c){return b[c]})}function d(a,c){if(b(c.startValue)||b(c.endValue))throw new Error("startValue and endValue is need");if(b(c.translateSelectLabel))throw new Error(" RangePicker: translateSelectLabel is need");this.__init(a,c)}function e(a){this.__init(a)}function f(a){this.__init(a)}var g=/<%=\s*(\w+)\s*%>/g;d.prototype={constructor:d,__defaultOptions:{type:"single"},__template:"<div class='range-picker-wrapper'><div class='range-picker'><span class='not-select-process'></span><span class='label range-label'><%= startValue %></span><span class='label range-label end-label'><%= endValue %></span></div></div>",__init:function(b,c){this.__options=a.extend({},this.__defaultOptions,c),this.__$containerElement=b,this.__render(),this.__$rangepickerElement=this.__$containerElement.find(".range-picker"),this.__addWidget(),this.__setContainerToWrapperWidget(),this.__setCursorInitialPosition(),this.__updateProcessBarView()},__render:function(){var a={startValue:this.__options.startValue,endValue:this.__options.endValue},b=c(this.__template,a);this.__$containerElement.html(b)},__addWidget:function(){var b=a.proxy(this.__handleLabelPositionChange,this);this.__selectCursors=[],this.__selectCursors.push(new e({positionChange:b})),"double"===this.__options.type&&this.__selectCursors.push(new e({positionChange:b})),this.__processBar=new f,this.__$rangepickerElement.append(this.__processBar.getJQueryElement());for(var c=0;c<this.__selectCursors.length;c++)this.__$rangepickerElement.append(this.__selectCursors[c].getJQueryElement());this.__setWidgetInitialValue()},__setWidgetInitialValue:function(){var a=this.__$rangepickerElement.width();if(this.__selectCursors[0].render(this.__options.translateSelectLabel(a,a)),!b(this.__selectCursors[1])){var c=this.__selectCursors[1];c.render(this.__options.translateSelectLabel(0,a))}},__setCursorInitialPosition:function(){var a=this.__$rangepickerElement.width(),c=this.__selectCursors;c[0].updateArrowPosition(a),c[0].setTotalWidth(a),b(c[1])||(c[1].updateArrowPosition(0),c[1].setTotalWidth(a))},__setContainerToWrapperWidget:function(){var a=this.__$containerElement.find(".range-picker-wrapper"),c=this.__selectCursors,d=this.__$rangepickerElement.width(),e=-c[0].getJQueryElement().position().top;!b(c[1])&&-c[1].getJQueryElement().position().top>e&&(e=-c[1].getJQueryElement().position().top),a.css("paddingTop",e+"px");var f=c[0].getJQueryElement(),g=f.outerWidth()/2,h=null;c[0].render(this.__options.translateSelectLabel(0,d)),h=f.outerWidth()/2,c[0].render(this.__options.translateSelectLabel(d,d)),a.css({paddingLeft:h+"px",paddingRight:g+"px"})},__handleLabelPositionChange:function(a){this.__updateView(a.left)},__updateView:function(){this.__updateCursorView(),this.__updateProcessBarView()},__updateCursorView:function(){for(var a=0,b="",c=null;a<this.__selectCursors.length;a++)c=this.__selectCursors[a].getArrowPosition(),b=this.__options.translateSelectLabel(c.left,this.__$rangepickerElement.width()),this.__selectCursors[a].render(b)},__updateProcessBarView:function(){var a=this.__getCursorPosition(),b={left:a.start,right:this.__$rangepickerElement.width()-a.end};this.__processBar.updatePosition(b)},__getCursorPosition:function(){var a={start:0,startLabel:""},c=this.__selectCursors[0].getArrowPosition();return a.end=c.left,a.endLabel=c.positionLabel,b(this.__selectCursors[1])||(c=this.__selectCursors[1].getArrowPosition(),c.left>a.end?(a.start=a.end,a.startLabel=a.endLabel,a.end=c.left,a.endLabel=c.positionLabel):(a.start=c.left,a.startLabel=c.positionLabel)),a},__formatPositionValue:function(a,b){var c=this.__$rangepickerElement.width(),d=0;return a=a.replace(/\s+/,""),d="%"===a[a.length-1]?c*parseInt(a,10)/100:b+parseInt(a,10)},getSelectValue:function(){var a=this.__getCursorPosition();return a.totalWidth=this.__$rangepickerElement.width(),a},updatePosition:function(a,c){var d=this.__selectCursors;d[0].updateArrowPosition(this.__formatPositionValue(a,d[0].getArrowPosition().left)),b(d[1])||b(c)||d[1].updateArrowPosition(this.__formatPositionValue(c,d[1].getArrowPosition().left)),this.__updateView()}},e.prototype={constructor:e,__defaultOptions:{positionChange:a.loop},__template:"<span class='label select-label'></span>",__init:function(b){this.__options=a.extend({},this.__defaultOptions,b),this.__$element=a(this.__template),this.__bindDragEventHandler()},__bindDragEventHandler:function(){var b=this;this.__$element.on("mousedown",function(b){this.__rangepicker={isMouseDown:!0,mouseStartX:b.clientX,previousMoveDistance:0},a(this).css("zIndex",1e3)}).on("mouseup",function(){this.__rangepicker=null,a(this).css("zIndex",1)}).on("mousemove",function(a){this.__rangepicker&&this.__rangepicker.isMouseDown&&b.__handleDragEvent(a.clientX,this.__rangepicker)}).on("mouseout",function(){a(this).css("zIndex",1),this.__rangepicker=null})},__handleDragEvent:function(a,b){var c=a-b.mouseStartX-b.previousMoveDistance;b.previousMoveDistance=a-b.mouseStartX;var d=this.__calculatePosition(c);this.updateArrowPosition(d),this.__options.positionChange(this.getArrowPosition(),this.__$element)},__calculatePosition:function(a){var b=this.__arrowPosition+a;return b>this.__totalWidth?b=this.__totalWidth:0>b&&(b=0),b},__updatePosition:function(a){for(var b in a)a.hasOwnProperty(b)&&this.__$element.css(b,a[b]+"px")},render:function(a){this.__$element.text(a)},updateArrowPosition:function(a){this.__arrowPosition=a,this.__updatePosition({left:a-this.__$element.outerWidth()/2})},getJQueryElement:function(){return this.__$element},getArrowPosition:function(){return{left:this.__arrowPosition,positionLabel:this.__$element.text()}},setTotalWidth:function(a){this.__totalWidth=a}},f.prototype={constructor:f,__template:"<span class='process'></span>",__init:function(){this.__$element=a(this.__template)},updatePosition:function(a){for(var b in a)a.hasOwnProperty(b)&&this.__$element.css(b,a[b]+"px")},getJQueryElement:function(){return this.__$element}},a.fn.rangepicker=function(a){return new d(this,a)}});
//# sourceMappingURL=range_picker.min.js.map