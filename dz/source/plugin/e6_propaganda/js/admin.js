e6(function(){
	var admin_arr = new Array("register", "pay", "fee", "url", "claim", "reward");
	var typeid = [];
	for(n in admin_arr) {
		e6("." + admin_arr[n]).hide();
		typeid[n] = e6("#" + admin_arr[n] + "type").val();
		e6("." + admin_arr[n] + ".id"+typeid[n]).show();
	}
	e6("#withdrawann").keydown(function(){
		var curLength = e6("#withdrawann").val().length;	
		if(curLength>=26){
			var num = e6("#withdrawann").val().substr(0,25);
			e6("#withdrawann").val(num);
			alert("\u8d85\u8fc7\u5b57\u6570\u9650\u5236,\u591a\u51fa\u7684\u5b57\u5c06\u88ab\u622a\u65ad!");
		}
	});
});

function show_type(str,id){
	var typeid = e6(id).val();
	e6("." + str).hide();
	e6("." + str + ".id" + typeid).show();
}