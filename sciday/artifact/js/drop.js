Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#drop", {
    url: "/science/sciday/project/uploader.php",
    addRemoveLinks: true,
    // autoProcessQueue: false,
    dictDefaultMessage: "วางไฟล์ที่นี้"

});

myDropzone.on("success", function(file) {
    console.log(file.xhr.response)
    let res = JSON.parse(file.xhr.response)
    console.log(res)
    file.previewElement.appendChild(
        Dropzone.createElement(`<input type="hidden" name="img_path[]" value="${res.img_path}">`)
    )
})