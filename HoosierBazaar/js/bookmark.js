$(document).ready(function() {
    $(".delete-button").click(function () {

        var pid = $(this).data("custom-value");
        var name = $(this).data("name-value");

        $.get("deleteBookmark.php?pid=" + pid+"&username="+name,
            function (data, status) {

            }).then(function (success){

			},function (error){

		});
        $(this).parent().parent().remove();
        alert("Bookmark deleted !");
    });

    /*
    $("#mainCntnt").on( "click", "article>.save-button", function () {

        var pid = $(this).data("custom-value");
        alert("Saving bookmark"+pid);
        $.get("saveBookmark.php?pid=" + pid,
            function (data, status) {

            }).then(function (success){

        },function (error){

        });
        alert("Bookmark saved!");
    });
    */
});

function saveBookmark(pid) {

    $.get("saveBookmark.php?pid=" + pid,
        function (data, status) {

        }).then(function (success){

    },function (error){

    });
    alert("Bookmark saved!");
}