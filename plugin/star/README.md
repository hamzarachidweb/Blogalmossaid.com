# jQuery Font Star Rating

#### include in header
```html
<script src="jquery.min.js"></script>
<script src="jquery.fontstar.js"></script>
<link href="font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />
```

#### HTML
```html
<select name="" class="star">
	<option value="">--</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4" selected>4</option>
	<option value="5">5</option>
</select>
<div style="clear:both"></div><br/>
```

#### Add in footer

* Basic
```javascript
$('.star').fontstar({},function(value,self){
	console.log("hello "+value);
});
```

* Stop selection
```javascript
$('.star').fontstar({
	selectable: false
},function(value,self){
	console.log("hello "+value);
});
```

* Customizing icons, you can also use glyphicon, you just have to include css for glyphicon and pass
	the code below
```javascript
$('.star').fontstar({
	icon: "fa fa-star-o", // when star is not selected font awesom icon code
	iconfull: "fa fa-star", // when star is selected font awesom icon code
	hovercolor: "#F39F25", // selected and hover color
	starcolor: "#969696", // default or un selected star color
},function(value,self){
	console.log("hello "+value);
});
```
