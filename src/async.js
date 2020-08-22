// var api = "/api/";
var api = window.location.href.replace(window.location.hash, "") + "server/";
function GET(url, inData ,onsuccess){
    var query = '';
    for(var i=0;i <= inData.length-1; i++){
        if(i == 0){
            query = inData.length + "&q" + i + "=" + inData[i];
        }   
        if(inData.length-1 > 0 && i >= 1){
            query = query + "&q" + i + "=";
            query = query + inData[i];
        }
    };
	$.ajax({
		url: api + url + "?q=" + query,
		method: "GET",
		dataType : "json",
        crossDomain: true,
        beforeSend: ()=>{
            main.loading.active();
        },
        complete: ()=>{
            main.loading.nonActive();
        }
    }).done(function(data){
		// alert("succes");
		// console.log(data);
		onsuccess(data);
	}).fail(function(){
		// alert("gagal");
	});	
};

function POST(url , data , onsuccess){
	$.ajax({
        method: "POST",
        dataType : "json",
        url: api + url,
        data: data,
        beforeSend: ()=>{
            main.loading.active();
        },
        complete: ()=>{
            main.loading.nonActive();
            onsuccess('success');
        }
    }).done((res)=>{
        onsuccess(res);
    }).fail(function(){
		// alert('gagal');
	});	
}
