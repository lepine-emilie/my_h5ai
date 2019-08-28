
function goBack() {
    window.history.back();
}
function goForward() {
    window.history.forward();
}
$(".preview").on("click", function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    var extension = url.split(".");
    extension = extension[1];
    if (["json", "html", "css", "txt", "js"].includes(extension)){
        $.ajax({
            url : url,
            processData: false,
            dataType: 'text'
        }).done(function(data){
            alert(data);
        })
    }
});