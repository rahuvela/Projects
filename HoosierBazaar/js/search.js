$(document).ready(function() {
	$("#searchBtn").click(function () {
	  	$("#mainCntnt").empty();
	  	$.get("login_page/search.php",
		  	function (data, status) {
			  	var obj = jQuery.parseJSON(data);
			  	var counter = 0;
			  	var htmlToAppend = "<div class=productRow>";

			  	$.each(obj, function(key,value) {
				  	counter = (counter+1)%3;
                    htmlToAppend += "<article class=productInfo>";
                    htmlToAppend += "<div style=cursor:pointer; onclick=window.open('"+value.link+"','_blank')><img style=height:200px;width:200px; alt=sample src=images/"+ value.img_loc +"></div>";
                    htmlToAppend += "<p style=cursor:pointer; onclick=window.open('"+value.link+"','_blank') class=price>"+value.name+"</p>";
                    htmlToAppend += "<p class=productContent>$"+value.price+"</p>";
                    htmlToAppend += "<p style=cursor:pointer; class=save-button onclick='saveBookmark("+value.id+");'>Save Bookmark</p>";
				  	htmlToAppend += "</article>";
				  	if(counter==0)
				  	{
						htmlToAppend += "</div><div class=productRow>";
				  	}
			  	});
			  	htmlToAppend += "</div>";
			  	$(".mainContent").append(htmlToAppend);
	  	});
	});

	$(".size-filter").click(function () {

        $(".size-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".store-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".brand-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(this).css({'font-weight': 'bold', 'font-size': 'large'});

        $("#mainCntnt").hide().empty();

	  	var size=$(this).data("custom-value");
	  	$.get("login_page/search.php?size="+size,
		  	function (data, status) {
			  	var obj = jQuery.parseJSON(data);
			  	var counter = 0;
			  	var htmlToAppend = "<div class=productRow>";

			  	$.each(obj, function(key,value) {
				  	counter = (counter+1)%3;
                    htmlToAppend += "<article class=productInfo>";
                    htmlToAppend += "<div style=cursor:pointer; onclick=window.open('"+value.link+"','_blank')><img style=height:200px;width:200px; alt=sample src=images/"+ value.img_loc +"></div>";
                    htmlToAppend += "<p style=cursor:pointer; onclick=window.open('"+value.link+"','_blank') class=price>"+value.name+"</p>";
                    htmlToAppend += "<p class=productContent>$"+value.price+"</p>";
                    htmlToAppend += "<p style=cursor:pointer; class=save-button onclick='saveBookmark("+value.id+");'>Save Bookmark</p>";
				  	htmlToAppend += "</article>";
				  	if(counter==0)
				  	{
					  	htmlToAppend += "</div><div class=productRow>";
				  	}
			  	});
			  	htmlToAppend += "</div>";
			  	$(".mainContent").append(htmlToAppend).show('fade', 1000);;
	  	});
	});

	$(".brand-filter").click(function () {

        $(".size-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".store-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".brand-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(this).css({'font-weight': 'bold', 'font-size': 'large'});

        $("#mainCntnt").hide().empty();
	  	var brand=$(this).data("custom-value");
	  	$.get("login_page/search.php?brand="+brand,
		  	function (data, status) {
			  	var obj = jQuery.parseJSON(data);
			  	var counter = 0;
			  	var htmlToAppend = "<div class=productRow>";

			  	$.each(obj, function(key,value) {
				  	counter = (counter+1)%3;
				  	htmlToAppend += "<article class=productInfo>";
				  	htmlToAppend += "<div style=cursor:pointer; onclick=window.open('"+value.link+"','_blank')><img style=height:200px;width:200px; alt=sample src=images/"+ value.img_loc +"></div>";
				  	htmlToAppend += "<p style=cursor:pointer; onclick=window.open('"+value.link+"','_blank') class=price>"+value.name+"</p>";
				  	htmlToAppend += "<p class=productContent>$"+value.price+"</p>";
                    htmlToAppend += "<p style=cursor:pointer; class=save-button onclick='saveBookmark("+value.id+");'>Save Bookmark</p>";
				  	htmlToAppend += "</article>";
				  	if(counter==0)
				  	{
					  	htmlToAppend += "</div><div class=productRow>";
				  	}
			  	});
			  	htmlToAppend += "</div>";
			  	$(".mainContent").append(htmlToAppend).show('fade', 1000);
	  	});
	});

    $(".store-filter").click(function () {

        $(".size-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".store-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".brand-filter").css({'font-weight': 'normal', 'font-size': '14px'});
    	$(this).css({'font-weight': 'bold', 'font-size': 'large'});

        $("#mainCntnt").hide().empty();
        var store=$(this).data("custom-value");
        $.get("login_page/search.php?store_name="+store,
            function (data, status) {
                var obj = jQuery.parseJSON(data);
                var counter = 0;
                var htmlToAppend = "<div class=productRow>";

                $.each(obj, function(key,value) {
                    counter = (counter+1)%3;
                    htmlToAppend += "<article class=productInfo>";
                    htmlToAppend += "<div style=cursor:pointer; onclick=window.open('"+value.link+"','_blank')><img style=height:200px;width:200px; alt=sample src=images/"+ value.img_loc +"></div>";
                    htmlToAppend += "<p style=cursor:pointer; onclick=window.open('"+value.link+"','_blank') class=price>"+value.name+"</p>";
                    htmlToAppend += "<p class=productContent>$"+value.price+"</p>";
                    htmlToAppend += "<p style=cursor:pointer; class=save-button onclick='saveBookmark("+value.id+");'>Save Bookmark</p>";
                    htmlToAppend += "</article>";
                    if(counter==0)
                    {
                        htmlToAppend += "</div><div class=productRow>";
                    }
                });
                htmlToAppend += "</div>";
                $(".mainContent").append(htmlToAppend).show('fade', 1000);
        });
    });

    $("#menu > li > div").click(function(){
    	var categorySelected = $(this).text();

        $(".size-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".store-filter").css({'font-weight': 'normal', 'font-size': '14px'});
        $(".brand-filter").css({'font-weight': 'normal', 'font-size': '14px'});

    	$("#mainCntnt").hide().empty();
        $.get("login_page/search.php?category="+categorySelected,
            function (data, status) {
                var obj = jQuery.parseJSON(data);
                var counter = 0;
                var htmlToAppend = "<div class=productRow>";

                $.each(obj, function(key,value) {
                    counter = (counter+1)%3;
                    htmlToAppend += "<article class=productInfo>";
                    htmlToAppend += "<div style=cursor:pointer; onclick=window.open('"+value.link+"','_blank')><img style=height:200px;width:200px; alt=sample src=images/"+ value.img_loc +"></div>";
                    htmlToAppend += "<p style=cursor:pointer; onclick=window.open('"+value.link+"','_blank') class=price>"+value.name+"</p>";
                    htmlToAppend += "<p class=productContent>$"+value.price+"</p>";
                    htmlToAppend += "<p style=cursor:pointer; class=save-button onclick='saveBookmark("+value.id+");'>Save Bookmark</p>";
                    htmlToAppend += "</article>";
                    if(counter==0)
                    {
                        htmlToAppend += "</div><div class=productRow>";
                    }
                });
                htmlToAppend += "</div>";
                $(".mainContent").append(htmlToAppend).show('fade', 1000);
            });

	});

});