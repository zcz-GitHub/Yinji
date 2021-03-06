function deleteAlbum(obj){
	Iid = obj.substring(3);
	//lert(Iid);

	$.ajax({
		type: 'get',
		url: '/deleteAlbum',
		
		data: {
			'albumId': Iid
		},
		dataType : "text",
		success : function(data) {
			if(data != null){
				console.log(data);
				alert("删除成功!");
				window.location.reload();
			}
		},
		error : function() {
			alert("false");
		}
	});	
}

yinjiApp.controller('albumController',
	function test($scope,$http,$rootScope){
		$scope.ifShow = false;

		//展示纪念册
		$http({
			method: 'GET',//注意，这里必须要用GET方法
			url:'/displayAlbum',
		})
		.success(function(data) {
			if(data != null && data.length > 0){
				$scope.ifShow = true;
				console.log(data);
				for(var i = 0; i < data.length; i++){
					var reg = new RegExp(/\\/,"g");
					var newstr = data[i].saving_path.replace(reg,"/");
					//var newstr = "/images/mo.jpg;";
					//console.log(newstr.length-1);
					
					newstr = newstr.substring(0,newstr.length-1);
					var ele = "<div class = 'no-line normal-trigger-area'>" +
						"<i id = 'del" + data[i].id + "' class='fa fa-trash-o fa-lg' onclick = 'deleteAlbum(this.id)'></i><a href = 'javascript:void(0)' id = 'circle" + data[i].id + "' class = 'ec-circle' style = 'background: url(" + newstr + ");'><h3>" + data[i].name + "</h3></a></div>";
					$("div#albumContainer").append(ele);
					//console.log(newstr);
				}

				$('.ec-circle').circlemouse({
					onMouseEnter	: function( el ) {
						el.addClass('ec-circle-hover');
					},
					onMouseLeave	: function( el ) {
						el.removeClass('ec-circle-hover');
					},
					onClick			: function( el ) {
						var clickId = el[0].id;
						//获得点击纪念册的id
						clickId = clickId.substring(6);
						$scope.gotoAlbum(clickId);
					}
				});

			}else{
				console.log("false");
			}
		});

		$scope.gotoAlbum = function(num){
			console.log(num);
			$http({
				method: 'GET',
				url: '/showAlbum',
				params:{
					'albumId': num
				}
			})
			.success(function(data){
				if(data != null){
					window.location.href = '/album_index';
				}
			});
		};
	});