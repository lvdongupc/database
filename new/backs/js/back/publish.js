
 //实例化编辑器
    
 var ue = UE.getEditor( 'editor', {
    
	autoHeightEnabled: true,

	autoFloatEnabled: true,

	// initialFrameWidth: 100%,

	initialFrameHeight:250

});

$("#pub").on("click",function(){
	var title=$("#title").val();
	var author=$("#author").val();
	var content=ue.getContent();
	if(title.length!=0 && author.length!=0 && content.length!=0){
		console.log(1)
		var json={
			"title":title,
			"author":author,
			"content":content
	}
		getdata(json);
	}
	
});

function getdata(data){
	var url=Config.host+"/back/noticeInsert";
	var data=data;
	var func=function(returndata){
			window.location.reload();
	}
	AJAX.post2(url,data,func);//正常应该是get2
}